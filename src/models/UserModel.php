<?php

namespace Proekt\models;
use Proekt\DBconnect;


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
        $query = $db->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass' ");
            if($query->num_rows > 0){
                $row = $query->fetch_assoc();
                echo 'Добро пожаловать';
            } else{
                echo 'неверные данные';
            }
    }
}