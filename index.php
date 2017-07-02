<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="views/mdl/material.indigo-pink.min.css">
    <link rel="stylesheet" href="views/mdl/icon.css">

    <script type="text/javascript" src="views/mdl/material.min.js"></script>

    <title>Study Jam</title>
    <style>
        /*.demo-layout-transparent {*/
        /*background: url('views/img/home.jpg') center / cover;*/
        /*}*/
        /*.demo-layout-transparent .mdl-layout__header,*/
        /*.demo-layout-transparent .mdl-layout__drawer-button {*/
        /*!* This background is dark, so we set text to white. Use 87% black instead if*/
        /*your background is light. *!*/
        /*color: white;*/
        /*}*/

        #headerst {
            height: 500px;
        }
        #jumst{

            z-index: 1;
            position: relative;
            margin-top: -350px;
            color: #ffffff;
        }
        #contentMg{
            width: auto;
            padding-right: 50px;
            padding-left:50px;


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
                <a class="mdl-navigation__link" href="">About</a>
                <a class="mdl-navigation__link" href="">Contact Us</a>
                <a class="mdl-navigation__link" href="">Login </a>
                <a class="mdl-navigation__link" href="views/register.php">Sign Up</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">About</a>
            <a class="mdl-navigation__link" href="">Contact Us</a>
            <a class="mdl-navigation__link" href="views/register.php">Login</a>
            <a class="mdl-navigation__link" href="">Sign Up</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div style="background-image: url('views/img/10.jpg'); width: 100%; height: 467px">
                <div style=" width: 100%; height: 467px;">

                </div>
                <center>
                    <div id="jumst">
                        <h1 id="jumst" style="color: #ffffff;">STUDY TOGEHTER</h1>
                        <p style="color: #ffffff;">Developed by United Team</p>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            GET STARTED
                        </button>
                    </div>
                </center>
            </div>
            <div>
                <div align="center" id="contentMg">
                <h3 style="font-weight: bold">Forever free, open source, and easy to use.</h3>
                <p>Start Bootstrap is a collection of free to download Bootstrap themes and templates. Our themes are open source and you can use them for any purpose, even comercially!</p>
                </div>
            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--6-col">6</div>
                <div class="mdl-cell mdl-cell--6-col">6</div>

            </div>
            </div>

        </div>

    </main>
</div>


</body>