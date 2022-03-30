<?php



// Connect database
require "../login-system/php/dbh.inc.php";
// Table name
$tbname = "cart_list";

print_r($_POST);
echo $_POST["t"];
echo "<br>";

// define variable
$total = $_POST["t"];
$fullname = $_POST["f"];
$orderDestination = $_POST["o"];
$contactNumber = $_POST["c"];
$message = "";


// Vaildation check, empty value
if (empty($fullname) || empty($orderDestination) || empty($contactNumber)) {
    $message = "Fields cannot empty!!!";
    echo $message . "<br>";
    echo "<script>";
    echo "window.location.href='pay.php?m=" . $message . "';";
    echo "</script>";
}




// SQL INSERT RECORD 

session_start();

$userid = $_SESSION['userid'];

//  INSERT DATA to ORDER table 
$sql = "INSERT INTO `order` (`orderId`, `usersId`, `fullname`, `price`, `orderDestination`, `contactNumber`, `state`) 
VALUES (NULL, '$userid',  '$fullname',  '$total', '$orderDestination','$contactNumber',NULL);";
echo "\$sql=" . $sql . "<br>";

// Execute sql
$sql_result = $conn->query($sql);


// UPDATE DATA to CART_LIST table
$sql = "UPDATE cart_list SET `state`='paid' WHERE `usersId` ='$userid' ";
echo "\$sql=" . $sql . "<br>";

// Execute sql
$sql_result = $conn->query($sql);

$last_id = $conn->insert_id;

if ($sql_result === TRUE) {
    $message = "User account created! (id=" . $last_id . ")";
    echo $message . "<br>";
} else {
    $message = "User account create fail!<br>";
    echo $message . "<br>";
}

// // return
echo "<script>";
echo "window.location.href='../index.php?m=" . $message . "';";
echo "</script>";


// Disconnect database
$conn->close();
