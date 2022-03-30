<?php include "../login-system/php/dbh.inc.php" ?>
<?php
$result = mysqli_query($conn, "SELECT COUNT(*)  AS total FROM `questions`");
$data = mysqli_fetch_assoc($result);
$total = $data['total'];
?>

<?php
require './header.php'
?>
<link href="gamestyle.css" rel="stylesheet">


<body id="back">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-12 welcome">
                <h1 class="display-4 fw-bolder">Gaming Topic：<br>Japanese Mahjong</h1>
            </div>
            <div class="col-12">
                <div class="card rounded">
                    <div class="card-header justify-content-center tile"> <strong>Question Type: Multiple Choice
                            Question</strong>
                    </div>
                    <div class="card-body tiles">
                        <ul class="list-group list-group-flushed">
                            <strong>
                                <li class="list-group-item rounded">Number of Question : <?php echo $total; ?>
                                </li>
                                <li class="list-group-item rounded">Estimated Time: <?php echo $total * 0.25; ?>
                                    minutes
                                </li>
                            </strong>
                            <div class="list-group-item rounded">

                                <a role='button' class='btn btn-outline-success' href='question.php?n=1'>
                                    <b>Start !</b>
                                </a>
                                <a class="btn btn-success" role="button" href="administration.php">
                                    <b>Question Editor</b>
                                </a>
                            </div>
                        </ul>
                    </div>
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