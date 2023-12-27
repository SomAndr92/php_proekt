<?php

namespace Andrey\Proekt\controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



use Andrey\Proekt\models\UserModel;

class UserController{

    public function reg($json){
        echo $json['login'];

            if(!empty($json['login']) and !empty($json['pass']) and !empty($json['pass'])) {
        $um = new UserModel;
        $res = $um->userReg($json['login'], $json['pass'], $json['name']);
        if($res) {
            echo json_encode($res);
        }
    }
}
    public function auth($json){
        if(!empty($json['login']) and !empty($json['pass']) ) {
        $um = new UserModel;
        $res = $um->userAuth($json['login'], $json['pass']);

        if($res) {
        $key = 'haha';
        $payload = [
            'iss' => 'http://proekt',
            'login' => $res['payload']['login'],
            'id' => $res['payload']['id'],
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        
            echo json_encode(["status" => "ok",
                "payload" =>[
                    "accessToken" => $jwt
                ]
                ]);
        }
    } 
    }
    } 

