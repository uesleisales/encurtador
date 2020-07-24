<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\ResponseService;
use App\Service\UrlService;


class UrlController extends Controller
{   
    /**
    * Faz um redirect para a URL original encurtada
    */
    public function index($id){
        $url = UrlService::get($id);
        return $url;
    }

    /**
    * Retorna 201 em caso de sucesso no cadastro da URL
    */
    public function createUrl(Request $request, $id){
        $create = UrlService::create($request, $id);
        return ResponseService::response($create);      
   }

    /**
    * Retorna 204 em caso de sucesso na remoção da URL
    */
   public function delete($id){
        $delete = UrlService::delete($id);
        return ResponseService::response($delete);   
   }
   
}



