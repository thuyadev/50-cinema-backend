<?php

namespace App\Services;

use App\Http\Requests\Api\LoginFormRequest;
use App\Http\Requests\Api\RegisterFormRequest;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthApiService
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    /**
     * @param RegisterFormRequest $request
     * @return array
     */
    public function register(RegisterFormRequest $request): array
    {
        $data = $request->validated();

        $user = $request->toUser($data);

        $this->userRepository->save($user);

        return [
            'user' => $user,
            'token' => $user->createToken($user['email'])->plainTextToken
        ];
    }

    /**
     * @param LoginFormRequest $request
     * @return array
     */
    public function login(LoginFormRequest $request): array
    {
        $data = $request->validated();

        $user = $this->userRepository->findByEmail($data['email']);

        $this->checkUserData($user, $data);

        return [
            'user' => $user,
            'token' => $user->createToken($user['email'])->plainTextToken
        ];
    }

    public function getMe(Request $request): Authenticatable
    {
        return $request->user();
    }

    /**
     * @param User $user
     * @param array $data
     * @return void
     */
    private function checkUserData(User $user, array $data): void
    {
        if (!$user)
        {
            throw new NotFoundHttpException('User not found.');
        }

        if (!Hash::check($data['password'], $user['password']))
        {
            throw new NotFoundHttpException('Invalid password.');
        }
    }
}
