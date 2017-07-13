<?php
session_start();
include_once '../models/dbconnect.php';


if (!isset($_SESSION['userSession'])) {
    header("Location: ../index.php");
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



if(isset($_POST['submitted'])){
    $Ppostbody = strip_tags($_POST['postBody']);
    $Puserid = strip_tags($_POST['userid']);
    $Pgpid = strip_tags($_POST['gpid']);
    $PpostQuery = "INSERT INTO post (post_body, user_id, gp_id) VALUES ('$Ppostbody', '$Puserid', '$Pgpid')";
    $DBcon->query($PpostQuery);





}



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
                    <li class="mdl-menu__item"><a href="#" style="text-decoration: none">About</a></li>
                    <li class="mdl-menu__item"><a href="#" style="text-decoration: none">Contact Us</a></li>
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
        <span class="mdl-layout-title">Title</span>
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
                                        <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px; font-size: 13px;">Programming</a>
                                    </li>
                                    <li id="list-item">
                                        <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px; font-size: 13px;">Programming</a>
                                    </li>
                                    <li id="list-item">
                                        <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px; font-size: 13px;">Programming</a>
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
                                                <img src="img/10.jpg" style="width: 50px; height: 50px; border-radius: 100%">
                                                <span style="color:#2D2D2D; font-size: 16px; margin-top: 23px;"><?php echo $query3Row['username']; ?></span>
                                                <br>
                                                <span class="ban2" style="color:#9D9D9D; font-size: 12px;">May 4</span>

                                            </p>
                                        </div>
                                    </div>
                                    <span id="rigpost">
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
                                    </span>
                                </div>
                                <hr>
                                <div class="container">
                                    <p>Warmly Welcome from <?php echo $gpresult['gp_name']; ?></p>
                                </div>

                            </div>
                            <div style="position: relative;">
                                <div class="container-fluid" style="width: 100%;background-color: #EEEEEE;">
                                    <form>
                                        <div id="comment" style="width: 100%;">
                                            <img src="img/10.jpg" style="width: 15px; height: 15px; border-radius: 100%">
                                            <div class="mdl-textfield mdl-js-textfield" style="width: 95%;">
                                                <input class="mdl-textfield__input" type="text" id="sample1">
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
                                            <button style="right:10px;position: absolute;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                                Button
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>








































            <ul style="list-style-type: none">


                <?php

                $myQuery = "SELECT * FROM timeline,study_group WHERE timeline.gp_id = study_group.gp_id AND timeline.gp_id = $gpId AND study_group.gp_id = $gpId";
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
                                                    <img src="img/10.jpg" style="width: 50px; height: 50px; border-radius: 100%">
                                                    <span style="color:#2D2D2D; font-size: 16px; margin-top: 23px;"><?php echo $row['post_owner']; ?></span>
                                                    <br>
                                                    <span class="ban2" style="color:#9D9D9D; font-size: 12px;">May 4</span>

                                                </p>
                                            </div>
                                        </div>
                                        <span id="rigpost">
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
                                    </span>
                                    </div>
                                    <hr>
                                    <div class="container">
                                        <p>Warmly Welcome from <?php echo $gpresult['gp_name']; ?></p>
                                    </div>

                                </div>
                                <div style="position: relative;">
                                    <div class="container-fluid" style="width: 100%;background-color: #EEEEEE;">
                                        <form>
                                            <div id="comment" style="width: 100%;">
                                                <img src="img/10.jpg" style="width: 15px; height: 15px; border-radius: 100%">
                                                <div class="mdl-textfield mdl-js-textfield" style="width: 95%;">
                                                    <input class="mdl-textfield__input" type="text" id="sample1">
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
                                                <button style="right:10px;position: absolute;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                                    Button
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
                            <br>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="material-icons">image</i>
                            </label>
                            <input id="file-upload" type="file"/>
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
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            Bryan Cranston
                        </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            Aaron Paul
                        </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            Bob Odenkirk
                          </span>
                        </li>
                    </ul>

                </div>

            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
            <div class="page-content"><!-- Your content goes here --></div>
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