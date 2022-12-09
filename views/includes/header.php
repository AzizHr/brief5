<?php

session_start();
    if(isset($_SESSION['logged'])) {
         $flag = 'Logout';
    }else {
        $flag = 'Login';
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="views/css/header.css">
</head>
<body>
    <nav class="nav">
        <a href="" class="logo">
            <img src="views/images/logo.png" alt="">
            Jewelry
        </a>
        <div class="hidden" id="menuContainer">
            <ul class="nav-menu">
                <li class="menu-item"><a href="">Home</a></li>
                <li class="menu-item"><a href="">Products</a></li>
                <li class="menu-item"><a href="">Contact</a></li>
                <li class="menu-item"><form method="post"><button name="logout" type="submit"><?php echo $flag; ?></button></form></li>
            </ul>
        </div>
        <a class="fa-solid fa-bars menu-icon"></a>
    </nav>
    <script src="views/js/header.js"></script>