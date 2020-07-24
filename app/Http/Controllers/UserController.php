<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\UrlService;
use App\Service\ResponseService;



class UserController extends Controller
{
   public function index(){
       return redirect('/');
   }

   /**
    * Retorna 201 em caso de sucesso no cadastro do usuário e 409 em caso de conflito
    */
   public function createUser(Request $request){
        
        $create = UserService::create($request);
        return ResponseService::response($create);        
   }


    /**
    * Retorna 201 em caso de sucesso na remoção do usuário
    */
   public function delete($id){
    $delete = UserService::delete($id);
    return ResponseService::response($delete); 
   }


}
