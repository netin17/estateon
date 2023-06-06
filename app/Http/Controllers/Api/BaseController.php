<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $errors = [];
    public $message = "";
    public $status = true;
    public $errorCode = "";
    public $data = [];

    protected function sendResult()
    {
        $result = [
            "message" => $this->message,
            "status" => $this->status,
            "errors" => $this->errors,
			"errorCode" => $this->errorCode,
            "data" => $this->data,
        ];
        return response()->json($result);
    }
}
