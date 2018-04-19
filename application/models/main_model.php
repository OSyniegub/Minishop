<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 02.04.2018
 * Time: 16:37
 */

function main($main)
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");

//load all products
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($link, $query);
    $products = array();
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $products[$i] = $row;
        $i++;
    }
    if (isset($main['submit_buy'])) {
        $id_product = $main['id_product'];
        $id_user = "";
        $amount = $main['amount'];
        $total_cost = $main['amount'] * $main['price'];
        if ($_SESSION['log_in'] != 2)
            $id_user = $_SESSION['id_guest'];
        else {
            $query = "SELECT * FROM `users`";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                if (!strcmp($_SESSION['name'], $row['login'])) {
                    $id_user = $row['id_user'];
                    break;
                }
            }
        }
        $query = "INSERT INTO `cart` (id_product, id_user, amount, total_cost)
              VALUES ('$id_product', '$id_user', '$amount', '$total_cost')";
        if (mysqli_query($link, $query) == FALSE)
            echo "Error: " . $link->error;
    }
    mysqli_close($link);
    return $products;
}