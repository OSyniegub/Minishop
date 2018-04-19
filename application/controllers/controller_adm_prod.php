<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 00:20
 */

include_once 'application/models/adm_prod_model.php';

$max_id = get_max_prod_id();
$products = get_prod_cat();

$err = 0;

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['price'])
        && !empty($_POST['image']))
        $err = add_prod($_POST);
    else
        $err = 1;
}

if (isset($_POST['submit_modify'])) {
    if (!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['price'])
        && !empty($_POST['image'])) {
        $err = modify_prod($_POST, $products);
    }
    else
        $err = 2;
}

if (isset($_POST['submit_delete'])) {
    del_prod($_POST);
}
