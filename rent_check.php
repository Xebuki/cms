<?php

include('database.php');
include('navbar.php');

$db = new DataBase();
$id_book = floatval($_POST['id_book']);

echo $id_book;
echo $_SESSION['id_user'];

    if (isset($_SESSION['id_user'])) {
        $db->rentABook($id_book, $_SESSION['id_user']);
        header("Refresh:0; collection.php");
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

