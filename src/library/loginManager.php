<?php

$userData = json_decode(file_get_contents('../../resources/users.json'), true);

function login($data)
{
    array_walk(
        $data['users'],
        function ($user) {

            $email = $_POST["email"];
            $pass = $_POST["pass"];

            if ($user['email'] == $email && password_verify($pass, $user['password'])) {
                $_SESSION['user'] = $user['name'];
                header('Location: ../dashboard.php');
            }
        }
    );
}
