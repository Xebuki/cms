<?php
include('navbar.php');
//echo '<script>Swal.fire("password changed", "You will be redirected") </script>';

?>
<form action="" method="POST"><input type="checkbox" name="show" id="show" />Change</form>
<form action="" method="POST"><button type="submit" name="show" class="btn btn-primary" id="change_password">Change</button></form>

<?php
if (filter_has_var(INPUT_POST, "show")) {
        ?>
        <div id="myform" class="wrapper">
            <form class="form-signin" method="post" action="change_password_check.php">       
                <h2 class="form-signin-heading">Change password</h2>
                <input type="text" class="form-control" name="password" placeholder="Password" required="" autofocus="" />
                <input type="password" class="form-control" name="new_password" placeholder="New password" required=""/>
                <input type="password" class="form-control" name="rpassword" placeholder="Repeat password" required=""/>     
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>   
            </form>
        </div>
    <?php } ?>




