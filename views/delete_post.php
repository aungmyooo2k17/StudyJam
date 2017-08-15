<?php
session_start();
include_once '../models/dbconnect.php';


if (!isset($_SESSION['userSession'])) {
    header("Location: ../index.php");
}

if(isset($_GET['post_id'])){

    $postId = $_GET['post_id'];
    $gpId = $_GET['gp_id'];
    $post = $DBcon->query("DELETE FROM post WHERE post.post_id = $postId");
    header("Location: timeline.php?gp_id=$gpId");
    
}


?>