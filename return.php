<?php

include('database.php');
include('navbar.php');

$db = new DataBase();
$id_rent = floatval($_POST['id_rent']);
if(isset($_SESSION['id_user'])){
    echo $id_rent;
$db->returnBook($id_rent);
header("Refresh:1; account.php");
} 