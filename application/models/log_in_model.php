<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 01.04.2018
 * Time: 20:10
 */

include_once 'application/models/cart_model.php';

function log_in($log_in)
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $error = 0;

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $login = $log_in['login'];
    $password = $log_in['password'];
    if (!strcmp($password, "admin")) {
        $password = hash("whirlpool", 'admin');
        $password = substr($password, 0, 16);
    }

//check for a match(login)
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['login'] == $login) {
            $_SESSION['log_in'] = 1;
            break;
        }
    }

    if ($_SESSION['log_in'] == 1) {
        if ($row['password'] == $password) {
            $_SESSION['log_in'] = 2;
            $_SESSION['name'] = $login;
            if ($_SESSION['name'] == "admin" || $row['status'] == "3")
                $_SESSION['log_in'] = 3;
            modify_cart();
            header('Location: ?content=home');
        } else
            $error = 1;
    } else
        $error = 1;
    mysqli_close($link);
    return $error;
}