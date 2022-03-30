<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "youarenotAdmin!") {
        echo "<script>alert('You are not Admin!')</script>";
    } else if ($_GET["error"] == "none") {
        echo "<script>alert('Welcome Admin!')</script>";
    }
}
?>

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
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(*)  AS total FROM `questions`");
            $data = mysqli_fetch_assoc($result);
            $next = $data['total'] + 1;
            $total = $data['total'];

            if (isset($_POST['add'])) {
                //get question
                $qno = $_POST['qno'];
                $question = $_POST['question'];
                $correct_answer = $_POST['correct_answer'];
                $option = array();
                $option[1] = $_POST['option1'];
                $option[2] = $_POST['option2'];
                $option[3] = $_POST['option3'];
                $option[4] = $_POST['option4'];
                $option[5] = $_POST['option5'];
                $option[6] = $_POST['option6'];

                //question query
                $insert = $conn->query("INSERT INTO `questions` (qno, question) VALUES($qno,'$question')") or die($conn->error . __LINE__);
                //validate
                if ($insert) {
                    foreach ($option as $choices => $value) {
                        if ($value != '') {
                            if ($correct_answer == $choices) {
                                $correct = 1;
                            } else {
                                $correct = 0;
                            }
                            //option query
                            $insert = $conn->query("INSERT INTO `options` (qno, correct, choices) VALUES($qno,$correct,'$value');") or die($conn->error . __LINE__);
                            if ($insert) {
                                continue;
                            } else {
                                die($conn->error . __LINE__);
                            }
                        }
                    }
                    $message = 'upload complete';
                }
            }
            ?>
            <div class="tile">
                <h2>Hello! Let's edit the game</h2>
                <?php if (isset($message)) {
                    echo '<b>' . $message . '</b>';
                } ?>
                <form method="post" action="administration.php">
                    <p>
                        <label>Question Number</label>
                        <input type="number" value="<?php echo $next; ?>" name="qno" />
                        <label>Question</label>
                        <input type="text" name="question" maxlength="50" placeholder="maximum character is 50" />
                        <label>Correct choice number </label>
                        <input type="number" name="correct_answer" />
                        <input role="button" class="btn btn-outline-success btn-sm" type="submit" name="add"
                            value="Upload Question" />
                    </p>
                    <p>
                        <label>Option #1: </label>
                        <input type="text" name="option1" maxlength="50" placeholder="maximum character is 50" />

                        <label>Option #2: </label>
                        <input type="text" name="option2" maxlength="50" placeholder="maximum character is 50" />

                        <label>Option #3: </label>
                        <input type="text" name="option3" maxlength="50" placeholder="maximum character is 50" />
                    </p>
                    <p>
                        <label>Option #4: </label>
                        <input type="text" name="option4" maxlength="50" placeholder="maximum character is 50" />

                        <label>Option #5: </label>
                        <input type="text" name="option5" maxlength="50" placeholder="maximum character is 50" />

                        <label>Option #6: </label>
                        <input type="text" name="option6" maxlength="50" placeholder="maximum character is 50" />
                    </p>
                </form>

                <?php
                if (isset($_POST['delete'])) {
                    //get question
                    $dq = $_POST['dno'];
                    //question query
                    $delete = $conn->query("DELETE FROM `questions` WHERE `questions`.`qno` = $dq;") or die($conn->error . __LINE__);
                    //validate
                    if ($delete) {
                        $delete = $conn->query("DELETE FROM `options` WHERE `options`.`qno` = $dq;") or die($conn->error . __LINE__);
                        if (!$delete) {
                            die($conn->error . __LINE__);
                        }
                    }
                    $deletion = 'delete complete';
                }
                ?>
                <?php if (isset($deletion)) {
                    echo '<b>' . $deletion . '</b>';
                } ?>
                <form action="administration.php" method="post">
                    <p>
                        <label>Question Number</label>
                        <input type="number" name="dno" value="<?php echo $total; ?>">
                        <input role="button" class="btn btn-outline-success btn-sm" type="submit" name="delete"
                            value="Delete Question">
                    </p>
                </form>
                <a class="btn btn-outline-success " role="button" href="game.php"><b>Back to main page</b></a>
            </div>
        </div>
    </div>
</body>
<!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->

<?php
require "../footer.php";
?>

<!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->