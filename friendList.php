<?php
require './login-system/php/init.inc.php';
if (isset($_SESSION['userid']) && isset($_SESSION['useremail'])) {
    $user_data = $user_obj->find_user_by_id($_SESSION['userid']);
    if ($user_data ===  false) {
        header('Location:login-system/profile/profile.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    $all_users = $user_obj->all_users($_SESSION['userid']);
} else {
    header('Location:profile.php?error=m1');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search friends and trends</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Alata|Josefin+Sans|Maven+Pro&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/friendList.css">
</head>

<?php
require './header.php'
?>

<body class="bg-color">
    <div id="portfolio" class="text-center paddsection">
        <div class="section-title text-center">
            <h2 class="text-style">Search someone?</h2>
            <br />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <input id="filter-input" type="text" placeholder="Search..." class="form-control" /><br /><br />

                    <div class="portfolio-container" id="card">
                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/6.jpg" style="width: 100%" />
                                <h4 class="text-style"><b>Harley Davidson</b></h4>
                                <p class="text-style">Bikes</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail all">
                            <div class="card" id="card">
                                <img src="images/1.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>BMW</b></h4>
                                <p class="text-style">M5 CS cars</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/17.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Bell & Ross</b></h4>
                                <p class="text-style">Watches</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/15.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Catier</b></h4>
                                <p class="text-style">Watches</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/8.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Harley Davidson</b></h4>
                                <p class="text-style">Bikes</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/3.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Bogati</b></h4>
                                <p class="text-style">Cars</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/7.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Harley Davidson</b></h4>
                                <p class="text-style">Bikes</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/14.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Panerai</b></h4>
                                <p class="text-style">Watches</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/2.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Lamborghini</b></h4>
                                <p class="text-style">Cars</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/13.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Rolex</b></h4>
                                <p class="text-style">Watches</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/9.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Harley Davidson</b></h4>
                                <p class="text-style">Bikes</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/4.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>BMW</b></h4>
                                <p class="text-style">Cars</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/16.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Blancpain</b></h4>
                                <p class="text-style">Watches</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/10.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Harley Davidson</b></h4>
                                <p class="text-style">Bikes</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="images/11.jpg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Harley Davidson</b></h4>
                                <p class="text-style">Bikes</p>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="./images/banner-1.jpeg" alt="Avatar" style="width: 100%" />
                                <img class="profile-image" src="./images/profile-1.jpeg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Divya Michel</b></h4>
                                <!-- <p class="text-style">UX/UI Designer</p> -->
                                <button type="button" class="btn btn-primary">
                                    Add
                                </button>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="./images/banner-2.jpeg" alt="Avatar" style="width: 100%" />
                                <img class="profile-image" src="./images/profile-2.jpeg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Kevin Mark</b></h4>
                                <!-- <p class="text-style">Systems Analyst</p> -->
                                <button type="button" class="btn">
                                    Add
                                </button>
                                <a href="./friendProfile.php">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>

                        <div class="col-md-4 portfolio-thumbnail">
                            <div class="card" id="card">
                                <img src="./images/banner-3.jpeg" alt="Avatar" style="width: 100%" />
                                <img class="profile-image" src="./images/profile-3.jpeg" alt="Avatar" style="width: 100%" />
                                <h4 class="text-style"><b>Elena Smith</b></h4>
                                <!-- <p class="text-style">Web Developer</p> -->
                                <button type="button" class="btn">
                                    Add
                                </button>
                                <a href="#">
                                    <button type="button" class="btn">
                                        View
                                    </button></a>
                            </div>
                        </div>
                        <?php
                        if ($all_users) {
                            foreach ($all_users as $row) {
                                echo '
                                    <div class="col-md-4 portfolio-thumbnail">
                                    <div class="card" id="card">
                                        <img src="./images/banner-3.jpeg" alt="Avatar" style="width: 100%" />
                                        <img class="profile-image" src="./login-system/profile/upload/profile' . $row->usersId . '.jpg" alt="Avatar" />
                                        <h4 class="text-style"><b>' . $row->usersId . '</b></h4>
                                        <h4 class="text-style"><b>' . $row->usersName . '</b></h4>
                                        <!-- <p class="text-style">Web Developer</p> -->
                                        <button type="button" class="btn">
                                            Add
                                        </button>
                                        <a href="#">
                                            <button type="button" class="btn">
                                                View
                                            </button></a>
                                    </div>
                                    </div>
                                    ';
                            }
                        } else {
                            echo '<h4>There is no user!</h4>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a992564317.js" crossorigin="anonymous"></script>
    <script src="./js/friendList.js"></script>
</body>

</html>