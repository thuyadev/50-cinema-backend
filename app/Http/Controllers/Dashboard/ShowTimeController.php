<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ShowTimeFormRequest;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Services\ShowTimeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowTimeController extends Controller
{
    protected $showTimeService;

    public function __construct(ShowTimeService $showTimeService)
    {
        $this->showTimeService = $showTimeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('showtimes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $movies = Movie::all();

        return view('showtimes.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ShowTimeFormRequest  $request
     * @return RedirectResponse
     */
    public function store(ShowTimeFormRequest $request): RedirectResponse
    {
        $this->showTimeService->create($request);

        return redirect('/showtimes')->with('success', 'Show Time created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ShowTime $showTime
     * @return View
     */
    public function edit(ShowTime $showtime): View
    {
        $movies = Movie::all();

        $show_times = [];

        foreach ($showtime->theaterShowTimes as $theaterShowTime)
        {
            $show_time = [];

            $show_time['cinema_id'] = $theaterShowTime['cinema_id'];
            $show_time['cinema_name'] = $theaterShowTime['cinema']['name'];
            $show_time['theater_id'] = $theaterShowTime['theater_id'];
            $show_time['theater_name'] = $theaterShowTime['theater']['name'];
            $show_time['time'] = $theaterShowTime['time'];

            array_push($show_times, $show_time);
        }

        return view('showtimes.edit', compact('showtime', 'show_times', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ShowTimeFormRequest  $request
     * @param  ShowTime $showTime
     * @return RedirectResponse
     */
    public function update(ShowTimeFormRequest $request, ShowTime $showtime): RedirectResponse
    {
        $this->showTimeService->update($request, $showtime);

        return redirect('/showtimes')->with('success', 'Show Time updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ShowTime $showTime
     * @return RedirectResponse
     */
    public function destroy(ShowTime $showTime): RedirectResponse
    {
        $this->showTimeService->delete($showTime);

        return redirect('/showtimes')->with('success', 'Show Time deleted successfully!');
    }
}
