<?php

namespace App\Repositories\Blogs;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function filteredBlogs($search): LengthAwarePaginator;

    public function save(Blog $blog): Blog;

    public function update(Blog $blog): Blog;

    public function delete(Blog $blog): string;
}
