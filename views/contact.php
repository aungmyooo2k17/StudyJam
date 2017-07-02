<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="mdl/material.indigo-pink.min.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="mdl/icon.css">
    <script type="text/javascript" src="mdl/material.min.js"></script>

    <style>
        /*.container{*/
            /*margin-right: auto;*/
            /*margin-left:auto;*/
            /*margin-right: 15px;*/
            /*margin-left: 15px;*/
        /*}*/

        /*#circle-btn-round{*/
            /*width: 100px;*/
            /*height: 100px;*/
            /*border-radius: 100%;*/
            /*background-color: #ffa000;*/
        /*}*/

        #pdforcont{
            padding-top: 50px;
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
                <a class="mdl-navigation__link" href="" style="text-decoration: none">About</a>
                <a class="mdl-navigation__link" href="" style="text-decoration: none">Contact Us</a>
                <a class="mdl-navigation__link" href="" style="text-decoration: none">Login </a>
                <a class="mdl-navigation__link" href="register.php" style="text-decoration: none">Sign Up</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="" style="text-decoration: none">About</a>
            <a class="mdl-navigation__link" href="" style="text-decoration: none">Contact Us</a>
            <a class="mdl-navigation__link" href="register.php" style="text-decoration: none">Login</a>
            <a class="mdl-navigation__link" href="" style="text-decoration: none">Sign Up</a>
        </nav>
    </div>

    <main class="mdl-layout__content">
    <div class="container" id="pdforcont">
        <h4>GET IN TOUCH WITHME</h4>
        <br>
        <div class="mdl-grid">

            <div class="mdl-cell mdl-cell--6-col">
                <h5>CONTACT ADDRESS</h5>
                <br>
                <p><span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    123 Sility Corner Street, Melbormem Australia.
                </p></span>
                <p><span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    Phone: +959789333573
                </span></p>
                <p><span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    Email: example@gmail.com
                </span></p>
                <p><span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    Website: info@sility.com
                </span></p>
                <br>
                <a href="userprofileEdit.php" id="floating-action-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </a>&nbsp;

                <a href="userprofileEdit.php" id="floating-action-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </a>&nbsp;

                <a href="userprofileEdit.php" id="floating-action-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </a>&nbsp;

                <a href="userprofileEdit.php" id="floating-action-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </a>&nbsp;

                <a href="userprofileEdit.php" id="floating-action-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </a>&nbsp;

            </div>
            <div class="mdl-cell mdl-cell--6-col">
                <h5>CONTACT FORM</h5>
                <br>

                <form>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;">
                        <input name="name" class="mdl-textfield__input" type="text" id="sample3">
                        <label class="mdl-textfield__label" for="sample3">Name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;">
                        <input name="email" class="mdl-textfield__input" type="email" id="sample3">
                        <label class="mdl-textfield__label" for="sample3">Email</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;">
                        <textarea name="mesg" class="mdl-textfield__input" id="sample3"></textarea>
                        <label class="mdl-textfield__label" for="sample3">Message</label>
                    </div>
                    <br>
                    <button name="save" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        save
                    </button>
                </form>
            </div>

        </div>
    </div>





    </main>
</div>

</body>
</html>