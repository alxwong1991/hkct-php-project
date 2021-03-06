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

            <a href="../../shopping_bag.php">
                <li>
                    <h3>Bag</h3>
                </li>
            </a>
            <!-- <a href="../php/admin.inc.php">
                <li>
                    <h3>Settings</h3>
                </li>
            </a> -->
            <a href="../php/admin.inc.php">
                <li>
                    <h3>Admin</h3>
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
            <a href="../../trend.php">
                <li>
                    <h3>Trend</h3>
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
        <a class="link-styles" href="../../shopping_bag.php">
            <li class="list-styles">
                <h3 class="nav-titles">Bag</h3>
            </li>
        </a>
        <!-- <a class="link-styles" href="../php/admin.inc.php">
            <li class="list-styles">
                <h3 class="nav-titles">Settings</h3>
            </li>
        </a> -->
        <a class="link-styles" href="../php/admin.inc.php">
            <li class="list-styles">
                <h3 class="nav-titles">Admin</h3>
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
        <a class="link-styles" href="../../trend.php">
            <li class="list-styles">
                <h3 class="nav-titles">Trend</h3>
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