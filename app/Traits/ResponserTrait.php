<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponserTrait
{
    public function responseSuccess($message = 'successful', $data = []): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $message,
            'data' => $data,
            'errors' => []
        ], Response::HTTP_OK);
    }

    public function responseCreated($data = []): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_CREATED,
            'message' => 'successfully created',
            'data' => $data,
            'errors' => []
        ], Response::HTTP_CREATED);
    }

    private function responseError($message = 'fatal error', $code = 500, $errors = []): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => [],
            'errors' => $errors
        ], $code);
    }

    public function responseMsgOnly($msg = 'success'): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $msg
        ]);
    }
}
