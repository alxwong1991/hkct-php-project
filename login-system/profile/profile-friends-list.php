<section class="tabs">
    <h1>All User List</h1>
    <?php
    //  require '../php/init.inc.php';
    if (isset($_SESSION['userid']) && isset($_SESSION['useremail'])) {
        $user_data = $user_obj->find_user_by_id($_SESSION['userid']);
        if ($user_data ===  false) {
            header('Location:profile.php');
            exit;
        }
        // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
        $all_users = $user_obj->all_users($_SESSION['userid']);
    } else {
        header('Location: ../php/logout.inc.php');
        exit;
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php
        $title = $_SESSION['useruid'];
        echo '<title>' . $title . ' friend list</title>'
        ?>
        <link rel="stylesheet" href="../css/allfriend.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    </head>

    <body>
        <div class="profile_container">


            <div class="all_users">
                <h3>All Users</h3>
                <div class="usersWrapper">
                    <?php



                    if ($all_users) {
                        foreach ($all_users as $row) {
                            echo '<div class="user_box">
                                
                                <div class="user_img"><img src="./upload/profile' . $row->usersId . '.jpg" alt="Profile image"></div>
                                <div class="user_info"><span>' . $row->usersName . '</span>
                                <span><a href="user_profile.php?id=' . $row->usersId . '" class="see_profileBtn">See profile</a></div>
                            </div>';
                        }
                    } else {
                        echo '<h4>There is no user!</h4>';
                    }
                    ?>
                </div>
            </div>

        </div>
    </body>

    </html>
    <!-- <div class="user_img"><img src="./upload/profile'.$row->usersId.'" alt="Profile image"></div> -->
</section>