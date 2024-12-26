<?php

namespace App\Service;

class Response 
{

    public static function responseSuccess($data, $status = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $status);
    }

}