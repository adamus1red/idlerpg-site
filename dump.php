<?php
    // this file has been edited to produce its output in the same format as
    // it has with previous versions, despite the new database format. coders
    // should use the new xml.php to glean player info, which is much more
    // suited to db changes.
    header('Content-Type: text/plain');
    include("commonfunctions.php");
    include("config.php");
    $file = file($irpg_db);
    $header = explode("\t",$file[0]);
    unset($header[1]); // password
    unset($header[2]); // isadmin
    unset($header[6]); // nickname
    unset($header[10]); // x pos
    unset($header[11]); // y pos
    unset($header[31]); // alignment
    echo join("\t",$header)."\n";
    unset($file[0]);
    /* specific character requested */
    if ($_GET['player']) {
        foreach ($file as $line) {
            list($user) = explode("\t",trim($line));
            if ($user == $_GET['player']) {
                list($user,,,
                     $level,$class,$secs,,$uhost,$online,$idled,,,
                     $pen['mesg'],
                     $pen['nick'],
                     $pen['part'],
                     $pen['kick'],
                     $pen['quit'],
                     $pen['quest'],
                     $pen['logout'],
                     $created,
                     $lastlogin,
                     $item['amulet'],
                     $item['charm'],
                     $item['helm'],
                     $item['boots'],
                     $item['gloves'],
                     $item['ring'],
                     $item['leggings'],
                     $item['shield'],
                     $item['tunic'],
                     $item['weapon'],
                    ) = explode("\t",trim($line));
                echo join("\t",
                          array($user,$level,$class,$secs,$uhost,$online,$idled,
                                $pen['mesg'],
                                $pen['nick'],
                                $pen['part'],
                                $pen['kick'],
                                $pen['quit'],
                                $pen['quest'],
                                $pen['logout'],
                                $created,
                                $lastlogin,
                                $item['amulet'],
                                $item['charm'],
                                $item['helm'],
                                $item['boots'],
                                $item['gloves'],
                                $item['ring'],
                                $item['leggings'],
                                $item['shield'],
                                $item['tunic'],
                                $item['weapon']))."\n";
            }
        }
        exit(0);
    }
    /* no specific character requested; list all */
    usort($file,"cmp_level_desc");
    foreach ($file as $line) {
        list($user,,,
             $level,$class,$secs,,$uhost,$online,$idled,,,
             $pen['mesg'],
             $pen['nick'],
             $pen['part'],
             $pen['kick'],
             $pen['quit'],
             $pen['quest'],
             $pen['logout'],
             $created,
             $lastlogin,
             $item['amulet'],
             $item['charm'],
             $item['helm'],
             $item['boots'],
             $item['gloves'],
             $item['ring'],
             $item['leggings'],
             $item['shield'],
             $item['tunic'],
             $item['weapon'],
            ) = explode("\t",trim($line));
        echo join("\t",
             array($user,$level,$class,$secs,$uhost,$online,$idled,
             $pen['mesg'],
             $pen['nick'],
             $pen['part'],
             $pen['kick'],
             $pen['quit'],
             $pen['quest'],
             $pen['logout'],
             $created,
             $lastlogin,
             $item['amulet'],
             $item['charm'],
             $item['helm'],
             $item['boots'],
             $item['gloves'],
             $item['ring'],
             $item['leggings'],
             $item['shield'],
             $item['tunic'],
             $item['weapon']))."\n";
    }
?>
