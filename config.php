<?php
$admin = false;
if(isset($_SESSION['access']) == 2){
    $admin = true;
}
if(isset($_SESSION['access']) == 1){
    $admin = false;
}
?>


