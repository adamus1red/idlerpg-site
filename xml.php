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
    <username><?php print $user?></username>
    <isadmin><?php print $isadmin?></isadmin>
    <level><?php print $level?></level>
    <class><?php print $class?></class>
    <ttl><?php print $secs?></ttl>
    <userhost><?php print $uhost?></userhost>
    <online><?php print $online?></online>
    <totalidled><?php print $idled?></totalidled>
    <xpos><?php print $x?></xpos>
    <ypos><?php print $y?></ypos>
    <alignment><?php print $alignment?></alignment>
    <penalties>
<?php
        $sum=0;
        foreach ($pen as $key => $val) {
            echo "        <$key>$val</$key>\n";
            $sum += $val;
        }
        echo "        <total>$sum</total>\n";
?>
    </penalties>
    <items>
<?php
        $sum=0;
        foreach ($item as $key => $val) {
            echo "        <$key>$val</$key>\n";
            $sum += $val;
        }
        echo "        <total>$sum</total>\n";
?>
    </items>
</player>
