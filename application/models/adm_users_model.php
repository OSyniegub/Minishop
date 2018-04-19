<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 11:04
 */

function get_users()
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($link, $query);
    $users = array();
    while ($row = mysqli_fetch_array($result)) {
        $users[] = $row;
    }
    mysqli_close($link);
    return $users;
}

function add_user($new_user, $old_users) {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $i = 0;

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    while (isset($old_users[$i])) {
        if ($old_users[$i]['login'] == $new_user['login']) {
            mysqli_close($link);
            return 1;
        }
        $i++;
    }

    if (iconv_strlen($new_user['login']) > 8)
    {
        mysqli_close($link);
        return 1;
    }

    $password = $new_user['password'];
    if (iconv_strlen($password) > 16) {
        mysqli_close($link);
        return 1;
    }

    if  ($new_user['status'] == 2) {
        mysqli_close($link);
        return 1;
    }

    $query = "INSERT INTO `users` (login, password, status)
              VALUES ('".$new_user['login']."','".$password."','".$new_user['status']."')";
    mysqli_query($link, $query);
    mysqli_close($link);
    header('Location: ?content=adm_users');
    return 0;
}

function modify_user($new_user) {
        $server = "localhost";
        $user = "root";
        $pass = "123456789";
        $db = "minishop";

        $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
        $query = "UPDATE `users` SET status = '" . $new_user['status'] . "' WHERE id_user = '" . $new_user['submit_modify'] . "'";
        mysqli_query($link, $query);
        mysqli_close($link);
        header('Location: ?content=adm_users');
}

function del_user($del_user) {
        $server = "localhost";
        $user = "root";
        $pass = "123456789";
        $db = "minishop";

        $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
        $query = "DELETE FROM `users` WHERE id_user = '" . $del_user['submit_delete'] . "'";
        mysqli_query($link, $query);
        mysqli_close($link);
        header('Location: ?content=adm_users');
}
