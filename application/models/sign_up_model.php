<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 31.03.2018
 * Time: 22:59
 */

include_once 'application/models/cart_model.php';

function sign_up($sign_up)
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $error = 0;

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $login = $sign_up['login'];
    $password = $sign_up['password'];
    if (iconv_strlen($password) > 16) {
        mysqli_close($link);
        return 2;
    }

//check for a match
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['login'] == $login) {
            mysqli_close($link);
            return 1;
        }
    }

//add user
    if ($error != 1) {
        $query = "INSERT INTO `users` (login, password, status)
          VALUES ('$login', '$password', '1')";
        if (mysqli_query($link, $query) === FALSE) {
            echo "Error: " . $link->error;
        } else {
            $_SESSION['log_in'] = 2;
            $_SESSION['name'] = $login;
            modify_cart();
            header('Location: ?content=home');
        }
    }
    mysqli_close($link);
    return $error;
}