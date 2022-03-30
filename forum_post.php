<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/forum.css" rel="stylesheet">
    <script src="./js/forum.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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
    </style>

</head>

<body>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->
    <?php
    require './header.php'
    ?>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->





    <div id="overlay">

        <div class="postoverlay">
            <div style="height:3rem;"></div>
            <form action="forum_post.php" method="post" enctype="multipart/form-data" id="form">
                <div class="form-group col-11">
                    <label for="newcomment" style="margin:auto;">Comment</label></br>
                    <textarea id="newcomment" rows="10" class="col-12" name="newcomment" placeholder="Enter text" required="required"></textarea>
                </div>

                <div class="col-12 center">
                    <button type="submit" class="btn btn-dark col-6 col-lg-4 col-md-6 col-sm-6 postbtn" style="margin:2rem auto;">Post</button>
                </div>


            </form>


        </div>


    </div>

    <div class="row col-11 col-sm-8 col-md-6 col-lg-4 ma" style="margin-top: 5rem;">
        <div class="col-4 center ma">
            <button type="submit" class="btn btn-dark col-12" onclick="on()">Comment</button>
        </div>
        <div class="col-4 center ma">
            <button type="submit" class="btn btn-dark col-12" onclick="window.location.href='forum.php';">Back</button>
        </div>
    </div>


    <div class="row col-9 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 5rem; margin-bottom: 10rem;">
        <div style="margin-bottom: 2rem;" id="auto-create">
            <div class="misc row" style="height:5rem;">


                <div class="col-1 d-none d-sm-none d-md-block center ma" style="border-right:2px solid #e8e8e8; height: 3rem;">
                    <p class="subtitle">View</p>
                    <p class="subtitle" id="view">1</p>
                </div>
                <div class="col-1 d-none d-sm-none d-md-block center ma" style="border-right:2px solid #e8e8e8; height: 3rem;">
                    <p class="subtitle">Comment</p>
                    <p class="subtitle" id="comment">0</p>
                </div>
                <div class="col-1 d-none d-sm-none d-md-block center ma" style="border-right:2px solid #e8e8e8; height: 3rem;">
                    <p class="subtitle">Like</p>
                    <p class="subtitle" id="like">0</p>
                </div>
                <div class="col-9 center ma" id="title">Title</div>

            </div>
<!-- 
            <div class="postdetail row">
                <div class="postusersection col-12 col-lg-2 col-md-12 col-sm-12">
                    <span id="author">Author: Sofia</span>
                    <img id="authorImg" src="./login-system/profile/upload/profile1.jpg" alt="" width='100' height='auto'>
                </div>

                <div class="postdetailnumber col-2 col-lg-1 col-md-2 col-sm-2">#1</div>
                <div class="postcontentsection col-10 col-lg-9 col-md-9 col-sm-10" id="content">Content</div>

            </div> -->
            <div style="margin-bottom: 2rem;" id="auto-create1">
            </div>

        </div>
    </div>

    <?php

    $forum_xml = simplexml_load_file('forum.xml', null, true);

    $id;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        echo '<script>
     var form = document.getElementById("form");
     form.action = "forum_post.php?id=' . $id . '";
    </script>';

        echo '<script>
            function fetch_comment(){
                $.ajax({
                    url: "fetch_comment.php",
                    method:"POST",
                    data: {
                        postid:' . $_GET["id"] . '
                    },
                    success:function(data){
                        $("#auto-create1").html(data);
                    }
                })
            }

            fetch_comment();

            $(document).on("click",".postbtn", function(){
                fetch_comment();
            })
        </script>';
    }

    if (isset($_POST["postid"])) {
        $id = $_POST["postid"];
        echo '<script>
     var form = document.getElementById("form");
     form.action = "forum_post.php?id=' . $id . '";
    </script>';
    }




    foreach ($forum_xml->post as $child) {
        if ($child->postID == $id) {
            $child->view += 1;
            $view = $child->view;
            $forum_xml->saveXML('forum.xml');
            $like = $child->like;
            $title = $child->title;
            $comment = 0;
            // $maincontent = $child->content;
            // $mainauthor = $child->author;
            // $authorid = $child->authorID;
            // //unset($forum_xml->post);

            if (isset($_SESSION["useruid"]) && isset($_POST["newcomment"])) {
                $hasnewpost = 0;
                if ($child->allcomment->Children()->count() > 0) {
                    foreach ($child->allcomment->comment as $child) {

                        if ($child->commentuser == $_SESSION["useruid"] && $child->commentcontent == $_POST["newcomment"]) {
                            $hasnewpost++;
                        }
                    }
                }


                if ($hasnewpost == 0) {
                    foreach ($forum_xml->post as $child) {
                        if ($child->postID == $id) {
                            $thiscomment = $child->allcomment->addChild('comment');
                            $thiscomment->addChild('commentcontent', $_POST["newcomment"]);
                            $thiscomment->addChild('commentuser', $_SESSION["useruid"]);
                            $thiscomment->addChild('commentdate', date("m/d/Y"));
                            $thiscomment->addChild('commentuserID', $_SESSION['userid']);

                            $forum_xml->saveXML('forum.xml');
                        }
                    }
                }
            }

            // foreach ($forum_xml->post as $child) {
            //     if ($child->postID == $id) {

            //         foreach ($child->allcomment->comment as $child) {
            //             $comment++;
            //             $content = $child->commentcontent;
            //             $commentuser = $child->commentuser;
            //             $commentdate = $child->commentdate;
            //             $commentuserid = $child->commentuserID;

            //             echo '<script>  
            //         var autoCreate = document.getElementById("auto-create");

            //         var postdetail = document.createElement("div");
            //         postdetail.classList.add("postdetail", "row");
            //         autoCreate.appendChild(postdetail);

            //             var postusersection = document.createElement("div");
            //             postusersection.classList.add("postusersection", "col-12", "col-lg-2", "col-md-12", "col-sm-12");
            //             postusersection.textContent = "Author: ' . $commentuser . '";
            //             postdetail.appendChild(postusersection);

            //             var postusersectionimg = document.createElement("img");
            //             postusersectionimg.src = "./login-system/profile/upload/profile' . $commentuserid . '.jpg?"
            //             postusersectionimg.height = "56.25";
            //             postusersectionimg.width = "100";
            //             postusersection.appendChild(postusersectionimg);

            //             var postdetailnumber = document.createElement("div");
            //             postdetailnumber.classList.add("postdetailnumber", "col-2","col-lg-1", "col-md-2", "col-sm-2");
            //             postdetailnumber.textContent = "#' . ($comment + 1) . '";
            //             postdetail.appendChild(postdetailnumber);

            //             var postcontentsection = document.createElement("div");
            //             postcontentsection.classList.add("postcontentsection", "col-10", "col-lg-9", "col-md-9", "col-sm-10");
            //             postcontentsection.textContent = "' . $content . '";
            //             postdetail.appendChild(postcontentsection);
            //         </script>';
            //         }
            //     }
            // }
            // $postid = $id;


             echo '<script>

                    var title = document.getElementById("title");
                    title.textContent = "' . $title . '"

                    var view = document.getElementById("view");
                    view.textContent = "' . $view . '"

                    var like = document.getElementById("like");
                    like.textContent = "' . $like . '"

            </script>';//         var comment = document.getElementById("comment");
            //         comment.textContent = "' . $comment . '"

            //         var content = document.getElementById("content");
            //         content.textContent = "' . $maincontent . '"

            //         var author = document.getElementById("author");
            //         author.textContent = "Author: ' . $mainauthor . '"

            //         var authorImg = document.getElementById("authorImg");
            //         authorImg.src = "./login-system/profile/upload/profile' . $authorid . '.jpg?";' . '

            //     

            break;

            //"./login-system/profile/upload/profile' . $authorid . '.jpg?' . mt_rand() . mt_rand() . mt_rand().'
        }
    }


    ?>



    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->

    <?php
    require "footer.php";
    ?>

    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->
    <script src="./login-system/js/jquery.js"></script>
    <script src="./header.js"></script>




</body>

</html>