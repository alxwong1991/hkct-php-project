<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Owl -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/temp-content.css" rel="stylesheet">

    <style>
        /* carousel */
        .carousel-item {

            height: 15rem;
            background: #000;
            color: white;
            position: relative;

        }

        .carousel_container {
            margin: 1rem;
            position: absolute;
            bottom: 0;
            right: 0;



        }

        /* (Laptop mode) custom internal Responsive */
        @media (min-width: 1048px) {



            #setlayout {
                margin-top: 20rem;
            }




        }

        .mid-bg-content {
            margin-top: 5rem;
            margin-bottom: 5rem;
            height: 20rem;
            background-color: rgba(92, 194, 138, 0.863);
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

            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel" style="padding-right: 0;padding-left:0;">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="https://i.imgur.com/3Ixj102.jpg" class="d-block w-100" alt="...">
                        <div class="carousel_container ">

                            <h1>READY-TO-WEAR</h1>
                            <p>2022
                            </p>


                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://i.imgur.com/HOov1tX.jpg" class="d-block w-100" alt="...">
                        <div class="carousel_container ">

                            <h1>READY-TO-WEAR</h1>
                            <p>2022
                            </p>


                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://i.imgur.com/vrZiYK2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel_container ">

                            <h1>READY-TO-WEAR</h1>
                            <p>2022
                            </p>


                        </div>
                    </div>
                </div>
            </div>







            <!-- load xml -->

            <?PHP
            $id = -1;
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            $products_xml = simplexml_load_file('products_list.xml');

            if (!isset($_SESSION['userid'])) {
                foreach ($products_xml->product as $child) {
                    if ($id == $child->pid) {
                        $pid = $child->pid;
                        $title = $child->title;
                        $description = $child->description;
                        $price = $child->price;
                        $img = $child->img;
                        $id++;
                        $id = $child->id;

                        // shopping bag layout : L
                        echo "<div class='col-12 col-sm-12 col-md-7 '>";
                        echo "<img src=" . $img . " class='card-img-top ' alt='" . $title . "'>";
                        echo "</div>";

                         // shopping bag layout : R
                         echo "<div class='col-12 col-sm-12 col-md-5' id='setlayout'>";
                         
                         // modal-header
                         echo "<div class='modal-header p-5 pb-4 border-bottom-0'>";
                         // $title
                         echo "<div><h2 class='fw-bold mb-0' style='font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>$title</h2></div>";
                         echo '</div>';
 
                         // modal-body
                         echo "<div class='modal-body p-5 pt-0'>";
                         // $price
                         echo "<h5 class='fw-bold mb-4' style=' color: rgba(163, 16, 25, 0.86)'>HK$ " . $price . "</h2>";
                         // $description
                         echo "<h6 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>$description</h6>";
                         // AVAILABLE
                         echo "<h8 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>AVAILABLE</h6>";
                         echo "</br>";
                         echo "<h8 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>Your selection is available for immediate purchase online</h6>";

                         // Add bag BTN

                         echo "<a class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-dark nav-color'  href='./login-system/login-register.php'>Please login to purchase</a>";
                     
                     echo "</div>";
         
                     echo "</div>";

                        
                    }
                }
            } else {

                foreach ($products_xml->product as $child) {
                    if ($id == $child->pid) {
                        $pid = $child->pid;
                        $title = $child->title;
                        $description = $child->description;
                        $price = $child->price;
                        $img = $child->img;
                        $id++;
                        $id = $child->id;

                        // shopping bag layout : L
                        echo "<div class='col-12 col-sm-12 col-md-7 '>";
                        echo "<img src=" . $img . " class='card-img-top ' alt='" . $title . "'>";
                        echo "</div>";


                        // shopping bag layout : R
                        echo "<div class='col-12 col-sm-12 col-md-5' id='setlayout'>";
                        echo "<form action=\"shopping_cart.php\" method=\"POST\">";
                        // modal-header
                        echo "<div class='modal-header p-5 pb-4 border-bottom-0'>";
                        // $title
                        echo "<div><h2 class='fw-bold mb-0' style='font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>$title</h2></div>";
                        echo '</div>';

                        // modal-body
                        echo "<div class='modal-body p-5 pt-0'>";
                        // $price
                        echo "<h5 class='fw-bold mb-4' style=' color: rgba(163, 16, 25, 0.86)'>HK$ " . $price . "</h2>";
                        // $description
                        echo "<h6 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>$description</h6>";
                        // AVAILABLE
                        echo "<h8 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>AVAILABLE</h6>";
                        echo "</br>";
                        echo "<h8 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>Your selection is available for immediate purchase online</h6>";









                        // Add bag BTN
                        echo "<button class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-dark nav-color' type='submit' name='pid' value=$pid >ADD TO SHOPPING BAG</button>";
                    
                    echo "</div>";
                    echo "<form>";
                    echo "</div>";
                    }
                }
            }
            ?>

        </div>
        <!-- 
            row 
        -->
    </div>
    <!-- container -->

    <!-- shopping bag layout  -->
    <!-- <div class="row container-fluid">

  
        <div class="col-12 col-sm-12 col-md-8 " style="background-color: rgba(36, 76, 42, 0.65); margin-top: 5rem; margin-bottom: 5rem; height: 50rem;">
        </div>

       
        <div class="col-12 col-sm-12 col-md-4" style="background-color: rgba(189, 34, 37, 0.75); margin-top: 5rem; margin-bottom: 5rem; height: 50rem;">
        </div>

    </div> -->
    <!-- shopping bag layout  -->


    <div class="d-flex justify-content-center">
        <h1>You May Also Like</h1>
    </div>

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl1 owl-theme">

                    <?php


                    $id = -1;

                    foreach ($products_xml->product as $child) {
                        $pid = $child->pid;
                        $title = $child->title;
                        $description = $child->description;
                        $price = $child->price;
                        $img = $child->img;

                        $id++;

                        echo "<div class=\"item mb-4\" style=\"margin :2rem\">";
                        echo "<a href='./shopping_detail.php?id=" . $id . "'>";
                        echo "<img src=" . $img . " class='card-img-top' alt='' class='card-img'>";
                        echo "</a>";
                        echo "</div>";
                    }


                    ?>






                </div>
            </div>
        </div>
    </div>


    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->
    <div>

        <?php
        require "footer.php";
        ?>
    </div>
    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script>
    $('.owl-carousel.owl1').owlCarousel({
        loop: true,
        dots: false,
        rtl: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    })
</script>

</html>