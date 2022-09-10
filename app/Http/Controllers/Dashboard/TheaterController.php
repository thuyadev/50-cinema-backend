<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TheaterFormRequest;
use App\Models\Theater;
use App\Services\CinemaService;
use App\Services\TheaterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TheaterController extends Controller
{
    protected $theaterService;
    protected $cinemaService;

    public function __construct(TheaterService $theaterService, CinemaService $cinemaService)
    {
        $this->theaterService = $theaterService;
        $this->cinemaService = $cinemaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('theaters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $cinemas = $this->cinemaService->getAll(null);

        return view('theaters.create', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(TheaterFormRequest $request): RedirectResponse
    {
        $this->theaterService->create($request);

        return redirect('/theaters')->with('success', 'Theater created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Theater $theater
     * @return View
     */
    public function show(Theater $theater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Theater $theater): View
    {
        $cinemas = $this->cinemaService->getAll(null);

        $seats = json_decode($theater['seat']);

        $row_count = count($seats);

        $chair_per_row_count = count($seats[0]->data);

        $chairs = json_decode(json_encode($theater['seat']), true);

        return view('theaters.edit', compact('theater', 'cinemas', 'row_count', 'chair_per_row_count', 'chairs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Theater $theater
     * @return RedirectResponse
     */
    public function update(TheaterFormRequest $request, Theater $theater): RedirectResponse
    {
        $this->theaterService->update($request, $theater);

        return redirect('/theaters')->with('success', 'Theater updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Theater $theater
     * @return RedirectResponse
     */
    public function destroy(Theater $theater): RedirectResponse
    {
        $this->theaterService->delete($theater);

        return redirect('/theaters')->with('success', 'Theater deleted successfully!');
    }
}
