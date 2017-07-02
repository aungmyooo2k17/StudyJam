<?php
session_start();
require_once '../models/dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
    header("Location: home.php");
    exit;
}

if (isset($_POST['btn-login'])) {

    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $email = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);

    $query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
    $row=$query->fetch_array();

    $count = $query->num_rows; // if email/password are correct returns must be 1 row

    if (password_verify($password, $row['password']) && $count==1) {
        $_SESSION['userSession'] = $row['user_id'];
        header("Location: register.php");
    } else {
        $msg = "<div>
					<span></span> &nbsp; Invalid Username or Password !
				</div>";
    }
    $DBcon->close();
}





if(isset($_POST['btn-signup'])) {

    $uname = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);

    $uname = $DBcon->real_escape_string($uname);
    $email = $DBcon->real_escape_string($email);
    $upass = $DBcon->real_escape_string($upass);

    $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
    $count=$check_email->num_rows;

    if ($count==0) {

        $query = "INSERT INTO tbl_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

        if ($DBcon->query($query)) {
            $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
        }else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";

    }

    $DBcon->close();
}
?>


<html>
<head>
    <?php include 'code-segment/headerfile.php'?>
    <title></title>
    <link rel="stylesheet" href="register-form-code/font-awesome.min.css">
    <link rel="stylesheet" href="register-form-code/google-font-style-for-form.css">
    <link rel="stylesheet" href="register-form-code/style.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">

    <style>
        @media only screen and (max-width: 500px) {
            #regdesign{
             width: 350px;
            }
        }




    </style>
</head>
<body style="background-image: url('img/8.png')">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button">
            <i class="material-icons" style="line-height: 2"></i>
        </div>

        <div class="mdl-layout__header-row">

            <!-- Title -->
            <a href="../index.php" class="mdl-layout-title" style="color: #ffffff">Title</a>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="">About</a>
                <a class="mdl-navigation__link" href="">Contact Us</a>
                <a class="mdl-navigation__link" href="">Login </a>
                <a class="mdl-navigation__link" href="">Sign Up</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <a href="../index.php" class="mdl-layout-title" style="color: #ffffff">Title</a>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">About</a>
            <a class="mdl-navigation__link" href="">Contact Us</a>
            <a class="mdl-navigation__link" href="">Login</a>
            <a class="mdl-navigation__link" href="">Sign Up</a>
        </nav>
    </div>
    <main class="mdl-layout__content">

        <div class="page-content">

            <div class="materialContainer" id="regdesign">


                <div class="box">
                <form method="post">
                    <div class="title">LOGIN</div>

                    <?php
                    if(isset($msg)){
                        echo $msg;
                    }
                    ?>

                    <div class="input">
                        <label for="name">Email Address</label>
                        <input type="text" name="email" id="name">
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="pass">
                        <span class="spin"></span>
                    </div>

                    <div class="button login">
                        <button type="submit" name="btn-login"><span>GO</span></button>
                    </div>

                    <a href="" class="pass-forgot">Forgot your password?</a>
                </form>
                </div>

                <div class="overbox">
                    <div class="material-button alt-2"><span class="shape"></span></div>
                    <form method="post">
                    <div class="title">SIGN UP</div>

                    <div class="input">
                        <label for="regname">Username</label>
                        <input type="text" name="username" id="regname">
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="regemail">Email</label>
                        <input type="text" name="email" id="regname">
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="regpass">Password</label>
                        <input type="password" name="password" id="pass">
                        <span class="spin"></span>
                    </div>


                    <div class="button">
                        <button type="submit" name="btn-signup"><span>NEXT</span></button>
                    </div>
                    </form>


                </div>

            </div>

        </div>






    </main>



</div>


<script type="text/javascript" src="register-form-code/jquery.min.js"></script>
<script type="text/javascript" src="register-form-code/script.js"></script>

</body>
</html>