<?php
include_once '../php/dbh.inc.php';
if (isset($_GET["error"])) {
    if ($_GET["error"] == "youarenotAdmin!") {
        echo "<script>alert('You are not Admin!')</script>";
    } else if ($_GET["error"] == "none") {
        echo "<script>alert('Welcome Admin!')</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!----css3---->
    <link rel="stylesheet" href="../../css/admin.css">


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <div class="wrapper">

        <div class="body-overlay"></div>

        <?php
        require './admin-sidebar.php'
        ?>

        <!-------page-content start----------->

        <div id="content">

            <?php
            require './admin-header.php'
            ?>

            <!------main-content-start----------->

            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="text-center">
                                        <h1 class="ml-lg-2 text-info">Product Management</h2>
                                    </div>

                                    <?php
                                    echo "<form action=\"./m_order.php?\" method=\"GET\">";

                                    // ALL
                                    echo "<button class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-light text-dark nav-color' type='submit' name='action' value='all'>All Products</button>";

                                    // edit
                                    echo "<button class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-warning  text-dark nav-color' type='submit' name='action' value='edit'>Edit Product</button>";

                                    // add 
                                    echo "<button class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-primary nav-color' type='submit' name='action' value='add'>Add New Product</button>";

                                    // del
                                    echo "<button class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-danger nav-color' type='submit' name='action' value='del' >Delete Product</button>";

                                    echo "<form>";



                                    ?>

                                </div>
                            </div>

                            <div>
                                <?php
                                if (!empty($_GET["action"])) {
                                    switch ($_GET["action"]) {
                                        case "all":

                                            echo "
                                            <div class=\"text-center mt-3\">
    <h1 lass='fw-bold m-3' style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>All Product</h1>
</div>
                                            
                                            <table class=\"table table-striped table-hover\">
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


                                            $sql = "SELECT * FROM `product`; ";
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
                                            break;
                                        case "edit":
                                ?>
                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Edit
                                        Product</h1>
                                </div>

                                <!-- method post form   -->
                                <form action="./o_order.php" method="GET">

                                    <div class="modal-body">

                                        <!-- Product ID -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="epid" class="form-control rounded-4"
                                                id="floatingInput" placeholder="ProductID">
                                            <label for="floatingInput">ProductID </label>
                                        </div>

                                        <!-- Price -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="ep" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Price">
                                            <label for="floatingInput">Price</label>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="eq" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Quantity">
                                            <label for="floatingInput">Quantity</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer mx-auto">

                                        <button type="submit" class="btn btn-success" name='action'
                                            value="edit2">Save</button>
                                </form>
                                <?php

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


                                            $sql = "SELECT * FROM `product`; ";

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
                                            break;

                                        case "add":
                                            ?>

                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Add New
                                        Product </h1>
                                </div>

                                <!-- method post form   -->
                                <form action="./o_order.php" method="GET" enctype="multipart/form-data">

                                    <div class="modal-body">

                                        <!-- Product Brand -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apb" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Product Brand">
                                            <label for="floatingInput"> Product Brand </label>
                                        </div>

                                        <!-- Title -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apt" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Title">
                                            <label for="floatingInput">Title</label>
                                        </div>


                                        <!-- Detail -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apd" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Detail">
                                            <label for="floatingInput">Detail</label>
                                        </div>

                                        <!-- Size -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="aps" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Size">
                                            <label for="floatingInput">Size</label>
                                        </div>

                                        <!-- Color -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apc" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Color">
                                            <label for="floatingInput">Color</label>
                                        </div>

                                        <!-- Price -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="app" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Price">
                                            <label for="floatingInput">Price</label>
                                        </div>



                                        <!-- Quantity -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apq" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Quantity">
                                            <label for="floatingInput">Quantity</label>
                                        </div>


                                        <!-- // Image  -->
                                        <label for="fileToUpload"
                                            class="w-100 mb-2 btn btn-lg rounded-4 btn-dark nav-color"
                                            style=" border: 1px solid black;">
                                            Image
                                        </label>
                                        <input type="file" name="fileToUpload" id="fileToUpload" hidden>
                                        <span id="file-chosen">No file chosen</span>
                                    </div>


                                    <div class="modal-footer mx-auto">




                                        <button type="submit" class="btn btn-success" name='action'
                                            value="add2">Save</button>
                                </form>



                                <?php


                                            break;
                                        case "add2":


                                            $apb = $_GET['apb'];
                                            $apt = $_GET['apt'];
                                            $apd = $_GET['apd'];
                                            $aps = $_GET['aps'];
                                            $apc = $_GET['apc'];
                                            $app = $_GET['app'];
                                            $apq = $_GET['apq'];



                                            if (empty($apb)) {
                                            ?>

                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Add New
                                        Product </h1>
                                </div>

                                <!-- method post form   -->
                                <form action="./o_order.php" method="GET">

                                    <div class="modal-body">

                                        <!-- Product Brand -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apb" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Product Brand">
                                            <label for="floatingInput"> Product Brand </label>
                                        </div>

                                        <!-- Title -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apt" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Title">
                                            <label for="floatingInput">Title</label>
                                        </div>


                                        <!-- Detail -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apd" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Detail">
                                            <label for="floatingInput">Detail</label>
                                        </div>

                                        <!-- Size -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="aps" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Size">
                                            <label for="floatingInput">Size</label>
                                        </div>

                                        <!-- Color -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apc" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Color">
                                            <label for="floatingInput">Color</label>
                                        </div>

                                        <!-- Price -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="app" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Price">
                                            <label for="floatingInput">Price</label>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="apq" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Quantity">
                                            <label for="floatingInput">Quantity</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer mx-auto">

                                        <button type="submit" class="btn btn-success" name='action'
                                            value="add2">Save</button>
                                </form> <?php
                                                    } else {


                                                        echo "                                                <div class=\"text-center mt-3\">
                                                            <h1 lass='fw-bold m-3' style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Add New Product Successfully</h1>
                                                        </div>";

                                                        $sql = "INSERT INTO `product` (`p_brand`, `p_title`, `p_detail`, `p_size`, `p_color`,  `p_price`, `p_img`, `p_stock`) 
                                                        Values ($apb, $apt, $apd, $aps, $apc, $app, '\"images/a5.jpg\"', $apq)";

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
                                                    }

                                                    break;
                                                case "del":
                                                        ?>
                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Delete
                                        Product</h1>
                                </div>

                                <!-- method post form   -->
                                <form action="./o_order.php" method="GET">

                                    <div class="modal-body">

                                        <!-- Product ID -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="dpid" class="form-control rounded-4"
                                                id="floatingInput" placeholder="ProductID">
                                            <label for="floatingInput">ProductID </label>
                                        </div>


                                        <div class="modal-footer mx-auto">

                                            <button type="submit" class="btn btn-success" name='action'
                                                value="del2">Save</button>
                                </form>
                                <?php

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


                                                    $sql = "SELECT * FROM `product`; ";

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



                                                    break;
                                                case "del2":

                                                    $dpid = $_GET['dpid'];

                                                    if (empty($dpid)) { ?>
                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Delete
                                        Product</h1>
                                </div>

                                <!-- method post form   -->
                                <form action="./o_order.php" method="GET">

                                    <div class="modal-body">

                                        <!-- Product ID -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="dpid" class="form-control rounded-4"
                                                id="floatingInput" placeholder="ProductID">
                                            <label for="floatingInput">ProductID </label>
                                        </div>


                                        <div class="modal-footer mx-auto">

                                            <button type="submit" class="btn btn-success" name='action'
                                                value="del2">Save</button>
                                </form>
                                <?php

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


                                                        $sql = "SELECT * FROM `product`; ";

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
                                                    }

                                            ?>


                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Delete
                                        Product Successfully</h1>
                                </div>


                                <?php

                                                    $sql = "DELETE FROM `product` WHERE `p_id` = $dpid";

                                                    $sql_result = $conn->query($sql);

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


                                                    $sql = "SELECT * FROM `product`; ";

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
                                                    break;
                                                case "edit2":


                                                    $epid = $_GET['epid'];
                                                    $ePrice = $_GET['ep'];
                                                    $eStock = $_GET['eq'];

                                                    if (empty($epid)) {
                                            ?>
                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Edit
                                        Product </h1>
                                </div>

                                <form action="./o_order.php" method="GET">

                                    <div class="modal-body">

                                        <!-- Product ID -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="epid" class="form-control rounded-4"
                                                id="floatingInput" placeholder="ProductID">
                                            <label for="floatingInput">ProductID </label>
                                        </div>

                                        <!-- Price -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="ep" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Price">
                                            <label for="floatingInput">Price</label>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="form-floating mb-3">
                                            <input type="text" name="eq" class="form-control rounded-4"
                                                id="floatingInput" placeholder="Quantity">
                                            <label for="floatingInput">Quantity</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer mx-auto">

                                        <button type="submit" class="btn btn-success" name='action'
                                            value="edit2">Save</button>
                                </form>

                                <?php

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


                                                        $sql = "SELECT * FROM `product`; ";

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

</table>"; ?>
                                <?php
                                                    } else {

                                            ?>
                                <div class="text-center mt-3">
                                    <h1 lass='fw-bold m-3'
                                        style='font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>Edit
                                        Product Successfully </h1>
                                </div>



                                <?php


                                                        // edit product
                                                        $sql = "UPDATE `product` SET `p_price` = $ePrice , `p_stock` = $eStock WHERE `p_id` = $epid;";

                                                        // Execute sql
                                                        $conn->query($sql);



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


                                                        $sql = "SELECT * FROM `product`; ";

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
                                                    }
                                            }
                                        }
                                ?>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
            <!------main-content-end----------->



            <!----footer-design------------->

            <footer class="footer">
                <?php
                require '../../footer.php'
                ?>
            </footer>




        </div>

    </div>



    <!-------complete html----------->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/admin.js"></script>
</body>

</html>