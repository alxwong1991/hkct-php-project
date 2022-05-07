<?php
require './surveyheader.php'
?>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "youarenotAdmin!") {
        echo "<script>alert('You are not Admin!')</script>";
    } else if ($_GET["error"] == "none") {
        echo "<script>alert('Welcome Admin!')</script>";
    }
}
?>

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
    $quit_choice = $_POST['leaving'];
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
                } elseif ($quit_choice == $choices) {
                    $correct = 2;
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
    <h2>Hello, admin! Let's edit the survey</h2>
    <?php if (isset($message)) {
        echo '<b>' . $message . '</b>';
    } ?>
    <form method="post" action="administration.php">
        <div class="form-group row align-center">
            <label class="col-sm-2 col-form-label col-form-label-lg">Question Number
                <?php echo $next; ?></label>
            <input type="hidden" value="<?php echo $next; ?>" name="qno" />
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="question" placeholder="Question">
            </div>
        </div>
        <div class="form-group row align-center">
            <div class="col-sm-2">
                <label class="col-form-label col-form-label-lg">Options</label>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="option1" placeholder="Option 1" />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="option2" placeholder="Option 2" />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="option3" placeholder="Option 3" />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="option4" placeholder="Option 4" />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="option5" placeholder="Option 5" />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="option6" placeholder="Option 6" />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row align-right">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-sm-8">
                        <label class="col-form-label col-form-label-sm ">Question Number</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control form-control-sm" name="dno"
                            value="<?php echo $total; ?>">
                    </div>
                    <div class="col-12">
                        <input role="button" class="btn btn-outline-success btn-sm" type="submit" name="delete"
                            value="delete">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="col-form-label col-form-label-sm">Correct choice</label>
                        <input type="number" class="form-control form-control-sm" name="correct_answer">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label col-form-label-sm">Leaving choice</label>
                        <input type="number" class="form-control form-control-sm" name="leaving">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <input role="button" class="btn btn-outline-success btn-lg" type="submit" name="add" value="Upload">
            </div>
        </div>
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
    </form>
    <a class="btn btn-outline-success " role="button" href="../login-system/admin/admin.php">
        <b>
            Back to admin page
        </b>
    </a>
</div>
<?php
require './surveyfooter.php';
?>