<?php

// session_start();

// $value = $_SESSION["useruid"];
// $admin = "Louie9";

// if ($value == $admin) {
//   echo " hello" . $_SESSION["useruid"];
//   header("location:../../products_admin.php?error=none");
// } else {
//   header("location:../../index.php?error=youarenotAdmin!");
// }

session_start();

$value = $_SESSION["useruid"];
$admin = "Louie9";

if ($value == $admin) {
  echo " hello" . $_SESSION["useruid"];
  header("location:../admin/admin.php?error=none");
} else {
  header("location:../../index.php?error=youarenotAdmin!");
}