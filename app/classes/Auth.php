<?php

namespace App\Classes;



class Auth extends Config
{

    /**
     *  register
     *  INSERT
    */
    public function register($name, $username, $r_email, $password ){

        $result = $this->conn->query( "INSERT INTO `users`( `name`, `username`, `email`, `pssword` ) VALUES ('$name', '$username', '$r_email', '$password')" );
        return $result ? true : false ;
    }
    /**
     *  user_exists
     *  SELECT email and all
     */
    public function user_exists($r_email){
        
        $result = $this->conn->query ("SELECT * FROM `users` where email='$r_email'");
        return $result->num_rows ;
    }
    /**
     * login
     * SELECT email and all
     */
    public function login ($l_email){
        return $this->conn->query ("SELECT * FROM `users` where email='$l_email'");
    }
//========== reseat password email get function ===============

    public function getuseremail ($email){
        return $this->conn->query ("SELECT * FROM `users` where email='$email'");
    }

    //========== reseat password email token ganaret and update function ===============

    public function tokenupdate ($token , $email){
        return $this->conn->query ("UPDATE `users` SET `token`='$token' WHERE `email`='$email' ");
    }

     //========== reseat password email token chack all function ===============

     public function chackemailtikenvalid ( $email, $token){
        return $this->conn->query ("SELECT * FROM `users` where `email`='$email' AND `token`='$token' ");
    }
     //========== reseat password all function ===============

     public function resetpassword ( $email, $confirm_password){
        return $this->conn->query ("UPDATE `users` SET `pssword`='$confirm_password' WHERE `email`='$email' ");
    }





//======= user SESSION ==========
    public function loginis(){
        session_start();
        return isset($_SESSION['user_email']) ? true: false;
    }


}

?>
