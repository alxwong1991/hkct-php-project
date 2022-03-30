<?php

// signup //////////////////////////////////

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)
{
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../login-register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES ('$name', '$email', '$username', '$pwd');";
    $qresult = mysqli_query($conn, $sql);
    /*$stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../login-register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);*/
    header("location:../login-register.php?error=none");
    exit();
}

// signup //////////////////////////////////

// signin  //////////////////////////////////

function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists == false) {
        header("location:../login-register.php?error=wronglogin");
    }

    $checkPwd = ($pwd == $uidExists["usersPwd"]);

    if ($checkPwd === false) {
        header("location:../login-register.php?error=wrongPassword");
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        header("location:../profile/profile.php");
        exit();
    }
}

// signin  //////////////////////////////////

// profile update //////////////////////////////////

function createimgPf($conn, $username, $pwd)
{
    $uidExists =  uidExists($conn, $username, $username);
    $checkPwd = ($pwd == $uidExists["usersPwd"]);
    $imgusid = $uidExists["usersId"];
    if ($checkPwd === false) {
        header("location:../profile.php?error=wrongPassword");
    } elseif ($checkPwd === true) {
        $sqli = "INSERT INTO profileimg (userid,zt) 
    VALUES ('$imgusid',1);";
        mysqli_query($conn, $sqli);
        header("location:../profile/profile.php?error=none");
    }
    exit();
}

function changeUid($conn, $username, $nname, $pwd)
{

    $uidExists =  uidExists($conn, $username, $username);

    if ($uidExists == false) {
        header("location:../profile.php?error=wronglogin");
    }
    session_start();
    $checkPwd = ($pwd == $uidExists["usersPwd"]);
    $pd = $_SESSION["userid"];

    if ($checkPwd === false) {
        header("location:../profile.php?error=wrongPassword");
    } elseif ($checkPwd === true) {
        $sql = "UPDATE users SET usersUid = '$nname' WHERE usersId = '$pd';";
        $result = mysqli_query($conn, $sql);
        header("Location:../profile.php?changesuccess");

        exit();
    }
}

// profile update //////////////////////////////////