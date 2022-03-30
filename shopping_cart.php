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


    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">

    <style>
        /* carousel */
        .carousel-item {

            height: 15rem;
            background: #000;
            color: white;
            position: relative;

        }

        .carousel-item2 {

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

    <!-- container -->
    <div class="container-fluid">
        <!--  row -->
        <div class="row">



            <!-- ////// TEMP CONTENT -->
            <div class="temp-content">


                <?php



                $userid = $_SESSION['userid'];




                // Connect database
                require "./login-system/php/dbh.inc.php";
                // Table name
                $tbname = "cart_list";

                // Collect form data after submitting ( in shopping_datail.php ) form with method="post"
                $id = -1;

                //  Interprets an XML file into ( an object ) 
                $products_xml = simplexml_load_file('products_list.xml');


                if (isset($_POST["pid"])) {
                    $id = $_POST["pid"];
                }


                // Get XML content according to pid
                // SQL INSERT RECORD
                foreach ($products_xml->product as $child) {
                    if ($id == $child->pid) {
                        $pid = $child->pid;
                        $title = $child->title;
                        $description = $child->description;
                        $price = $child->price;
                        $img = $child->img;
                        $id++;
                        $id = $child->id;

                        // echo "<div class='col-12 col-sm-12 col-md-7 '>";
                        // echo "<img src=" . $img . " class='card-img-top ' alt='" . $title . "'>";
                        // echo "</div>";

                        // // modal-header
                        // echo "<div class='modal-header p-5 pb-4 border-bottom-0'>";
                        // // $title
                        // echo "<div><h2 class='fw-bold mb-0' style='font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>$title</h2></div>";
                        // echo '</div>';

                        // // modal-body
                        // echo "<div class='modal-body p-5 pt-0'>";
                        // // $price
                        // echo "<h5 class='fw-bold mb-4' style=' color: rgba(163, 16, 25, 0.86)'>HK$ " . $price . "</h2>";
                        // // $description
                        // echo "<h6 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>$description</h6>";
                        // // AVAILABLE
                        // echo "<h8 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>AVAILABLE</h6>";
                        // echo "</br>";
                        // echo "<h8 class='fw-bold mb-0' style='color: rgba(163, 16, 25, 0.86)'>Your selection is available for immediate purchase online</h6>";
                        // echo "</div>";



                        // SQL INSERT RECORD         
                        $sql = "INSERT INTO `cart_list` (`usersId`, `cart_Item_Id`, `cart_Item`, `price`,  `state`) VALUES ('$userid', NULL, '$title', '$price', 'inCart');";

                        // Execute sql
                        $sql_result = $conn->query($sql);
                        $last_id = $conn->insert_id;

                        // // Result
                        // if ($sql_result === TRUE) {
                        //     echo "Record insertion successful!!<br>";
                        //     echo "The last id is " . $last_id . "<br>";
                        // } else {
                        //     echo "Record insert failure !!<br>";
                        // }
                    }
                }

                ?>

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




                <div class="position-relative overflow-hidden p-3  m-md-1 text-center">

                    <div class="col-md-5 p-lg-5 mx-auto my-5">
                        <h1 class="display-4 fw-normal">Shopping cart</h1>
                        <p class="lead fw-normal">
                            <?php

                            // Connect database
                            require "./login-system/php/dbh.inc.php";
                            // Table name
                            $tbname = "cart_list";

                            // SQL INSERT RECORD  
                            $sql = "select SUM(price) AS total from $tbname WHERE usersId = '$userid' AND state = 'inCart';";
                            // Execute sql
                            $sql_result = $conn->query($sql);

                        

                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                if ( $row["total"]  == 0) {
                                    echo "<div><h2 class='fw-bold mb-0 ' style=' font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>Empty</h2></div>";
                                } else {
                                    echo "<div><h2 class='fw-bold mb-0 ' style=' font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>total HK$ " . $row["total"] . "</h2></div>";
                                }
                            }


                            ?></p>
                        <a class="btn btn-outline-secondary" href="index.php">CONTINUE SHOPPING</a>
                    </div>

                </div>


                <br>

                <!-- shopping cart List -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Cart Item ID</th>
                                    <th>Cart Item </th>
                                    <th>Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php

                                $t = 0;

                                // Connect database
                                require "./login-system/php/dbh.inc.php";
                                // Table name
                                $tbname = "cart_list";

                                $sl = 0;

                                // SQL SELECT RECORD  
                                $sql = "select * from $tbname WHERE usersId = '$userid' AND state = 'inCart';";
                                // Execute sql
                                $sql_result = $conn->query($sql);
                                while ($row = mysqli_fetch_array($sql_result)) {
                                    $sl++;
                                ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $row['cart_Item_Id']; ?></td>
                                        <td><?php echo $row['cart_Item']; ?></td>
                                        <td><?php echo "$" . $row['price']; ?></td>

                                        <?php

                                        $cid = $row['cart_Item_Id'];


                                        echo "<td style=\"text-align:center;\"><a href=\"./php/remove_process.php?cid=$cid\"><img src=\"./images/icon-delete.png\"/></a></td>";


                                        $t += $row["price"];
                                        ?>


                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>


                        <?php
                        // shopping bag layout : R

                        echo "<form action=\"pay.php\" method=\"POST\">";

                        // $price
                        // SQL SELECT RECORD  
                        $sql = "select SUM(price) AS total from $tbname WHERE usersId = '$userid' AND state = 'inCart';";
                        // Execute sql
                        $sql_result = $conn->query($sql);

                        while ($row = mysqli_fetch_assoc($sql_result)) {
                            if ( $row["total"]  == 0) {
                                echo "<div><h2 class='fw-bold mb-0 ' style='text-align:right;  font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>total HK$ 0</h2></div>";
                            } else {
                                echo "<div><h2 class='fw-bold mb-0 ' style='text-align:right;  font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>total HK$ " . $row["total"] . "</h2></div>";
                            }
                        }

                        // CHECK OUT BTN
                        echo "<button class='w-100 mb-2 mt-2 btn btn-lg rounded-4 btn-dark nav-color' type='submit' name='total' value=$t >CHECK OUT</button>";

                        echo "<form>";


                        ?>

                    </div>
                </div>





            </div>
            <!-- ////// TEMP CONTENT -->

        </div>
        <!-- row -->
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