<?php
//	include('head.php');
        include('navbar.php');

$title = 'Home';
$_SESSION['currentPage'] = 'Home';
//define('currentPage', 'Home');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_destroy();
//echo $_SESSION['md5_password'];

?>
<div class='welcome_table'>
    <center><h1> Welcome </h1></center>
    <center>Witaj w systemie bibliotecznym</center>
    <?php if(!isset($_SESSION['login'])){
        echo'Zaloguj się, aby kontynuować';
    }
    ?>
</div>
