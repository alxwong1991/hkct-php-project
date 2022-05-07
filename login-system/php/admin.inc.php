<?php



session_start();

// $value = $_SESSION["useruid"];
// $admin = "Louie9";

// if ($value == $admin) {
//   echo " hello" . $_SESSION["useruid"];
//   header("location:../admin/admin.php?error=none");
// } else {
//   header("location:../../index.php?error=youarenotAdmin!");
// }
$value = $_SESSION["userstatus"];


if ($value == 99) {
  echo " hello" . $_SESSION["useruid"];
  header("location:../admin/admin.php?error=none");
} else {
  echo " hello" . $_SESSION["useruid"];
  echo " your user status is " . $_SESSION["userstatus"];
}