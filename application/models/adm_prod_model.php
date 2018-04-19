<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 00:09
 */

function get_max_prod_id()
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($link, $query);
    $num = 0;
    while ($row = mysqli_fetch_array($result)) {
        if ($num < $row['id_product'])
            $num = $row['id_product'];
    }
    mysqli_close($link);
    return $num;
}

function get_prod_cat()
{
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($link, $query);
    $prods = array();
    while ($row = mysqli_fetch_array($result)) {
       $prods[] = $row;
    }
    mysqli_close($link);
    return $prods;
}

function add_prod($new_prod) {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $prods = get_prod_cat();
    $i = 0;

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    while (isset($prods[$i])) {
        if ($prods[$i]['name'] == $new_prod['name'] && $prods[$i]['category'] == $new_prod['category']) {
         mysqli_close($link);
         return 1;
        }
        $i++;
    }

    if (iconv_strlen($new_prod['name'] > 30) || iconv_strlen($new_prod['category']) > 20
        || iconv_strlen($new_prod['description']) > 103 || iconv_strlen($new_prod['image']) > 1000)
    {
        mysqli_close($link);
        return 1;
    }

    $query = "INSERT INTO `products` (name, category, description, price, img)
              VALUES ('".$new_prod['name']."','".$new_prod['category']."', '".$new_prod['description']."',
              '".$new_prod['price']."', '".$new_prod['image']."')";
    mysqli_query($link, $query);
    mysqli_close($link);
    header('Location: ?content=adm_prod');
    return 0;
}

function modify_prod($new_prod, $old_prod) {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";
    $i = 0;
    $err = 0;

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    while (isset($old_prod[$i])) {
        if ($old_prod[$i]['name'] == $new_prod['name'] && $old_prod[$i]['category'] == $new_prod['category']) {
            if ($err == 1) {
                mysqli_close($link);
                return 2;
            }
            $err++;
        }
        $i++;
    }
    if (iconv_strlen($new_prod['name'] > 30) || iconv_strlen($new_prod['category']) > 20
    || iconv_strlen($new_prod['description']) > 103 || iconv_strlen($new_prod['image']) > 1000)
    {
        mysqli_close($link);
        return 2;
    }
    $query = "UPDATE `products` SET name = '".$new_prod['name']."', category = '".$new_prod['category']."', 
              description = '".$new_prod['description']."', price = '".$new_prod['price']."', img = '".$new_prod['image'].
              "' WHERE id_product = '".$new_prod['submit_modify']."'";
    mysqli_query($link, $query);
    mysqli_close($link);
    header('Location: ?content=adm_prod');
    return 0;
}

function del_prod($del_prod) {
    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "DELETE FROM `products` WHERE id_product = '".$del_prod['submit_delete']."'";
    mysqli_query($link, $query);
    mysqli_close($link);
    header('Location: ?content=adm_prod');
}

function get_categories() {

    $server = "localhost";
    $user = "root";
    $pass = "123456789";
    $db = "minishop";

    $link = mysqli_connect($server, $user, $pass, $db) or die("Can't connect to the MySQL");
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($link, $query);
    $cat = array();
    $f = 0;
    while ($row = mysqli_fetch_array($result)) {
        $i = 0;
        while (isset($cat[$i])) {
            if ($cat[$i] == $row['category']) {
                $f = 1;
                break;
            }
            $i++;
        }
        if ($f != 1)
            $cat[$i] = $row['category'];
        else
            $f = 0;
    }
    mysqli_close($link);
    return $cat;
}
