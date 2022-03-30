<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include 
"../login-system/php/dbh.inc.php" 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../login-system/css/fontawesome-free-6.0.0-web/css/all.css">
    <link href="./gamestyle.css" rel="stylesheet">
    <link rel="stylesheet" href="./header.css" />
    <header>
        <div class="header-wrapper">
            <div class="logo">
                <h1 class="title-logo">Logo</h1>
            </div>
            <div class="bars">
                <span><i class="fa fa-bars"></i></span>
            </div>
            <div class="nav">
                <ul class="list-wrapper">
                    <a class="link-styles" href="../index.php">
                        <li class="list-styles">
                            <h3 class="nav-titles">Products</h3>
                        </li>
                    </a>
                    <a class="link-styles" href="../shopping_cart.php">
                        <li class="list-styles">
                            <h3 class="nav-titles">Cart</h3>
                        </li>
                    </a>
                    <a class="link-styles" href="../php/admin.inc.php">
                        <li class="list-styles">
                            <h3 class="nav-titles">Settings</h3>
                        </li>
                    </a>
                    <a class="link-styles" href="../forum.php">
                        <li class="list-styles">
                            <h3 class="nav-titles">Forum</h3>
                        </li>
                    </a>
                    <a class="link-styles" href="../friendList.php">
                        <li class="list-styles">
                            <h3 class="nav-titles">Friends</h3>
                        </li>
                    </a>
                    <a class="link-styles" href="./game.php">
                        <li class="list-styles">
                            <h3 class="nav-titles">Game</h3>
                        </li>
                    </a>
                    <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<a class='link-styles' href='../login-system/profile/profile.php'><li class='list-styles'><h3 class='nav-titles'>Profile</h3></li></a>";
                    } else {
                        echo "<a class='link-styles' href='../login-system/login-register.php'><li class='list-styles'><h3 class='nav-titles'>Login</h3></li></a>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <div class="nav-mobile">
        <ul class="list-wrapper">
            <a class="link-styles" href="../index.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Products</h3>
                </li>
            </a>
            <a class="link-styles" href="../shopping_cart.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Cart</h3>
                </li>
            </a>
            <a class="link-styles" href="../login-system/php/admin.inc.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Settings</h3>
                </li>
            </a>
            <a class="link-styles" href="../forum.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Forum</h3>
                </li>
            </a>
            <a class="link-styles" href="../friendList.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Friends</h3>
                </li>
            </a>
            <a class="link-styles" href="./game.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Game</h3>
                </li>
            </a>
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a class='link-styles' href='../login-system/profile/profile.php'><li class='list-styles'><h3 class='nav-titles'>Profile</h3></li></a>";
            } else {
                echo "<a class='link-styles' href='../login-system/login-register.php'><li class='list-styles'><h3 class='nav-titles'>Login</h3></li></a>";
            }
            ?>
        </ul>
    </div>
    <script src="../header.js"></script>