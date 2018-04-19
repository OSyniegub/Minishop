<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 07.04.2018
 * Time: 19:17
 */

include_once 'application/models/cart_model.php';

$cart = cart();
$products = get_product();
function get_prod()
{
    return get_product();
}

$err = 0;

if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        del_prod_from_cart($_GET['id']);
    }
    else if ($_GET['action'] == "add") {
        $err = add_to_orders();
    }
}