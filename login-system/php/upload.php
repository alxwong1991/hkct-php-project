<?php
session_start();
include_once './dbh.inc.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt =  explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = "profile" . $_SESSION["userid"] . "." . $fileActualExt;
                $fileDestination = '../profile/upload/' . $fileNameNew;
                $pd = $_SESSION["userid"];
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE profileimg SET zt = 0 WHERE userid = '$pd';";
                $result = mysqli_query($conn, $sql);
                header("Location:../profile/profile.php?uploadsuccess");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "there was an error uploading your file!";
        }
    } else {
        echo "you can not upload files of this type!";
    }
}