<?php
session_start();

$email = $_POST["email"];
$pass = $_POST["pass"];



$emailDb = "sebastian.eliasb@gmail.com";
$passDb = "12345";

$passDbHash = password_hash($passDb,PASSWORD_DEFAULT);

if(password_verify($pass,$passDbHash) && $email == $emailDb) {
    $_SESSION["email"] = $email;
    header("Location: ../welcome.php");
}
else {
    $_SESSION["loginError"] = "Wrong email or password";
    header("Location: ../errorpage.php");
}