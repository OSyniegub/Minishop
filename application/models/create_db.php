<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 31.03.2018
 * Time: 14:21
 */

session_start();

if (!isset($_SESSION['log_in']))
    $_SESSION['log_in'] = 0;
if (!isset($_SESSION['name']))
    $_SESSION['name'] = "none";
if (!isset($_SESSION['category']))
    $_SESSION['category'] = "none";

$server = "localhost";
$user = "root";
$pass = "123456789";
$db = "minishop";

$link = mysqli_connect($server, $user, $pass) or die("Can't connect to the MySQL");
$query = "CREATE DATABASE IF NOT EXISTS ".$db;
mysqli_query($link, $query);
mysqli_close($link);
$link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
//add user table
$query = "CREATE TABLE IF NOT EXISTS `users` (
            `id_user` INT(255) NOT NULL  AUTO_INCREMENT,
            `login` VARCHAR(8) NOT NULL,
            `password` VARCHAR (16) NOT NULL,
            `status` INT(1) NOT NULL,
            PRIMARY KEY(`id_user`) )";
if (mysqli_query($link, $query) === FALSE) {
    echo "Error. Can't create table: ".$link->error;
};

//add admin to `users`
$query = "SELECT * FROM `users`";
$result = mysqli_query($link, $query);
$result = mysqli_fetch_array($result);
if (!$result) {
    $adminpass = hash("whirlpool", 'admin');
    $adminpass = substr($adminpass, 0, 16);
    $query = "INSERT INTO `users` (login, password, status)
            VALUES ('admin', '$adminpass', '2')";
    if (mysqli_query($link, $query) === FALSE) {
        echo "Error. Can't insert into the table: " . $link->error;
    };
}

//add products table
$query = "CREATE TABLE IF NOT EXISTS `products` (
            `id_product` INT(255) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL,
            `category` VARCHAR(20) NOT NULL,
            `description` VARCHAR(103) NOT NULL,
            `price` INT(6) NOT NULL,
            `img` VARCHAR(1000) NOT NULL,
            PRIMARY KEY(`id_product`) )";
if (mysqli_query($link, $query) === FALSE) {
    echo "Error. Can't create table: ".$link->error;
};

//add products
$query = "SELECT * FROM `products`";
$result = mysqli_query($link, $query);
$result = mysqli_fetch_array($result);
if (!$result) {
    $query = "INSERT INTO `products` (name, category, description, price, img)
		  VALUES ('Rose & Freesia', 'Happy Birthday', 'A variety of blush, lilac and cream roses, pink alstroemeria, and lightly scented pink freesias.', '32.00', 'img/hb1.jpg'),
	      ('Lovely Bouquet', 'Happy Birthday', 'A stunning bouquet of peach roses, cerise anemones, intricate ranunculus and vibrant tulips.', '37.00', 'img/hb2.jpg'),
	      ('Pretty Patchwork Bouquet', 'Thank You', 'Lilac roses, cerise germini, white antirrhinums and santini are hand-tied with delicate pink waxflower.', '25.00', 'img/ty1.jpg'),
	      ('Longiflorum Lilies Bouquet', 'Thank You', 'Bold and beautiful, these Longiflorum lilies arrive in bud to fill your home.', '30.00', 'img/ty2.jpg'),
	      ('Scented Rose Gift', 'New Baby', 'A posy of beautifully scented white roses are displayed in a gift box with a cute bear.', '48.00', 'img/nb1.jpg')
	          	";
    if (mysqli_query($link, $query) === FALSE) {
        echo "Error. Can't insert into the table: " . $link->error;
    };
}

//add cart table
$query = "CREATE TABLE IF NOT EXISTS `cart` (
            `id_cart` INT(255) NOT NULL AUTO_INCREMENT,
            `id_product` INT(255) NOT NULL,
            `id_user` INT(255) NOT NULL,
            `amount` INT (255) NOT NULL,
            `total_cost` INT (255) NOT NULL,
            PRIMARY KEY(`id_cart`) )";
if (mysqli_query($link, $query) === FALSE) {
    echo "Error. Can't create table: ".$link->error;
};

//add orders table
$query = "CREATE TABLE IF NOT EXISTS `orders` LIKE cart";
if (mysqli_query($link, $query) === FALSE) {
    echo "Error. Can't create table: ".$link->error;
};

//guest id
if (!isset($_SESSION['id_guest']))
    $_SESSION['id_guest'] = -1;
mysqli_close($link);