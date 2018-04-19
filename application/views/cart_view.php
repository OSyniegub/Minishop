<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 02.04.2018
 * Time: 14:14
 */
include_once 'application/controllers/controller_cart.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.svg">

    <title>Cart</title>

    <link href="css/style.css" rel="stylesheet">
</head>

<body class="text-center">
<main role="main" class="container">
    <div class="jumbotron" style="margin-top: 150px" align="center">
        <table>
            <tr><th>Id</th><th>Name</th><th>Amount</th><th>Total cost</th><th>Action</th></tr>
            <?php while ($cart_row = mysqli_fetch_array($cart)) {
                $i = 0;
                while ($product_row = mysqli_fetch_array($products)) {
                    if ($product_row['id_product'] == $cart_row['id_product']) {
                        $products = get_prod();
                        break;
                    }
                    $i++;
                }
                echo '<tr><td>'?><?php echo $cart_row["id_cart"]?><?php echo '</td><td>'?><?php echo $product_row['name']?>
                <?php echo '</td><td>'?><?php echo $cart_row["amount"]?><?php echo '</td><td>'?>
                <?php echo $cart_row["total_cost"]?><?php echo '</td><td>';?><?php echo '<a href="?content=cart&action=delete&id='.$cart_row["id_cart"].'">Delete</a></td>'; }?>
        </table>
        <br />
        <?php echo '<a class="btn btn-primary" style="background-color: grey" href="?content=cart&action=add">Confirm</a></td';?>
        <br />
        <?php if ($err == 1) {?>
            <h1 class="h3 mb-3 font-weight-normal"><?php echo "Please, log in";?></h1>
        <?php }?>
    </div>
</main>
</body>
</html>
