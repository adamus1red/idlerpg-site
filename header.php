<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?php echo $irpg_chan;?> Idle RPG: <?php echo $irpg_page_title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
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
                                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                                <li><a href="#" class="text-white">Like on Facebook</a></li>
                                <li><a href="#" class="text-white">Email me</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        <strong>Album</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
        </header>
        <main role="main">
            <div class="py-5 bg-light">
                <div class="container">
