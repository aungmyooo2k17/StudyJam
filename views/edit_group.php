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

if(isset($_POST['save'])){

    $file_get = $_FILES['pro']['name'];
    $temp = $_FILES['pro']['tmp_name'];

    $file_to_saved = "uploads/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
    move_uploaded_file($temp, $file_to_saved);

    $gp_name = strip_tags($_POST['gp_name']);
    $gp_type = strip_tags($_POST['gp_type']);
    


    $query = "UPDATE study_group SET gp_name = '$gp_name', gp_type = '$gp_type', gp_profilephoto = '$file_get' WHERE gp_admin =".$_SESSION['userSession']." AND gp_id = $gpId";
    if ($DBcon->query($query)) {

        header("location: timeline.php?gp_id=".$gpId);
    }else {
        $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
                    </div>";
    }

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
body{
            background-color: #F5F5F5;
        }

        #floating-action-btn{
            position: fixed;
            bottom: 0;
            right: 0;
            display: block;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;

        }

        #profile-carddesign{
            margin-top: -260px;
            height: 400px;

        }

        #containing{
            padding: 0.01em 16px;

        }

        #info-card{
            width: 100%;

        }

        #floating-action-btn{
            position: fixed;
            bottom: 0;
            right: 0;
            background-color: #000000;
            display: block;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }


    </style>
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button">
            <i class="material-icons" style="line-height: 2"></i>
        </div>

        <div class="mdl-layout__header-row">

            <!-- Title -->
            <span class="mdl-layout-title">Title</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="" style="text-decoration: none"><?php echo $userRow['username'];?></a>
                <button id="demo-menu-lower-right"
                        class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">more_vert</i>
                </button>

                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    for="demo-menu-lower-right">
                    <li class="mdl-menu__item"><a href="#" style="text-decoration: none">About</a></li>
                    <li class="mdl-menu__item"><a href="#" style="text-decoration: none">Contact Us</a></li>
                    <li class="mdl-menu__item"><a href="logout.php?logout" style="text-decoration: none">Logout</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="" style="text-decoration: none"><?php echo $userRow['username'];?></a>
            <a class="mdl-navigation__link" href="contact.php" style="text-decoration: none">Contact</a>
            <a class="mdl-navigation__link" href="logout.php?logout" style="text-decoration: none">Logout</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div style="background-color: #3F51B5; width: 100%; height: 350px">

        </div>

        <center>

            <div class="demo-card-square mdl-card mdl-shadow--4dp" id="profile-carddesign">

                <div class="mdl-card__supporting-text">
                    <img src="uploads/<?php echo $gpresult['gpprofilephoto'];?>" style="width: 250px; height: 250px; border-radius: 100%">

                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <h4><?php echo $gpresult['gp_name'];?></h4>
                </div>
            </div>  

        </center>

        <div class="container" style="margin-top: 24px;">
            <div class="demo-card-wide mdl-card mdl-shadow--4dp" id="info-card">
                <div class="container">
                    <h3>UPDATE INFO</h3>
                    <hr>

                    <form method="post" enctype="multipart/form-data">

                        <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>



                            <div>

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="gp_name" class="mdl-textfield__input" type="text" id="sample3" value="<?php echo $gpresult['gp_name'];?>">
                                <label class="mdl-textfield__label" for="sample3">Group Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="gp_type" class="mdl-textfield__input" type="tel" id="sample3" value="<?php echo $gpresult['gp_type'];?>">
                                <label class="mdl-textfield__label" for="sample3">Group Type</label>
                            </div>
                           
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                    <input type="file" name="pro" id="fileToUpload">

                                </div>



                        </div>

                        <div class="mdl-grid">

                            <div class="mdl-cell mdl-cell--8-col"></div>
                            <div class="mdl-cell mdl-cell--4-col"><div>
                                    <a href="userprofile.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="left: 0; text-decoration: none">
                                        Cancel
                                    </a> &nbsp;
                                    <button name="save" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="left: 0;">
                                        save
                                    </button>
                                </div></div>

                        </div>


                        <hr>

                    </form>



                </div>

            </div>

        </div>


    </main>
</div>



<script src="mdl/material.min.js"></script>
</body>




</html>