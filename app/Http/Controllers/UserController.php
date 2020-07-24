<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\UrlService;


class UserController extends Controller
{
   public function index(){
       return redirect('/');
   }

   /**
     * Cadastra um novo usuário no sistema.
     */
   public function createUser(Request $request){
        
        $create = UserService::create($request);
        return response()->json(['message' => $create['message'], 'data' => $create['data']],$create['statusCode']);        
   }


   public function getStats($id){
      $show = UserService::getStats($id);
      return response()->json($show ,$show['statusCode']);  
   }

   public function delete($id){
    $delete = UserService::delete($id);
    return response()->json($delete ,$delete['statusCode']);  
   }


}
