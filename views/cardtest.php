<html xmlns="http://www.w3.org/1999/html">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <style>


        #post{
            padding: 16px;
            position: relative;
        }

        /*div div {*/
            /*text-align: left;*/
        /*}*/

        div span#rigpost {
            position: absolute;
            right: 10px;
            top: 5px;
        }


        body{
            font-family: 'Roboto', sans-serif;
            font-size: 13px;
        }

        #cheader{
            padding-top: 12px;
            width: 100%;
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

        #hleft{
            float: left;
        }








        #card{
            margin: 100px;
            box-shadow: 10px 10px 5px #888888;
            width: 200px;
            height: 300px;
            background-color: #ffffff;

        }
        #text{

            font-family: 'Roboto', sans-serif;
            font-size: 18px;
        }
        #topics{
            padding-top: 28px;
        }
        #list{
            list-style-type: none;
            line-height:300%;
            margin-left: -55px;
        }

        #list-item{
            padding-left: 16px;
            color: #7F7F7F;
            text-decoration: none;
            width: 200px;
        }
        #list-item:hover{
            background-color: #EEEEEE;
            color: #6B6B6B;
            text-decoration: none;
        }

        #card2{
            margin: 32px;
            box-shadow: 10px 10px 5px #888888;
            width: 80%;
            background-color: #ffffff;

        }

        #post1{
            right:10px;
            position: absolute;
        }



    </style>
    <link rel="stylesheet" href="mdl/icon.css">
    <link href="boostrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="mdl/material.min.css" rel="stylesheet">
    <script type="text/javascript" src="mdl/material.min.js"></script>
</head>
<body style="background-color: #E8F0FE">
<div id="card">
    <div class="container" id="topics">
        <p id="text">TOPICS</p>
        <ul id="list">
            <li id="list-item">
                <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px">Programming</a>
            </li>
            <li id="list-item">
                <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px">Programming</a>
            </li><li id="list-item">
                <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px">Programming</a>
            </li><li id="list-item">
                <a href="#" style="color: #7F7F7F; text-decoration: none; display: block; width: 200px">Programming</a>
            </li>
        </ul>

    </div>
</div>



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
                <img src="img/10.jpg" style="width: 30px; height: 30px; border-radius: 100%">
                <div class="mdl-textfield mdl-js-textfield" style="width: 96%;">
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
                <button id="post1" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Button
                </button>
            </div>
        </form>

    </div>
</div>
    
</div>






</body>
</html>