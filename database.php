<?php

class DataBase {

protected $mMysqli;

public function __construct() {
$this->mMysqli = new mysqli("localhost", "root", "", "project");
$this->mMysqli->query('set names utf8');
if (mysqli_connect_error()) {
printf("Brak połączenia z bazą danych!");
exit;
}
}

public function getAll() {
    $sql = "SELECT * FROM users";
    $result = $this->mMysqli->query($sql);
    return $result;
}

public function getAllBooks() {
    $sql = "SELECT * FROM books";
    $result = $this->mMysqli->query($sql);
    return $result;
}

public function getRentalBooks() {
    $sql = "SELECT * FROM books Join rent on books.ID = rent.id_book WHERE rent.isRented = 0;";
    $result = $this->mMysqli->query($sql);
    return $result;
}

public function getThisUser($user) {
    $sql = "SELECT login, md5_password, access FROM users WHERE id_user = $user;";
    $result = $this->mMysqli->query($sql);
    return $result;
//    return $result;
}

public function changePassword($user, $password){
    $sql = "UPDATE users SET md5_password = '".$password."' WHERE id_user = $user";
    $this->mMysqli->query($sql);
    return $sql;
}
  
public function addRow($book_id){
    $sql = "INSERT INTO books (id_user) VALUES ($book_id);";
}

public function rentABook($id_book, $id_user){
    $sql = "INSERT INTO rent (id_book, id_user, isRented) VALUES ($id_book, $id_user, 0);";
    $this->mMysqli->query($sql);
}

public function grantABook($id_rent){
    $sql = "UPDATE rent SET isRented = 1 WHERE id_rent = $id_rent;";
    $this->mMysqli->query($sql);    
}

public function myBooks($id_user){
    $sql = "SELECT * FROM books JOIN rent on books.ID = rent.id_book WHERE rent.isRented = 1 AND rent.id_user = $id_user;";
    $result = $this->mMysqli->query($sql);
    return $result;
}

public function returnBook($id_rent){
    $sql = "Update rent SET isRented = 0 WHERE id_rent = $id_rent;";
    $this->mMysqli->query($sql);  
}
} // Koniec klasy DataBase
?>
