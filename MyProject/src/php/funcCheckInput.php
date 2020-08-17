<?php
    function checkName($name){
        $regex = "/^[[:alpha:]]+$/";
        if(preg_match($regex,$name)){
            return true;
        }
        return false;
    }
    function checkUserName($username){
        $regex = "/^[[:alnum:]]+$/";
        if(preg_match($regex,$username) && strlen($username)>5){
            return true;
        }
        return false;
    }
    function checkEmail($email){
        $regex = "/^[[:alnum:]]+@[[:alnum:].]+$/";
        if(preg_match($regex,$email)){
            return true;
        }
        return false;
    }
    function checkPassword($password){
        $regex = "/^[[:alnum:]]+$/";
        $regex1 = "/[A-Z]{1,}/";
        $regex2 = "/[0-9]{2,}/";
        if(preg_match($regex,$password) && preg_match($regex1,$password) && preg_match($regex2,$password) && strlen($password)>5){
            return true;
        }
        return false;
    }
    function checkLogin($name){
        $regex = "/^[a-zA-Z0-9@.]+$/";
        if(preg_match($regex,$name)){
            return true;
        }
        return false;
    }
?>
