<?php
    function checkName($name){
        $regex = "/^[[:alpha:]]+$/";
        if(preg_match($regex,$name)){
            return "";
        }
        return "<p class='text-danger' style='font-size: 0.8rem'>Bạn chỉ được nhập chữ vào đây</p>";
    }
    function checkUserName($username){
        $regex = "/^[[:alnum:]]+$/";
        if(preg_match($regex,$username) && strlen($username)>5){
            return "";
        }
        return "<p class='text-danger' style='font-size: 0.8rem'>Bạn chỉ được nhập chữ cái hoặc số vào đây và phải trên 5 kí tự</p>";
    }
    function checkEmail($email){
        $regex = "/^[[:alnum:]]+@[[:alnum:].]+$/";
        if(preg_match($regex,$email)){
            return "";
        }
        return "<p class='text-danger' style='font-size: 0.8rem'>Email bạn nhập vào không đúng</p>";
    }
    function checkPassword($password){
        $regex = "/^[[:alnum:]]+$/";
        $regex1 = "/[A-Z]{1,}/";
        $regex2 = "/[0-9]{2,}/";
        if(preg_match($regex,$password) && preg_match($regex1,$password) && preg_match($regex2,$password) && strlen($password)>5){
            return "";
        }
        return "<p class='text-danger' style='font-size: 0.8rem'>Mật khẩu yêu cầu trên 5 kí tự và ít nhất 1 kí tự viết hoa và 2 kí tự số và không có kí tự đặc biệt</p>";
    }
    function checkLogin($name){
        $regex = "/^[a-zA-Z0-9@.]+$/";
        if(preg_match($regex,$name)){
            return true;
        }
        return false;
    }
?>
