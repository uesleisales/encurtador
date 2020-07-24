<?php

namespace App\Service;
use App\Models\User;
use App\Models\Url;

class UrlService
{   

     /**
    * Cadastra uma nova url ao sistema
    */
    static public function create($data, $id){
        $url = $data->input('url');
        //Verifica se existe um usuário associado ao id enviado 
        $id_user = User::where('nameId', $id)->first()['id'];
        
        if($id_user == null){
            return [
                'message' => 'Falha ao cadastrar a url!',
                'statusCode' => 422,
            ];
        }

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
            ];
        }
       
    }

     /**
    * Recupera uma determinada URL cadastrada
    */
    public static function get($id){
        $url = Url::where('id',$id)->orWhere('shortUrl',$id)->first();

        if($url != null){
            return redirect($url['url'], 301);
        }

        return response('URL não encontrada', 404);
    }


    /**
    * Remove uma determinada URL do sistema
    */
    public static function delete($id){

        if(Url::destroy($id)){
            return [
                'statusCode' => 204,
            ];
        }else{
            return [
                'message' => 'Falha ao remover a URL!',
                'statusCode' => 422,
            ];
        }
        
    }


    /*
    *Retorna a url encurtada com baixa probabilidade de repetição (um pouco mais de operações como consequência)
    */
    private static function shortUrl(){
        //Lista de caractes dispovíveis para encurtar

        $emb = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"); //Faz o embaralhamento dos caracteres
        $div = chunk_split($emb,8); //Divide a string sorteada em grupos de 8 caracteres
        $str = explode('-',preg_replace('/[\n|\r|\n\r|\r\n]{2,}/','-', $div));//Faz a limpeza das quebras de linhas e divide em um array
        $count_str = count($str) - 1; //Calcula o tamanho do array e remove o último registro em branco 
        $short =  $str[rand(0, $count_str-1)]; //Retorna o grupo de string sorteados 

        //Verifica se já possui uma url encurtada com esse código no banco de dados
        if(Url::where('shortUrl',$short)->count() != 0){
            return self::shortUrl();
        }

        return $short;
    }

}
