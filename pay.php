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

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/image-overlay.css" rel="stylesheet">

    <style>
        .pay_form {
            text-align: center;
        }
    </style>


</head>

<body>

    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->
    <?php
    require "header.php";
    ?>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->



    <!-- <div class="top-bg-content"></div> -->

    <!-- container -->
    <div class="container-fluid">
        <!-- 
            row 
        -->
        <div class="row">



            <?php
            // print_r($_POST);
            $userid = $_SESSION['userid'];
            $t = $_POST["total"];
            // echo $t;
            // echo "<br>";
            ?>



            <!-- PAY form -->
            <div class="col-12 mt-3 pay_form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: rgba(48, 162, 141, 0.17)">

                        <!-- modal-header -->
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <h2 class="fw-bold mb-0" style="font-size: 3rem; text-align:lift; color: rgba(163, 16, 25, 0.86)">Payment</h2>




                        </div>

                        <!-- modal-header -->



                        <!-- modal-body -->
                        <div class="modal-body p-5 pt-0">
                            <form action="./php/pay_process.php" method="post">

                                <!-- // Fullname -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="f" class="form-control rounded-4" id="floatingInput" placeholder="Fullname" required="required">
                                    <label for="floatingInput">Full Name</label>
                                </div>

                                <!-- // Destination -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="o" class="form-control rounded-4" id="floatingInput" placeholder="Destination" required="required">
                                    <label for="floatingInput">Destination</label>
                                </div>

                                <!-- // contact Number -->
                                <div class="form-floating">
                                    <input type="text" name="p" class="form-control rounded-4" id="floatingInput" placeholder="contact Number" required="required">
                                    <label for="floatingInput">Contact Number</label>
                                </div>

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
                                    echo "<h2 class='fw-bold m-3' style='font-size: 2rem; text-align:lift; color: rgba(163, 16, 25, 0.86)'>total HK$ " . $row["total"] . "</h2>";
                                }


                                ?>

                                <div class="row my-3">
                                    <!-- mastercard -->
                                    <div class="col-4 ">
                                        <i class="fa-brands fa-cc-mastercard fa-6x "></i>

                                    </div>

                                    <!-- visa -->
                                    <div class="col-4 ">
                                        <i class="fa-brands fa-cc-visa fa-6x"></i>
                                    </div>

                                    <!-- visa -->
                                    <div class="col-4 ">
                                        <i class="fa-brands fa-cc-apple-pay fa-6x"></i>
                                    </div>
                                </div>

                                <!-- // Credit Card Number -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="cn" class="form-control rounded-4" id="floatingInput" placeholder="Credit Card Number" required="required">
                                    <label for="floatingInput">Credit Card Number</label>
                                </div>

                                <!-- // Efective date -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="ed" class="form-control rounded-4" id="floatingInput" placeholder="Efective date" required="required">
                                    <label for="floatingInput">Efective date</label>
                                </div>

                                <!-- // CVC -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="c" class="form-control rounded-4" id="floatingInput" placeholder="CVC" required="required">
                                    <label for="floatingInput">CVC</label>
                                </div>
                                <?php
                                echo "<button class='w-100 mb-2 btn btn-lg rounded-4 btn-dark nav-color' type='submit' name='t'  value=$t >Confirm</button>";
                                ?>

                            </form>
                        </div>
                        <!-- modal-body -->

                    </div>
                </div>

                <!-- Add Product Overlay -->
            </div>
            <!-- PAY form -->




            <?php
            if (isset($_GET["m"])) {
                echo "<div class=\"msg\">" . $_GET["m"] . "<div>";
            }
            ?>





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