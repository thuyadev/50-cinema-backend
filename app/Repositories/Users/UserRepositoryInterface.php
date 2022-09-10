<?php

namespace App\Repositories\Users;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * @param string $search
     * @return LengthAwarePaginator
     */
    public function filteredUsers(string $search): LengthAwarePaginator;

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

    /**
     * @param User $user
     * @return User
     */
    public function save(User $user): User;

    /**
     * @param User $user
     * @return User
     */
    public function update(User $user): User;

    /**
     * @param User $user
     * @return string
     */
    public function delete(User $user): string;
}
