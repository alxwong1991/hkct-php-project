<?php


$forum_xml = simplexml_load_file('forum.xml', null, true);

$id =  intval($_POST['postid']);

$output = '';
$comment = 0;

foreach ($forum_xml->post as $child) {
    if ($child->postID == $id) {
        $like = $child->like;
        $title = $child->title;
        $comment = 0;
        $maincontent = $child->content;
        $mainauthor = $child->author;
        $authorid = $child->authorID;

        $output .= '<div class="postdetail row">
        <div class="postusersection col-12 col-lg-2 col-md-12 col-sm-12">
            <span id="author">Author:  '. $mainauthor .'</span>
            <img id="authorImg" src="./login-system/profile/upload/profile'. $authorid .'.jpg" alt="" width="100" height="auto">
        </div>

        <div class="postdetailnumber col-2 col-lg-1 col-md-2 col-sm-2">#1</div>
        <div class="postcontentsection col-10 col-lg-9 col-md-9 col-sm-10" id="content"> '. $maincontent .'</div>

        </div>';

        foreach ($forum_xml->post as $child) {
            if ($child->postID == $id) {

                foreach ($forum_xml->post[$id]->allcomment->comment as $child) {
                    
                    $comment++;
                    $content = $child->commentcontent;
                    $commentuser = $child->commentuser;
                    $commentdate = $child->commentdate;
                    $commentuserid = $child->commentuserID;

                    $output .= '<div class="postdetail row">
                    <div class="postusersection col-12 col-lg-2 col-md-12 col-sm-12">
                        <span id="author">Author: '. $commentuser .'</span>
                        <img id="authorImg" src="./login-system/profile/upload/profile' . $commentuserid . '.jpg" alt="" width="100" height="auto">
                    </div>
                    
                    <div class="postdetailnumber col-2 col-lg-1 col-md-2 col-sm-2">#' . ($comment + 1) . '</div>
                    <div class="postcontentsection col-10 col-lg-9 col-md-9 col-sm-10" id="content">' . $content . '</div>

                    </div>';
                }
                break;
            }
        }

        break;
    }

}
echo $output;


?>