<?php
    session_start();
    require("../backend/authentication.php");

    $method = $_POST['METHOD'];
    if(function_exists($method)){
        call_user_func($method);
    }else{
        echo "Function not Exist";
    }

    function loginUser(){
        $back = new authentication();
        echo $back->doLogin($_POST['Username'], $_POST['Password']);
    }

    function registerUser(){
        $back = new authentication();
        echo $back->doRegister($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password'], $_POST['role']);
    }


?>