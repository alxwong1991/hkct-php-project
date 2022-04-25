<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "youarenotAdmin!") {
        echo "<script>alert('You are not Admin!')</script>";
    } else if ($_GET["error"] == "none") {
        echo "<script>alert('Welcome Admin!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="css/footer.css" rel="stylesheet">
    <link href="css/productCard.css" rel="stylesheet">



    <style>
        /* carousel */
        .carousel-item {
            height: 50rem;
            background: #000;
            color: white;
            position: relative;

        }

        .carousel_container {
            margin: 3rem;
            position: absolute;
            bottom: 0;
            right: 0;

        }

        .carousel-image {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background-position: center;
            background-size: cover;
            opacity: 0.5;
        }


        .card:hover {
            border: 1px solid #00838d;

        }
    </style>

</head>

<body>

    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->
    <div>
        <?php
        require "header.php";
        ?>
    </div>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->


    <!-- <div class="top-bg-content"></div> -->

    <!-- container -->
    <div class="container-fluid">
        <!-- 
            row 
        -->
        <div class="row">

            <!-- Bootstrap Carousel  -->
            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="padding-right: 0;padding-left:0;">

                <div class="carousel-inner">
                    <!--  Carousel item start ( Class = "active" )  -->
                    <div class="carousel-item active" data-bs-interval="100">
                        <div class="overlay-image" style="background-image:url(https://imgur.com/PePX3p4.gif);"> </div>
                        <div class="carousel_container ">
                            <h1>READY-TO-WEAR</h1>
                            <p>2022</p>
                        </div>
                    </div>

                    <?php
                    // Carousel item array 
                    $carousel_image = array();
                    $carousel_image[0] = "https://imgur.com/P4zyWEl.gif";
                    $carousel_image[1] = "https://imgur.com/JSq20zz.gif";
                    $arrlength = count($carousel_image);

                    for ($x = 0; $x < $arrlength; $x++) {
                        echo "<div class=\"carousel-item\" data-bs-interval=\"2000\">";
                        echo "<div class=\"carousel-image\" style=\"background-image:url(" . $carousel_image[$x] . ");\"></div>";
                        echo "<div class=\"carousel_container \">
                                <h1>READY-TO-WEAR</h1>
                                <p>2022</p></div>";
                        echo  "</div>";
                    }
                    ?>

                </div>
            </div>


            <!-- Replace XML with a database and reorganize the PHP data connection in the final stage -->
            <!-- ::::::::::::::::::::::::::::::: Php & XML ::::::::::::::::::::::::::::::: -->
            <div>
                <?PHP
                // $_SESSION["new_product"] = 0;
                // $products_xml = simplexml_load_file('products_list.xml', null, true);

                // //  if $_POST["title"] NOT empty 
                // if (!empty($_POST["title"])) {
                //     $hasnewproduct = 0;

                //     // Check from XML if data ( title || description ) already exists, $hasnewproduct++
                //     foreach ($products_xml->product as $child) {
                //         if ($child->title == $_POST["title"] || $child->description == $_POST["description"]) {
                //             $hasnewproduct++;
                //         }
                //     }

                //     if ($hasnewproduct == 0) {

                //         if (isset($_FILES['fileToUpload'])) {
                //             // file storage directory
                //             $target_dir = "images/";
                //             // file storage path
                //             $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                //             // upload status,
                //             $uploadStatus = true;
                //             //get file type, e.g. jpb, png
                //             $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                //             // Check if image file is a actual image or fake image
                //             if (isset($_POST["submit"])) {
                //                 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                //                 if ($check !== false) {
                //                     $uploadStatus = true;
                //                 } else {
                //                     $uploadStatus = false;
                //                 }
                //             }
                //             if (file_exists($target_file)) {
                //                 $uploadStatus = false;
                //             }
                //             if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                //                 $uploadStatus = false;
                //             }
                //             if ($uploadStatus) {
                //                 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                //                 $img = '"' . $target_file . '"';
                //                 $newproduct = $products_xml->addChild('product');

                //                 $pid = -1;
                //                 foreach ($products_xml->product as $child) {
                //                     $pid++;
                //                 }
                //                 $newproduct->addChild('pid', $pid);

                //                 $newproduct->addChild('title', $_POST["title"]);
                //                 $newproduct->addChild('description', $_POST["description"]);
                //                 $newproduct->addChild('price', $_POST["price"]);
                //                 $newproduct->addChild('img', $img);
                //                 $products_xml->saveXML('products_list.xml');
                //             }
                //         }
                //     }
                // }

                // // Print out every Elemets with correct data
                // $id = -1;
                // foreach ($products_xml->product as $child) {
                //     $pid = $child->pid;
                //     $title = $child->title;
                //     $description = $child->description;
                //     $price = $child->price;
                //     $img = $child->img;

                //     $id++;

                //     echo "<div class='card col-12 col-sm-6 col-md-4 col-lg-3 '>";

                //     echo "<a href='./shopping_detail.php?id=" . $id . "'>";
                //     echo "<img src=" . $img . " class='card-img-top' alt='" . $title . "'>";

                //     echo "<h3 class='sci mb-5'>" . $title . "</h3>";
                //     echo "<h3 class='sci mb-5'>" . $title . "</h3>";

                //     echo "</a>";
                //     echo "</div>";
                // }
                ?>
            </div>
            <!-- ::::::::::::::::::::::::::::::: Php & XML ::::::::::::::::::::::::::::::: -->
            <!-- Replace XML with a database and reorganize the PHP data connection in the final stage -->


            <!-- database SQL -->
            <?PHP

            // Connect database
            require "./login-system/php/dbh.inc.php";

            // Select all product
            $sql = "SELECT * FROM `product`;";

            // Execute sql
            $sql_result = $conn->query($sql);

            // Fetch a result row as a numeric array and as an associative array
            while ($row = mysqli_fetch_array($sql_result)) {
                $id = $row['p_id'];
                $title = $row['p_title'];
                $price  = $row['p_price'];
                $img  = $row['p_img'];
            ?>
                <!-- database SQL -->
            <?php
                // List out all database product
                echo "<div class='card col-12 col-sm-6 col-md-4 col-lg-3 '>";
                echo "<a href='./product_detail.php?id=" . $id . "'>";
                echo "<img src=" . $img . " class='card-img-top' alt='" . $title . "'>";
                echo "<h3 class='sci mb-5'>" . $title .  "</h3>";
                echo "</a>";
                echo "</div>";
            }
            ?>

            <!-- 
            row 
        -->
        </div>
        <!-- container -->
    </div>
    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->
    <div>
        <?php
        require "footer.php";
        ?>
    </div>
    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->




</body>

</html>