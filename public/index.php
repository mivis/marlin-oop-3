<?php

require ("../vendor/autoload.php");

//
// пока что не нашел способ как отображать темплейт без вызова его в главном роуте
// если поместить темплейт в Home __construct, то не отрабатывает без вызова класса
//
if($_SERVER['REQUEST_URI'] == '/home') {
    include('../app/controllers/home.php');
    $templates = new League\Plates\Engine('../app/views');    
     echo $templates->render('home', [
        'title' => 'Home.php controller',
        'status' => '']);
}

//
// обработчик форм /app/handlers/actions.php
//
if($_SERVER['REQUEST_URI'] == '/actions') {
    include('../app/handlers/actions.php');
}
?>