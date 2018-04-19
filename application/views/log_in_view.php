<?php
/**
 * Created by PhpStorm.
 * User: Oleksandr
 * Date: 01.04.2018
 * Time: 20:08
 */
include 'application/controllers/controller_log_in.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="icon" href="img/logo.svg">

    <title>Login</title>

    <link href="css/signup.css" rel="stylesheet">
</head>

<body class="text-center">
<main role="main" class="container">
    <div class="jumbotron">
        <form class="form-signin" method="POST">
            <img class="mb-4" src="img/1.jpg" alt="" width="320" height="200">
            <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
            <label for="inputLogin" class="sr-only">Login</label>
            <input type="login" name="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="ok">Log in</button>
        </form>
        <?php $err = "Wrong!"; if ($error == 1) {?>
            <h1 class="h3 mb-3 font-weight-normal"><?php echo $err;?></h1>
        <?php } $error = 0;?>
    </div>
</main>
</body>
</html>