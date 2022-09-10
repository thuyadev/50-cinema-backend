<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginFormRequest;
use App\Http\Requests\Api\RegisterFormRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthApiService;
use App\Traits\ResponserTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponserTrait;

    /**
     * @param AuthApiService $authApiService
     */
    public function __construct(
        private AuthApiService $authApiService
    )
    {}

    /**
     * @param RegisterFormRequest $request
     * @return JsonResponse
     */
    public function register(RegisterFormRequest $request): JsonResponse
    {
        $auth_user = $this->authApiService->register($request);

        return $this->responseCreated([
            'user' => new UserResource($auth_user['user']),
            'token' => $auth_user['token']
        ]);
    }

    /**
     * @param LoginFormRequest $request
     * @return JsonResponse
     */
    public function login(LoginFormRequest $request): JsonResponse
    {
        $auth_user = $this->authApiService->login($request);

        return $this->responseSuccess('success', [
            'user' => new UserResource($auth_user['user']),
            'token' => $auth_user['token']
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getMe(Request $request): JsonResponse
    {
        $auth_user = $this->authApiService->getMe($request);

        return $this->responseSuccess('success', [
            'user' => new UserResource($auth_user),
        ]);
    }
}
