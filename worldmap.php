<?php
    include("config.php");
    $irpg_page_title = "World Map";
    include("header.php");
?>

<h1>World Map</h1>
<p>[offline users are red, online users are blue]</p>


<div id="map">
    <img src="makeworldmap.php" alt="IdleRPG World Map" title="IdleRPG World Map" usemap="#world" border="0" />
    <map id="world" name="world">
<?php
    $file = fopen($irpg_db,"r");
    fgets($file);
    while($location=fgets($file)) {
        list($who,,,,,,,,,,$x,$y) = explode("\t",trim($location));
        print "        <area shape=\"circle\" coords=\"".$x.",".$y.",6\" alt=\"".htmlentities($who).
              "\" href=\"playerview.php?player=".urlencode($who)."\" title=\"".htmlentities($who)."\" />\n";
    }
    fclose($file);
?>
    </map>
</div>

<?php include("footer.php");?>
