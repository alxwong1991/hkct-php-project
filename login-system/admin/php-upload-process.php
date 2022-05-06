<?php
include_once '../php/dbh.inc.php';
// file storage directory
// Replace your own local path for the image to work
// $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/dashboard/www/hkct-php-project-master/images/";
$target_dir = "/xampp/htdocs/hkct-php-project/images/";
// file storage path
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// upload status, 1=successful, 0=fail
$uploadOk = 1;
//get file type, e.g. jpb, png
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_PSOT["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    //show system image file type name
    echo "File is an image - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.<br>";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.<br>";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.<br>";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br>";
    echo  $_FILES["fileToUpload"]["name"];
    // Replace your own local path for the image to work
    //echo "<img src=/dashboard/www/hkct-php-project-master/images/" . $_FILES['fileToUpload']['name'] . ">";
    echo "<img src=/xampp/htdocs/hkct-php-project/images/" . $_FILES['fileToUpload']['name'] . ">";
  } else {
    echo "Sorry, there was an error uploading your file.<br>";
  }
}


$apb = $_POST['apb'];
$apt = $_POST['apt'];
$apd = $_POST['apd'];
$aps = $_POST['aps'];
$apc = $_POST['apc'];
$app = $_POST['app'];
$apq = $_POST['apq'];
$pimg = $_FILES['fileToUpload']['name'];



echo "                                                <div class=\"text-center mt-3\">
  <h1 lass='fw-bold m-3' style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Add New Product Successfully</h1>
</div>";

$sql = "INSERT INTO `product` (`p_brand`, `p_title`, `p_detail`, `p_size`, `p_color`,  `p_price`, `p_img`, `p_stock`) 
Values ($apb, $apt, $apd, $aps, $apc, $app, \"$pimg\", $apq)";

$sql_result = $conn->query($sql);

$sql = "SELECT * FROM `product`; ";

echo "<table class=\"table table-striped table-hover\">
<thead>
  <tr>
      <th>ID</th>
      <th>Brand</th>
      <th>Title</th>
      <th>Size</th>
      <th>Color</th>
      <th>Price</th>
      <th>Quantity</th>
  </tr>
</thead>

<tbody>";


$sql_result = $conn->query($sql);
while ($row = mysqli_fetch_array($sql_result)) {
  $pid = $row['p_id'];
  echo "
<tr>
<th>" . $row['p_id'] . "</th>
<th>" . $row['p_brand'] . "</th>
<th>" . $row['p_title'] . "</th>
<th>" . $row['p_size'] . "</th>
<th>" . $row['p_color'] . "</th>
<th>" . $row['p_price'] . "</th>
<th>" . $row['p_stock'] . "</th>
</tr>";
}

echo                                            "</tbody>

</table>";

// return
echo "<script>";
// Replace your own local path for the image to work
//echo "window.location.href='http://localhost/dashboard/www/hkct-php-project-master/login-system/admin/m_order.php?action=all';";
echo "window.location.href='http://localhost/hkct-php-project/login-system/admin/m_order.php?action=all';";
echo "</script>";