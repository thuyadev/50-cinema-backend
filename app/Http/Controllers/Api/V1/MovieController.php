<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MovieCollectionRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Services\MovieService;
use App\Traits\ResponserTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    use ResponserTrait;

    /**
     * @param MovieService $movieService
     */
    public function __construct(
        private MovieService $movieService
    )
    {}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $movies = $this->movieService->getMovieList($request);

        return $this->responseSuccessWithPaginate('success', MovieResource::collection($movies));
    }

    /**
     * @param MovieCollectionRequest $request
     * @return JsonResponse
     */
    public function getByCollection(MovieCollectionRequest $request): JsonResponse
    {
        $movies = $this->movieService->getByCollection($request);

        return $this->responseSuccess('success', MovieResource::collection($movies));
    }

    /**
     * @param Movie $movie
     * @return JsonResponse
     */
    public function show(Movie $movie): JsonResponse
    {
        return $this->responseSuccess('success', new MovieResource($movie));
    }
}
