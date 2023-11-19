<?php
    session_start();
    require("../backend/user.php");

    $method = $_POST['METHOD'];
    if(function_exists($method)){
        call_user_func($method);
    }else{
        echo "Function not Exist";
    }

    function panday(){
        $back = new user();
        echo $back->panday();
    }   

    function userProfile(){
        $back = new user();
        echo $back->userProfile($_SESSION['userId']);
    }   

    function jobs(){
        $back = new user();
        echo $back->jobs();
    }   

    function storePanday(){
        $back = new user();
        echo $back->storePanday($_SESSION['userId'], $_POST['Panday_location'], $_POST['Panday_skill'], $_POST['Panday_level']);
    }   

    function storeJobs(){
        $back = new user();

        $location = $_SERVER["DOCUMENT_ROOT"] . "/pandayhub/Assets/img/";
        $picture = "";
        if (isset($_FILES["file"]["name"])) {
    
            $finalfile = $location . $_FILES["file"]["name"];
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $finalfile)) {
                $picture = $_FILES["file"]["name"];
            }
        }
        echo $back->storeJobs($_SESSION['userId'], $picture, $_POST['job_title'], $_POST['job_project'], $_POST['job_location'], $_POST['job_require_exp'], $_POST['job_payment']);
    }   


    function updateInformation(){
        $back = new user();

        $location = $_SERVER["DOCUMENT_ROOT"] . "/pandayhub/Assets/img/";
        $picture = "";
        if (isset($_FILES["file"]["name"])) {
    
            $finalfile = $location . $_FILES["file"]["name"];
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $finalfile)) {
                $picture = $_FILES["file"]["name"];
            }
        }
        echo $back->updateInformation($_SESSION['userId'], $picture, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phn1'], $_POST['phn2']);
    }   

    
?>