<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GenreFormRequest;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('genres.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(GenreFormRequest $request): RedirectResponse
    {
        $this->genreService->create($request);

        return redirect('/genres')->with('success', 'Cinema created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(Genre $genre): View
    {
        return view('genres.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(Genre $genre): View
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(GenreFormRequest $request, Genre $genre): RedirectResponse
    {
        $this->genreService->update($request, $genre);

        return redirect('/genres')->with('success', 'Cinema created updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Genre  $genre
     * @return RedirectResponse
     */
    public function destroy(Genre $genre): RedirectResponse
    {
        $this->genreService->delete($genre);

        return redirect('/genres')->with('success', 'Cinema created deleted!');
    }
}
