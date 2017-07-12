<?php
session_start();
include_once '../models/dbconnect.php';


if (!isset($_SESSION['userSession'])) {
    header("Location: ../index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

if(isset($_GET['gp_id'])){

    $gpId = $_GET['gp_id'];
    $group = $DBcon->query("SELECT * FROM study_group WHERE gp_id = $gpId");
    $gpresult = $group->fetch_array();


}

if(isset($_POST['btn-creategp'])){
    $gpname = strip_tags($_POST['gpname']);
    $gptype = strip_tags($_POST['gptype']);
    $gp_admin = strip_tags($_POST['gpadmin']);
    $user_id = strip_tags($_POST['userid']);

    $query2 = "INSERT INTO study_group ( gp_name, gp_type, gp_admin, user_id ) VALUES ( '$gpname', '$gptype', '$gp_admin', '$user_id')";
    $DBcon->query($query2);



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
        #card{

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
                        <div id="card2">
                            <div id="post">
                                <div>
                                    <div class="banner">
                                        <div class="wrapper">
                                            <p style="color: #fff;">
                                                <img src="img/10.jpg" style="width: 50px; height: 50px; border-radius: 100%">
                                                <span style="color:#2D2D2D; font-size: 16px; margin-top: 23px;">Aung Myo Oo</span>
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
                                    <p>www.google.com</p>
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

            </div>
        </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
            <div class="page-content">

                jaifojeofjeiofjieojfeiofijefjejojfeofjoejfo
            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
            <div class="page-content"><!-- Your content goes here --></div>
        </section>
    </main>
</div>

</body>
</html>