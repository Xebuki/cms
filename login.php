<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
    <!--<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->

</head>
<?php
include ('navbar.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="wrapper">
    <form class="form-signin" method="post" action="login_check.php">       
        <h2 class="form-signin-heading">Please login</h2>
        <input type="text" class="form-control" name="login" placeholder="Login" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
</div>