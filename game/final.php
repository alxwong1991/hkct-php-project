<?php
require './surveyheader.php';
?>

<div class="card rounded">
    <div class="card-header justify-content-center tile">
        <h1 class="fw-bolder">Thank you for your participation</h1>
    </div>

    <div class="card-body tiles">
        <p class="card-text carder">
        <h2>Your score：
            <?php
            $all = $conn->query("SELECT COUNT(*)  AS totalscore FROM `options` WHERE correct=1");
            $full = mysqli_fetch_assoc($all);
            $max = $full['totalscore'];
            $userid = $_SESSION['userid'];
            $no_of_play = $_SESSION['no_of_play'];
            $score = $_SESSION['score'];
            date_default_timezone_set("Hongkong");
            $recorder = date('Y-m-d H:i:s');
            $insert = $conn->query("INSERT INTO `ranking` (usersid,no_of_play,score,finishedtime) VALUES ($userid,$no_of_play,$score,'$recorder')");
            $us = $conn->query("SELECT * FROM `ranking` where usersid = $userid and `rankid` in 
                                                ( SELECT MAX(`rankid`) FROM `ranking` GROUP BY `usersid`=$userid )");
            $userscore = mysqli_fetch_assoc($us);
            $point = $userscore['score'];
            echo  $point . ' out of ' . $max;
            ?>
        </h2>
        </p>
    </div>
    <a role="button" class="btn btn-outline-success" href="./game.php">
        <i><b class="fw-light">Restart<?php $_SESSION['score'] = 0; ?></b></i>
    </a>
</div>
<?php
require './surveyfooter.php';
?>