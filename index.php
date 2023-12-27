<?php

require_once __DIR__ . '/vendor/autoload.php';

use Steampixel\Route;

use Andrey\Proekt\controllers\UserController;


/**
*
*GET Metods
*
*/

Route::add("/", function(){
    echo 'hello world';
});

Route::add("/reg", function(){
    include 'src/views/userReg.php';
});

Route::add("/auth", function(){
    include 'src/views/userAuth.php';
});

Route::add("/api/reg",function() {
    $json = json_decode(file_get_contents("php://input"),true);
    $uc = new UserController;
    $uc->reg($json);
}, 'POST');


Route::add("/api/auth",function() {
    $json = json_decode(file_get_contents("php://input"),true);
    $uc = new UserController;
    $uc->auth($json);
}, 'POST');

Route::add("/ul", function() {
    $json = json_decode(file_get_contents("php://input"), true);
    if(!empty($json)) {
        include 'src/views/userList.php';
    }
}, 'POST');
Route::run('/');


/**
*
*POST Metods
*
*/


