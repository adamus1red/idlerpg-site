<?php
    include("config.php");
    include("commonfunctions.php");
    $irpg_page_title = "Player Info";
    include("header.php");
?>

  <h2>Pick a player to view</h2>
  <p class="small">[gray=offline]</p>
  <ol>
<?php
    $file = file($irpg_db);
    unset($file[0]);
    usort($file, 'cmp_level_desc');
    foreach ($file as $line) {
        list($user,,,$level,$class,$secs,,,$online) = explode("\t",trim($line));

        $class = htmlentities($class);
        $next_level = duration($secs);

        print "    <li".(!$online?" class=\"offline\"":"")."><a".
              (!$online?" class=\"offline\"":" class=\"online\"").
              " href=\"playerview.php?player=".urlencode($user).
              "\">".htmlentities($user).
              "</a>, the level $level $class. Next level in $next_level.</li>\n";

    }
?>
  </ol>
  <p>For a script to view player stats from a terminal, try <a
  href="idlerpg-adv.txt">this</a> perl script by
  <a href="mailto:daxxar@mental.mine.nu">daxxar</a>.</p>

  <p>See player stats in <a href="db.php">table format</a>.</p>

<?php include("footer.php")?>
