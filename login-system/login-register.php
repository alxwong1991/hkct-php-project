<?php
// sign-up
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<script>alert('Fill in all fields')</script>";
    } else if ($_GET["error"] == "invaliduid") {
        echo "<script>alert('Choose a proper username')</script>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<script>alert('Choose a proper email')</script>";
    } else if ($_GET["error"] == "passworddontmatch") {
        echo "<script>alert('Password dont match')</script>";
    } else if ($_GET["error"] == "stmtfailed") {
        echo "<script>alert(Something went wrong')</script>";
    } else if ($_GET["error"] == "usernametaken") {
        echo "<script>alert('Username already taken!')</script>";
    } else if ($_GET["error"] == "none") {
        echo "<script>alert('You have sign up!')</script>";
    }
     else if ($_GET["error"] == "acessdeny") {
        echo "<script>alert('Your access has been denial! Contact our staff to progress!')</script>";
    }
}

// sign-in
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<script>alert('Fill in all fields')</script>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<script>alert('Incorrect login message')</script>";
    } else if ($_GET["error"] == "wrongPassword") {
        echo "<script>alert('Incorrect username or password')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/login-register.css" />
    <title>Animated login signup</title>
</head>

<body>


    <!-- header -->
    <?php
    require './header.php'
    ?>


    <div id="container" class="container">
        <!-- form section -->
        <div class="row">
            <!-- sign up -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <form action="./php/signup.inc.php" class="form sign-up" method="POST">
                        <div class="input-group">
                            <i class="bx bxs-user"></i>
                            <input type="text" placeholder="Full Name" name="name" />
                        </div>
                        <div class="input-group">
                            <i class="bx bx-mail-send"></i>
                            <input type="email" placeholder="Email" name="email" />
                        </div>
                        <div class="input-group">
                            <i class="bx bxs-user"></i>
                            <input type="text" placeholder="Username" name="uid" />
                        </div>
                        <div class="input-group">
                            <i class="bx bxs-lock-alt"></i>
                            <input type="password" placeholder="Password" name="pwd" />
                        </div>
                        <div class="input-group">
                            <i class="bx bxs-lock-alt"></i>
                            <input type="password" placeholder="Repeat Password" name="pwdrepeat" />
                        </div>

                        <button type="submit" name="submit">Sign up</button>
                        <p>
                            <span> Already have an account? </span>
                            <b onclick="toggle()" class="pointer"> Sign in here </b>
                        </p>
                    </form>
                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-up">
                        <div class="align-items-center facebook-bg">
                            <i class="bx bxl-facebook"></i>
                        </div>
                        <div class="align-items-center google-bg">
                            <i class="bx bxl-google"></i>
                        </div>
                        <div class="align-items-center twitter-bg">
                            <i class="bx bxl-twitter"></i>
                        </div>
                        <div class="align-items-center insta-bg">
                            <i class="bx bxl-instagram-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end sign up -->
            <!-- sign-in -->
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <form action="./php/login.inc.php" class="form sign-in" method="POST">
                        <div class="input-group">
                            <i class="bx bxs-user"></i>
                            <input type="text" name="uid" placeholder="Username/Email" />
                        </div>
                        <div class="input-group">
                            <i class="bx bxs-lock-alt"></i>
                            <input type="password" name="pwd" placeholder="Password" />
                        </div>
                        <button type="submit" name="submit">Sign in</button>
                        <p>
                            <span> Don't have an account? </span>
                            <b onclick="toggle()" class="pointer"> Sign up here </b>
                        </p>
                    </form>
                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-in">
                        <div class="align-items-center facebook-bg">
                            <i class="bx bxl-facebook"></i>
                        </div>
                        <div class="align-items-center google-bg">
                            <i class="bx bxl-google"></i>
                        </div>
                        <div class="align-items-center twitter-bg">
                            <i class="bx bxl-twitter"></i>
                        </div>
                        <div class="align-items-center insta-bg">
                            <i class="bx bxl-instagram-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end sign in -->
        </div>
        <!-- end form section -->
        <!-- content section -->
        <div class="row content-row">
            <!-- sign in content -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>Welcome back</h2>
                    <p>Let's get back you in</p>
                </div>
                <!-- <div class="img sign-in">
            <img src="./assets/undraw_different_love_a3rg.svg" alt="welcome" />
          </div> -->
            </div>
            <!-- end sign in content -->
            <!-- sign up content -->
            <div class="col align-items-center flex-col">
                <!-- <div class="img sign-up">
            <img src="./assets/undraw_creative_team_r90h.svg" alt="welcome" />
          </div> -->
                <div class="text sign-up">
                    <h2>Join with us</h2>
                    <p>Don't worry it will take few steps</p>
                </div>
            </div>
            <!-- end sign up content -->
        </div>
        <!-- end content section -->
    </div>

    <script src="./js/login-register.js"></script>

</body>

</html>