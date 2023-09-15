<?php

namespace App\Http\Utils;

class ApiUtils
{

    public static function generateResponse($data, $message, $status, $error){

        return response()->json([

            "data" => $data,
            "message" => $message,
            "status" => $status,
            "error" => $error
        ]);
    }
}
