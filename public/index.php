<?php

require ("../vendor/autoload.php");

if($_SERVER['REQUEST_URI'] == '/home') {
    include('../app/controllers/home.php');
}

?>