<?php
session_start();
require("../backend/user.php");

$method = $_POST['METHOD'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo "Function not Exist";
}

function panday()
{
    $back = new user();
    echo $back->panday();
}

function userProfile()
{
    $back = new user();
    echo $back->userProfile($_SESSION['userId']);
}

function jobs()
{
    $back = new user();
    echo $back->jobs();
}

function storePanday()
{
    $back = new user();
    echo $back->storePanday($_SESSION['userId'], $_POST['Panday_location'], $_POST['Panday_skill'], $_POST['Panday_level'], $_POST['exp']);
}

function storeJobs()
{
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


function updateInformation()
{
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

function applynow()
{
    $back = new user();
    echo $back->applynow($_SESSION['userId'],  $_POST['job_poser'], $_POST['job_id']);
}

function applicants()
{
    $back = new user();

    echo $back->applicants($_SESSION['userId']);
}

function hiredsPanday()
{
    $back = new user();

    echo $back->hiredsPanday($_SESSION['userId'], $_POST['id']);
}

function completeHired()
{
    $back = new user();

    echo $back->completeHired($_POST['id'], $_POST['datestarted'], $_POST['update_at']);
}

function changeStatus()
{
    $back = new user();

    echo $back->changeStatus($_POST['id']);
}

function workCompleted()
{
    $back = new user();

    echo $back->workCompleted($_POST['id']);
}

function getAllHireds()
{
    $back = new user();

    echo $back->getAllHireds($_SESSION['userId']);
}

function allHiredsToWorker()
{
    $back = new user();

    echo $back->allHiredsToWorker($_SESSION['userId']);
}
function applieJob()
{
    $back = new user();

    echo $back->applieJob($_SESSION['userId']);
}

function myPostAsPanday()
{
    $back = new user();

    echo $back->myPostAsPanday($_SESSION['userId']);
}
function myPostAsJob()
{
    $back = new user();

    echo $back->myPostAsJob($_SESSION['userId']);
}
function getAllBestPanday()
{
    $back = new user();

    echo $back->getAllBestPanday();
}
function getHighestPayment()
{
    $back = new user();

    echo $back->getHighestPayment();
}
function decline()
{
    $back = new user();

    echo $back->decline($_POST['id']);
}
function hirer()
{
    $back = new user();

    echo $back->hirer($_SESSION['userId']);
}
function worker()
{
    $back = new user();

    echo $back->worker($_SESSION['userId']);
}

function deleteApplicant()
{
    $back = new user();

    echo $back->deleteApplicant($_POST['userId']);
}
function deletepanday()
{
    $back = new user();

    echo $back->deletepanday($_POST['id']);
}
function deletejob()
{
    $back = new user();

    echo $back->deletejob($_POST['id']);
}

function reportUsers()
{
    $applicant = new user();
    echo $applicant->reportUsers($_SESSION['userId'], $_POST['reason'], $_POST['id']);
}

function rateme()
{
    $applicant = new user();
    echo $applicant->rateme($_POST['id'], $_POST['rate'],$_SESSION['userId']);
}
