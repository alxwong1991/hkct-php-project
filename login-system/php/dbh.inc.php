<?php

$serverName = "localhost";
$dBUserName = "databasetest1";
$dBPassword = "databasetest1";
$dBName = "databasetest1";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}