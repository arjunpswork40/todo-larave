<?php

namespace App\Service\utilities;

class ApiResponseService
{
    public function success($data, $message = 'Success', $status = 200,$auth_status = true)
    {
        return response()->json([
            'auth_status' => $auth_status,
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    public function error($message, $status = 400, $auth_status = true)
    {
        return response()->json([
            'status' => $status,
            'auth_status' => $auth_status,
            'message' => $message,
        ], $status);
    }
}
