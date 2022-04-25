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

                if(!isset($_GET['pq'])){
                    $_GET['pq'] = 0;
                }

                // Get user ID
                $userid = $_SESSION['userid'];

                // Connect database
                require "./login-system/php/dbh.inc.php";
                $c_t = 0 ;
                $pq = $_GET["pq"];
                if (isset($_GET["pid"])) {
                    $pid = $_GET["pid"];
                
                 // SQL INSERT RECORD         
                 $sql = "SELECT * FROM `product` WHERE `p_id` = $pid;";
                 $sql_result = $conn->query($sql);
                 while ($row = mysqli_fetch_assoc($sql_result)) {
                    $c_t = ($pq * $row["p_price"]); 
                 }


                // SQL INSERT RECORD         
                $sql = "INSERT INTO `cart_list` (`usersId`, `c_Id`, `c_state`, `p_id`, `c_quantity`, `c_total`) VALUES ($userid , NULL, 'inCart', $pid, $pq, $c_t);";

                // Execute sql
                $sql_result = $conn->query($sql);
                $last_id = $conn->insert_id;

                }
                ?>

                <!-- Bootstrap Carousel  -->
                <!-- Optimizing bootstrap carousel with PHP array will manage Carousel item quantity more efficiently. -->
                <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="padding-right: 0;padding-left:0;">

                    <div class="carousel-inner">
                        <!--  Carousel item start ( Class = "active" )  -->
                        <div class="carousel-item active">
                            <img src="https://i.imgur.com/3Ixj102.jpg" class="d-block w-100">
                            <div class="carousel_container ">
                                <h1>READY-TO-WEAR</h1>
                                <p>2022</p>
                            </div>
                        </div>
                        <?php
                        // Carousel item array 
                        $carousel_image = array();
                        $carousel_image[0] = "https://i.imgur.com/H86ltAL.jpg";
                        $carousel_image[1] = "https://i.imgur.com/5vVEDkc.jpg";
                        $arrlength = count($carousel_image);

                        for ($x = 0; $x < $arrlength; $x++) {
                            echo "<div class=\"carousel-item\">";
                            echo "<img src=" . $carousel_image[$x] . "class=\"d-block w-100\">";
                            echo "<div class=\"carousel_container\">
                                <h1>READY-TO-WEAR</h1>
                                <h1>2022</h1></div>";
                            echo  "</div>";
                        }
                        ?>

                    </div>
                </div>


                <div class="position-relative overflow-hidden p-3  m-md-1 text-center">

                    <div class="col-md-5 p-lg-5 mx-auto my-5">
                        <h1 class="display-4 fw-normal">Shopping Bag</h1>
                        <p class="lead fw-normal">
                            <?php

                            // Connect database
                            require "./login-system/php/dbh.inc.php";


                            // SQL INSERT RECORD  
                            $sql = "SELECT SUM(`cart_list`.`c_total`) AS total FROM `cart_list`,`product`, `users`

                            WHERE `product`.`p_id` = `cart_list`.`p_id`
                            
                            AND `users`.`usersId` = `cart_list`.`usersId`
                            
                            AND `users`.`usersId` = $userid AND `cart_list`.`c_state` = 'inCart';";
                            // Execute sql
                            $sql_result = $conn->query($sql);

                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                if ($row["total"]  == 0) {
                                    echo "<div><h2 class='fw-bold mb-0 ' style=' font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>Empty</h2></div>";
                                } else {
                                    echo "<div><h2 class='fw-bold mb-0 ' style=' font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>total HK$ " . $row["total"] . "</h2></div>";
                                }

                                $t =  $row["total"];
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
                                    <th>Cart Item</th>
                                    <th>Brand</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
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
                                $sql = "SELECT * FROM `cart_list`,`product`, `users`

                                WHERE `product`.`p_id` = `cart_list`.`p_id`
                                
                                AND `users`.`usersId` = `cart_list`.`usersId`
                                
                                AND `users`.`usersId` = $userid  AND `cart_list`.`c_state` = 'inCart';";
                                // Execute sql
                                $sql_result = $conn->query($sql);
                                while ($row = mysqli_fetch_array($sql_result)) {
                                    $sl++;
                                    $cid = $row['c_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $row['p_title']; ?></td>
                                        <td><?php echo $row['p_brand']; ?></td>
                                        <td><?php echo $row['p_size']; ?></td>
                                        <td><?php echo $row['c_quantity']; ?></td>
                                        <td><?php echo "$" . $row['c_total']; ?></td>

                                        <?php

                                        echo "<td style=\"text-align:center;\"><a href=\"./php/remove_process.php?cid=$cid\"><img src=\"./images/icon-delete.png\"/></a></td>";

                                        ?>

                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>


                        <?php
                        // shopping bag layout : R

                        echo "<form action=\"pay.php\" method=\"POST\">";

                        // Connect database
                        require "./login-system/php/dbh.inc.php";


                        // SQL INSERT RECORD  
                        $sql = "SELECT SUM(`cart_list`.`c_total`) AS total FROM `cart_list`,`product`, `users`

WHERE `product`.`p_id` = `cart_list`.`p_id`

AND `users`.`usersId` = `cart_list`.`usersId`

AND `users`.`usersId` = $userid AND `cart_list`.`c_state` = 'inCart';";
                        // Execute sql
                        $sql_result = $conn->query($sql);



                        while ($row = mysqli_fetch_assoc($sql_result)) {
                            if ($row["total"]  == 0) {
                                echo "<div><h2 class='fw-bold mb-0 ' style='text-align:right;  font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>total HK$ 0</h2></div>";
                            } else {
                                echo "<div><h2 class='fw-bold mb-0 ' style='text-align:right;  font-size: 3rem; color: rgba(163, 16, 25, 0.86)'>total HK$ " . $row["total"] . "</h2></div>";
                            }


                            $t =  $row["total"];
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