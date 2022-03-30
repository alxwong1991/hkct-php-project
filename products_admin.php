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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="css/footer.css" rel="stylesheet">
    <link href="css/image-overlay.css" rel="stylesheet">

    <!-- temp-content -->
    <link href="css/temp-content.css" rel="stylesheet">

    <script src="./js/add-product-btn.js"></script>



    <style>
    /* carousel */
    .carousel-item {

        height: 19rem;
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

    /*  custom internal Responsive */
    @media (min-width: 1024px) {



        #setlayout {
            margin-top: 3rem;
        }




    }

    @media (min-width: 1440px) {



        #setlayout {
            margin-top: 10rem;
        }




    }


    @media (min-width: 2550px) {



        #setlayout {
            margin-top: 25rem;
        }




    }

    .p-card-body {

        width: 100%;
        font-size: 20px;
        padding: 20px;

    }

    .overlay-image {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        background-position: center;
        background-size: cover;
        opacity: 0.5;
    }

    #overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 2;
        cursor: default;

    }

    #overlay2 {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 2;
        cursor: default;

    }

    .image-file-upload {
        border: 1px solid black;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        margin: 8px;
    }

    input[type="file"] {
        display: none;
    }

    .form-control {
        font-size: 16px;
        height: 5rem;
        border-radius: 10px;
    }
    </style>

</head>

<body>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->
    <?php
    require './header.php'
    ?>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->



    <!-- <div class="top-bg-content"></div> -->

    <!-- container -->
    <div class="container-fluid">
        <!-- 
            row 
        -->
        <div class="row">

            <!-- Bootstrap Carousel  -->

            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                style="padding-right: 0;padding-left:0;">
                <!-- <div class="carousel-indicators">

                    <ol class="carousel-indicators">
                        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                    </ol>

                </div> -->

                <div class="carousel-inner">

                    <!-- 1 -->
                    <div class="carousel-item active" data-bs-interval="5000">

                        <div class="overlay-image" style="background-image:url(https://imgur.com/KRkLqw6.jpg);"> </div>
                        <div class="carousel_container ">

                            <h1>Administrator settings</h1>



                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="carousel-item" data-bs-interval="5000">

                        <div class="overlay-image" style="background-image:url(https://imgur.com/83plhup.jpg);">
                        </div>
                        <div class="carousel_container">

                            <h1>Administrator settings</h1>

                            <!-- <p><a class="btn btn-lg btn-primary" href="register.html">Sign up today</a></p> -->

                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="carousel-item" data-bs-interval="5000">

                        <div class="overlay-image" style="background-image:url(https://imgur.com/Qu2758t.jpg);">
                        </div>
                        <div class="carousel_container">

                            <h1>Administrator settings</h1>


                            <!-- <p><a class="btn btn-lg btn-primary" href="register.html">Sign up today</a></p> -->

                        </div>
                    </div>



                </div>

                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button> -->

            </div>
            <div class="col-6 d-flex justify-content-center mt-5 mb-5">

            </div>


            <!-- Add Product BTN :  display flex, center -->
            <div class="col-6 d-flex justify-content-end mt-5 mb-5">
                <button class="btn btn-warning m-3" onclick="on()">Add Product</button>

                <button class="btn btn-warning m-3" onclick="dp_on()">Delete Product</button>
            </div>

            <script>
            function dp_on() {
                document.getElementById("overlay2").style.display = "block";
            }
            </script>
            <!-- delete Product BTN :  display flex, center -->



            <!-- Add Product Overlay -->
            <div id="overlay">
                <div class="modal d-block" style="padding-top: 10rem!important;
    padding-bottom: 3rem!important" tabindex="-1" role="dialog">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: rgba(48, 162, 141, 0.17)">

                            <!-- modal-header -->
                            <div class="modal-header p-5 pb-4 border-bottom-0">
                                <h2 class="fw-bold mb-0" style="font-size: 3rem; color: rgba(163, 16, 25, 0.86)">New
                                    Product</h2>
                                <!-- btn : X -->
                                <button onclick="off()" type="button" class="close" aria-label="Close"
                                    style="width:3vh;height:6vh;border:none;background-color:transparent;">
                                    <span aria-hidden="true" style="font-size: 2rem;">×</span>
                                </button>
                                <!-- btn : X -->
                            </div>
                            <!-- modal-header -->

                            <!-- modal-body -->
                            <div class="modal-body p-5 pt-0">
                                <form action="./index.php" method="post" enctype="multipart/form-data">

                                    <!-- // Title -->
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" class="form-control rounded-4"
                                            id="floatingInput" placeholder="name@example.com" required="required">
                                        <label for="floatingInput">Title</label>
                                    </div>

                                    <!-- // Price -->
                                    <div class="form-floating mb-3">
                                        <input type="text" name="price" class="form-control rounded-4"
                                            id="floatingPassword" placeholder="Password" required="required">
                                        <label for="floatingPassword">Price</label>
                                    </div>

                                    <!-- // Description -->
                                    <div class="form-floating mb-3">
                                        <input type="text" name="description" class="form-control rounded-4"
                                            id="floatingPassword" placeholder="Password" required="required">
                                        <label for="floatingPassword">Description</label>
                                    </div>

                                    <!-- // Image  -->
                                    <label for="fileToUpload" class="w-100 mb-2 btn btn-lg rounded-4 btn-dark nav-color"
                                        style=" border: 1px solid black;">
                                        Image
                                    </label>
                                    <input type="file" name="fileToUpload" id="fileToUpload">

                                    <!-- // Add Product  -->
                                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-dark nav-color" type="submit"
                                        name="submit">Add Product</button>

                                </form>
                            </div>
                            <!-- modal-body -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Product Overlay -->

            <!-- delete Product Overlay -->
            <div id="overlay2">
                <div class="modal d-block" style="padding-top: 10rem!important;
    padding-bottom: 3rem!important" tabindex="-1" role="dialog">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: rgba(48, 162, 141, 0.17)">

                            <!-- modal-header -->
                            <div class="modal-header p-5 pb-4 border-bottom-0">
                                <h2 class="fw-bold mb-0" style="font-size: 3rem; color: rgba(163, 16, 25, 0.86)">Delete
                                    Product</h2>
                                <!-- btn : X -->
                                <button onclick="dp_off()" type="button" class="close" aria-label="Close"
                                    style="width:3vh;height:6vh;border:none;background-color:transparent;">
                                    <span aria-hidden="true" style="font-size: 2rem;">×</span>
                                </button>

                                <script>
                                function dp_off() {
                                    document.getElementById("overlay2").style.display = "none";
                                }
                                </script>
                                <!-- btn : X -->
                            </div>
                            <!-- modal-header -->

                            <!-- modal-body -->
                            <div class="modal-body p-5 pt-0">
                                <form action="products_admin.php" method="post" enctype="multipart/form-data">



                                    <!-- // ID -->
                                    <div class="form-floating mb-3">
                                        <input type="text" name="p_id" class="form-control rounded-4" id="floatingInput"
                                            required="required">
                                        <label for="floatingInput">Product ID</label>
                                    </div>


                                    <!-- // delete Product  -->
                                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-dark nav-color" type="submit"
                                        name="delete">Delete Product</button>

                                </form>
                            </div>
                            <!-- modal-body -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- delete Product Overlay -->



            <!-- ::::::::::::::::::::::::::::::: Php XML ::::::::::::::::::::::::::::::: -->

            <?PHP


            $_SESSION["new_product"] = 0;
            $products_xml = simplexml_load_file('products_list.xml', null, true);


            //   Add Product
            //  if $_POST["title"] NOT empty 
            if (!empty($_POST["title"])) {
                $hasnewproduct = 0;



                // Check from XML if data ( title || description ) already exists, $hasnewproduct++
                foreach ($products_xml->product as $child) {
                    if ($child->title == $_POST["title"] || $child->description == $_POST["description"]) {
                        $hasnewproduct++;
                    }
                }

                if ($hasnewproduct == 0) {

                    if (isset($_FILES['fileToUpload'])) {
                        // file storage directory
                        $target_dir = "images/";
                        // file storage path
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        // upload status,
                        $uploadStatus = true;
                        //get file type, e.g. jpb, png
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        // Check if image file is a actual image or fake image
                        if (isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if ($check !== false) {
                                $uploadStatus = true;
                            } else {
                                $uploadStatus = false;
                            }
                        }
                        if (file_exists($target_file)) {
                            $uploadStatus = false;
                        }
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            $uploadStatus = false;
                        }
                        if ($uploadStatus) {
                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                            $img = '"' . $target_file . '"';
                            $newproduct = $products_xml->addChild('product');

                            $pid = -1;
                            foreach ($products_xml->product as $child) {
                                $pid++;
                            }
                            $newproduct->addChild('pid', $pid);

                            $newproduct->addChild('title', $_POST["title"]);
                            $newproduct->addChild('description', $_POST["description"]);
                            $newproduct->addChild('price', $_POST["price"]);
                            $newproduct->addChild('img', $img);
                            $products_xml->saveXML('products_list.xml');
                        }
                    }
                }
            }

            //  delete Product 
            if (isset($_POST["p_id"])) {

                //     $products_xml = simplexml_load_string('products_list.xml');

                //     foreach ($$products_xml->product as $child) {
                //         if ($child->pid == $_POST["p_id"]) {
                //             $dom = dom_import_simplexml($child);
                //             $dom->parentNode->removeChild($dom);
                //         }
                //     }

                //     echo $products_xml->asXml();
                // }

                // if (!empty($_POST["p_id"])) {


                $a = 0;
                foreach ($products_xml->product as $child) {

                    if ($child->pid == $_POST["p_id"]) {
                        $dom = dom_import_simplexml($child);
                        $dom->parentNode->removeChild($dom);
                        $b = $products_xml->count();
                        // echo $b;
                        for ($i = $_POST["p_id"]; $i < ($b + 1); $i++) {
                            // echo " $i ";
                            foreach ($products_xml->product as $child) {
                                if ($child->pid == $i) {
                                    $child->pid = ($child->pid - 1);
                                }
                            }
                        }
                    }
                    $a++;
                }

                $products_xml->saveXML('products_list.xml');
            }
            //  delete Product 






            // <!-- ::::::::::::::::::::::::::::::: Php XML ::::::::::::::::::::::::::::::: -->

            // Print out every Elemets with correct data
            foreach ($products_xml->product as $child) {
                $pid = $child->pid;
                $title = $child->title;
                $description = $child->description;
                $price = $child->price;
                $img = $child->img;



                echo "<div class='card mb-3'>";
                echo "<div class='row g-0 '>";
                echo "<div class='col-md-4 '>";


                echo "<img src=" . $img . " class='card-img-top' alt='" . $title . "' >";

                echo "</div>";

                echo "<div class='col-md-8 ' id='setlayout'>";
                echo "<div class='p-card-body'>";


                echo "<h1 class='card-text' style='color : red ;margin-left : 2rem'>Product ID : " . $pid . "<h1>";

                echo "<h1 class='card-text mt-5' style='margin-left : 2rem; font-size : 30px'>" . $title . "<h1>";
                echo "<p class='card-text'  style='margin-left : 2rem; font-size : 25px'>HKD $ " . $price  . "</p>";
                echo "<p class='card-text'  style='margin-left : 2rem; font-size : 20px'>" . $description . "</p>";


                echo "</div>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
            }
            ?>

            <!-- products items -->
            <!-- <div>
                <div class="card col-12 col-sm-6 col-md-4 col-lg-3 mt-3 mb-3">
                    <a href="./index.php">
                        <img src="standard-retina" srcset="//media.gucci.com/style/White_South_0_160_540x540/1632744904/623244_XJD3Z_9242_002_100_0000_Light-.jpg" class="card-img-top" alt="fish 1">
                        <div class="card-body">
                            <p class="card-text">Fish 1</p>
                        </div>
                    </a>
                </div>
            </div> -->
            <!-- products items -->



        </div>
        <!-- 
            row 
        -->
    </div>
    <!-- container -->

    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->
    <div>
        <?php
        require "footer.php";
        ?>
    </div>
    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->




</body>

</html>