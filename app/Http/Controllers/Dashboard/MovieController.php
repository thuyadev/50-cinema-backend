<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MovieFormRequest;
use App\Models\Crew;
use App\Models\Genre;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('movies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $crews = Crew::all();
        $genres = Genre::all();

        return view('movies.create', compact('crews', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MovieFormRequest  $request
     * @return RedirectResponse
     */
    public function store(MovieFormRequest $request): RedirectResponse
    {
        $this->movieService->createManual($request);

        return redirect('/movies')->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Movie $movie
     * @return View
     */
    public function show(Movie $movie): View
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Movie $movie
     * @return View
     */
    public function edit(Movie $movie): View
    {
        $crews = Crew::all();
        $genres = Genre::all();
        $movie_genre_ids = $movie->movie_genres()->pluck('genres.id')->toArray();
        $movie_crew_ids = $movie->movie_crews()->pluck('crews.id')->toArray();

        return view('movies.edit', compact('movie', 'crews', 'genres', 'movie_genre_ids', 'movie_crew_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Movie $movie
     * @return RedirectResponse
     */
    public function update(MovieFormRequest $request, Movie $movie): RedirectResponse
    {
        $this->movieService->update($request, $movie);

        return redirect('/movies')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Movie $movie
     * @return RedirectResponse
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $this->movieService->delete($movie);

        return redirect('/movies')->with('success', 'Movie deleted successfully!');
    }
}
