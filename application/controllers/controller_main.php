<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 28.03.2018
 * Time: 21:45
 */

include_once 'application/models/main_model.php';

$products = main($_POST);

if (isset($_GET['category']))
    $_SESSION['category'] = $_GET['category'];