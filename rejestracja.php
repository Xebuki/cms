<?php

include('database.php');
class rejestracja Extends DataBase{
    
    protected $login;
    protected $md5_password;
    protected $is_logged;
    protected $user_id;
    
    public function __construct() {
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    }
      
    public function userSignup($str_username, $str_password) {
        $this->login = addslashes($str_username);
        $this->md5_password = md5($str_password);

        $sql = "INSERT INTO users (login, md5_password) values ('$this->login', '$this->md5_password')" ;
        if($this->mMysqli->query($sql)){
        return true;
        }else{
            return false;
        }
        }
        
    public function isThereAnyone($ch_login){
        $sql = "SELECT login FROM users WHERE login = '$ch_login'";
        $result = $this->mMysqli->query($sql);
        if($result->num_rows == 0){
            return true;
        }else return false;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

