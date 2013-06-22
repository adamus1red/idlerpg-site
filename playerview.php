<?php
    include("config.php");

    $_GET['player'] = substr($_GET['player'],0,30);

    /* Determine if a Player was entered. If not, redirect. */
    if ($_GET['player']=="") header('Location: http://'.$_SERVER['SERVER_NAME'].
        ($_SERVER['SERVER_PORT']!=80?':'.$_SERVER['SERVER_PORT']:'').$BASEURL.
        'players.php');
    
    $irpg_page_title = "Player Info: " . htmlentities($_GET['player']);
    $showmap = $_GET['showmap'];
    
    include("header.php");
    include("commonfunctions.php");
    echo "<h1>Player Info</h1>";
    $file = fopen($irpg_db,"r");
    fgets($file,1024); // skip top comment
    $found=0;
    while ($line=fgets($file,1024)) {
        if (substr($line,0,strlen($_GET['player'])+1) == $_GET['player']."\t") {
            list($user,,$isadmin,$level,$class,$secs,,$uhost,$online,$idled,
                 $x,$y,
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
                 $alignment,
            ) = explode("\t",trim($line));
            $found=1;
            break;
        }
    }
    if (!$found) echo "<h1>Error</h1><p><b>No such user.</b></p>\n";
    else {
        $class=htmlentities($class);
        /* if we htmlentities($user), then we cannot use links with it. */
        echo "<summary>\n".
             "      <p><b>User:</b> ".htmlentities($user)."<br />\n".
             "      <b>Class:</b> $class<br />\n".
             "      <b>Admin?:</b> ".($isadmin?"Yes":"No")."<br />\n".
             "      <b>Level:</b> $level<br />\n".
             "      <b>Next level:</b> ".duration($secs)."<br />\n".
             "      <b>Status:</b> O".($online?"n":"ff")."line<br />\n".
             "      <b>Host:</b> ".($uhost?$uhost:"Unknown")."<br />\n".
             "      <b>Account Created:</b> ".date("D M j H:i:s Y",$created)."<br />\n".
             "      <b>Last login:</b> ".date("D M j H:i:s Y",$lastlogin)."<br />\n".
             "      <b>Total time idled:</b> ".duration($idled)."<br />\n".
             "      <b>Current position:</b> [$x,$y]<br />\n".
             "      <b>Alignment:</b> ".($alignment=='e'?"Evil":($alignment=='n'?"Neutral":"Good"))."<br />\n".
             "      <b>XML:</b> [<a href=\"xml.php?player=".urlencode($user)."\">link</a>]</p>\n".
             "</summary>\n".
             "    <h2>Map</h2>\n".
             "    ".($showmap?"<div id=\"map\"><img class="img-polaroid" src=\"makemap.php?player=".urlencode($user)."\"></div>\n\n":"<p><a href=\"?player=".urlencode($user)."&showmap=1\">Show map</a></p>\n\n")."".
             "<details>\n".
             "    <h2>Items</h2>\n<p>";
        ksort($item);
        $sum = 0;
        foreach ($item as $key => $val) {
            $uniquecolor="#be9256";
            if ($key == "helm" && substr($val,-1,1) == "a") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Mattt's Omniscience Grand Crown</font>]";
            }
            if ($key == "tunic" && substr($val,-1,1) == "b") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Res0's Protectorate Plate Mail</font>]";
            }
            if ($key == "amulet" && substr($val,-1,1) == "c") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Dwyn's Storm Magic Amulet</font>]";
            }
            if ($key == "weapon" && substr($val,-1,1) == "d") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Jotun's Fury Colossal Sword</font>]";
            }
            if ($key == "weapon" && substr($val,-1,1) == "e") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Drdink's Cane of Blind Rage</font>]";
            }
            if ($key == "boots" && substr($val,-1,1) == "f") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Mrquick's Magical Boots of Swiftness</font>]";
            }
            if ($key == "weapon" && substr($val,-1,1) == "g") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Jeff's Cluehammer of Doom</font>]";
            }
            if ($key == "ring" && substr($val,-1,1) == "h") {
                $val = intval($val)." [<font color=\"$uniquecolor\">Juliet's Glorious Ring of Sparkliness</font>]";
            }
            echo "      $key: $val<br />\n";
            $sum += $val;
        }
        echo "      <br />\n      sum: $sum<br />\n".
             "    </p>".
             "    <h2>Penalties</h2>\n".
             "    <p>\n";

        ksort($pen);
        $sum = 0;
        foreach ($pen as $key => $val) {
            echo "      $key: ".duration($val)."<br />\n";
            $sum += $val;
        }
        echo "      <br />\n      total: ".duration($sum)."</p>\n";

        $file = fopen($irpg_mod,"r");
        $temp = array();
        while ($line=fgets($file,1024)) {
            if (strstr($line," ".$_GET['player']." ")          ||
                strstr($line," ".$_GET['player'].", ")         ||
                substr($line,0,strlen($_GET['player'])+1) ==
                       $_GET['player']." "                        ||
                substr($line,0,strlen($_GET['player'])+3) ==
                       $_GET['player']."'s ") {
                array_push($temp,$line);
            }
        }
        fclose($file);
        if (!is_null($temp) && count($temp)) {
            echo('<h2>');
            echo $_GET['allmods']!=1?"Recent ":"";
            echo('Character Modifiers</h2><p>');
            if ($_GET['allmods'] == 1 || count($temp) < 6) {
                foreach ($temp as $line) {
                    $line=htmlentities(trim($line));
                    echo "      $line<br />\n";
                }
                echo "      <br />\n";
            }
            else {
                end($temp);
                for ($i=0;$i<4;++$i) prev($temp);
                for ($line=trim(current($temp));$line;$line=trim(next($temp))) {
                    $line=htmlentities(trim($line));
                    echo "      $line<br />\n";
                }
            }
        }
        if ($_GET['allmods'] != 1 && count($temp) > 5) {
?>
      </details>
      <br />
      [<a href="<?php echo $_SERVER['PHP_SELF']."?player=".urlencode($user);?>&amp;allmods=1">View all Character Modifiers</a> (<?=count($temp)?>)]
      </p>
<?php
        }
    }
    include("footer.php");
?>

