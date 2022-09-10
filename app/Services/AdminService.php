<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Admin;
use App\Repositories\Admins\AdminRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class AdminService
{
    protected  $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAdmins(string $search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $genres = $this->adminRepository->getAll();
            } else {
                $genres = $this->adminRepository->filteredAdmins($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $genres;
    }

    public function create($request): Admin
    {
        try {

            $data = $request->validated();

            $to_admin = new Admin($data);

            $admin = $this->adminRepository->save($to_admin);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $admin;
    }

    public function update($request, Admin $admin): Admin
    {
        try {

            $data = $request->validate();

            $admin['name'] = $data['name'];
            $admin['email'] = $data['email'];
            $admin['password'] = !isNull($data['password']) ? Hash::make($data['password']) : $admin['password'];

            $admin = $this->adminRepository->update($admin);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $admin;
    }

    public function delete(Admin $admin): string
    {
        try {

            $this->adminRepository->delete($admin);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }
}
