<?php

namespace App\Service;

class UserService
{
    static public function create($data){
        //Verifica se os dados recebidos estão no formato de json
        if($data->header('Content-Type') == "application/json"){
            //Verifica se o id do usuário veio preenchido
            if($data->input('id')){
                //Verifica se o usuário já existe na base de dados
                return [
                    'message' => 'Usuário cadastrado com sucesso',
                    'statusCode' => 201,
                    'data' => [],
                ];
            }
        }else{
            return [
                'message' => 'Formato da requisição é inválido!',
                'statusCode' => 422,
                'data' => [],
            ];
        }
    }
}
