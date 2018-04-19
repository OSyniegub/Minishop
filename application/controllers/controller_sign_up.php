<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 29.03.2018
 * Time: 20:10
 */

if ( isset($_POST['submit'])) {
   include_once 'application/models/sign_up_model.php';
   $error = sign_up($_POST);
}
else
    $error = 0;
?>