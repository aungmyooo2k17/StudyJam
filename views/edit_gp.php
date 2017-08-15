<?php
session_start();
include_once '../models/dbconnect.php';

if (!isset($_SESSION['userSession'])) {
    header("Location: register.php");

}

if(isset($_GET['gp_id'])){

    $gpId = $_GET['gp_id'];
    $group = $DBcon->query("SELECT * FROM study_group WHERE gp_id = $gpId");
    $gpresult = $group->fetch_array();
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();


if(isset($_POST['save'])){

    $file_get = $_FILES['pro']['name'];
    $temp = $_FILES['pro']['tmp_name'];

    $file_to_saved = "uploads/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
    move_uploaded_file($temp, $file_to_saved);

    $username = strip_tags($_POST['username']);
    $phone = strip_tags($_POST['phone']);
    $school= strip_tags($_POST['school']);
    $skill = strip_tags($_POST['skill']);
    $dob = strip_tags($_POST['dob']);
    $gender = strip_tags($_POST['gender']);
    $address = strip_tags($_POST['address']);


    $query = "UPDATE tbl_users SET username = '$username', phone = '$phone', school = '$school', skill = '$skill', dob = '$dob', gender = '$gender', address = '$address', propic = '$file_get' WHERE user_id =".$_SESSION['userSession'];
    if ($DBcon->query($query)) {

        header("location: userprofile.php");
    }else {
        $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
    }

}

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
                    <img src="uploads/<?php echo $gpresult['gp_profilephoto'];?>" style="width: 250px; height: 250px; border-radius: 100%">

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
                                <input name="username" class="mdl-textfield__input" type="text" id="sample3" value="<?php echo $userRow['username'];?>">
                                <label class="mdl-textfield__label" for="sample3">Username</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="phone" class="mdl-textfield__input" type="tel" id="sample3" value="<?php echo $userRow['phone'];?>">
                                <label class="mdl-textfield__label" for="sample3">Phone Number</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="school" class="mdl-textfield__input" type="text" id="sample3" value="<?php echo $userRow['school'];?>">
                                <label class="mdl-textfield__label" for="sample3">School</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="skill" class="mdl-textfield__input" type="text" id="sample3" value="<?php echo $userRow['skill'];?>">
                                <label class="mdl-textfield__label" for="sample3">Skill</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="dob" class="mdl-textfield__input" type="date" id="sample3" value="<?php echo $userRow['dob'];?>">
                                <label class="mdl-textfield__label" for="sample3">Date of Birth</label>
                            </div>
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                                    <input type="radio" id="option-1" class="mdl-radio__button" name="gender" value="male">
                                    <span class="mdl-radio__label">male</span>
                                </label>
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                    <input type="radio" id="option-2" class="mdl-radio__button" name="gender" value="female">
                                    <span class="mdl-radio__label">female</span>
                                </label>

                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 95%;">
                                <input name="address" class="mdl-textfield__input" type="text" id="sample3" value="<?php echo $userRow['address'];?>">
                                <label class="mdl-textfield__label" for="sample3">Address</label>
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