<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Blog;
use App\Repositories\Blogs\BlogRepositoryInterface;
use App\Utils\ImageManagementUtil;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogService
{
    protected $blogRepository;
    protected $imageManagement;

    public function __construct(BlogRepositoryInterface $blogRepository, ImageManagementUtil $imageManagement)
    {
        $this->blogRepository = $blogRepository;
        $this->imageManagement = $imageManagement;
    }

    public function getBlogs($search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $blogs = $this->blogRepository->getAll();
            } else {
                $blogs = $this->blogRepository->filteredBlogs($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $blogs;
    }

    public function create($request): Blog
    {
        try {

            $data = $request->validated();

            $image = $this->imageManagement->upload($data['image']);
            $data['image'] = $image;

            $to_blog = new Blog($data);

            $blog = $this->blogRepository->save($to_blog);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $blog;
    }

    public function update($request, Blog $blog): Blog
    {
        try {

            $data = $request->validated();

            if (isset($data['image']))
            {
                $this->imageManagement->delete($blog['image']);
                $image = $this->imageManagement->upload($data['image']);
                $data['image'] = $image;
            } else {
                $data['image'] = $blog['image'];
            }

            $blog['title'] = $data['title'];
            $blog['status'] = $data['status'];
            $blog['description'] = $data['description'];
            $blog['image'] = $data['image'];

            $blog = $this->blogRepository->update($blog);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $blog;
    }

    public function delete(Blog $blog): string
    {
        try {

            $this->blogRepository->delete($blog);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }
}
