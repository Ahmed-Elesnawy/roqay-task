<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function errorResponse($message="",$status=false,$code=404)
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'code'    => $code 
        ]);
    }


    public function successResponse($collection=null,$code=200,$message="",$status=true)
    {
        return response()->json([
            'status'  => $status,
            'code'    => $code,
            'message' => $message,
            'data'    => $collection
        ],$code);
    }
}
