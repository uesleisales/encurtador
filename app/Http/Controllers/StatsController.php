<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\StatsService;
use App\Service\ResponseService;



class StatsController extends Controller
{

   /**
   * Retorna 200 em caso de sucesso na exibição do estados de todas as URLs cadastradas.
   */
   public function getAllStats(){
      $all = StatsService::getAllStats();
      return ResponseService::response($all);  
   }


   /**
   * Retorna 200 em caso de sucesso na exibição do estados de todas as URLs cadastradas.
   */
   public function getUrlStats($id){
     $show = StatsService::getUrlStats($id);
     return ResponseService::response($show); 
   }


   /**
   * Retorna 200 em caso de sucesso na exibição de estados da URL do cliente ou 404, caso não encontre-a.
   */
   public function getUserUrlStats($id){
     $show = StatsService::getUserUrlStats($id);
     return ResponseService::response($show); 
   }


}
