<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?php echo $irpg_chan;?> Idle RPG: <?php echo $irpg_page_title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-GHW2S7IZAQe8+YkyL99LyDj1zdWXSPOG+JZafCtKiSc= sha512-vxM32w6T7zJ83xOQ6FT4CEFnlasqmkcB0+ojgbI0N6ZtSxYvHmT7sX2icN07TqEqr5wdKwoLkmB8sAsGAjCJHg==" crossorigin="anonymous">
        <!--<link rel="stylesheet" type="text/css" href="g7.css" />-->
        <style type="text/css">
        #map {
            width: 500px;
            height: 500px;
            background-image: url(newmap.png);
        }
        /*.container {
            padding-top: 10px;
        }*/
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Idle RPG Logo -->
            <nav class="navbar navbar-light bg-faded">
                <a class="navbar-brand" href="<?php echo $BASEURL; ?>">IdleRPG</a>
                <ul class="nav navbar-nav">
                    <li class="nav-item<?php if ($BASEURL . 'index.php' == $_SERVER['PHP_SELF']) { echo " active";}?>">
                        <a class="nav-link" href="<?php echo $BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item<?php if ($BASEURL . 'players.php' == $_SERVER['PHP_SELF']) { echo " active";}?>">
                        <a class="nav-link" href="<?php echo $BASEURL; ?>players.php">Player Info</a>
                    </li>
                    <li class="nav-item<?php if ($BASEURL . 'quest.php' == $_SERVER['PHP_SELF']) { echo " active";}?>">
                        <a class="nav-link" href="<?php echo $BASEURL; ?>quest.php">Quest Info</a>
                    </li>
                    <li class="nav-item<?php if ($BASEURL . 'worldmap.php' == $_SERVER['PHP_SELF']) { echo " active";}?>">
                        <a class="nav-link" href="<?php echo $BASEURL; ?>worldmap.php">World Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/adamus1red/idlerpg-site/">Site Source</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item<?php if ($BASEURL . 'contact.php' == $_SERVER['PHP_SELF']) { echo " cactive";}?>">
                        <a class="nav-link" href="<?php echo $BASEURL; ?>contact.php">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="content m-t">
