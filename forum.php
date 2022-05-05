<?php
session_start();

?>

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


</head>




<body>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->
    <?php
    require './header.php'
    ?>
    <!-- ::::::::::::::::::::::::::::::: header ::::::::::::::::::::::::::::::: -->

    <div class="col-12" style="height:10rem;">
    </div>

    <!-- Start of Overlay -->

    <div id="overlay">

        <div class="postoverlay">
            <div style="height:3rem;"></div>
            <form action="forum.php" method="post" enctype="multipart/form-data">
                <div class="form-group col-11">
                    <label for="title" style="margin:auto; text-align:center;">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required="required">
                </div>
                <div class="form-group col-11">
                    <label for="content" style="margin:auto;">Content</label>
                    <textarea id="content" rows="10" class="col-12" name="content" placeholder="Enter text"
                        required="required"></textarea>
                </div>


                <div class="col-12 center">
                    <button type="submit" class="btn btn-dark col-6 col-lg-4 col-md-6 col-sm-6 "
                        style="margin:2rem auto;">Post</button>
                </div>


            </form>


        </div>


    </div>

    <!-- End of Overlay -->

    <!-- Overlay 2 -->
    <div id="overlay2" style="display:none;">
        <div class="modal d-block" style="padding-top: 10rem!important;
    padding-bottom: 3rem!important; " tabindex="-1" role="dialog">

            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-color: #bbbbbb8f">

                    <!-- modal-header -->
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h2 class="fw-bold mb-0" style="font-size: 3rem; color: #FEFEFE">Delete Post</h2>
                        <!-- btn : X -->
                        <button onclick="dp_off()" type="button" class="close" aria-label="Close"
                            style="width:3vh;height:6vh;border:none;background-color:transparent;">
                            <span aria-hidden="true" style="font-size: 2rem;">×</span>
                        </button>

                        <script>
                        function dp_off() {
                            document.getElementById("overlay2").style.display = "none";
                        }
                        </script>
                        <!-- btn : X -->
                    </div>
                    <!-- modal-header -->

                    <!-- modal-body -->
                    <div class="modal-body p-5 pt-0">
                        <form action="forum.php" method="post" enctype="multipart/form-data">



                            <!-- // ID -->
                            <div class="form-floating mb-3">
                                <input type="text" name="p_id" class="form-control rounded-4" id="floatingInput"
                                    required="required">
                                <label for="floatingInput">Post ID</label>
                            </div>


                            <!-- // delete Product  -->
                            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-dark nav-color" type="submit"
                                name="delete">Delete Product</button>

                        </form>
                    </div>
                    <!-- modal-body -->

                </div>
            </div>
        </div>
    </div>
    <!-- End of Overlay 2 -->








    <!-- Start of auto create -->
    <div class="row col-9 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin: 10rem auto;"
        id="auto-create">

        <div class="misc row">

            <button class="col-3 btn-dark" style="border:2px solid #e8e8e8; height: 3rem; margin:auto;"
                onclick="on()">Post</button>
            <button class="col-3 btn-dark" style="border:2px solid #e8e8e8; height: 3rem; margin:auto; display:none;"
                onclick="dp_on()" id="deletePost">Delete Post</button>

            <script>
            function dp_on() {
                document.getElementById("overlay2").style.display = "block";
            }
            </script>
            <!-- delete Product BTN :  display flex, center -->

        </div>

        <?php
        require_once './login-system/php/dbh.inc.php';
        if (isset($_SESSION["userid"])) {
            $iid = $_SESSION["userid"];
            $sql = "SELECT * FROM users WHERE usersId ='$iid' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['usersId'];
                    $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
                    $resultImg = mysqli_query($conn, $sqlImg);
                    $rowImg = mysqli_fetch_assoc($resultImg);
                    $admin = "admin";
                    if ($_SESSION["useruid"] == $admin) {
                        echo '
                        <script>
                         var a = document.getElementById("deletePost");
                         a.style.display = "block";
                         </script>
                    
                    ';
                    }
                }
            }
        }
        ?>


        <div class="forumpostlist">
            <div class="forumpost col-12">
                <div class="posttitle col-12 row">
                    <span class="col-1 d-none d-sm-none d-md-block subtitle"></span>
                    <span class="posttitleword col-lg-5 col-md-5 col-3" href="#" style="cursor:default;"> Title </span>
                    <span class="col-2 subtitle" style="cursor:default;">Author</span>
                    <span class="col-2 subtitle" style="cursor:default;">Like</span>
                    <span class="col-2 subtitle" style="cursor:default;">Last Reply</span>
                </div>
            </div>
        </div>

        <!-- Example post -->
        <!--
        <div class="forumpost col-12">
            <div class="posttitle col-12 row">
                <a class="posttitleword col-5" href="#"> Hi guys </a>
                <div class="col-2 ma">
                    <p class="subtitle">random</p>
                    <p class="subtitle">2022-2-12</p>
                </div>
                <div class="col-2 row ma">
                    <div class="col-2 d-none d-sm-none d-md-block"></div>

                    <div class="col-3 subtitle ma">69K</div>
                    <button class="col-3 col-sm-4 btn-dark d-none d-sm-none d-md-block">Like</button>
                </div>
                <div class="col-2 ma">
                    <p class="subtitle">random123</p>
                    <p class="subtitle">2022-2-12</p>
                </div>
            </div>
        </div>
-->
        <!-- Example post -->


    </div>
    <!-- End of auto create -->


    <!-- Start of PHP -->

    <?PHP

    //  $sql = "select * FROM users";
    //   $result = $conn->query($sql);
    //   if($result->num_rows >0){
    //       echo("success");
    //  } else {
    //       echo "failed";
    //  }
    //function fruit($name,$colour){
    //    echo "$name is $colour colour!<br>";
    //}
    //  fruit("Apple", "red");

    //for($x=0;$x<=5;$x++){
    //   echo "the number is: $x <br>";
    //}

    //function feeling($f="love"){
    //   echo"I $f you! <br>";
    //}
    //feeling("love");

    //   $var1 = 10;
    //  $var2 = 20;
    //   echo $var1 . " + " . $var2 . " = " . $var1 + $var2;

    $forum_xml = simplexml_load_file('forum.xml', null, true);



    //  delete post 
    if (isset($_POST["p_id"])) {

        $a = 0;
        foreach ($forum_xml->post as $child) {

            if ($child->postID == $_POST["p_id"]) {
                $dom = dom_import_simplexml($child);
                $dom->parentNode->removeChild($dom);
                $b = $forum_xml->count();
                // echo $b;
                for ($i = $_POST["p_id"]; $i < ($b + 1); $i++) {
                    // echo " $i ";
                    foreach ($forum_xml->post as $child) {
                        if ($child->postID == $i) {
                            $child->postID = ($child->postID - 1);
                        }
                    }
                }
            }
            $a++;
        }

        $forum_xml->saveXML('forum.xml');
    }
    //  delete post 


    // post

    if (!empty($_POST["title"])) {
        $hasnewpost = 0;
        foreach ($forum_xml->post as $child) {
            if ($child->title == $_POST["title"] || $child->content == $_POST["content"]) {
                $hasnewpost++;
            }
        }


        if ($hasnewpost == 0) {
            $newpost = $forum_xml->addChild('post');
            $newpost->addChild('title', $_POST["title"]);
            $newpost->addChild('content', $_POST["content"]);
            $newpost->addChild('author', $_SESSION["useruid"]);
            $newpost->addChild('authorID', $_SESSION["userid"]);
            $newpost->addChild('date', date("m/d/Y"));
            $newpost->addChild('like', "0");
            $newpost->addChild('view', "0");
            $newpost->addChild('allcomment');
            $postcount = -1;
            foreach ($forum_xml->post as $child) {
                $postcount++;
            }
            $newpost->addChild('postID', $postcount);
            //$newpost->addChild('author', $_POST["author"]);
            $forum_xml->saveXML('forum.xml');

            $forum_xml = simplexml_load_file('forum.xml', null, true);
        }
    }

    $postcount = -1;
    foreach ($forum_xml->post as $child) {
        $title = $child->title;
        $content = $child->content;
        $author = $child->author;
        $date = $child->date;
        $like = $child->like;
        $postcount++;
        $lastdate = "";
        if ($child->allcomment->Children()->count() > 0) {
            foreach ($child->allcomment->comment as $child) {
                $lastdate = $child->commentdate;
            }
        } else {
            $lastdate = $date;
        }



        echo '<script>  
        
        var dateNow = new Date().toLocaleDateString();
        var autoCreate = document.getElementById("auto-create");

                var post = document.createElement("div");
                post.classList.add("col-12", "forumpost");
                autoCreate.appendChild(post);

                    var posttitle = document.createElement("div");
                    posttitle.classList.add("col-12", "posttitle", "row");
                    post.appendChild(posttitle);

                        var likeempty1 = document.createElement("div");
                        likeempty1.classList.add("col-1", "d-none", "d-sm-none", "d-md-block");
                        posttitle.appendChild(likeempty1);

                        var posttitleword = document.createElement("a");
                        posttitleword.classList.add("col-lg-5", "col-md-5", "posttitleword", "col-3");
                        posttitleword.href = "forum_post.php?id=" + ' . $postcount . '+ "&date=" + dateNow;
                        var posttitlewordtext = document.createTextNode("' . $title . '");
                        posttitleword.append(posttitlewordtext);
                        posttitle.appendChild(posttitleword);

                        var author = document.createElement("div");
                        author.classList.add("col-2", "ma");
                        posttitle.appendChild(author);

                            var authorname = document.createElement("p");
                            authorname.classList.add("subtitle");
                            var authornametext = document.createTextNode("' . $author . '");
                            authorname.append(authornametext);
                            author.appendChild(authorname);

                            var authordate = document.createElement("p");
                            authordate.classList.add("subtitle");
                            var authordatetext = document.createTextNode("' . $date . '");
                            authordate.append(authordatetext);
                            author.appendChild(authordate);

                        var like = document.createElement("div");
                        like.classList.add("col-2", "ma", "row");
                        posttitle.appendChild(like);

                            var likeempty = document.createElement("div");
                            likeempty.classList.add("col-2", "d-none", "d-sm-none", "d-md-block");
                            like.appendChild(likeempty);

                            var likenumber = document.createElement("div");
                            likenumber.classList.add("col-3", "subtitle", "ma");
                            likenumber.id = "likeid' . $postcount . '";
                            var likenumbertext = document.createTextNode("' . $like . '");
                            likenumber.append(likenumbertext);
                            like.appendChild(likenumber);
                            
                            var likebutton = document.createElement("button");
                            likebutton.classList.add("col-3", "btn-dark", "d-none", "d-sm-none", "d-md-block", "col-sm-4", "like-btn");
                            likebutton.id =' . $postcount . '
                            var liketext = document.createTextNode("Like");
                            likebutton.append(liketext);
                            like.appendChild(likebutton);

                        var lastauthor = document.createElement("div");
                        lastauthor.classList.add("col-2", "ma");
                        posttitle.appendChild(lastauthor);

                            var lastauthorname = document.createElement("p");
                            lastauthorname.classList.add("subtitle");
                            var lastauthornametext = document.createTextNode("' . $author . '");
                            lastauthorname.append(lastauthornametext);
                            lastauthor.appendChild(lastauthorname);

                            var lastauthordate = document.createElement("p");
                            lastauthordate.classList.add("subtitle");
                            var lastauthordatetext = document.createTextNode("' . $lastdate . '");
                            lastauthordate.append(lastauthordatetext);
                            lastauthor.appendChild(lastauthordate);


                            
    </script>';
    }





    ?>

    <!-- End of PHP -->
    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->

    <?php
    require "footer.php";
    ?>

    <!-- ::::::::::::::::::::::::::::::: footer ::::::::::::::::::::::::::::::: -->
    <script src="./header.js"></script>

    <script>
    $(document).on("click", '.like-btn', function() {
        var likeID = $(this).attr("id");
        event.preventDefault();
        $.ajax({
            url: "fetch_like.php",
            type: "POST",
            data: {
                like: likeID
            },
            success: function(like) {
                $("#likeid" + likeID).text(like);
            }
        });


        /*var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                fetchLike(this, likeID);
            }
        };
        xhttp.open("GET", "forum.xml", true );
        xhttp.send();*/


    })

    /*
            function fetchLike(xml, likeID) {
                var xmlDoc = xml.responseXML;
                var like = document.getElementById("likeid" + likeID);
                var x = xmlDoc.getElementsByTagName("post");
                console.log(x[likeID].getElementsByTagName("like")[0].innerHTML);
                like.textContent = x[likeID].getElementsByTagName("like")[0].innerHTML;
            }*/
    </script>
</body>



</html>