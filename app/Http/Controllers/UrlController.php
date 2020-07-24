<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\UrlService;


class UrlController extends Controller
{   


    public function index($url){
        return "a";
    }
   /**
     * Cadastra uma nova url a ser encurtada.
     */
    public function createUrl(Request $request, $id){
        $create = UrlService::create($request, $id);
        return response()->json($create ,$create['statusCode']);     
   }

   public function delete($id){
    $delete = UrlService::delete($id);
    return response()->json($delete ,$delete['statusCode']);  
   }
   
}



