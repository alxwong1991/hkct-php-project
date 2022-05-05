<?php
require '../php/init.inc.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
    <link rel="stylesheet" href="../css/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <div class="container">
        <?php
        require './profile-nav.php';
        ?>
        <aside class="sidebar">
            <h1>Sidebar <span class="close"><i class="fa fa-times"></i></span></h1>
            <div class="user-side">
                <div class="user-pic">
                    <!-- <img src="../assets/img/profile.jpg" width="100" alt=""> -->
                    <?php
                    require_once '../php/dbh.inc.php';
                    $iid = $_SESSION["userid"];
                    $sql = "SELECT * FROM users WHERE usersId ='$iid' ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['usersId'];
                            $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
                            $resultImg = mysqli_query($conn, $sqlImg);
                            $rowImg = mysqli_fetch_assoc($resultImg);
                            echo "<div>";
                            // echo "<img width='100' height='100' src='../assets/img/profile.jpg' alt='profile'>";
                            if ($rowImg['zt'] == 0) {
                                //     echo "<div class='profile-img'>
                                // <img width='100' height='auto' class='pofile-img' src='./upload/profile" . $id . ".jpg?'" . mt_rand() . mt_rand() . mt_rand() . ">";
                                echo "<img width='100' height='auto' class='pofile-img' src='./upload/profile" . $id . ".jpg?'" . mt_rand() . mt_rand() . mt_rand() . ">";
                            } else {
                                echo "<img width='100' height='auto' class='pofile-img' src='./upload/pro.jpg'>";
                            }
                            echo "</div>";
                        }
                    } else {
                        echo "There are no users yet";
                    }
                    ?>
                </div>
                <div class="user-info">
                    <span class="name">
                        <?php
                        if (isset($_SESSION["useruid"])) {
                            echo $_SESSION["useruid"];
                        }
                        ?>
                    </span>
                    <span class="mail">
                        <?php
                        if (isset($_SESSION["useruid"])) {
                            echo $_SESSION["useremail"];
                        }
                        ?>
                    </span>
                    <span class="status">Online</span>
                </div>
            </div>
            <a href="../php/logout.inc.php">
                <button class="btn logout-btn">
                    Log Out
                </button>
            </a>


            <div class="search">
                <form>
                    <div class="row">
                        <input type="text" placeholder="Search Profile...">
                        <button type="submit"><span><i class="fa fa-search"></i>
                            </span></button>
                    </div>
                </form>
            </div>
            <div class="side-nav">
                <h2>General</h2>
                <nav>
                    <ul>
                        <li class="active" onclick="show(0)">
                            <span><i class="fa fa-tachometer"></i></span>
                            <h3>Dashboard</h3>
                        </li>
                        <li onclick="show(1)">
                            <span><i class="fa fa-star"></i></span>
                            <h3>Reviews</h3>
                        </li>
                        <li onclick="show(2)">
                            <span><i class="fa fa-comments"></i></span>
                            <h3>Comments</h3>
                        </li>
                        <li onclick="show(3)">
                            <span><i class="fa fa-user-group"></i></span>
                            <h3>Friend List</h3>
                        </li>
                        <li onclick="show(4)">
                            <span><i class="fa fa-user-circle"></i></span>
                            <h3>Update Profile</h3>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="bt-nav">
                <ul>
                    <li class="alert" title="Alert">
                        <span><i class="fa fa-bell"></i></span>
                    </li>
                    <li class="message" title="Message">
                        <span><i class="fa fa-envelope"></i></span>
                    </li>
                    <li class="set" title="Settings">
                        <span><i class="fa fa-cog"></i></span>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <?php
            require './profile-posts.php';
            ?>
            <?php
            require './profile-reviews.php';
            ?>
            <?php
            require './profile-comments.php';
            ?>
            <?php
            require './profile-friends-list.php';
            ?>
            <?php
            require './profile-update.php';
            ?>
        </div>
    </div>

</body>
<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../js/profile.js"></script>

</html>