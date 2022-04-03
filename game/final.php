<?php include "../login-system/php/dbh.inc.php" ?>

<?php
require './header.php'
?>

<body id="back">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-12 welcome">
                <h1 class="display-4 fw-bolder">Gaming Topic：<br>Japanese Mahjong</h1>
            </div>
            <div class="card rounded">
                <div class="card-header justify-content-center tile">
                    <h1 class="fw-bolder">Congratulations!</h1>
                </div>
                <div class="card-body tiles">
                    <h5 class="card-title carder">
                        <h1>Game Clear</h1>
                    </h5>
                    <p class="card-text carder">
                    <h2>Your score：
                        <?php
                        echo $_SESSION['score'];
                        ?>
                    </h2>
                    </p>
                    <a role="button" class="btn btn-outline-success" href="./game.php"><i><b class="fw-light">
                                Restart</b></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->

<?php
require "../footer.php";
?>

<!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->