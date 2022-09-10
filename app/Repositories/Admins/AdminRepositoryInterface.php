<?php

namespace App\Repositories\Admins;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function filteredAdmins(string $search): LengthAwarePaginator;

    public function save(Admin $admin): Admin;

    public function update(Admin $admin): Admin;

    public function delete(Admin $admin): string;
}
