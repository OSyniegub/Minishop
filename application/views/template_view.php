<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 28.03.2018
 * Time: 21:47
 */

switch($_GET['content'])
{
    case "home" :
        require_once("application/views/main_view.php");
        break;
    case "signup" :
        require_once("application/views/sign_up_view.php");
        break;
    case "login" :
        require_once("application/views/log_in_view.php");
        break;
    case "logout" :
        $_SESSION['log_in'] = 0;
        $_SESSION['name'] = "none";
        require_once("application/views/main_view.php");
        break;
    case "cart" :
        require_once("application/views/cart_view.php");
        break;
    case "adm_prod":
        if ($_SESSION['log_in'] >= 2)
            require_once("application/views/adm_prod_view.php");
        break;
    case "adm_users":
        if ($_SESSION['log_in'] >= 2)
            require_once("application/views/adm_users_view.php");
        break;
    case "adm_orders":
        if ($_SESSION['log_in'] >= 2)
            require_once("application/views/adm_orders_view.php");
        break;
    default :
        require_once("application/views/main_view.php");
        break;
}

include_once 'application/models/adm_prod_model.php';
$categories = get_categories();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.svg">

    <title>Template</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="?content=home">Home</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <?php $i = 0; while (isset($categories[$i])) {
                        echo '<a class="dropdown-item" href="?content=home&category='.$categories[$i].'">'.$categories[$i].'</a>';
                        $i++;
                    } ?>
                </div>
            </li>
            <li class="nav-item active">
                <?php if ($_SESSION['log_in'] != 2 && $_SESSION['log_in'] != 3) echo '<a class="nav-link" href="?content=signup">Sign up</a>';
                else echo '<a class="nav-link" href="?content=logout">Log out</a>';?>
            </li>
            <li class="nav-item active">
                <a class="nav-link" <?php if ($_SESSION['log_in'] != 2 && $_SESSION['log_in'] != 3)
                    echo 'href="?content=login"';?>><?php if ($_SESSION['log_in'] != 2 && $_SESSION['log_in'] != 3)
                   echo "Log in"?></a>
            </li>
            <li class="nav-item active">
                <?php if ($_SESSION['log_in'] != 3) echo '<a class="nav-link" href="?content=cart">Cart</a>';?>
            </li>
            <?php if ($_SESSION['log_in'] == 3) {
                echo '<li class="nav-item active">';
                echo '<a class="nav-link" href="?content=adm_prod">Products</a>';
                echo '</li>';
                echo '<li class="nav-item active">';
                echo '<a class="nav-link" href="?content=adm_users">Users</a>';
                echo '</li>';
                echo '<li class="nav-item active">';
                echo '<a class="nav-link" href="?content=adm_orders">Orders</a>';
                echo '</li>';
            }?>
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<footer>
    <nav class=" fixed-bottom bg-dark">
        <p class="navbar-nav mr-auto" align="center"><font color="#f0ffff" >© osyniegu 2018</font></p>
    </nav>
</footer>
</html>