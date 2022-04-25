<?php



// Connect database
require "../login-system/php/dbh.inc.php";
// Table name
$tbname = "cart_list";


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
$sql = "INSERT INTO `order` (`o_id`, `usersId`, `o_name`, `o_price`, `o_destination`, `o_contactNumber`) 
VALUES (NULL, '$userid',  '$fullname',  '$total', '$orderDestination','$contactNumber');";

// Execute sql
$sql_result = $conn->query($sql);



// UPDATE DATA to CART_LIST table
$sql = "UPDATE cart_list SET `c_state`='paid' WHERE `usersId` ='$userid';";


// Execute sql
$sql_result = $conn->query($sql);


// UPDATE DATA to CART_LIST table
$sql ="SELECT * FROM `cart_list`,`product`, `users`

WHERE `product`.`p_id` = `cart_list`.`p_id`

AND `users`.`usersId` = `cart_list`.`usersId`

AND `users`.`usersId` = $userid AND `cart_list`.`c_state` = 'paid';";

// Execute sql
$sql_result = $conn->query($sql);

while ($row = mysqli_fetch_array($sql_result)) {
    $q = ($row["c_quantity"]);
    $pid = ($row["p_id"]);
    $s = ($row["p_stock"]);

    $s -=$q ;

    $sSql = "UPDATE `product` SET `p_stock` = $s WHERE `p_id` =  $pid;";
    $sSql_result = $conn->query($sSql);


}

 // return
echo "<script>";
echo "window.location.href='../index.php?m=" . $message . "';";
echo "</script>";


// Disconnect database
$conn->close();
