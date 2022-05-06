<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/forum.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="./js/forum.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




    <style>
    #auto-create {
        border-radius: 1rem;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 35px;
    }

    .color-b {
        background-color: black;
    }

    .color-r {
        background-color: red;
    }

    .postdetail {
        border-top: 2px #e8e8e8 solid;
        background-color: white;
    }

    .postdetailnumber {
        padding-left: 1rem;
        margin: 0rem;
    }

    .postusersection {
        height: fit-content;
        border-right: #e8e8e8 1px solid;
        padding-left: 2vh;
        margin: auto 0rem;

    }

    .postcontentsection {
        height: fit-content;
        padding-left: 2rem;
        margin: auto 0;
        overflow-wrap: break-word;
    }

    img.rounded {
        height: 100px;
        width: 100px;
        clip-path: circle(40%);
    }

    #autoimg {
        margin: auto;
        display: block;
        width: 50vh;
        height: auto;
    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        display: inline-block;
        padding: 3vh 12px;
        padding-top: 3vh;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->
    <?php
    require './header.php';


    ?>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->

    <!-- <div class="center col-12 h1" style="margin-top:3rem;" id="fdlist">
        Your friends

        <form id="myform" class="myform" method="post" name="myform">
            <div id="myResponse" class="row col-6" style="margin:auto"> <?php
                                                                        require './login-system/php/init.inc.php';

                                                                        if (isset($_SESSION['userid']) && isset($_SESSION['useremail'])) {
                                                                            $user_data = $user_obj->find_user_by_id($_SESSION['userid']);
                                                                            if ($user_data ===  false) {
                                                                                header('Location: logout.php');
                                                                                exit;
                                                                            }
                                                                        } else {
                                                                            header('Location: logout.php');
                                                                            exit;
                                                                        }

                                                                        $get_all_friends = $frnd_obj->get_all_friends($_SESSION['userid'], true);

                                                                        $output = '';
                                                                        foreach ($get_all_friends as $friend) {
                                                                            $output .= '<div class="col-3"><img class="rounded col-12 center" id="authorImg" src="./login-system/profile/upload/profile' . $friend->usersId . '.png">
                                        <p class="col-12 center">' . $friend->usersName . '</p>
                                        <input class="col-12 center" type="checkbox" name="myCheckboxes[]" id="myCheckboxes" value=' . $friend->usersId . ' /></div>';
                                                                        }
                                                                        echo $output;
                                                                        ?></div>
            <input id="submit" type="submit" name="submit" value="Submit" onclick="return submitForm()" />
        </form>

    </div> -->

    <!-- 
    <div class="row col-6 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 3rem;">
        <div style="margin-bottom: 2rem;" id="auto-create">
            <div class="owl-carousel" id="owl">
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User1</div>
                </div>
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User2</div>
                </div>
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User3</div>
                </div>
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User4</div>
                </div>
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User5</div>
                </div>
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User6</div>
                </div>
                <div class="col-12"><img class="rounded" id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    <div class="center">User7</div>
                </div>
            </div>
        </div>

    </div> -->

    <div class="testing"></div>
    <div class="testing2"></div>
    <div class="center col-12 h1" style="margin-top:3rem;">
        LASTEST TREND

    </div>

    <div class="row col-11 col-sm-8 col-md-6 col-lg-4 ma" style="margin-top: 2rem;">
        <div class="col-4 center ma">
            <button type="submit" class="btn btn-dark col-12" onclick="on()">Post</button>
        </div>
    </div>

    <div id="overlay">

        <div class="postoverlay center" style="height: 50vh">
            <form class="center row">
                <label for="file" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Custom Upload
                </label>
                <input class="custom-file-upload" type="file" name="file[]" id="file" accept="image/*" multiple>
                <textarea id="content" rows="10" class="col-11" name="content" placeholder="Share your stories!"
                    require></textarea>

                <input class="col-3 btn btn-dark" type="button" id="uploadbtn" value="Upload" style="margin-top:3vh"
                    onclick="off()">
            </form>
        </div>
    </div>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    echo '
        <script>
            function fetch_trend() {
                $.ajax({
                    url: "fetch_trend.php",
                    method: "POST",
                    data: {
                        postid: "' . $_SESSION["userid"] . '"
                    },
                    success: function(data) {
                        
                        $("#autocreate1").html(data);
                    }
                })
            }

            fetch_trend();

            function new_trend() {
                
                $.ajax({
                    url: "new_trend_content.php",
                    method: "POST",
                    data: {
                        content: document.getElementById("content").value,
                        date: "' . Date("F j, g:i a") . '",
                        useruid: "' . $_SESSION["useruid"] . '",
                        userid: ' . $_SESSION["userid"] . '
                    },
                    success: function(data) {

                        $(".testing2").html(data);

                    }
                })
                var formData = new FormData();
                var ins = document.getElementById("file").files.length;
                for (var x = 0; x < ins; x++) {
                    formData.append("file[]", document.getElementById("file").files[x]);
                }
                $.ajax({
                    url: "new_trend.php",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    enctype: "multipart/form-data",
                    success: function(data) {

                        $(".testing").html(data);
                        fetch_trend();
                    }
                })

                
            }



            $(document).on("click", "#uploadbtn", function() {
                //alert("work");
                new_trend();
            })
        </script>';


    ?>


    <!-- <script>
        $(document).ready(function() {
            $("#owl").owlCarousel({
                center: true,
                items: 7,
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    450: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    800: {
                        items: 5
                    },
                    1000: {
                        items: 7
                    }
                }
            });
        });
    </script> -->
    <!-- TREND -->
    <div class="center" id="autocreate1" ;>
        <!-- TREND 1 -->
        <div class="row col-7 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 3rem;">
            <div style="margin-bottom: 2rem;" id="auto-create">


                <div class="row">
                    <div class="col-4 col-lg-2 col-md-3 col-sm-4">
                        <div class="col-12"><img class="rounded" id="authorImg"
                                src="./login-system/profile/upload/profile2.jpg"></div>
                        <span id="author"></span>
                    </div>

                    <div class="row col-8 col-lg-10">
                        <div class="col-12"
                            style="font-weight:bold; text-align:left; padding-top:20px; padding-left:10px;">Author:
                            Sofia</div>
                        <div class="col-12" style="text-align:left; padding-bottom:20px; padding-left:10px;"
                            id="content">31 March 23:55</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-11" style="margin:auto; text-align:left; margin-bottom: 1.5rem;">
                        Look at this wonderful image I have found.
                        <img id="authorImg" src="./login-system/profile/upload/profile2.jpg">
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF TREND 1 -->

        <!-- TREND 2 -->
        <div class="row col-7 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 3rem;">
            <div style="margin-bottom: 2rem;" id="auto-create">


                <div class="row">
                    <div class="col-4 col-lg-2 col-md-3 col-sm-4">
                        <div class="col-12"><img class="rounded" id="authorImg"
                                src="./login-system/profile/upload/profile2.jpg"></div>
                        <span id="author"></span>
                    </div>

                    <div class="row col-8 col-lg-10">
                        <div class="col-12"
                            style="font-weight:bold; text-align:left; padding-top:20px; padding-left:10px;">Author:
                            Sofia</div>
                        <div class="col-12" style="text-align:left; padding-bottom:20px; padding-left:10px;"
                            id="content">1 April 12:00</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-11" style="margin:auto; text-align:left; margin-bottom: 1.5rem;">
                        Look at this wonderful image I've found.
                        <div class="owl-carousel owl-theme" id="owl1">
                            <div class="col-12">
                                <img id="authorImg" src="./login-system/profile/upload/profile3.jpg">
                            </div>
                            <div class="col-12">
                                <img id="authorImg" src="./login-system/profile/upload/profile4.jpg">
                            </div>
                            <div class="col-12">
                                <img id="authorImg" src="./login-system/profile/upload/profile59.jpg">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#owl1").owlCarousel({
            center: true,
            items: 1,
            loop: true,
            margin: 10,
            dots: true,
            responsive: {
                600: {
                    items: 1
                }
            }
        });
    });
    </script>
    <!-- END OF TREND 2 -->




    </div>

    <!-- End of TREND -->
</body>

</html>