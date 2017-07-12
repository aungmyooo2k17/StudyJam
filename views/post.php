<?php
/**
 * Created by PhpStorm.
 * User: faroak
 * Date: 7/12/17
 * Time: 3:09 PM
 */

include_once '../models/dbconnect.php';
if(isset($_POST['submitted'])){
    $Ppostbody = strip_tags($_POST['postBody']);
    $Puserid = strip_tags($_POST['userid']);
    $Pgpid = strip_tags($_POST['gpid']);
    $PpostQuery = "INSERT INTO post (post_body, user_id, gp_id) VALUES ($Ppostbody, $Puserid, $Pgpid)";
    $DBcon->query($PpostQuery);

    header("location: timeline.php?gp_id=$Pgpid");

}