<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\UserService;
use Illuminate\Support\Facades\Input;

class ShortController extends Controller
{
   public function index(){
       return redirect('/');
   }

   public function createUser(Request $request){
        $create = UserService::create($request);
        return response()->json(['message' => $create['message'], 'data' => $create['data']],$create['statusCode']);        
   }

}
