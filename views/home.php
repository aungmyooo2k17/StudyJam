<?php
session_start();
include_once '../models/dbconnect.php';
include '../controllers/RandomColor.php';
use \Colors\RandomColor;


if (!isset($_SESSION['userSession'])) {
    header("Location: ../index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

if(isset($_POST['btn-creategp'])){
    $gpname = strip_tags($_POST['gpname']);
    $gptype = strip_tags($_POST['gptype']);
    $gp_admin = strip_tags($_POST['gpadmin']);
    $user_id = strip_tags($_POST['userid']);

    $query2 = "INSERT INTO study_group ( gp_name, gp_type, gp_admin, user_id ) VALUES ( '$gpname', '$gptype', '$gp_admin', '$user_id')";
    $DBcon->query($query2);


    



}

if(isset($_POST['btn-joingp'])){

    $user_id = strip_tags($_POST['userid']);
    $gp_id = strip_tags($_POST['gpid']);

    $query3 = "INSERT INTO gpnusr ( gp_id, user_id ) VALUES ( '$gp_id', '$user_id')";
    $DBcon->query($query3);

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
    <script type="text/javascript" src="mdl/material.min.js"></script>
    <script type="text/javascript">

      function activateTab(pageId) {
          var tabCtrl = document.getElementById('tabCtrl');
          var pageToActivate = document.getElementById(pageId);
          for (var i = 0; i < tabCtrl.childNodes.length; i++) {
              var node = tabCtrl.childNodes[i];
              if (node.nodeType == 1) { /* Element */
                  node.style.display = (node == pageToActivate) ? 'block' : 'none';
              }
          }
      }

    </script>

    <title></title>
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
        @media (max-height: 35.5em)
            #emt-img {
                height: 30%;
                width: 300%;
                margin-bottom: .8rem;
            }

        #emt-img{
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-background-size: contain;
            background-size: contain;
            -webkit-flex-shrink: 1;
            flex-shrink: 1;
            height: 38rem;
            margin-bottom: 4rem;
            max-height: 90vw;
            width: 90%;
        }
        #emt-text{
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-background-size: contain;
            background-size: contain;
            -webkit-flex-shrink: 1;
            flex-shrink: 1;

        }
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

        #aa{
            list-style-type: none;
            display: block;
            overflow: hidden;
            margin:0;
            padding:0;
        }
        #ulaa{
            float: left;
        }

        .container-float{
            z-index: 11;
        }

        /*change view design*/
        @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css);
@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);


.mrng-60-top {
  margin-top: 60px;
}
/* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
  position: relative;
  display: block;
  margin: 30px auto 0;
  padding: 14px 15px;
  color: #fff;
  font-size:14px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  letter-spacing: .08em;
  border-radius: 0;
  text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  transition: all 1s ease;
}
a.animated-button:link:after, a.animated-button:visited:after {
  content: "";
  position: absolute;
  height: 0%;
  left: 50%;
  top: 50%;
  width: 150%;
  z-index: -1;
  -webkit-transition: all 0.75s ease 0s;
  -moz-transition: all 0.75s ease 0s;
  -o-transition: all 0.75s ease 0s;
  transition: all 0.75s ease 0s;
}
a.animated-button:link:hover, a.animated-button:visited:hover {
  color: #000000;
  text-shadow: none;
}
a.animated-button:link:hover:after, a.animated-button:visited:hover:after {
  height: 450%;
}
a.animated-button:link, a.animated-button:visited {
  position: relative;
  display: block;
  margin: 30px auto 0;
  padding: 14px 15px;
  color: #000000;
  font-size:14px;
  border-radius: 0;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  letter-spacing: .08em;
  text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  transition: all 1s ease;
}
a.animated-button.thar-three {
  color: #880e4f;
  cursor: pointer;
  display: block;
  position: relative;
  border: 2px solid #FF4081;
  transition: all 0.4s cubic-bezier(0.42, 0, 0.58, 1);
0s;
}
a.animated-button.thar-three:hover {
  color: #fff !important;
  background-color: transparent;
  text-shadow: nthree;
}
a.animated-button.thar-three:hover:before {
  left: 0%;
  right: auto;
  width: 100%;
}
a.animated-button.thar-three:before {
  display: block;
  position: absolute;
  top: 0px;
  right: 0px;
  height: 100%;
  width: 0px;
  z-index: -1;
  content: '';
  color: #fff !important;
  background: #FF4081;
  transition: all 0.4s cubic-bezier(0.42, 0, 0.58, 1);
0s;
}
a.animated-button.thar-four {
  color: #880e4f;
  cursor: pointer;
  display: block;
  position: relative;
  border: 2px solid #FF4081;
  transition: all 0.4s cubic-bezier(0.42, 0, 0.58, 1);
0s;
}
a.animated-button.thar-four:hover {
  color: #fff !important;
  background-color: transparent;
  text-shadow: nfour;
}
a.animated-button.thar-four:hover:before {
  right: 0%;
  left: auto;
  width: 100%;
}
a.animated-button.thar-four:before {
  display: block;
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 0px;
  z-index: -1;
  content: '';
  color: #fff !important;
  background: #FF4081;
  transition: all 0.4s cubic-bezier(0.42, 0, 0.58, 1);
0s;
}


      #chg_v ul{

        list-style-type: none;
        display: inline;

      }
      #chg_v ul li{
        margin-right: -6px;
        display: inline-block;
        height: 50px;
      }
      #chg_v ul li.selected{

        display: inline-block;
        height: 50px;
        padding-top: 15px;
        background-color: #FF4081;
      }


      #kk{
        
        display: inline;
      }
      /*end chagne view design*/


    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
      $("li").click(function(e){
        $("li").removeClass("selected");
        $(this).addClass("selected");
      });
});
     

    </script>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button">
            <i class="material-icons" style="line-height: 2"></i>
        </div>

        <div class="mdl-layout__header-row">

            <!-- Title -->
            <span class="mdl-layout-title">Study Jam</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">

                <a class="mdl-navigation__link" href="userprofile.php" style="text-decoration: none"><?php echo $userRow['email'];?></a>
                <button id="demo-menu-lower-right"
                        class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">more_vert</i>
                </button>

                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    for="demo-menu-lower-right">
                    <li class="mdl-menu__item"><a href="logout.php?logout" style="text-decoration: none">Logout</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Study Jam</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="userprofile.php" style="text-decoration: none"><?php echo $userRow['username'];?></a>

            <a class="mdl-navigation__link" href="../index.php" style="text-decoration: none">Main Page</a>
            <a class="mdl-navigation__link" href="logout.php?logout" style="text-decoration: none">Logout</a>
        </nav>
    </div>

    <main class="mdl-layout__content" style="background-color: #E8E8E8">



    




        <?php
        $myQuery = "SELECT * FROM study_group WHERE user_id = ".$_SESSION['userSession'];
        $myQuery2 = "SELECT gpnusr.* FROM gpnusr WHERE gpnusr.user_id =".$_SESSION['userSession'];
        $result2 = mysqli_query($conn, $myQuery2) or die($myQuery2."<br/><br/>".mysql_error());
        $result = mysqli_query($conn,$myQuery) or die($myQuery."<br/><br/>".mysqli_error());
        $count = 0;



        while ($row = mysqli_fetch_assoc($result)){
            $count++;
        }

        while ($row = mysqli_fetch_assoc($result2)) {
            $count++;
        }

        ?>

        <?php if ($count <= 0): ?>


        <div class="container">
            <center>
            <div id="emt-img" style="background-image: url('img/empty_states_comments.png'); margin-top: 8%;"></div>
            </center>
            <h4 id="emt-text" align="center">Don't see your existing classes?</h4>
            <center><a href="#">TRY ANOTHER ACCOUNT</a></center>


        </div>

        <?php else: ?>

            <div id="chg_v" style="margin-top: 20px;">
    <center>
    <ul>
      <li class="selected">
        <a id="kk" class="btn btn-sm animated-button thar-three" href="javascript:activateTab('page1')">Created Group</a>
      </li>
      <li>
        <a id="kk" class="btn btn-sm animated-button thar-four" href="javascript:activateTab('page2')">Joined Group</a>
      </li>
    </ul>
    </center>
    </div>
    <div id="tabCtrl">
      <div id="page1" style="display: block;">
         <div class="container">
            <ul id="aa">

                <?php

                $myQuery = "SELECT study_group.* FROM study_group WHERE study_group.user_id =".$_SESSION['userSession'];
                $result = mysqli_query($conn, $myQuery) or die($myQuery."<br/><br/>".mysqli_error());

                while($row = mysqli_fetch_assoc($result)):


 
                  // $rgbColor = array();
                   
                  // //Create a loop.
                  // foreach(array('r', 'g', 'b') as $color){
                  //     //Generate a random number between 0 and 255.
                  //     $rgbColor[$color] = mt_rand(0, 255);
                  // }
                   
                  foreach (RandomColor::many(27, array('luminosity'=>'light')) as $c)
                    ?>
                    <li id="ulaa">
                        <div class="mdl-card mdl-shadow--4dp" style="margin: 16px;">

                            <div style="background-color:<?php echo $c;?> ; height: 150px; width: 100%;">
                                <div style="padding-left: 16px;">
                                    <h3><?php echo $row['gp_name']?></h3>
                                    <p><? echo $row['gp_type']?></p>
                                    
                                </div>

                                <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon" style="margin-top: -135px; margin-left: 280px">
                                    <i class="material-icons">more_vert</i>
                                </button>

                            </div>
                            <img src="uploads/<?php echo $row['gp_profilephoto'];?>" style="width: 65px; height: 65px; border-radius: 100%; margin-top: -35px; margin-left: 240px" >

                            <a href="timeline.php?gp_id=<?php echo $row['gp_id']; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin: 30px">
                                GO
                            </a>
                        </div>
                    </li>

                <? endwhile; ?>

            </ul>
        </div>
        
      </div>

  
      
        
      
      <div id="page2" style="display: none;">
        <div class="container">
            <ul id="aa">

                <?php

                $myQuery = "SELECT study_group.* FROM study_group, gpnusr WHERE study_group.gp_id = gpnusr.gp_id AND gpnusr.user_id =".$_SESSION['userSession'];
                $result = mysqli_query($conn, $myQuery) or die($myQuery."<br/><br/>".mysqli_error());

                while($row = mysqli_fetch_assoc($result)):

                      foreach (RandomColor::many(27, array('luminosity'=>'light')) as $c)

                    ?>
                    <li id="ulaa">
                        <div class="mdl-card mdl-shadow--4dp" style="margin: 16px;">

                            <div style="background-color:<?php echo $c;?>; height: 150px; width: 100%;">
                                <div style="padding-left: 16px;">
                                    <h4><?php echo $row['gp_name']?></h4>
                                    <p><? echo $row['gp_type']?></p>
                                </div>

                                <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon" style="margin-top: -135px; margin-left: 280px">
                                    <i class="material-icons">more_vert</i>
                                </button>

                            </div>
                            <img src="uploads/<?php echo $row['gp_profilephoto'];?>" style="width: 65px; height: 65px; border-radius: 100%; margin-top: -35px; margin-left: 240px" >

                            <a href="timeline.php?gp_id=<?php echo $row['gp_id']; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin: 30px">
                                GO
                            </a>
                        </div>
                    </li>

                <? endwhile; ?>

            </ul>
        </div>
        <?php endif ?>
      </div>
    </div>

        


        <nav class="container-float">

            <a type="button" id="show-dialog2" class="buttons-float" tooltip="Join Group"></a>
            <a type="button" id="show-dialog" class="buttons-float" tooltip="Create Group"></a>
            <a class="buttons-float" href="#" tooltip="Compose">
                <span id="spn" class="rotate-spn"></span>
            </a>
        </nav>






















        <dialog class="mdl-dialog">
            <h4 class="mdl-dialog__title">Create Group</h4>
            <form method="post">
            <div class="mdl-dialog__content">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%">
                        <input name="gpname" class="mdl-textfield__input" type="text" id="sample3">
                        <label class="mdl-textfield__label" for="sample3">Name</label>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%">
                        <input name="gptype" class="mdl-textfield__input" type="text" id="sample3">
                        <label class="mdl-textfield__label" for="sample3">Type</label>
                        <input name="gpadmin" type="hidden" id="sample3" value="<?php echo $userRow['user_id'];?>">
                        <input name="userid" type="hidden" id="sample3" value="<?php echo $userRow['user_id'];?>">
                    </div>
                    <br>
<!--                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%">-->

<!--                        <label class="mdl-textfield__label" for="sample3">Admin</label>-->
<!--                    </div>-->
            </div>
            <div class="mdl-dialog__actions">
                <button type="submit" name="btn-creategp" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Create</button>
                <button type="button" class="mdl-button close">Cancel</button>
            </div>
            </form>
        </dialog>

        <dialog id="dialog2" class="mdl-dialog">
            <h4 class="mdl-dialog__title">Join Group</h4>
            <form method="post">
                <div class="mdl-dialog__content">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%">
                        <input name="gpid" class="mdl-textfield__input" type="text" id="sample3">
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['userSession'];?>">
                        <label class="mdl-textfield__label" for="sample3">Group Code</label>
                    </div>

                </div>
                <div class="mdl-dialog__actions">
                    <button type="submit" name="btn-joingp" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">JOIN</button>
                    <button type="button" class="mdl-button close">CANCEL</button>

                </div>
            </form>
        </dialog>

    </main>
</div>


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

    //join dialog2
    var dialog2 = document.querySelector('#dialog2');
    var showDialogButton2 = document.querySelector('#show-dialog2');
    if(! dialog2.showModal){
        dialogPolyfill.registerDialog(dialog2);

    }

    showDialogButton2.addEventListener('click', function () {
        dialog2.showModal();

    });

    dialog2.querySelector('.close').addEventListener('click', function () {
        dialog2.close();
    });


</script>

</body>
</html>