<?php

// Connect database
require "../login-system/php/dbh.inc.php";
// Table name
$tbname = "cart_list";

session_start();

print_r($_SESSION);

print_r($_GET);

$userid = $_SESSION['userid'];

$cid =  $_GET['cid'];

// Delete
$sql = "DELETE FROM cart_list WHERE cart_Item_Id = '$cid';";

// Execute sql
$conn->query($sql);

 // return
echo "<script>";
echo "window.location.href='../shopping_cart.php'";
echo "</script>";


// Disconnect database
$conn->close();

?>