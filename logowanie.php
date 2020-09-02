<?php
include('database.php');

class logowanie Extends database{
    
    protected $login;
    protected $md5_password;
    protected $is_logged;
    protected $user_id;
    
    public function nazwa(){
        
    }
    
    public function __construct() {
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        if (!empty($_SESSION['login']) && !empty($_SESSION['password'])) {
        $this->login = addslashes($_SESSION['login']);
        $this->md5_password = addslashes($_SESSION['password']);
        $sql = "SELECT id_user, access FROM users WHERE login = '$this->login' AND md5_password = '$this->md5_password'";
        $result = $this->mMysqli->query($sql);

        if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $this->user_id = $row["id_user"];
        $this->is_logged = true;
        $this->access = $row["access"];
        }
        }
        }
     
    public function userLogin($str_username, $str_password) {
        $this->login = addslashes($str_username);
        $this->md5_password = md5($str_password);
//        $this->md5_password = $str_password;
        $_SESSION['login'] = $str_username;
        $_SESSION['password'] = $this->md5_password;

        $sql = "SELECT id_user, access, md5_password FROM users WHERE login = '$this->login' AND md5_password = '$this->md5_password'";
        $result = $this->mMysqli->query($sql);

        if($result->num_rows > 0) {

        $row = $result->fetch_array(MYSQLI_ASSOC);
        $this->user_id = $row["id_user"];
        $this->logged_in = true;
        $this->access = $row["access"];
        $_SESSION['id_user'] = floatval($row["id_user"]);
        $_SESSION['access'] = floatval($row["access"]);
        $_SESSION['md5_password'] = $row['md5_password'];


        return true;
        } else {
        return false;
        }
        }
        
    public function logout() {
        if ($this->is_logged == true) {
        // Przy wylogowaniu należy wyczyścić wszystkie ustawienia użytkownika
        $this->is_logged = false;
        $this->user_id = 0;
        $this->access = 0;

        session_destroy();

        return true;
        } else {
        return false;
        }
        }
    public function isLoggedIn() {
        return $this->is_logged;
        }
    
    
}

