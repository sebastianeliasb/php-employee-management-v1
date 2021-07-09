<?php
session_start();
$userLoginTime =  $_SESSION['user_login_time'];
$LogoutTime = 60*10;

if (isset($userLoginTime)) {
    $difference = time() - $userLoginTime;
    if($difference>$LogoutTime) 
    {
        echo 'Logout';
    }
   
}

include './loginManager.php';

if (isset($_POST["email"]) && isset($_POST["pass"])) {
    login($userData);
}


