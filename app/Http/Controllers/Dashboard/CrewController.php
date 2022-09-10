<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CrewFormRequest;
use App\Models\Crew;
use App\Services\CrewService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CrewController extends Controller
{

    protected $crewService;

    public function __construct(CrewService $crewService)
    {
        $this->crewService = $crewService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('crews.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('crews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CrewFormRequest  $request
     * @return RedirectResponse
     */
    public function store(CrewFormRequest $request): RedirectResponse
    {
        $this->crewService->create($request);

        return redirect('/crews')->with('success', 'Crew created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Crew $crew
     * @return View
     */
    public function show(Crew $crew): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Crew $crew
     * @return View
     */
    public function edit(Crew $crew): View
    {
        return view('crews.edit', compact('crew'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CrewFormRequest  $request
     * @param  Crew $crew
     * @return RedirectResponse
     */
    public function update(CrewFormRequest $request, Crew $crew): RedirectResponse
    {
        $this->crewService->update($request, $crew);

        return redirect('/crews')->with('success', 'Crew updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Crew $crew
     * @return RedirectResponse
     */
    public function destroy(Crew $crew): RedirectResponse
    {
        $this->crewService->delete($crew);

        return redirect('/crews')->with('success', 'Crew deleted successfully!');
    }
}
