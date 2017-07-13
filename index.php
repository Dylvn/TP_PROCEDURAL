<?php 

session_start();
include 'db/db.php';
include 'includes/header.php';

if (!empty($_GET)) {
    $path = 'pages/' . $_GET['page'] . '.php';

    if (file_exists($path)) {
        include $path;
    } else {
        include 'pages/home.php';        
    }
} else {
    include 'pages/home.php';
}

include 'includes/footer.php';
