<?php

if(isset($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd =  $_POST["pwd"];
    $nname =  $_POST["nid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username,$pwd) !==false){
        header("location:../login-register.php?error=emptyinput");
        exit();
    }
    changeUid($conn,$username,$nname,$pwd);
   
}
else{
    header("location:../login-register.php");
    exit();
}