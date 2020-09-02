<?php
include 'signup.php';
include 'rejestracja.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logowanie do systemu</title>
    </head>
    <body>
        <?php
            $login = $_POST['login'];
            $password = $_POST['password'];
            $rpassword = $_POST['rpassword'];
            $objRegister = new rejestracja();

        if ($objRegister->isThereAnyone("$login") == true) {
            if ($password === $rpassword) {
                if ($objRegister->userSignup("$login", "$password") == true) {
                    echo '<script> Swal.fire({ type: "success", text: "Success! You will be redirected"}) </script>';
                    header("Refresh:5; login.php");
                } else {
                    echo '<script> Swal.fire({ type: "error", text: "Something went wrong! You will be redirected"}) </script>';
                    header("Refresh:5; signup.php");
                }
            } else {
                echo '<script> Swal.fire({ type: "error", text: "Passwords must be the same! You will be redirected"}) </script>';
                header("Refresh:5; signup.php");
            }
            } else {
                echo '<script> Swal.fire({ type: "error", text: "Login already in use! You will be redirected"}) </script>';
                header("Refresh:5; signup.php");
            }
//        
            ?>
    </body>
</html>