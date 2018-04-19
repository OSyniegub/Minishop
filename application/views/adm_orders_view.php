<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 17:52
 */

include_once 'application/controllers/controller_adm_orders.php';
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
            <tr><th>Id_user</th><th>Id_product</th><th>Amount</th><th>Total cost</th></tr>
            <?php $i = 0; while (isset($orders[$i])) {
                echo '<tr><td>'?><?php echo $orders[$i]['id_user']?><?php echo '</td><td>'?><?php echo $orders[$i]['id_product']?>
                <?php echo '</td><td>'?><?php echo $orders[$i]['amount']?><?php echo '</td><td>'?>
                <?php echo $orders[$i]['total_cost']?><?php echo '</td></tr>'; $i++; }?>
        </table>
    </div>
</main>
</body>
</html>
