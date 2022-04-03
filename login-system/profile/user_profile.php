<?php
require '../php/init.inc.php';
if (isset($_SESSION['userid']) && isset($_SESSION['useremail'])) {
    if (isset($_GET['usersId'])) {
        $user_data = $user_obj->find_user_by_id($_GET['usersId']);
        if ($user_data ===  false) {
            header('Location: profile.php');
            exit;
        } else {
            if ($user_data->id == $_SESSION['userid']) {
                header('Location: profile.php');
                exit;
            }
        }
    }
} else {

    // header('Location: ../php/logout.inc.php?error=m1');
    exit;
}
// CHECK FRIENDS
$user_data = $user_obj->find_user_by_id($_GET['id']);
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['userid'], $user_data->usersId);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['userid'], $user_data->usersId);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['userid'], $user_data->usersId);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['userid'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['userid'], false);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $title = $_GET['id'];
    echo '<title>usersId:' . $title . ' profile</title>'
    ?>
    <link rel="stylesheet" href="../css/allfriend.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>

<body>
    <div class="profile_container">

        <div class="inner_profile">
            <div class="img">
                <?php
                echo '<img src="./upload/profile' . $user_data->usersId . '.jpg" alt="Profile image">';
                ?>

            </div>
            <h1><?php echo  $user_data->usersName; ?></h1>
            <nav>
                <ul>
                    <li><a href="profile.php" rel="noopener noreferrer">Home</a></li>
                    <li><a href="notifications.php" rel="noopener noreferrer">Requests<span
                                class="badge <?php
                                                                                                            if ($get_req_num > 0) {
                                                                                                                echo 'redBadge';
                                                                                                            }
                                                                                                            ?>"><?php echo $get_req_num; ?></span></a></li>
                    <li><a href="friends.php" rel="noopener noreferrer">Friends<span
                                class="badge"><?php echo $get_frnd_num; ?>
                            </span></a></li>
                    <li><a href="../php/logout.inc.php?error=m2" rel="noopener noreferrer">Logout</a></li>
                </ul>
            </nav>
            <div class="actions">
                <?php
                if ($is_already_friends) {
                    echo '<a href="frnd.inc.php?action=unfriend_req&Id=' . $user_data->usersId . '" class="req_actionBtn unfriend">Unfriend</a>';
                } elseif ($check_req_sender) {
                    echo '<a href="frnd.inc.php?action=cancel_req&Id=' . $user_data->usersId . '" class="req_actionBtn cancleRequest">Cancel Request</a>';
                } elseif ($check_req_receiver) {
                    echo '<a href="frnd.inc.php?action=ignore_req&Id=' . $user_data->usersId . '" class="req_actionBtn ignoreRequest">Ignore</a>&nbsp;
                    <a href="frnd.inc.php?action=accept_req&Id=' . $user_data->usersId . '" class="req_actionBtn acceptRequest">Accept</a>';
                } else {
                    echo '<a href="frnd.inc.php?action=send_req&Id=' . $user_data->usersId . '" class="req_actionBtn sendRequest">Send Request</a>';
                }
                ?>

            </div>
        </div>


    </div>
</body>

</html>