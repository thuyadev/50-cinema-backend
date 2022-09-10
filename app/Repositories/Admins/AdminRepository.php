<?php

namespace App\Repositories\Admins;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminRepository implements AdminRepositoryInterface
{

    public function getAll(): LengthAwarePaginator
    {
        return Admin::latest()->paginate(10);
    }

    public function filteredAdmins(string $search): LengthAwarePaginator
    {
        return Admin::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Admin $admin): Admin
    {
        $admin->save();

        return $admin;
    }

    public function update(Admin $admin): Admin
    {
        $admin->save();

        return $admin;
    }

    public function delete(Admin $admin): string
    {
        $admin->delete();

        return 'success';
    }
}
