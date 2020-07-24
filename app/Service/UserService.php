<?php

namespace App\Service;
use App\Models\User;
class UserService
{   
    static public function create($data){
        $id = $data->input('id');

        //Verifica se o id do usuário veio preenchido
        if($id){

            //Verifica se o usuário já existe na base de dados
            if(User::where('nameId', $id)->count() != 0){
                return [
                    'message' => 'Usuário já cadastrado na base',
                    'statusCode' => 409,
                    'data' => [],
                ];
            }

            $user = User::Create(['nameId' => $id]);
            return [
                'message' => 'Usuário cadastrado com sucesso',
                'statusCode' => 201,
                'data' => [],
            ];

        }else{

            return [
                'message' => 'Dados inválidos!',
                'statusCode' => 422,
                'data' => [],
            ];

        }
       
    }

}
