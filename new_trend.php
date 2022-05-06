<?php

$output = '';



if (isset($_FILES['file']['name'])) {
    $total = count($_FILES['file']['name']);
    for ($i = 0; $i < $total; $i++) {
        $info = getimagesize($_FILES['file']['tmp_name'][$i]);
        if ($_FILES['file']['error'][$i] !== UPLOAD_ERR_OK) {
            die("Upload failed with error code " . $_FILES['file']['error'][$i]);
        } else if ($info === FALSE) {
            die("Unable to determine image type of uploaded file");
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'][$i], 'test-photo/' . $_FILES['file']['name'][$i]);
            if ($total - 1 == $i) {
                $output .= ('test-photo/' . $_FILES['file']['name'][$i]);
            } else $output .= ('test-photo/' . $_FILES['file']['name'][$i] . ',');
        }
    }
}
$postCount = 0;
$trend_xml = simplexml_load_file('trend.xml', null, true);
foreach($trend_xml->post as $child){
    $postCount ++;
}


$thePost = $trend_xml->post[$postCount - 1];
$thePost->addChild('images', $output);
$trend_xml->saveXML('trend.xml');

$arrayoutput = explode(',', $output);
print_r($arrayoutput);
