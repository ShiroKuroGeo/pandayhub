<?php
    session_start();

    if($_SESSION['role'] == 1){
        header('location: worker/index.php');
    }else if($_SESSION['role'] == 2){
        header('location: ../admin/index.php');
    }else if($_SESSION['role'] == 3){
        header('location: client/index.php');
    }else{
        header('location: ../../BackEnd/logout.php');
    }

?>