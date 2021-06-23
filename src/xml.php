<?php

    header("Content-Type: text/xml");
    header("Pragma: no-cache"); 

    include("config.php");

    $_GET['player'] = substr($_GET['player'],0,30);

    /* Determine if a Player was entered. If not, redirect. */
    if ($_GET['player']=="") header('Location: http://'.$_SERVER['SERVER_NAME'].
        ($_SERVER['SERVER_PORT']!=80?':'.$_SERVER['SERVER_PORT']:'').$BASEURL.
        'players.php');

    $file = fopen($irpg_db,"r");
    fgets($file,1024); // skip top comment

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
            break;
        }
    }
    fclose($file);
    echo "<?xml version=\"1.0\"?>";
?>

<player>
    <username><?php print htmlspecialchars($user,ENT_QUOTES)?></username>
    <isadmin><?php print $isadmin?></isadmin>
    <level><?php print $level?></level>
    <class><?php print htmlspecialchars($class,ENT_QUOTES)?></class>
    <ttl><?php print $secs?></ttl>
    <userhost><?php print htmlspecialchars($uhost,ENT_QUOTES)?></userhost>
    <online><?php print $online?></online>
    <totalidled><?php print $idled?></totalidled>
    <xpos><?php print $x?></xpos>
    <ypos><?php print $y?></ypos>
    <alignment><?php print $alignment?></alignment>
    <penalties>
<?php
        $sum=0;
        foreach ($pen as $key => $val) {
            echo "        <$key>".intval($val)."</$key>\n";
            $sum += intval($val);
        }
        echo "        <total>$sum</total>\n";
?>
    </penalties>
    <items>
<?php
        $sum=0;
        foreach ($item as $key => $val) {
            if ($key == "helm" && substr($val,-1,1) == "a") {
                echo "        <$key unique=\"Mattt's Omniscience Grand Crown\">".intval($val)."</$key>\n";
            } elseif ($key == "tunic" && substr($val,-1,1) == "b") {
                echo "        <$key unique=\"Res0's Protectorate Plate Mail\">".intval($val)."</$key>\n";
            } elseif ($key == "amulet" && substr($val,-1,1) == "c") {
                echo "        <$key unique=\"Dwyn's Storm Magic Amulet\">".intval($val)."</$key>\n";
            } elseif ($key == "weapon" && substr($val,-1,1) == "d") {
                echo "        <$key unique=\"Jotun's Fury Colossal Sword\">".intval($val)."</$key>\n";
            } elseif ($key == "weapon" && substr($val,-1,1) == "e") {
                echo "        <$key unique=\"Drdink's Cane of Blind Rage\">".intval($val)."</$key>\n";
            } elseif ($key == "boots" && substr($val,-1,1) == "f") {
                echo "        <$key unique=\"Mrquick's Magical Boots of Swiftness\">".intval($val)."</$key>\n";
            } elseif ($key == "weapon" && substr($val,-1,1) == "g") {
                echo "        <$key unique=\"Jeff's Cluehammer of Doom\">".intval($val)."</$key>\n";
            } elseif ($key == "ring" && substr($val,-1,1) == "h") {
                echo "        <$key unique=\"Juliet's Glorious Ring of Sparkliness\">".intval($val)."</$key>\n";
            } else {
                echo "        <$key>".intval($val)."</$key>\n";
            }
            $sum += intval($val);
        }
        echo "        <total>$sum</total>\n";
?>
    </items>
</player>
