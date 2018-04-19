<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 28.03.2018
 * Time: 21:46
 */
include 'application/controllers/controller_main.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="icon" href="img/logo.svg">

    <title>Main</title>

    <link href="css/style.css" rel="stylesheet">
</head>

<body class="text-center">
<main role="main" class="container" style="margin-top: 70px">
    <div class="jumbotron">
        <ul class="products clearfix">
            <?php
                $i = 0;
                if (isset($products[$i])) {
                        while ($products[$i]) {
                            if (strcmp($_SESSION['category'], "none")) {
                                if (strcmp($_SESSION['category'], $products[$i]["category"]) != 0) {
                                    if (isset($products[$i + 1]))
                                        ++$i;
                                    else
                                        break;
                                    continue;
                                }
                            }
                                echo '<li class="product-wrapper">
                                <div class="product">
                                    <img class="mb-4" style="margin-top: 5px" src="' ?><?php echo $products[$i]["img"] ?><?php echo '" alt="" width="120" height="120">
                                    <div class="heading" >
                                        <p>' ?><?php echo $products[$i]["name"]; ?><?php echo '</p>
                                    </div>
                                    <p class="type">' ?><?php echo $products[$i]["category"]; ?><?php echo '</p>
                                    <p class="descript">' ?><?php echo $products[$i]["description"]; ?><?php echo '</p>
                                    <p class="price">£' ?><?php echo $products[$i]["price"]; ?><?php echo '</p>
                                    <form class="form-text" action="" method="POST">
                                        <input type="number"  name="amount" value="1" min="1">
                                        <input type="hidden"  name="id_product" value="' ?><?php echo $products[$i]["id_product"]; ?><?php echo '">
                                        <input type="hidden" name="price" value="' ?><?php echo $products[$i]["price"]; ?><?php echo '">
                                        <button type="submit" name="submit_buy" class="button" value="item">Buy</button>
                                    </form>
                                </div>
                              </li>';
                                if (isset($products[$i + 1]))
                                    ++$i;
                                else
                                    break;
                                }
                }
            $_SESSION['category'] = "none";
            ?>
        </ul>
    </div>
</main>
</body>
</html>
