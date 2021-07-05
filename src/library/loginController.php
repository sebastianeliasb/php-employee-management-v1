<?php
session_start();

include './loginManager.php';

if (isset($_POST["email"]) && isset($_POST["pass"])) {
    login($userData);
}
/* else {
    $_SESSION["loginError"] = "Wrong email or password";
    header("Location: ../errorpage.php");
} */
