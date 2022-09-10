<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndexTable extends Component
{
    use WithPagination;

    protected $blogService;
    protected $queryString = ['search'];
    protected $listeners = ['blogDelete'];

    public $search = '';

    public function boot(BlogService $blogService): void
    {
        $this->blogService = $blogService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function blogDelete(Blog $blog): void
    {
        $this->blogService->delete($blog);
    }

    public function render(): View
    {
        $blogs = $this->blogService->getBlogs($this->search);

        return view('livewire.blogs.blog-index-table', compact('blogs'));
    }
}
