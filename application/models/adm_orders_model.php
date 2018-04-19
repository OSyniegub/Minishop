<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 17:37
 */

function add() {
    if ($_SESSION['log_in'] < 2)
        return 1;
    else {
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

        $query = "INSERT INTO `orders` SELECT * FROM cart WHERE id_user = '".$users[$i]['id_user']."'";
        mysqli_query($link, $query);

        $query = "DELETE FROM `cart` WHERE id_user = '".$users[$i]['id_user']."'";
        mysqli_query($link, $query);
        mysqli_close($link);
        header('Location: ?content=cart');
    }
    return 0;
}

function get_orders() {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $orders = array();

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "SELECT * FROM `orders`";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        $orders[] = $row;
    }
    return $orders;
}
