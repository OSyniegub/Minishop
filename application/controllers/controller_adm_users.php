<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 11:03
 */

include_once 'application/models/adm_users_model.php';

$users = get_users();

$err = 0;

if (isset($_POST['submit'])) {
    if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['status']))
        $err = add_user($_POST, $users);
    else
        $err = 1;
}

if (isset($_POST['submit_modify'])) {
    if (!empty($_POST['status']))
        if ($_POST['old_status'] !== "2" && $_POST['status'] !== "2")
            modify_user($_POST);
}

if (isset($_POST['submit_delete'])) {
    if ($_POST['submit_delete'] !== "2" && $_POST['status'] !== "2")
        del_user($_POST);
}
