<?php
include('database.php');
include('navbar.php');
$password = $_POST['password'];
$new_password = $_POST['new_password'];
$r_password = $_POST['rpassword'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$db = new DataBase();
var_dump($db->changePassword($_SESSION['id_user'], md5($new_password)));
echo $_SESSION['id_user'];
echo $new_password;
if (md5($password) === $_SESSION['md5_password']) {
    if (md5($new_password) != $_SESSION['md5_password']) {
        if ($new_password === $r_password) {
            $db->changePassword($_SESSION['id_user'], md5($new_password));
            $_SESSION['md5_password'] = $new_password;
            echo 'Password changed';
            echo '<script>Swal.fire("password changed", "You will be redirected") </script>';
            header("Refresh:3; account.php");
        } else {
            //jesli hasla sie nie zgadzaja
            echo'Passwords doesnt match';
            echo '<script> Swal.fire({ type: "error", text: "Passwords doesnt match! You will be redirected"}) </script>';
            header("Refresh:3; account.php");
        }
    } else {
        //jesli jest takie samo jak aktualne
        echo'Cant change to the same password';
        echo '<script> Swal.fire({ type: "error", text: "New password must be diffrent from old! You will be redirected"}) </script>';
        header("Refresh:3; account.php");
    }
} else {
    //jesli nie zgadza sie haslo
    echo'Wrong password';
    echo '<script> Swal.fire({ type: "error", text: "Wrong password! You will be redirected"}) </script>';
    header("Refresh:3; account.php");
//    echo '<script>Swal.fire("password change", "You will be redirected") </script>';
}
?>

