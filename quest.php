<?php
    include("config.php");
    $irpg_page_title = "Quest Info";
    include("header.php");
    echo "        <h1>Current Quest</h1>\n";
    include("commonfunctions.php");
    $file = fopen($irpg_qfile,"r");
    $type=0;
    while ($line=fgets($file,1024)) {
        $arg = explode(" ",trim($line));
        if ($arg[0] == "T") {
            unset($arg[0]);
            $text = implode(" ",$arg);
        }
        elseif ($arg[0] == "Y") {
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
    if (!$type) {
        echo "        <p>Sorry, there is no active quest.</p>\n";
    }
    else {
        echo "        <p><b>Quest:</b> To $text.</p>\n";
        if ($type == 1) {
            echo "        <p><b>Time to completion:</b> ".duration($time-time()).
                 "</p>\n";
        }
        elseif ($type == 2) {
            if ($stage == 1) {
                echo "        <p><b>Current goal:</b> [$p1[0],$p1[1]]</p>\n";
            }
            else {
                echo "        <p><b>Current goal:</b> [$p2[0],$p2[1]]</p>>\n";
            }
        }
        echo "        <p><b>Participant 1:</b> <a href=\"playerview.php?player=".
             urlencode($player[1]['name'])."\">".htmlentities($player[1]['name']).
             "</a><br />\n";
        if ($type == 2) {
             echo "        <b>Position:</b> [".$player[1]['x'].",".$player[1]['y']."]</p>\n";
        }
        else echo    "<br />\n";
        echo "        <p><b>Participant 2:</b> <a href=\"playerview.php?player=".
             urlencode($player[2]['name'])."\">".htmlentities($player[2]['name']).
             "</a><br />\n";
        if ($type == 2) {
             echo "        <b>Position:</b> [".$player[2]['x'].",".$player[2]['y']."]</p>\n";
        }
        else echo    "<br />\n";
        echo "        <p><b>Participant 3:</b> <a href=\"playerview.php?player=".
             urlencode($player[3]['name'])."\">".htmlentities($player[3]['name']).
             "</a><br />\n";
        if ($type == 2) {
             echo "        <b>Position:</b> [".$player[3]['x'].",".$player[3]['y']."]</p>\n";
        }
        else echo    "<br />\n";
        echo "        <p><b>Participant 4:</b> <a href=\"playerview.php?player=".
             urlencode($player[4]['name'])."\">".htmlentities($player[4]['name']).
             "</a><br />\n";
        if ($type == 2) {
             echo "        <b>Position:</b> [".$player[4]['x'].",".$player[4]['y']."]</p>\n".
                  "        <h2>Quest Map:</h2>\n".
                  "        <p>[Questers are shown in blue, current goal in red]</p>\n".
                  "        <div id=\"map\"><img src=\"makequestmap.php\" alt=\"Idle RPG Quest Map\" usemap=\"#quest\" border=\"0\" /></div>\n".
                  "        <map id=\"quest\" name=\"quest\">\n".
                  "            <area shape=\"circle\" coords=\"".$player[1]['x'].",".$player[1]['y'].",6\" alt=\"".htmlentities($player[1]['name']).
                  "\" href=\"playerview.php?player=".urlencode($player[1]['name'])."\" title=\"".htmlentities($player[1]['name'])."\" />\n".
                  "            <area shape=\"circle\" coords=\"".$player[2]['x'].",".$player[2]['y'].",6\" alt=\"".htmlentities($player[2]['name']).
                  "\" href=\"playerview.php?player=".urlencode($player[2]['name'])."\" title=\"".htmlentities($player[2]['name'])."\" />\n".
                  "            <area shape=\"circle\" coords=\"".$player[3]['x'].",".$player[3]['y'].",6\" alt=\"".htmlentities($player[3]['name']).
                  "\" href=\"playerview.php?player=".urlencode($player[3]['name'])."\" title=\"".htmlentities($player[3]['name'])."\" />\n".
                  "            <area shape=\"circle\" coords=\"".$player[4]['x'].",".$player[4]['y'].",6\" alt=\"".htmlentities($player[4]['name']).
                  "\" href=\"playerview.php?player=".urlencode($player[4]['name'])."\" title=\"".htmlentities($player[4]['name'])."\" />\n".
                  "        </map>\n";
        }
        else echo    "<br />\n";
    }
    echo "        <br />\n";
    include("footer.php");
?>
