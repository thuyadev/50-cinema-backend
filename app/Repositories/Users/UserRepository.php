<?php

namespace App\Repositories\Users;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{

    public function getAll(): LengthAwarePaginator
    {
        return User::latest()->paginate(10);
    }

    public function filteredUsers(string $search): LengthAwarePaginator
    {
        return User::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function save(User $user): User
    {
        $user->save();

        return $user;
    }

    public function update(User $user): User
    {
        $user->save();

        return $user;
    }

    public function delete(User $user): string
    {
        $user->delete();

        return 'success';
    }
}
