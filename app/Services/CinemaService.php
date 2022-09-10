<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Cinema;
use App\Repositories\CinemaRepositoryInterface;
use App\Utils\ImageManagementUtil;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CinemaService
{
    protected $cinemaRepository;
    protected $imageManagement;

    public function __construct(CinemaRepositoryInterface $cinemaRepository, ImageManagementUtil $imageManagement)
    {
        $this->cinemaRepository = $cinemaRepository;
        $this->imageManagement = $imageManagement;
    }

    public function all(): Collection
    {
        return $this->cinemaRepository->all();
    }

    public function getAll($search): LengthAwarePaginator
    {
        try {

            if (is_null($search)) {
                $cinemas = $this->cinemaRepository->getAll();
            } else {
                $cinemas = $this->cinemaRepository->filteredCinemas($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $cinemas;
    }

    public function create($request): Cinema
    {
        try {

            $data = $request->validated();
            $image = $this->imageManagement->upload($data['image']);
            $data['image'] = $image;

            $to_cinema = new Cinema($data);

            $cinema = $this->cinemaRepository->save($to_cinema);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $cinema;
    }
}
