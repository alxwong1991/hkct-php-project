<?php
 
 require_once '../php/dbh.inc.php';
    if(isset($_POST['ban'])){
        $bid= $_POST["id"];
        $sql = "UPDATE users SET usersStatus = -1 WHERE usersId = '$bid';";
        $result = mysqli_query($conn, $sql);
        echo"user ".$bid." is banned!";
        header("Location:../admin/admin.php");
    }
    if(isset($_POST['free'])){
        $bid= $_POST["id"];
        $sql = "UPDATE users SET usersStatus = 0 WHERE usersId = '$bid';";
        $result = mysqli_query($conn, $sql);
        echo"user ".$bid." is free!";
        header("Location:../admin/admin.php");
    }
    if(isset($_POST['admin'])){
        $bid= $_POST["id"];
        $sql = "UPDATE users SET usersStatus = 99 WHERE usersId = '$bid';";
        $result = mysqli_query($conn, $sql);
        echo"user ".$bid." is now admin!";
        header("Location:../admin/admin.php");
    }
    if(isset($_POST['deny'])){
        $bid= $_POST["id"];
        $sql = "UPDATE users SET usersStatus = -99 WHERE usersId = '$bid';";
        $result = mysqli_query($conn, $sql);
        echo"user ".$bid." is now denied access!";
        header("Location:../admin/admin.php");
    }
