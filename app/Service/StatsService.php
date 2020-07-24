<?php

namespace App\Service;
use App\Models\User;
use App\Models\Url;

class StatsService
{   
    static public function create($data, $id){
       
        //Verifica se a url do usuário veio preenchido
        if($data->input('url')){

            $newUrl = [
                'hits' => 0,
                'shortUrl' => self::shortUrl(),
                'url' => $url,
                'user_id' => $id_user
            ];

            $insert_url = Url::create($newUrl);

            return [
                'hits' => $insert_url->hits,
                'id' => $insert_url->id,
                'shortUrl' => url('/').'/'.$newUrl['shortUrl'], 
                'url' => $url,
                'statusCode' => 201,
            ];

        }else{
            return [
                'message' => 'Falha ao cadastrar a url!',
                'statusCode' => 422,
                'data' => [],
            ];
        }
       
    }

    public static function getUrlStats($id){
        $url = Url::find($id);

        if($url != null){
            return [
                'id' => $url->id,
                'hits' =>  $url->hits,
                'url' =>  $url->url,
                'shortUrl' =>  url('/').'/'.$url->shortUrl,
                'statusCode' => 200,
            ];
        }else{
            return [
                'message' =>  "URL não encontrada!",
                'statusCode' => 404,
            ];
        }
    }


    static public function getUserUrlStats($user_id){
        
        $user = User::where('nameId', $user_id)->first();

        if($user != null){
            
            $data = [
                'hits' => Url::where('user_id', $user['id'])->sum('hits'),
                'urlCount' => Url::where('user_id', $user['id'])->count(),
                'topUrls' =>  Url::where('user_id', $user['id'])->orderBy('hits', 'desc')->take(10)->get(),
                'statusCode' => 200,
            ];

        }else{
            $data = [
                'message' => 'Usuário não encontrado!',
                'statusCode' => 404,
            ];
        }

        return $data;
    }


    static public function getAllStats(){
       
        $data = [
            'hits' => Url::sum('hits'),
            'urlCount' => Url::count(),
            'topUrls' =>  Url::orderBy('hits', 'desc')->take(10)->get(),
        ];

        return $data;
    }
}