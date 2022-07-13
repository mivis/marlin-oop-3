<?php

use App\Controllers\Home;

if ($_POST) {
    $posts = new Home();
    switch($_POST['button']) {

        case 'getall':
            $posts->getAll(
                'posts',
                'home',
                'getAll() function from Home.php controller',
                'getAll() success');
            break;

        case 'getone':
            $posts->getOne(
                'posts',
                $_POST['id'],
                'home',
                'getOne() function from Home.php controller',
                'GetOne() '.$_POST['id'].' success');
            break;

        case 'insert':
            $posts->insert(
                'posts',
                ['title' => $_POST['title'],'description' => $_POST['description']],
                'home',
                'insert() function from Home.php controller',
                'insert() success');
            break;

        case 'update':
            $posts->update(
                'posts',
                $_POST['id'],
                ['title' => $_POST['title'], 'description' => $_POST['description']],
                'home',
                'update() function from Home.php controller',
                'update() '.$_POST['id'].' success');
            break;

        case 'delete':
            $posts->delete(
                'posts',
                $_POST['id'],
                'home',
                'delete() function from Home.php controller',
                'delete() '.$_POST['id'].' success');
            break;
    }
}

?>