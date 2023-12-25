<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("location: login.php");
    }
    else
    {
        $id = $_SESSION['id'];
        $displayname = $_SESSION['displayname'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $phonenumber = $_SESSION['phonenumber'];
        $permission = $_SESSION['permission'];
    }
?>