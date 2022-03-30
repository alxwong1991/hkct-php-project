<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="./login-system/css/fontawesome-free-6.0.0-web/css/all.css">
<link rel="stylesheet" href="./header.css" />
<div class="header-wrapper">
    <div class="logo">
        <h1>Logo</h1>
    </div>
    <div class="bars">
        <span><i class="fa fa-bars"></i></span>
    </div>
    <div class="nav">
        <ul class="list-wrapper">
            <a class="link-styles" href="./index.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Products</h3>
                </li>
            </a>
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a class='link-styles' href='./shopping_cart.php'><li class='list-styles'><h3 class='nav-titles'>Cart</h3></li></a>";
            } else {
                echo "<a class='link-styles' href='./login-system/login-register.php'><li class='list-styles'><h3 class='nav-titles'>Cart</h3></li></a>";
            }
            ?>
            <a class="link-styles" href="./login-system/php/admin.inc.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Settings</h3>
                </li>
            </a>
            <a class="link-styles" href="./forum.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Forum</h3>
                </li>
            </a>
            <a class="link-styles" href="./game/game.php">
                <li class="list-styles">
                    <h3 class="nav-titles">Game</h3>
                </li>
            </a>
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a class='link-styles' href='./friendList.php'><li class='list-styles'><h3 class='nav-titles'>Friends</h3></li></a>";
            }
            ?>
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a class='link-styles' href='./login-system/profile/profile.php'><li class='list-styles'><h3 class='nav-titles'>Profile</h3></li></a>";
            } else {
                echo "<a class='link-styles' href='./login-system/login-register.php'><li class='list-styles'><h3 class='nav-titles'>Login</h3></li></a>";
            }
            ?>
        </ul>
    </div>
</div>
<div class="nav-mobile">
    <ul class="list-wrapper">
        <a class="link-styles" href="./index.php">
            <li class="list-styles">
                <h3 class="nav-titles">Products</h3>
            </li>
        </a>
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a class='link-styles' href='./shopping_cart.php'><li class='list-styles'><h3 class='nav-titles'>Cart</h3></li></a>";
            } else {
                echo "<a class='link-styles' href='./login-system/login-register.php'><li class='list-styles'><h3 class='nav-titles'>Cart</h3></li></a>";
            }
        ?>
        <a class="link-styles" href="./login-system/php/admin.inc.php">
            <li class="list-styles">
                <h3 class="nav-titles">Settings</h3>
            </li>
        </a>
        <a class="link-styles" href="./forum.php">
            <li class="list-styles">
                <h3 class="nav-titles">Forum</h3>
            </li>
        </a>
        <a class="link-styles" href="./game/game.php">
            <li class="list-styles">
                <h3 class="nav-titles">Game</h3>
            </li>
        </a>
        <?php
        if (isset($_SESSION["useruid"])) {
            echo "<a class='link-styles' href='./friendList.php'><li class='list-styles'><h3 class='nav-titles'>Friends</h3></li></a>";
            echo "<a class='link-styles' href='./login-system/profile/profile.php'><li class='list-styles'><h3 class='nav-titles'>Profile</h3></li></a>";
        } else {
            echo "<a class='link-styles' href='./login-system/login-register.php'><li class='list-styles'><h3 class='nav-titles'>Login</h3></li></a>";
        }
        ?>
    </ul>
</div>
<script src="./header.js"></script>