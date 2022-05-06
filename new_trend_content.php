<?php

$output = '';

$output .= $_POST["userid"];
$output .= $_POST["useruid"];
$output .= $_POST["date"];
$output .= $_POST["content"];
$postCount = 0;
$trend_xml = simplexml_load_file('trend.xml', null, true);
foreach($trend_xml->post as $child){
    $postCount ++;
}

$thePost = $trend_xml->addChild('post');
$thePost->addChild('authorID', $_POST["userid"]);
$thePost->addChild('author', $_POST["useruid"]);
$thePost->addChild('date', $_POST["date"]);
$thePost->addChild('content', $_POST["content"]);



$trend_xml->saveXML('trend.xml');

echo $output;