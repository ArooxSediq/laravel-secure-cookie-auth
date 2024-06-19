<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * 
     */
    public function respond($data, $message,$code = 200) : JsonResponse
    {
        $response = [
            'status' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response, $code);
    }
}
