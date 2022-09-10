<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Cinema;
use App\Models\Theater;
use App\Repositories\Theaters\TheaterRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TheaterService
{
    protected $theaterRepository;
    public $chairs = [];

    public function __construct(TheaterRepositoryInterface $theaterRepository)
    {
        $this->theaterRepository = $theaterRepository;
    }

    public function getTheaters($search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $blogs = $this->theaterRepository->getAll();
            } else {
                $blogs = $this->theaterRepository->filteredTheaters($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $blogs;
    }

    public function getTheatersByCinema(Cinema $cinema): Collection
    {
        return $this->theaterRepository->getTheatersByCinema($cinema);
    }

    public function create($request): Theater
    {
        try {

            $data = $request->validated();

            $to_theater = new Theater($data);

            $theater = $this->theaterRepository->save($to_theater);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $theater;
    }

    public function update($request, Theater $theater): Theater
    {
        try {

            $data = $request->validated();

            $theater['name'] = $data['name'];
            $theater['cinema_id'] = $data['cinema_id'];
            $theater['seat'] = $data['seat'];

            $theater = $this->theaterRepository->update($theater);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $theater;
    }

    public function delete(Theater $theater): string
    {
        try {

            $this->theaterRepository->delete($theater);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }

    public function generateChairs(int $chair_per_row = 0, int $rows = 0, bool $is_couple = false): array
    {
        $alphabets = ['A','B','C','D','E','F','G','H','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        if ($chair_per_row > 0 && $rows > 0)
        {
            for ($i = 0; $i < $rows; $i++)
            {
                $row = (object) [];
                $row->name = $alphabets[$i];

                // chairs in row
                $data = [];
                for ($j = 0; $j < $chair_per_row; $j++)
                {
                    $chair_data = (object) [];
                    $chair_data->name = $alphabets[$i] . $j+1;
                    $chair_data->color = !$is_couple ? '#f05152' : '#3e83f8';
                    $chair_data->is_occupied = false;
                    $chair_data->price = 30.00;
                    $chair_data->type = 'couple';

                    array_push($data, $chair_data);
                }
                $row->data = $data;
                array_push($this->chairs, $row);
            }

        }

        return json_decode(json_encode($this->chairs), true);
    }

    public function updateChair(array $chairs, string $row, string $name, int $price, string $type, string $space_type): array
    {
        $updated_chairs = [];
        $alphabets = ['A','B','C','D','E','F','G','H','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        foreach ($chairs as $i => $chair)
        {
            if ($space_type == 'itself')
            {
                $updated_row = [];
                $updated_row['name'] = $chair['name'];

                if ($chair['name'] == $row)
                {
                    $current_place = 0;

                    foreach ($chair['data'] as $index => $seat)
                    {
                        if ($seat['name'] == $name)
                        {
                            // update seat data
                            $seat['name'] = 'space';
                            $seat['color'] = '';
                            $seat['price'] = '';
                            $seat['type'] = 'space';

                            $chair['data'][$index] = $seat;
                        } else
                        {
                            $seat['name'] = $alphabets[$i] . $current_place+1;
                            $chair['data'][$index] = $seat;
                            $current_place++;
                        }
                    }
                }

            } else {
                $updated_row = [];
                $updated_row['name'] = $chair['name'];

                if ($chair['name'] == $row)
                {
                    foreach ($chair['data'] as $index => $seat)
                    {
                        if ($seat['name'] == $name)
                        {
                            // just update seat data
                            $seat['color'] = $this->changeColor($price);
                            $seat['price'] = $price;
                            $seat['type'] = $type;

                            $chair['data'][$index] = $seat;

                            // add space
                            if ($space_type != "")
                            {
                                $space = $this->addSpace();

                                if ($space_type == "right")
                                {
                                    array_splice($chair['data'], $index + 1, 0, array($space));
                                }

                                if ($space_type == "left")
                                {
                                    array_splice($chair['data'], $index, 0, array($space));
                                }
                            }
                        }
                    }
                }
            }

            $updated_row['data'] = $chair['data'];
            array_push($updated_chairs, $updated_row);
        }

        $this->chairs = $updated_chairs;

        return $this->chairs;
    }

    public function updateRow(array $chairs, string $row, int $row_price, string $type, string $space_type): array
    {
        $updated_chairs = [];

        foreach ($chairs as $i => $chair)
        {
            $updated_row = [];
            $updated_row['name'] = $chair['name'];

            if ($chair['name'] == $row)
            {
                // add space
                if ($space_type != "")
                {
                    $space_row = [];
                    $space_row['name'] = 'space';
                    $space_data = [];

                    for ($j = 0; $j < count($chair['data']); $j++)
                    {
                        $space = $this->addSpace();

                        array_push($space_data, $space);
                    }

                    if ($space_type == "above")
                    {
                        array_splice($chairs, $i + 1, 0, array($space_row));

                    }

                    if ($space_type == "under")
                    {
                        array_splice($chairs, $i, 0, array($space_row));
                    }
                }

                foreach ($chair['data'] as $index => $seat)
                {
                    // just update seat data
                    $seat['color'] = $this->changeColor($row_price);
                    $seat['price'] = $row_price;
                    $seat['type'] = $type;

                    $chair['data'][$index] = $seat;
                }

            }
            $updated_row['data'] = $chair['data'];

            array_push($updated_chairs, $updated_row);
        }

        $this->chairs = $updated_chairs;

        return $this->chairs;
    }

    public function updateColumn(array $chairs, string $col_index, int $col_price, string $space_type): array
    {
        $updated_chairs = [];

        foreach ($chairs as $chair)
        {
            $updated_row = [];
            $updated_row['name'] = $chair['name'];

            foreach ($chair['data'] as $index => $seat)
            {
                if ($index == $col_index)
                {
                    // just update seat data
                    $seat['color'] = $this->changeColor($col_price);
                    $seat['price'] = $col_price;

                    $chair['data'][$index] = $seat;

                    // add space
                    if ($space_type != "")
                    {
                        $space = $this->addSpace();

                        if ($space_type == "right")
                        {
                            array_splice($chair['data'], $index + 1, 0, array($space));
                        }

                        if ($space_type == "left")
                        {
                            array_splice($chair['data'], $index, 0, array($space));
                        }
                    }
                }
            }

            $updated_row['data'] = $chair['data'];
            array_push($updated_chairs, $updated_row);
        }

        $this->chairs = $updated_chairs;

        return $this->chairs;
    }

    public function changeColor(int $price): string
    {
        $color = '#f05152';

        if ($price == 15.00)
        {
            $color = '#fe5b1f';

        } elseif ($price == 20.00)
        {
            $color = '#0c9f6e';

        } elseif ($price == 30.00)
        {
            $color = '#3e83f8';
        }

        return $color;
    }

    public function addSpace(): array
    {
        $seat_space = [];
        $seat_space['name'] = 'space';
        $seat_space['color'] = '';
        $seat_space['is_occupied'] = false;
        $seat_space['price'] = 0;
        $seat_space['type'] = 'space';

        return $seat_space;
    }

    public function getChairs(): array
    {
        return json_decode(json_encode($this->chairs), true);
    }

    public function getRowCounts(array $chairs): int
    {
        $max_row_count = 0;

        foreach ($chairs as $chair)
        {
            if (count($chair['data']) > $max_row_count)
            {
                $max_row_count = count($chair['data']);
            }
        }

        return $max_row_count;
    }
}
