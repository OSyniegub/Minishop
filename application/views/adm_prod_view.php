<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 07.04.2018
 * Time: 21:55
 */

include_once 'application/controllers/controller_adm_prod.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.svg">

    <title>AdmProd</title>

    <link href="css/style.css" rel="stylesheet">
</head>

<body class="text-center">
<main role="main" class="container">
    <div class="jumbotron" style="margin-top: 150px" align="center">
        <ul class="products clearfix">
                <table>
                    <tr><th>Name</th><th>Category</th><th>Description</th><th>Price</th><th>Image</th><th>Action</th></tr>
                    <?php if (isset($products)) {
                        $i = 0;
                        while (isset($products[$i])) { ?>
                            <?php echo '<form method="post"><tr>' ?>
                            <?php echo '</td><td>' ?><?php echo '<input type="text" name="name" value="'.$products[$i]['name'].'">' ?>
                            <?php echo '</td><td>' ?><?php echo '<input type="text" name="category" value="'.$products[$i]['category'].'">' ?>
                            <?php echo '</td><td>' ?><?php echo '<input type="text" name="description" value="'.$products[$i]['description'].'">' ?>
                            <?php echo '</td><td>' ?><?php echo '<input type="number" name="price" value="'.$products[$i]['price'].'">' ?>
                            <?php echo '</td><td>' ?><?php echo '<input type="text" name="image" value="'.$products[$i]['img'].'">' ?>
                            <?php echo '</td><td>' ?><?php echo '<br />
                <button class="btn btn-sm" style="background-color: grey" type="submit" name="submit_modify" value="'.$products[$i]['id_product'].'
                ">Modify</button>' ?>
                            <?php echo '<br /><br />
                            <button class="btn btn-sm" style="background-color: grey" type="submit" name="submit_delete" value="'.$products[$i]['id_product'].'
                ">Delete</button></form>' ?>
                            <?php echo '</td>' ?>
                            <?php echo '</tr>' ?>
                            <?php $i++;
                        }
                    }?>
                </table>
            <br />
            <?php if ($err == 2) {?>
                <h1 class="h3 mb-3 font-weight-normal"><?php echo "Error: fill in all the fields correctly!";?></h1>
            <?php }?>
        </ul>

        <form method="post">
        <table>
            <tr><th>Name</th><th>Category</th><th>Description</th><th>Price</th><th>Image</th></tr>
            <?php echo '</td><td>'?><?php echo '<input type="text" name="name" placeholder="name">'?>
            <?php echo '</td><td>'?><?php echo '<input type="text" name="category" placeholder="category">'?>
            <?php echo '</td><td>'?><?php echo '<input type="text" name="description" placeholder="description">'?>
            <?php echo '</td><td>'?><?php echo '<input type="number" name="price" placeholder="price" min="1" max="999999">'?>
            <?php echo '</td><td>'?><?php echo '<input type="text" name="image" placeholder="img/example.jpg">'?>
        </table>
        <br />
        <button class="btn" style="background-color: grey" type="submit" name="submit" value="ok">Add</button>
        </form>
        <?php if ($err == 1) {?>
            <h1 class="h3 mb-3 font-weight-normal"><?php echo "Error: fill in all the fields correctly!";?></h1>
        <?php }?>
    </div>
</main>
</body>
</html>
