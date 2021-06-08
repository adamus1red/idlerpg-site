<?php

header("Content-Type: application/json");
header("Pragma: no-cache");

include("config.php");

$player = "";
if (isset($_GET['player'])) {
    $player = substr($_GET['player'], 0, 30);
} else {
    header('Location: http://' . $_SERVER['SERVER_NAME'] .
        ($_SERVER['SERVER_PORT'] != 80 ? ':' . $_SERVER['SERVER_PORT'] : '') . $BASEURL .
        'players.php');
}
$file = fopen($irpg_db, "r");
fgets($file, 1024); // skip top comment

while ($line = fgets($file, 1024)) {
    if (substr($line, 0, strlen($player) + 1) == $player . "\t") {
        list(
            $user,, $isadmin, $level, $class, $secs,, $uhost, $online, $idled,
            $x, $y,
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
        ) = explode("\t", trim($line));
        break;
    }
}
fclose($file);
?>
{"player":{
    "username":"<?php print htmlspecialchars($user, ENT_QUOTES) ?>",
    "isadmin":<?php print $isadmin ?>,
    "level":<?php print $level ?>,
    "class":"<?php print htmlspecialchars($class, ENT_QUOTES) ?>",
    "ttl":<?php print $secs ?>,
    "userhost":"<?php print htmlspecialchars($uhost, ENT_QUOTES) ?>",
    "online":<?php print $online ?>,
    "totalidled":<?php print $idled ?>,
    "pos": {
        "x":<?php print $x ?>,
        "y":<?php print $y ?>
    },
    "alignment":"<?php print $alignment ?>",
    "penalties": {
        <?php
        $sum = 0;
        foreach ($pen as $key => $val) {
            echo "            \"$key\":" . intval($val) . ",\n";
            $sum += intval($val);
        }
        echo "        \"total\":$sum\n";
        ?>
    },
    "items":{
        <?php
        $sum = 0;
        foreach ($item as $key => $val) {
            echo "            \"$key\":" . intval($val) . ",\n";
            $sum += intval($val);
        }
        echo "        \"total\":$sum\n";
        ?>
        }
    }
}