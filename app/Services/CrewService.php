<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Crew;
use App\Repositories\Crews\CrewRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CrewService
{
    protected  $crewRepository;

    public function __construct(CrewRepositoryInterface $crewRepository)
    {
        $this->crewRepository = $crewRepository;
    }

    public function getCrews(string $search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $crews = $this->crewRepository->getAll();
            } else {
                $crews = $this->crewRepository->filteredCrews($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $crews;
    }

    public function create($request): Crew
    {
        try {

            $data = $request->validated();

            $to_crew = new Crew($data);

            $crew = $this->crewRepository->save($to_crew);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $crew;
    }

    public function update($request, Crew $crew): Crew
    {
        try {

            $data = $request->validated();

            $crew['name'] = $data['name'];
            $crew['status'] = $data['status'];

            $crew = $this->crewRepository->update($crew);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $crew;
    }

    public function delete(Crew $crew): string
    {
        try {

            $this->crewRepository->delete($crew);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }
}
