<?php
session_start();
include_once '../models/dbconnect.php';


if (!isset($_SESSION['userSession'])) {
    header("Location: ../index.php");
}

if(isset($_GET['post_id'])){
    $postId = $_GET['post_id'];
    $post = $DBcon->query("DELETE FROM post WHERE post.post_id = $postId");
    header("Location: timeline.php?gp_id=".$gpId);
}

if(isset($_GET['gp_id'])){

    $gpId = $_GET['gp_id'];
    $group = $DBcon->query("SELECT * FROM study_group WHERE gp_id = $gpId");
    $gpresult = $group->fetch_array();
}






$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$query3 = $DBcon->query("SELECT *, tbl_users.username AS username FROM tbl_users, study_group WHERE study_group.user_id = tbl_users.user_id");
$userRow=$query->fetch_array();
$query3Row = $query3->fetch_array();



$adminID = $gpresult['gp_admin'];

$adminName = $DBcon->query("SELECT tbl_users.*, study_group.* FROM tbl_users, study_group WHERE tbl_users.user_id = study_group.gp_admin AND study_group.gp_admin = $adminID");
$AdminUserName = $adminName->fetch_array();




if(isset($_POST['submitted'])){
    $Ppostbody = strip_tags($_POST['postBody']);
    $Puserid = strip_tags($_POST['userid']);
    $Pgpid = strip_tags($_POST['gpid']);
    $PpostQuery = "INSERT INTO post (post_body, user_id, gp_id) VALUES ('$Ppostbody', '$Puserid', '$Pgpid')";
    $DBcon->query($PpostQuery);





}


if(isset($_POST['commented'])){
    $cmtuserID = strip_tags($_POST['cmtuserID']);
    $cmtpostID = strip_tags($_POST['cmtpostID']);
    $cmtgpID = strip_tags($_POST['cmtgpID']);
    $cmttext = strip_tags($_POST['cmttext']);
    $cmtQuery = "INSERT INTO comments ( cmt_text, post_id, user_id ,gp_id) VALUES ('$cmttext', '$cmtpostID', '$cmtuserID', '$cmtgpID')";
    $DBcon->query($cmtQuery);
}

// if(isset($_POST['gpsubmit'])){

//     $gp_file = $_FILES['gpphoto']['name'];
//     $tempp = $_FILES['gpphoto']['tmp_name'];

//     $file_gp_saved = "uploads/".$gp_file; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
//     move_uploaded_file($tempp, $file_gp_saved);
//     $gpphotod = "UPDATE study_group SET gp_profilephoto = '$gp_file' WHERE gp_id = $gpId";
//     $DBcon->query($gpphotod);
// }




$DBcon->close();

?>
<? include("../models/config.php") ?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="mdl/material.indigo-pink.min.css">
    <link rel="stylesheet" href="mdl/icon.css">
    <link rel="stylesheet" href="cus-style/float-btn-for-homepage.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="cus-style/list-style.css">
    <script type="text/javascript" src="mdl/material.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>


    <title></title>
    <style>

        .demo-list-icon {
            width: 300px;
        }

        #card{

            box-shadow: 5px 5px 5px #888888;
            width: 80%;
            background-color: #ffffff;

        }


        #card-roomate{
            margin-top: 24px;
            box-shadow: 5px 5px 5px #888888;
            width: 80%;
            background-color: #ffffff;

        }

        /*User post begineeing at here*/
        #card2{
            box-shadow: 10px 10px 5px #888888;
            width: 100%;
            background-color: #ffffff;
        }
        #card2f{
            margin-left: 3%;
            box-shadow: 10px 10px 5px #888888;
            width: 97%;
            background-color: #ffffff;
        }
        #post{
            padding: 16px;
            position: relative;
        }
        .wrapper {
            margin: 0 auto; }

        .banner p {

            font-size: 19px;
            color: #aaa;
            display: block;
        }
        .banner img {
            float: left;
            margin: 5px;
        }
        .banner span {

            padding-left: 14px;
            font-size: 17px;
            vertical-align:top;
        }
        .banner .ban2 span {
            font-size: 17px;
            vertical-align:top;
        }


        div span#rigpost {
            position: absolute;
            right: 10px;
            top: 5px;
        }
        /*end here*/



        #text{

            font-family: 'Roboto', sans-serif;
            font-size: 13px;
            font-weight: bold;
        }
        #topics{
            padding-top: 28px;
        }
        #list{
            list-style-type: none;
            line-height:400%;
            margin-left: -70px;
        }

        #list-item{
            padding-left: 30px;
            color: #7F7F7F;
            text-decoration: none;
            width: 200px;
        }
        #list-item:hover{
            background-color: #EEEEEE;
            color: #6B6B6B;
            text-decoration: none;
        }

        /*style for post dialog design*/
        input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
        /*style for post dialog design*/
    </style>
</head>
<body style="background-color: #E8F0FE">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
    <header class="mdl-layout__header">
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button">
            <i class="material-icons" style="line-height: 2"></i>
        </div>
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title"><?php echo $gpresult['gp_name']; ?></span>

            <div class="mdl-layout-spacer"></div>

            <nav class="mdl-navigation mdl-layout--large-screen-only">

                <a class="mdl-navigation__link" href="userprofile.php" style="text-decoration: none"><?php echo $userRow['email'];?></a>
                <button id="demo-menu-lower-right1"
                        class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">more_vert</i>
                </button>

                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    for="demo-menu-lower-right1">
                    <li class="mdl-menu__item"><a href="logout.php?logout" style="text-decoration: none">Logout</a></li>

                </ul>
            </nav>

        </div>

        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#fixed-tab-1" class="mdl-layout__tab is-active">STREAM</a>
            <a href="#fixed-tab-2" class="mdl-layout__tab">STUDENTS</a>
            <a href="#fixed-tab-3" class="mdl-layout__tab">ABOUT</a>
        </div>


    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><?php echo $gpresult['gp_name']; ?></span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="home.php">Home</a>
            <a class="mdl-navigation__link" href="../index.php">Main Page</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
        <div class="page-content">
            <div class="container" style="margin-top: 24px;">

                <div class="row">
                    
                    
                    <div class="col-lg-3">
                        <div id="card" class="container">
                            <div class="container" id="topics">
                                <p id="text">TOPICS</p>
                                <ul id="list">
                                    <li id="list-item">
                                        <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px; font-size: 13px;">Web</a>
                                    </li>
                                    <li id="list-item">
                                        <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px; font-size: 13px;">Game</a>
                                    </li>
                                    <li id="list-item">
                                        <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px; font-size: 13px;">Android</a>
                                    </li>
                                </ul>

                            </div>


                        </div>
                    </div>
                

                    <div class="col-lg-9">
                        <div id="card2f">
                            <div id="post">
                                <div>
                                    <div class="banner">
                                        <div class="wrapper">
                                            <p style="color: #fff;">
                                                <img src="uploads/<?php echo $AdminUserName['propic'];?>" style="width: 50px; height: 50px; border-radius: 100%">
                                                <span style="color:#2D2D2D; font-size: 16px; margin-top: 23px;"><?php echo $AdminUserName['username']; ?></span>
                                                <br>
                                                <span class="ban2" style="color:#9D9D9D; font-size: 12px;">May 4</span>

                                            </p>
                                        </div>
                                    </div>
                                    <!-- <span id="rigpost">
                                        <button id="demo-menu-lower-right"
                                                class="mdl-button mdl-js-button mdl-button--icon">
                                            <i class="material-icons">more_vert</i>
                                        </button>

                                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                            for="demo-menu-lower-right">
                                            <li class="mdl-menu__item">Some Action</li>
                                            <li class="mdl-menu__item">Another Action</li>
                                            <li disabled class="mdl-menu__item">Disabled Action</li>
                                            <li class="mdl-menu__item">Yet Another Action</li>
                                        </ul>
                                    </span> -->
                                </div>
                                <hr>
                                <div class="container">
                                    <p>Warmly Welcome from <?php echo $gpresult['gp_name']; ?></p>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
                <br>








































            <ul style="list-style-type: none">


                <?php

                $myQuery = "SELECT tbl_users.*, post.* FROM tbl_users LEFT JOIN post ON tbl_users.user_id = post.user_id WHERE post.gp_id = $gpId";
                $result = mysqli_query($conn, $myQuery) or die($myQuery."<br/><br/>".mysqli_error());

                while($row = mysqli_fetch_assoc($result)):
                ?>


                <li>
                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-9">
                            <div id="card2">
                                <div id="post">
                                    <div>
                                        <div class="banner">
                                            <div class="wrapper">
                                                <p style="color: #fff;">
                                                    <img src="uploads/<?php echo $row['propic'];?>" style="width: 50px; height: 50px; border-radius: 100%">
                                                    <span style="color:#2D2D2D; font-size: 16px; margin-top: 23px;"><?php echo $row['username']; ?></span>
                                                    <br>
                                                    <span class="ban2" style="color:#9D9D9D; font-size: 12px;">May 4</span>

                                                </p>
                                            </div>
                                        </div>
                                        <?php if (($AdminUserName['gp_admin'] == $_SESSION['userSession']) or ($_SESSION['userSession'] == $row['user_id'])):?>
                                        
                                        <span id="rigpost">
                                        <button id="demo-menu-lower-right<?php echo $row['post_id'];?>"
                                                class="mdl-button mdl-js-button mdl-button--icon">
                                            <i class="material-icons">more_vert</i>
                                        </button>

                                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                            for="demo-menu-lower-right<?php echo $row['post_id'];?>">
                                            <a href="delete_post.php?post_id=<?php echo $row['post_id'];?>&gp_id=<?php echo $gpId; ?>"><li class="mdl-menu__item">Delete</li></a>
                                        </ul>
                                        </span>
                                        <?php endif; ?>

                                    </div>
                                    <hr>
                                    <div class="container">
                                        <p style="width: 65%"><?php echo $row['post_body']?></p>
                                    </div>

                                </div>




                                <div class="container" style="background-color: #F6F6F6; width: 100%; padding-top: 12px; padding-bottom: 8px;">
                              
                                    <button id="cmt<?php echo $row['post_id'];?>" class="mdl-button mdl-js-button mdl-button--primary">
                                      Comments
                                    </button>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                    $("#cmt<?php echo $row['post_id'];?>").click(function(){
                                        $("#cmt_layout<?php echo $row['post_id'];?>").toggle();
                                    });
                                });
                                </script>
                                <div id="cmt_layout<?php echo $row['post_id'];?>">
                                <?php
$commentQuery = "SELECT comments.*,tbl_users.* FROM comments, tbl_users WHERE comments.gp_id = $gpId AND comments.post_id =".$row['post_id']." AND comments.user_id = tbl_users.user_id";
                                $result1 = mysqli_query($conn, $commentQuery) or die($commentQuery."<br/><br/>".mysqli_error());

                                while($row_cmt = mysqli_fetch_assoc($result1)): ?>
                                <div class="container" style="height: 80px; width: 100%; background-color: #F6F6F6; line-height: 80px;">



                                    <div class="banner" style="padding-top: 18px">
                                        <div class="wrapper">
                                            <p style="color: #fff;">
                                                <img src="img/10.jpg" style="width: 25px; height: 25px; border-radius: 100%">
                                                <span style="color:#5D5D5D; font-size: 14px; margin-top: 23px;"><?php echo $row_cmt['username']; ?></span>
                                                <br>
                                                <span class="ban2" style="color:#000000; font-size: 15px;"><?php echo $row_cmt['cmt_text']; ?>
                                                </span>

                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <? endwhile; ?>
                                </div>



                                <div style="position: relative; ">
                                    <div class="container-fluid" style="width: 100%;background-color: #EEEEEE;">
                                        <form method="post">
                                            <input type="hidden" name="cmtpostID" value="<?php echo $row['post_id'];?>">
                                            <input type="hidden" name="cmtgpID" value="<?php echo $gpId; ?>">
                                            <input type="hidden" name="cmtuserID" value="<?php echo $_SESSION['userSession']; ?>">

                                            <div id="comment" style="width: 100%;">
                                                <img src="img/10.jpg" style="width: 25px; height: 25px; border-radius: 100%">
                                                <div class="mdl-textfield mdl-js-textfield" style="width: 95%;">
                                                    <input name="cmttext" class="mdl-textfield__input" type="text" id="sample1">
                                                    <label class="mdl-textfield__label" for="sample1">Text...</label>
                                                </div>
                                                <button id="demo-menu-lower-right"
                                                        class="mdl-button mdl-js-button mdl-button--icon">
                                                    <i class="material-icons">photo_camera</i>
                                                </button>
                                                <button id="demo-menu-lower-right"
                                                        class="mdl-button mdl-js-button mdl-button--icon">
                                                    <i class="material-icons">link</i>
                                                </button>
                                                <button type="submit" name="commented" style="right:10px;position: absolute;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                                    Comment
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </li>
                <? endwhile; ?>
            </ul>























































<!--                start floating action button -->
                <nav class="container-float">
                    <a type="button" id="show-dialog" class="buttons-float" tooltip="New Post"></a>
                    <a class="buttons-float" href="#" tooltip="Compose">
                        <span id="spn" class="rotate-spn"></span>
                    </a>
                </nav>

                <dialog class="mdl-dialog">
                    <h4 class="mdl-dialog__title">Create Group</h4>
                    <form method="post">
                        <div class="mdl-dialog__content">
                            <div class="mdl-textfield mdl-js-textfield">
                                <textarea name="postBody" class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                                <label class="mdl-textfield__label" for="sample5">Text lines...</label>
                            </div>
                            <!-- <br>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="material-icons">image</i>
                            </label>
                            <input id="file-upload" type="file"/> -->

                            <input type="hidden" name="userid" value="<?php echo $_SESSION['userSession'] ; ?>">
                            <input type="hidden" name="gpid" value="<?php echo $gpId; ?>">
                            <!--                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%">-->

                            <!--                        <label class="mdl-textfield__label" for="sample3">Admin</label>-->
                            <!--                    </div>-->
                        </div>
                        <div class="mdl-dialog__actions">
                            <button type="submit" name="submitted" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Create</button>
                            <button type="button" class="mdl-button close">Cancel</button>
                        </div>
                    </form>
                </dialog>

<!--                end of floating action button -->



            </div>
        </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
            <div class="page-content">

                <div id="card-roomate" class="container">

                    <ul class="demo-list-icon mdl-list">



                        <?php
                            $commentQuery1 = "SELECT tbl_users.username FROM tbl_users, gpnusr WHERE gpnusr.gp_id = $gpId AND gpnusr.user_id = tbl_users.user_id";
                                $resultst = mysqli_query($conn, $commentQuery1) or die($commentQuery1."<br/><br/>".mysqli_error());

                                while($row_std = mysqli_fetch_assoc($resultst)): ?>


                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            <?php echo $row_std['username']; ?>
                        </span>
                        </li>

                        <? endwhile; ?>
                       
                    </ul>

                </div>

            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
            <div class="page-content">
                
                <div class="container" style="margin-top: 24px;">
                    <div class="row">
                        
                        
                        <div class="col-lg-3">
                            <div id="card">
                            <div style="padding-top: 24px; ">
                                <center><img src="uploads/<?php echo $AdminUserName['propic'];?>" style="width: 80px; height: 80px; border-radius: 100%"></center>
                            </div>
                            <center><div>
                                <h4><?php echo $AdminUserName['username']; ?></h4>
                                <span class="ban2" style="color:#9D9D9D; font-size: 12px;">Admin</span>
                            </div>
                            </center>
                            <div style="background-color: #EEEEEE; padding: 12px; margin-top: 30px; line-height: 20px;">

                            <p style='line-height: 30px'>
                                <i class="material-icons mdl-list__item-icon" style="vertical-align: middle">email</i>&nbsp;<?php echo $AdminUserName['email']; ?>
                            </p>

                            </div>

                                

                            </div>
                            <div id="card" style="margin-top: 10px; padding: 32px;">
                                <center><div>
                                <h4>Group Code</h4>
                                <span class="ban2" style="color:#9D9D9D; font-size: 12px;"><?php echo $gpId; ?></span>
                            </div>
                            </center>
                            </div>
                        </div>
                    

                        <div class="col-lg-9">
                            <div id="card2f">
                                <div style="padding-top: 24px; ">
                                <center><img src="uploads/<?php echo $gpresult['gp_profilephoto'];?>" style="width: 200px; height: 200px; border-radius: 100%"></center>
                            </div>
                            <center><div>
                                <h2><?php echo $gpresult['gp_name']; ?></h2>
                                <span class="ban2" style="color:#9D9D9D; font-size: 12px;"><?php echo $gpresult['gp_type']; ?></span>
                            </div>
                            </center>
                            <div style="background-color: #EEEEEE; padding: 12px; margin-top: 30px; line-height: 20px;">

                            

                            <!-- <form method="post">

                                <label for="file-upload" class="custom-file-upload">
                                <i class="material-icons">image</i>
                                </label>

                                <input name="gpphoto" id="file-upload" type="file"/>Choose Your Group Photo
                                <input type="submit" name="gpsubmit">
                            </form> -->

                            </div>
                                
                            </div>
                        </div>
                    </div>
                    </div>

                    <nav class="container-float">
                    
                    <a class="buttons-float" href="edit_group.php?gp_id=<?php echo $gpId; ?>" tooltip="Edit Group Information">
                        <span id="spn" class="rotate-spn"></span>
                    </a>
                </nav>





            </div>
        </section>
    </main>
</div>

</body>



<script>
    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if(! dialog.showModal){
        dialogPolyfill.registerDialog(dialog);

    }

    showDialogButton.addEventListener('click', function () {
        dialog.showModal();

    });

    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });

</script>

</html>