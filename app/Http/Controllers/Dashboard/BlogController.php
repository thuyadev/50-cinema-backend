<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BlogFormRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(BlogFormRequest $request): RedirectResponse
    {
        $this->blogService->create($request);

        return redirect('/blogs')->with('success', 'Blog created successfully!');
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
     * @param  Blog $blog
     * @return View
     */
    public function edit(Blog $blog): View
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(BlogFormRequest $request, Blog $blog): RedirectResponse
    {
        $this->blogService->update($request, $blog);

        return redirect('/blogs')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $this->blogService->delete($blog);

        return redirect('/blogs')->with('success', 'Blog deleted successfully!');
    }
}
