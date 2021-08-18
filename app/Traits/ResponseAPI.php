<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseAPI
{
    /**
     * Core of response
     *
     * @param string $message
     * @param int $statusCode
     * @param null $data
     * @param boolean $isSuccess
     * @return JsonResponse
     */
    public function response($data, string $message, int $statusCode, bool $isSuccess = true) : JsonResponse
    {
        if($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
                'results' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $statusCode,
                'errors' => $data
            ], $statusCode);
        }
    }

    /**
     * Send any success response
     *
     * @param string $message
     * @param array|object $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function success($data, string $message = '', int $statusCode = 200) : JsonResponse
    {
        return $this->response($data, $message, $statusCode);
    }

    /**
     * Send any error response
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(string $message, $data = null, int $statusCode = 500) : JsonResponse
    {
        return $this->response($data, $message, $statusCode, false);
    }
}
