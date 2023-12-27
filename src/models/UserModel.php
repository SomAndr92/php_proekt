<?php

namespace Andrey\Proekt\models;
use Andrey\Proekt\DBconnect;


class UserModel{
    public function userReg($login, $pass, $name) {
        $db = DBconnect::connect();

    try{
        $res = $db->query("INSERT INTO `users`(`name`, `login`, `pass`) VALUES ('$name','$login','$pass')");
        if($res) {
                return ["status"=>"ok",
            "payload"=>[
                "login"=>$login,
                "name"=>$name
            ]];
        }
    
    } catch (\mysqli_sql_exception $e) {

        return ["status"=>"error",
        "payload"=>[
            "discription"=>"Login exist"
        ]];
    }
}

    public function userAuth($login, $pass) {
        $db = DBconnect::connect();
        $res = $db->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass' ");
            
        $res = mysqli_fetch_assoc($res);
        if($res) {
            return ["status"=> "ok",
            "payload" =>[
                "login" =>$login,
                "name" => $res['name'],
                "id" => $res["id"],
            ]
            ];
        } else {
            return ['status'=> 'null',
            'payload'=>[
                "discription"=>"Login exist"
            ]];
        }
    }
}