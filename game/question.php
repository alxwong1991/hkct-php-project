<?php session_start(); ?>
<?php include "../login-system/php/dbh.inc.php" ?>
<?php
$total = mysqli_query($conn, "SELECT COUNT(*)  AS total FROM `questions`");
$data = mysqli_fetch_assoc($total);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
    require './header.php'
    ?>
    <?php
    //set qno ../login-system/php/dbh.inc.php
    $no = (int) $_GET['n'];
    //get questions
    $query = "SELECT * FROM `questions` WHERE `qno` = $no";
    $result = $conn->query($query) or die($conn->error . __LINE__);
    $question = $result->fetch_assoc(); ?>
    <?php
    //get options
    $query = "SELECT * FROM `options` WHERE `qno` = $no";
    $choices = $conn->query($query) or die($conn->error . __LINE__);
    ?>

    <body id="back">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-12 welcome">
                    <h1 class="display-4 fw-bolder">Gaming Topic：<br>Japanese Mahjong</h1>
                </div>
                <div class="col-12">
                    <div class="card rounded">
                        <div class="card-header  justify-content-center tile">
                            <strong>
                                <h2>
                                    <?php
                                    echo 'Question ' . $question['qno'] . ' of ' . $data['total'];
                                    ?></h2>
                            </strong>
                        </div>
                    </div>
                    <div class="card-body tiles">
                        <h3 class="card-title">
                            <?php
                            echo $question['question'];
                            ?>
                        </h3>
                        <form class="form" method="POST" action="gameprocess.php">
                            <ul class="list-group">
                                <?php
                                $nq = $question['qno'];
                                if ($nq != 0) {
                                    while ($row = $choices->fetch_assoc()) : ?>
                                <li class="list-group-item rounded carder">
                                    <h4>
                                        <input type="radio" class="custom-control-input:checked" name="choice"
                                            value="<?php echo $row['id']; ?>" />
                                        <?php echo $row['choices']; ?>
                                    </h4>
                                </li>
                                <?php endwhile;
                                } else {
                                    // echo '<script type="text/javascript">alert("Please add a question");window.location.href="administration.php";</script>';
                                    echo '<script type="text/javascript">alert("Sorry no questions yet");window.location.href="game.php";</script>';
                                } ?>
                                <input type="hidden" name="number" value="<?php echo $no; ?>">
                                <button type="submit" class="btn btn-success" value="submit"><i
                                        class="fw-bold">Submit</i></button>
                            </ul>
                        </form>
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