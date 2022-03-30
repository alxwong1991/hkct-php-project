<?php include "../login-system/php/dbh.inc.php" ?>
<?php 
session_start();
?>


<?php
// score setting checking
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected = $_POST['choice'];
    $qn = $_POST['number'];

    if ($selected != null) {
        // get correct answer
        $correct = $conn->query("SELECT * FROM `options` WHERE qno=$qn and correct=1");
        $answer = mysqli_fetch_assoc($correct);
        $ans = $answer['id'];
        if ($ans == $selected) {
            $_SESSION['score']++;
        }
        // last question
        $next = $qn + 1;
        $lq = $conn->query("SELECT COUNT(*)  AS total FROM `questions`");
        $data = mysqli_fetch_assoc($lq);
        $last = $data['total'];
        if ($qn == $last) {
            header('location:final.php');
        } else {
            header('location:question.php?n=' . $next);
        }
    } else {
        echo '<script type="text/javascript">window.alert("Please pick your choice");window.history.back();</script>';
    }
} else {
    echo '<script type="text/javascript">
    if (window.confirm("You should not be here, please leave.' . '\n' . ' If you want to visit our website, please press \'yes\' .")==true)
    {window.location.href="../index.php";}
    else{window.location.href="https://www.google.com";}
    </script>';
}

?>