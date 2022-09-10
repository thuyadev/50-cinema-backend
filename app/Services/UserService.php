<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use App\Utils\ImageManagementUtil;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected  $userRepository;
    protected $imageManagementUtil;

    public function __construct(UserRepositoryInterface $userRepository, ImageManagementUtil $imageManagementUtil)
    {
        $this->userRepository = $userRepository;
        $this->imageManagementUtil = $imageManagementUtil;
    }

    public function getUsers($search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $genres = $this->userRepository->getAll();
            } else {
                $genres = $this->userRepository->filteredUsers($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $genres;
    }

    public function create($request): User
    {
        try {

            $data = $request->validated();

            $data['password'] = Hash::make($data['password']);

            $to_user = new User($data);

            $user = $this->userRepository->save($to_user);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $user;
    }

    public function update($request, User $user): User
    {
        try {

            $data = $request->validated();

            if ($data['profile_image'])
            {
                $image = $this->imageManagementUtil->upload($data['profile_image']);

                $data['profile_image'] = asset($image);
            } else
            {
                $data['profile_image'] = $user['profile_image'];
            }

            $user['name'] = $data['name'];
            $user['email'] = $data['email'];
            $user['display_name'] = $data['display_name'];
            $user['phone'] = $data['phone'];
            $user['profile_image'] = $data['profile_image'];

            $user = $this->userRepository->update($user);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $user;
    }

    public function delete(User $user): string
    {
        try {

            $this->userRepository->delete($user);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }

    public function changeStatus(User $user): string
    {
        try {
            $user['is_ban'] = !$user['is_ban'];

            $this->userRepository->update($user);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }
}
