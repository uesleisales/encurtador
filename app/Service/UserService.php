<?php

namespace App\Service;
use App\Models\User;
use App\Models\Url;
class UserService
{   

    /**
    * Cadastra um novo usuário ao sistema
    */
    static public function create($data){
        $id = $data->input('id');
        $verify = self::verifyEspecials($id);
        //Verifica se o id do usuário veio preenchido
        if($id && $verify){

            //Verifica se o usuário já existe na base de dados
            if(User::where('nameId', $id)->count() != 0){
                return [
                    'message' => 'Usuário já cadastrado na base',
                    'statusCode' => 409,
                ];
            }

            $user = User::Create(['nameId' => $id]);

            return [
                'message' => 'Usuário cadastrado com sucesso',
                'statusCode' => 201,
               
            ];

        }else{

            return [
                'message' => 'Dados inválidos!',
                'statusCode' => 422,
            ];

        }
       
    }

    /**
    * Remove um usuário do sistema
    */
    static public function delete($id){

        $user = User::where('nameId', $id)->first();
        $user_id = $user['id'];

        if($user == null){
            return [
                'message' => 'Falha ao remover o usuário!',
                'statusCode' => 422,
            ];
        }

        if($user->delete()){
            Url::where('user_id', $user_id)->delete(); //Remove as urls associadas ao usuário
            return [
                'statusCode' => 204,
            ];
        }else{
            return [
                'message' => 'Falha ao remover o usuário!',
                'statusCode' => 422,
            ];
        }

    }


    /**
    * Verifica se a string possui caractes especiais
    */
    static private function verifyEspecials($string){
        if (preg_match('/[\'^£$%&*()}{@#~?ç><>,|=_+¬-]/', $string))
        {
            return false;
        }

        return true;
    }

}
