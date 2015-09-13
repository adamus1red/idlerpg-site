<?php
    include("config.php");
    $file = fopen($irpg_db,"r");
    fgets($file,1024);

    session_start(); // sessions to generate only one map / person / 3s
    if (isset($_SESSION['time']) && time()-$_SESSION['time'] < 3) {
        header("Location: maperror.png");
        exit(0);
    }
    $_SESSION['time']=time();
        $file = fopen($irpg_qfile,"r");
    $type=0;
    while ($line=fgets($file,1024)) {
        $arg = explode(" ",trim($line));
        if ($arg[0] == "Y") {
            $type = $arg[1];
        }
        elseif ($arg[0] == "P") {
            $p1[0] = $arg[1];
            $p1[1] = $arg[2];
            $p2[0] = $arg[3];
            $p2[1] = $arg[4];
        }
        elseif ($arg[0] == "S") {
            if ($type == 1) $time = $arg[1];
            elseif ($type == 2) $stage = $arg[1];
        }
        elseif ($arg[0] == "P1") {
            $player[1]['name'] = $arg[1];
            if ($type == 2) {
                $player[1]['x'] = $arg[2];
                $player[1]['y'] = $arg[3];
            }
        }
        elseif ($arg[0] == "P2") {
            $player[2]['name'] = $arg[1];
            if ($type == 2) {
                $player[2]['x'] = $arg[2];
                $player[2]['y'] = $arg[3];
            }
        }
        elseif ($arg[0] == "P3") {
            $player[3]['name'] = $arg[1];
            if ($type == 2) {
                $player[3]['x'] = $arg[2];
                $player[3]['y'] = $arg[3];
            }
        }
        elseif ($arg[0] == "P4") {
            $player[4]['name'] = $arg[1];
            if ($type == 2) {
                $player[4]['x'] = $arg[2];
                $player[4]['y'] = $arg[3];
            }
        }
    }
    if ($type != 2) {
        header("Location: maperror.png");
        exit(0);
    }

    $map = imageCreate(500,500);
    $magenta = imageColorAllocate($map, 255, 0, 255);
    imageColorTransparent($map,$magenta);
    $blue = imageColorAllocate($map, 0, 128, 255);
    $red = imageColorAllocate($map, 255, 0, 0);

    imageFilledEllipse($map, $player[1]['x'], $player[1]['y'], 6, 6, $blue);
    imageFilledEllipse($map, $player[2]['x'], $player[2]['y'], 6, 6, $blue);
    imageFilledEllipse($map, $player[3]['x'], $player[3]['y'], 6, 6, $blue);
    imageFilledEllipse($map, $player[4]['x'], $player[4]['y'], 6, 6, $blue);
    if ($stage == 1) imageFilledEllipse($map, $p1[0], $p1[1], 8, 8, $red);
    else imageFilledEllipse($map, $p2[0], $p2[1], 9, 9, $red);

    header("Content-type: image/png");
    imagePNG($map);
    imageDestroy($map);
?>
