<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 01.04.2018
 * Time: 20:10
 */

if ( isset($_POST['submit'])) {
    include_once 'application/models/log_in_model.php';
    $error = log_in($_POST);
}
else
    $error = 0;