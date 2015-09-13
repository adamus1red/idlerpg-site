<?php
    include("config.php");
    $irpg_page_title = "World Map";
    include("header.php");
?>

<h1>World Map</h1>
<p>[offline users are red, online users are blue, normal items are orange, unique items are yellow]</p>


<div id="map">
    <img src="makeworldmap.php" alt="IdleRPG World Map" title="IdleRPG World Map" usemap="#world" border="0" />
    <map id="world" name="world">
<?php
    $file = fopen($irpg_db,"r");
    fgets($file,1024);
    $itemfile = fopen($irpg_itemdb,"r");
    fgets($itemfile,1024);
    while($location=fgets($file,1024)) {
        list($who,,,,,,,,,,$x,$y) = explode("\t",trim($location));
        print "        <area shape=\"circle\" coords=\"".$x.",".$y.",".$crosssize."\" alt=\"".htmlentities($who).
              "\" href=\"playerview.php?player=".urlencode($who)."\" title=\"".htmlentities($who)."\" />\n";
    }
    while ($line=fgets($itemfile,1024)) {
        list($x,$y,$type,$level) = explode("\t",trim($line));
        print "        <area shape=\"circle\" coords=\"".$x.",".$y.",".$crosssize."\" alt=\"".htmlentities($type." [".$level."]").
              "\" title=\"".htmlentities($type." [".$level."]")."\" />\n";
    }
    fclose($file);
?>
    </map>
</div>

<?include("footer.php");?>
