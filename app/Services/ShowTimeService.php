<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\ShowTime;
use App\Models\TheaterShowTime;
use App\Repositories\ShowTimes\ShowTimeRepositoryInterface;
use App\Repositories\TheaterShowTimes\TheaterShowTimeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use function PHPUnit\Framework\isNull;

class ShowTimeService
{
    protected  $showTimeRepository;
    protected $theaterShowTimeRepository;

    public function __construct(ShowTimeRepositoryInterface $showTimeRepository, TheaterShowTimeRepositoryInterface $theaterShowTimeRepository)
    {
        $this->showTimeRepository = $showTimeRepository;
        $this->theaterShowTimeRepository = $theaterShowTimeRepository;
    }

    public function getShowTimes(string $search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $genres = $this->showTimeRepository->getAll();
            } else {
                $genres = $this->showTimeRepository->filteredShowTimes($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $genres;
    }

    public function create($request): ShowTime
    {
        try {

            $data = $request->validated();

            $to_show_time = new ShowTime($data);

            $show_time = $this->showTimeRepository->save($to_show_time);

            $theater_show_times = json_decode($data['theater_show_times'], true);

            foreach ($theater_show_times as $theater_show_time)
            {
                $this->createTheaterShowTime($theater_show_time, $show_time);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $show_time;
    }

    public function update($request, ShowTime $showTime): ShowTime
    {
        try {

            $data = $request->validated();

            $this->theaterShowTimeRepository->deleteRelatedShowTime($showTime);

            $showTime['movie_id'] = $data['movie_id'];
            $showTime['start_date'] = $data['start_date'];
            $showTime['end_date'] = $data['end_date'];

            $show_time = $this->showTimeRepository->update($showTime);

            $theater_show_times = json_decode($data['theater_show_times'], true);

            foreach ($theater_show_times as $theater_show_time)
            {
                $this->createTheaterShowTime($theater_show_time, $show_time);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $show_time;
    }

    public function delete(ShowTime $showTime): string
    {
        try {

            foreach ($showTime->theaterShowTimes as $theaterShowTime)
            {
                $this->theaterShowTimeRepository->delete($theaterShowTime);
            }

            $this->showTimeRepository->delete($showTime);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }

    public function createTheaterShowTime($data, ShowTime $showTime): void
    {
        $theater_show_time = new TheaterShowTime($data);
        $theater_show_time['show_time_id'] = $showTime['id'];

        $this->theaterShowTimeRepository->save($theater_show_time);
    }
}
