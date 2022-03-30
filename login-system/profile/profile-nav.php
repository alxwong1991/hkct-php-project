<header>
    <div class="logo">
        <h1>Logo</h1>
    </div>
    <div class="bars">
        <span><i class="fa fa-bars"></i></span>
    </div>
    <div class="nav">
        <ul>
            <a href="../../index.php">
                <li>
                    <h3>Products</h3>
                </li>
            </a>

            <a href="../../shopping_cart.php">
                <li>
                    <h3>Cart</h3>
                </li>
            </a>
            <a href="../php/admin.inc.php">
                <li>
                    <h3>Settings</h3>
                </li>
            </a>
            <a href="../../forum.php">
                <li>
                    <h3>Forum</h3>
                </li>
            </a>
            <a href="../../game/game.php">
                <li>
                    <h3>Game</h3>
                </li>
            </a>
            <a href="../../friendList.php">
                <li>
                    <h3>Friends</h3>
                </li>
            </a>
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a href='./profile.php'><li><h3>Profile</h3></li></a>";
            }
            ?>
        </ul>
    </div>
</header>
<div class="nav-mobile">
    <ul class="list-wrapper">
        <a class="link-styles" href="../../index.php">
            <li class="list-styles">
                <h3 class="nav-titles">Products</h3>
            </li>
        </a>
        <a class="link-styles" href="../../shopping_cart.php">
            <li class="list-styles">
                <h3 class="nav-titles">Cart</h3>
            </li>
        </a>
        <a class="link-styles" href="../php/admin.inc.php">
            <li class="list-styles">
                <h3 class="nav-titles">Settings</h3>
            </li>
        </a>
        <a class="link-styles" href="../../forum.php">
            <li class="list-styles">
                <h3 class="nav-titles">Forum</h3>
            </li>
        </a>
        <a class="link-styles" href="../../game/game.php">
            <li class="list-styles">
                <h3 class="nav-titles">Game</h3>
            </li>
        </a>
        <a class="link-styles" href="../../friendList.php">
            <li class="list-styles">
                <h3 class="nav-titles">Friends</h3>
            </li>
        </a>
        <?php
        if (isset($_SESSION["useruid"])) {
            echo "<a class='link-styles' href='./profile.php'><li class='list-styles'><h3>Profile</h3></li></a>";
        }
        ?>
    </ul>
</div>
<div class="m-bar">
    <span><i class="fa fa-ellipsis-v"></i></span>
</div>