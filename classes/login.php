<?php
require '../config/db_connection.php';
session_start();


class Login {

    public function CheckUser($email, $password) {
        $sql = "SELECT zaposleni.id,email,zaposleni.password,position_id,pozicija.permissions FROM zaposleni JOIN pozicija on zaposleni.position_id = pozicija.pozicija_id WHERE zaposleni.password = '$password' AND email = '$email' AND pozicija.permissions = 'admin'";
        $result = mysqli_query($GLOBALS['connection'], $sql);
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
        $user_role = $user['permissions'];

        if($result->num_rows > 0) {
            $this->CreateUserSession($user_id, $user_role);
            return true;
        } else {       
            return false;
        }  
    }
    public function CreateUserSession($user_id, $role) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $role;    
    }
}


?>