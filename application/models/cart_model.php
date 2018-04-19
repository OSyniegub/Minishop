<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 07.04.2018
 * Time: 19:08
 */

include_once 'application/models/adm_users_model.php';
include_once 'application/models/adm_orders_model.php';

function cart()
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $users = get_users();
    $i = 0;

    if ($_SESSION['log_in'] >= 2) {
        while (isset($users[$i])) {
            if ($users[$i]['login'] == $_SESSION['name']) {
                break;
            }
            $i++;
        }
        $query = "SELECT * FROM `cart` WHERE id_user = '".$users[$i]['id_user']."'";
    }
    else
        $query = "SELECT * FROM `cart` WHERE id_user < 0";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function get_product() {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");

    $query = "SELECT * FROM `products`";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function del_prod_from_cart($id) {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "DELETE FROM `cart` WHERE `id_cart`='".$id."'";
    mysqli_query($link, $query);
    mysqli_close($link);
    header('Location: ?content=cart');
}

function modify_cart () {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $users = get_users();
    $i = 0;

    while (isset($users[$i])) {
        if ($users[$i]['login'] == $_SESSION['name'])
            break;
        $i++;
    }

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "UPDATE `cart` SET id_user = '".$users[$i]['id_user']."' WHERE id_user < 0";
    mysqli_query($link, $query);
    mysqli_close($link);
}

function add_to_orders() {
    return add();
}
