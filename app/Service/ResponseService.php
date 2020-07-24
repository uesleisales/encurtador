<?php

namespace App\Service;
use Illuminate\Support\Arr;
class ResponseService
{   
    public static function response($data){
        return response()->json( isset($data['statusCode']) ? Arr::except($data,['statusCode']) : $data , isset($data['statusCode']) ? $data['statusCode'] : 200); 
    }
}
