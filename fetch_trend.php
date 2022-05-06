<?php

require './login-system/php/init.inc.php';

$get_all_friends = $frnd_obj->get_all_friends($_POST['postid'], true);

$output = '';
$postCount = 0;
$trend_xml = simplexml_load_file('trend.xml', null, true);
$hasImage = 0;
foreach ($trend_xml->post as $child) {
    foreach ($get_all_friends as $friend)
        if ($child->authorID == $friend->usersId || $child->authorID == $_POST['postid']) {
            $postCount++;

            $authorID = $child->authorID;
            $author = $child->author;
            $date = $child->date;
            $content = $child->content;
            $images = $child->images;
            $hasImage = 0;
            if (strpos($images, '.')) {
                $hasImage = 1;
            }
            if (strpos($images, ',')) {
                $arrayImages = explode(',', $images);
                $hasImage = count($arrayImages);

                $imageloop = '';
                foreach ($arrayImages as $image) {
                    $imageloop .= ' 
                    
                            <div class="col-12">
                                <img  id="autoimg" src="' . $image . '">
                            </div>
                ';
                }
            }
            if ($hasImage == 1) {
                $output .= '<div class="row col-7 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 3rem;">
                    <div style="margin-bottom: 2rem;" id="auto-create">


                    <div class="row">
                        <div class="col-4 col-lg-2 col-md-3 col-sm-4">
                            <div class="col-12"><img class="rounded" src="./login-system/profile/upload/profile' . $authorID . '.jpg"></div>
                            <span id="author"></span>
                        </div>

                        <div class="row col-8 col-lg-10">
                            <div class="col-12" style="font-weight:bold; text-align:left; padding-top:20px; padding-left:10px;">Author: ' . $author . '</div>
                            <div class="col-12" style="text-align:left; padding-bottom:20px; padding-left:10px;">' . $date . '</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11" style="margin:auto; text-align:left; margin-bottom: 1.5rem;">
                            ' . $content . '
                            <br>
                            <img id="autoimg" src="' . $images . '">
                        </div>
                    </div>
                    </div>
    </div>';
            } else if ($hasImage > 1) {

                $output .= '<div class="row col-7 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 3rem;">
                        <div style="margin-bottom: 2rem;" id="auto-create">


                        <div class="row">
                            <div class="col-4 col-lg-2 col-md-3 col-sm-4">
                                <div class="col-12"><img class="rounded"   src="./login-system/profile/upload/profile' . $authorID . '.jpg"></div>
                                <span id="author"></span>
                            </div>

                            <div class="row col-8 col-lg-10">
                                <div class="col-12" style="font-weight:bold; text-align:left; padding-top:20px; padding-left:10px;">Author: ' . $author . '</div>
                                <div class="col-12" style="text-align:left; padding-bottom:20px; padding-left:10px;">' . $date . '</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11" style="margin:auto; text-align:left; margin-bottom: 1.5rem;">
                                ' . $content . '
                                <br>
                                <div class="owl-carousel owl-theme" id="owl' . $postCount . '">
                                    ' . $imageloop . '
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
    <script>
    $(document).ready(function() {
        $("#owl' . $postCount . '").owlCarousel({
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
</script>';
            } else if ($hasImage == 0) {
                $output .= '<div class="row col-7 row-cols-sm-1" style="margin:auto; font-size: 16px!important; margin-top: 3rem;">
                        <div style="margin-bottom: 2rem;" id="auto-create">


                        <div class="row">
                            <div class="col-4 col-lg-2 col-md-3 col-sm-4">
                                <div class="col-12"><img class="rounded"   src="./login-system/profile/upload/profile' . $authorID . '.jpg"></div>
                                <span id="author"></span>
                            </div>

                            <div class="row col-8 col-lg-10">
                                <div class="col-12" style="font-weight:bold; text-align:left; padding-top:20px; padding-left:10px;">Author: ' . $author . '</div>
                                <div class="col-12" style="text-align:left; padding-bottom:20px; padding-left:10px;">' . $date . '</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11" style="margin:auto; text-align:left; margin-bottom: 1.5rem;">
                                ' . $content . '
                            </div>
                        </div>
                        </div>
                    </div>';
            }
        }
}

echo $output;
