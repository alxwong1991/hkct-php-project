<?php

    
    savexml();

    function savexml(){
    $likeid = $_POST["like"];
    $xml = simplexml_load_file("forum.xml");
    foreach ($xml->post as $child) {
        if ($child->postID == $likeid) {
            $child->like += 1;
            echo $child->like;
        }
    }
    $xml->saveXML('forum.xml');

    
}
?>