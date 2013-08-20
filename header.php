<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--
IdleRPG Website by adamus1red is licensed under a 
Creative Commons Attribution-NonCommercial-ShareAlike 
3.0 Unported License.
Based on a work at http://idlerpg.net/.
-->

<html>
  <head>
    <title><?php echo $irpg_chan;?> Idle RPG: <?php echo $irpg_page_title;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
        if ($style == null) {
            echo '    <link rel="stylesheet" type="text/css" href="'.$BASEURL.'theme/classic/css/style.css" media="screen">'."\n".
                 '    <link href="'.$BASEURL.'theme/classic/css/style-responsive.css" rel="stylesheet" media="screen">';
        } else {
            echo '    <link rel="stylesheet" type="text/css" href="'.$BASEURL.'theme/'.$style.'/css/style.css" media="screen">'."\n".
                 '    <link href="'.$BASEURL.'theme/'.$style.'/css/style-responsive.css" rel="stylesheet" media="screen">';
        }
    ?>
    <style type="text/css">
        <!-- Global Styles -->
        <!--body {
            padding-top: 60px;
            padding-bottom: 40px;
        }-->
        .container {
            padding-top: 60px;
            margin: 0 auto;
            max-width: 1000px;
        }
        .container > hr {
            margin: 60px 0;
        }
        .container-fluid {
            margin: 0 auto;
            max-width: 1000px;
        }
        
        <!-- responsive stuff -->
        @media (max-width: 980px) {
        /* Enable use of floated navbar text */
            .navbar-text.pull-right {
            float: none;
            padding-left: 5px;
            padding-right: 5px;
            }
        }
<?php 
        if ($_SERVER['PHP_SELF'] == $BASEURL . 'index.php') {
            echo "        /* index styles */\n".
                 "        table.uniques {\n".
                 "          border: 1px solid #c0c0c0;\n".
                 "          padding: 5px;\n".
                 "          text-align: left;\n".
                 "        }\n".
                 "        table.uniques td {\n".
                 "          padding-left: 10px;\n".
                 "        }\n".
                 "        table.penalty {\n".
                 "        border: 1px solid #c0c0c0;\n".
                 "        padding: 5px;\n".
                 "        text-align: left;\n".
                 "        }\n".
                 "        table.penalty th {\n".
                 "            text-align: right;\n".
                 "        }\n";
        } else if ($_SERVER['PHP_SELF'] == $BASEURL . 'players.php') {
            echo "       /* player page */\n".
                 "        li.online { font-weight: bold; }\n".
                 "        li.offline { color: #c0c0c0; }\n".
                 "        a.offline { color: #707070; }\n".
                 "        #map {\n".
                 "          width: 500px;\n".
                 "          height: 500px;\n".
                 "          background-image: url(newmap.png);\n".
                 "        }\n".
                 "        table.forum {\n".
                 "            border: 1px solid #c0c0c0;\n".
                 "            table-layout: fixed;\n".
                 "            overflow: auto;\n".
                 "        }\n".
                 "        table.forum td,tr,caption,thead,tfoot,th {\n".
                 "            padding-left: 10px;\n".
                 "            padding-right: 10px;\n".
                 "        }\n".
                 "        .tdblue { background-color: #ffffdf; }\n".
                 "        .tdgray { background-color: #eeeee0; }\n".
                 "        .tdred {\n".
                 "            border: 1px solid red;\n".
                 "            background-color: #FFCCCC;\n".
                 "        }\n".
                 "        .smallest {\n".
                 "            font-size: 11px;\n".
                 "        }\n";
        } else if ($_SERVER['PHP_SELF'] == $BASEURL . 'worldmap.php') {
            echo "        #map {\n".
                 "            width: 500px;\n".
                 "            height: 500px;\n".
                 "            background-image: url(newmap.png);\n".
                 "        }\n";
        } else if ($_SERVER['PHP_SELF'] == $BASEURL . 'playerview.php') {
            echo "        #map {\n".
                 "            width: 500px;\n".
                 "            height: 500px;\n".
                 "            background-image: url(newmap.png);\n".
                 "        }\n";
        } else if ($_SERVER['PHP_SELF'] == $BASEURL . 'quest.php') {
            echo "        #map {\n".
                 "            width: 500px;\n".
                 "            height: 500px;\n".
                 "            background-image: url(newmap.png);\n".
                 "        }\n";
        }
        echo "    </style>\n";
        if ($enable_analytics == True) {
            include("analytics.php");
        }
        if ($fuck_IE == True) {
            echo '            <!--[if lte IE 9]> <script type="text/javascript" src="' . $BASEURL . 'js/fucking-ie.js"></script> <![endif]-->';
        } else {
            echo '            <!--[if lte IE 9]> <script type="text/javascript" src="' . $BASEURL . 'js/html5shiv.js"></script> <![endif]-->';
        }
        ?>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<? echo $BASEURL;?>"><?php echo $net_name;?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav">
              <li<?php if ($BASEURL . 'index.php' == $_SERVER['PHP_SELF']) { echo " class=active";}?>><a href="<?php echo $BASEURL;?>">Game Info</a></li>
              <li<?php if ($BASEURL . 'players.php' == $_SERVER['PHP_SELF']) { echo " class=active";}?>><a href="<?php echo $BASEURL;?>players.php">Player Info</a></li>
              <li<?php if ($BASEURL . 'contact.php' == $_SERVER['PHP_SELF']) { echo " class=active";}?>><a href="<?php echo $BASEURL;?>contact.php">Contact</a></li>
              <li<?php if ($BASEURL . 'worldmap.php' == $_SERVER['PHP_SELF']) { echo " class=active";}?>><a href="<?php echo $BASEURL;?>worldmap.php">World Map</a></li>
              <li<?php if ($BASEURL . 'quest.php' == $_SERVER['PHP_SELF']) { echo " class=active";}?>><a href="<?php echo $BASEURL;?>quest.php">Quest Info</a></li>
              <li><a href="https://github.com/adamus1red/idlerpg-site/">Site Source</a></li>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">