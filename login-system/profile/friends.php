<?php
require '../php/init.inc.php';

if(isset($_SESSION['userid']) && isset($_SESSION['useremail'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['userid']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
}
else{
    header('Location: logout.php');
    exit;
}
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['userid'], false);
// TOTLA FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['userid'], false);
// GET MY($_SESSION['user_id']) ALL FRIENDS
$get_all_friends = $frnd_obj->get_all_friends($_SESSION['userid'], true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo  $user_data->username;?></title>
    <link rel="stylesheet" href="../css/allfriend.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body style="background-color:powderblue;">
    <div class="profile_container">
        
        <div class="inner_profile">
            <div class="img">
                <img src="./upload/profile<?php echo $_SESSION['userid']; ?>" alt="Profile image">
            </div>
            <h1><?php echo  $user_data->usersName;?></h1>
        </div>
        <nav>
            <ul>
                <li><a href="profile.php" rel="noopener noreferrer">Home</a></li>
                <li><a href="notifications.php" rel="noopener noreferrer">Requests<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends.php" rel="noopener noreferrer" class="active">Friends<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
                <li><a href="logout.php" rel="noopener noreferrer">Logout</a></li>
            </ul>
        </nav>
        <div class="all_users">
            <h3>All friends</h3>
            <div class="usersWrapper">
                <?php
                if($get_frnd_num > 0){
                    foreach($get_all_friends as $row){
                        echo '<div class="user_box">
                                <div class="user_img"><img src="./upload/profile'.$row->usersId.'" alt="Profile image"></div>
                                <div class="user_info"><span>'.$row->usersName.'</span>
                                <span><a href="user_profile.php?id='.$row->usersId.'" class="see_profileBtn">See profile</a></div>
                            </div>';
                    }
                }
                else{
                    echo '<h4>You have no friends!</h4>';
                }
                ?>

            

            </div>
        </div>
        
    </div>
</body>
</html>