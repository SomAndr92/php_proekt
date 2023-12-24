<?php

namespace Proekt\controllers;
use Proekt\models\UserModel;

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
        echo $json['login'];

            if(!empty($json['login']) and !empty($json['pass']) and !empty($json['pass'])) {
        $um = new UserModel;
        $res = $um->userAuth($json['login'], $json['pass'], $json['name']);
        if($res) {
            echo json_encode($res);
        }
    }
    } 

}