    <head>
        <meta charset="UTF-8">
        <title>Sign up</title>
        <!--<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    
<?php
include('navbar.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
    
<div class="wrapper">
    <form class="form-signin" method="post" action="signup_check.php">       
        <h2 class="form-signin-heading">Please sign up</h2>
        <input type="text" class="form-control" name="login" placeholder="Login" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <input type="password" class="form-control" name="rpassword" placeholder="Repeat password" required=""/>     
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>   
    </form>
</div>