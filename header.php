<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $irpg_chan; ?> Idle RPG: <?php echo $irpg_page_title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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

<body class="bg-dark text-white">
    <header class="p-3 d-flex bg-dark text-white flex-wrap  py-3 mb-4 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<? echo $BASEURL ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                        <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                    </svg>
                    <span class="fs-4">IdleRPG</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if ($BASEURL . 'index.php' == $_SERVER['PHP_SELF']) {
                                                            echo " active";
                                                        } ?>" href="<?php echo $BASEURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if ($BASEURL . 'players.php' == $_SERVER['PHP_SELF']) {
                                                            echo " active";
                                                        } ?>" href="<?php echo $BASEURL; ?>players.php">Player Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if ($BASEURL . 'quest.php' == $_SERVER['PHP_SELF']) {
                                                            echo " active";
                                                        } ?>" href="<?php echo $BASEURL; ?>quest.php">Quest Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if ($BASEURL . 'worldmap.php' == $_SERVER['PHP_SELF']) {
                                                            echo " active";
                                                        } ?>" href="<?php echo $BASEURL; ?>worldmap.php">World Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="https://github.com/adamus1red/idlerpg-site/">Site Source</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main role="main">
        <div class="py-5 bg-dark text-white">
            <div class="container">