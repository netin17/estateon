<?php

namespace App\Http\Controllers\Api;

use App\PropertyType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Auth;

class PropertytypeController extends Controller
{
    //
    public function index()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['code' => '103', 'error' => 'Invalid token', 'status' => false]);
            }
            $property_types = PropertyType::get();
            return response()->json(['code' => '101', 'data' => $property_types, 'status' => true]);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => false, 'error' => 'Token is Invalid', 'code' => '102']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => false, 'error' => 'Token is Expired', 'code' => '102']);
            } else {
                return response()->json(['status' => false, 'code' => '102']);
            }
        }
    }
}
