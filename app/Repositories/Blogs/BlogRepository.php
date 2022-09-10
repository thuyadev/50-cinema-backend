<?php

namespace App\Repositories\Blogs;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Blog::latest()->paginate(10);
    }

    public function filteredBlogs($search): LengthAwarePaginator
    {
        return Blog::where('title', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Blog $blog): Blog
    {
        $blog->save();

        return $blog;
    }

    public function update(Blog $blog): Blog
    {
        $blog->save();

        return $blog;
    }

    public function delete(Blog $blog): string
    {
        $blog->delete();

        return 'success';
    }
}
