<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\StatsService;



class StatsController extends Controller
{

   public function getUserStats($user_id){
      $show = StatsService::getStats($user_id);
      return response()->json($show ,$show['statusCode']);  
   }

   public function getAllStats(){
      $all = StatsService::getAllStats();
      return response()->json($all ,200);  
   }

   public function getUrlStats($id){
     $show = StatsService::getUrlStats($id);
     return response()->json($show ,$show['statusCode']);  
   }

   public function getUserUrlStats($id){
     $show = StatsService::getUserUrlStats($id);
     return response()->json($show ,$show['statusCode']);  
   }

}
