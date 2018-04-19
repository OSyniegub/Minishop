<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 08.04.2018
 * Time: 11:02
 */

include_once 'application/controllers/controller_adm_users.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.svg">

    <title>AdmUsers</title>

    <link href="css/style.css" rel="stylesheet">
</head>

<body class="text-center">
<main role="main" class="container">
    <div class="jumbotron" style="margin-top: 150px" align="center">
        <ul class="products clearfix">
            <table>
                <tr><th>Id_user</th><th>Login</th><th>Status</th><th>Action</th></tr>
                <?php if (isset($users)) {
                    $i = 0;
                    while (isset($users[$i])) { ?>
                        <?php echo '<form method="post"><tr>' ?>
                        <?php echo '</td><td>' ?><?php echo '<p>'.$users[$i]['id_user'].'</p>' ?>
                        <?php echo '</td><td>' ?><?php echo '<p>'.$users[$i]['login'].'</p>' ?>
                        <?php echo '</td><td>'?><?php echo '<input type="number" name="status" value="'.$users[$i]['status'].'"
                                                                    min="1" max="3">'?>
                        <?php echo '<input type="hidden" name="old_status" value="'.$users[$i]['status'].'"
                                                                    min="1" max="3">'?>
                        <?php echo '</td><td>' ?><?php echo '<br />'?>
                        <?php echo '
                            <button class="btn btn-sm" style="background-color: grey" type="submit" name="submit_modify" value="'.$users[$i]['id_user'].'
                ">Modify</button>' ?>
                        <?php echo '
                            <button class="btn btn-sm" style="background-color: grey" type="submit" name="submit_delete" value="'.$users[$i]['id_user'].'
                ">Delete</button></form>' ?>
                        <?php echo '</td>' ?>
                        <?php echo '</tr>' ?>
                        <?php $i++;
                    }
                }?>
            </table>
            <br />
        </ul>

        <form method="post">
            <table>
                <tr><th>Login</th><th>Password</th><th>Status</th></tr>
                <?php echo '</td><td>'?><?php echo '<input type="text" name="login" placeholder="login">'?>
                <?php echo '</td><td>'?><?php echo '<input type="text" name="password" placeholder="password">'?>
                <?php echo '</td><td>'?><?php echo '<input type="number" name="status" value="1" min="1" max="3">'?>
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
