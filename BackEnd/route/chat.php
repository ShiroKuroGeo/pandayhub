<?php
session_start();
require("../backend/chat.php");

$method = $_POST['METHOD'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo "Function not Exist";
}

function sendchat(){
    $chat = new chat();
    echo $chat->chats($_SESSION['userId'],$_POST['id'], $_POST['message']);
}

function getAllMessage(){
    $chat = new chat();
    echo $chat->getAllMessage($_SESSION['userId'], $_POST['id']);
}

function getAllWhoMessage(){
    $chat = new chat();
    echo $chat->getAllWhoMessage($_SESSION['userId']);
}