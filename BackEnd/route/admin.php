<?php
session_start();
require("../backend/admin.php");

$method = $_POST['METHOD'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo "Function not Exist";
}
function getUsers()
{
    $back = new admin();
    echo $back->getUsers();
}

function getAllUsers()
{
    $back = new admin();
    echo $back->getAllUsers();
}

function updateUsersRestriction()
{
    $back = new admin();
    echo $back->updateUsersRestriction($_POST['id'], $_POST['stats']);
}

function My()
{
    $back = new admin();
    echo $back->My($_SESSION['userId']);
}

function allReported()
{
    $admin = new admin();
    echo $admin->allReported();
}

function reportToRestrict(){
    $admin = new admin();
    echo $admin->reportToRestrict($_POST['id']);
}