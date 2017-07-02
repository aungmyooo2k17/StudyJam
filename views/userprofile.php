<?php
session_start();
include_once '../models/dbconnect.php';

if (!isset($_SESSION['userSession'])) {
    header("Location: register.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>
<html>
<head>
    <?php include 'code-segment/headerfile.php'?>
    <title></title>
    <link rel="stylesheet" href="/views/cus-style/custom-style.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <style>

        body{
            background-color: #F5F5F5;
        }

        #floating-action-btn{
            position: fixed;
            bottom: 0;
            right: 0;
            display: block;
            margin: 1.5em;
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
            <a class="mdl-navigation__link" href="" style="text-decoration: none">About</a>
            <a class="mdl-navigation__link" href="logout.php?logout" style="text-decoration: none">Logout</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div style="background-color: #3F51B5; width: 100%; height: 350px">

        </div>

        <center>

        <div class="demo-card-square mdl-card mdl-shadow--4dp" id="profile-carddesign">

            <div class="mdl-card__supporting-text">
                <img src="uploads/<?php echo $userRow['propic'];?>" style="width: 250px; height: 250px; border-radius: 100%">
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <h3><?php echo $userRow['username'];?></h3>
            </div>
        </div>

        </center>

        <div class="container" style="margin-top: 24px;">
            <div class="demo-card-wide mdl-card mdl-shadow--4dp" id="info-card">
                <div id="containing">
                    <h3>INFO</h3>
                    <hr>
                    <div class="container">
                        <ul class="demo-list-icon mdl-list">
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">person</i>
                                    <?php echo $userRow['username'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">email</i>
                                    <?php echo $userRow['email'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">phone</i>
                                    <?php echo $userRow['phone'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">school</i>
                                    <?php echo $userRow['school'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">assignment ind</i>
                                    <?php echo $userRow['skill'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">cake</i>
                                    <?php echo $userRow['dob'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">wc</i>
                                    <?php echo $userRow['gender'];?>
                                </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">home</i>
                                    <?php echo $userRow['address'];?>
                                </span>
                            </li>
                        </ul>
                    </div>


                </div>

            </div>

        </div>


    </main>
</div>

<a href="userprofileEdit.php" id="floating-action-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
    <i class="material-icons">add</i>
</a>




<script src="mdl/material.min.js"></script>
</body>
</html>