<?php

    include("config.php");
    
    $irpg_page_title = "DB-style Player Listing";
    
    include("header.php");
    
    include("commonfunctions.php");

    $file = file($irpg_db);
    unset($file[0]);
    if (!$_GET['sort'] ||
        (($_GET['sort'] != "cmp_level_asc") &&
        ($_GET['sort'] != "cmp_level_desc") &&
        ($_GET['sort'] != "cmp_isadmin_asc") &&
        ($_GET['sort'] != "cmp_isadmin_desc") &&
        ($_GET['sort'] != "cmp_alignment_asc") &&
        ($_GET['sort'] != "cmp_alignment_desc") &&
        ($_GET['sort'] != "cmp_ttl_asc") &&
        ($_GET['sort'] != "cmp_ttl_desc") &&
        ($_GET['sort'] != "cmp_pen_asc") &&
        ($_GET['sort'] != "cmp_pen_desc") &&
        ($_GET['sort'] != "cmp_lastlogin_asc") &&
        ($_GET['sort'] != "cmp_lastlogin_desc") &&
        ($_GET['sort'] != "cmp_created_asc") &&
        ($_GET['sort'] != "cmp_created_desc") &&
        ($_GET['sort'] != "cmp_idled_asc") &&
        ($_GET['sort'] != "cmp_idled_desc") &&
        ($_GET['sort'] != "cmp_user_asc") &&
        ($_GET['sort'] != "cmp_user_desc") &&
        ($_GET['sort'] != "cmp_online_asc") &&
        ($_GET['sort'] != "cmp_online_desc") &&
        ($_GET['sort'] != "cmp_uhost_asc") &&
        ($_GET['sort'] != "cmp_uhost_desc") &&
        ($_GET['sort'] != "cmp_sum_asc") &&
        ($_GET['sort'] != "cmp_sum_desc"))) $_GET['sort'] = "cmp_level_desc";
    usort($file,$_GET['sort']);
?>
    <table border=1 cellpadding=2 cellspacing=2 cols="32" rows="<?php print count($file); ?>">
      <tr>
        <th NOWRAP>
          User
          (<a href="db.php?sort=cmp_user_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_user_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Level
          (<a href="db.php?sort=cmp_level_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_level_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Admin
          (<a href="db.php?sort=cmp_isadmin_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_isadmin_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>Class</th>
        <th NOWRAP>
          TTL
          (<a href="db.php?sort=cmp_ttl_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_ttl_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Nick!User@Host
          (<a href="db.php?sort=cmp_uhost_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_uhost_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Online
          (<a href="db.php?sort=cmp_online_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_online_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Total Time Idled
          (<a href="db.php?sort=cmp_idled_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_idled_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>X Pos</th>
        <th NOWRAP>Y Pos</th>
        <th NOWRAP>Mesg Pen.</th>
        <th NOWRAP>Nick Pen.</th>
        <th NOWRAP>Part Pen.</th>
        <th NOWRAP>Kick Pen.</th>
        <th NOWRAP>Quit Pen.</th>
        <th NOWRAP>Quest Pen.</th>
        <th NOWRAP>LOGOUT Pen.</th>
        <th NOWRAP>
          Total Pen.
          (<a href="db.php?sort=cmp_pen_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_pen_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Acct. Created
          (<a href="db.php?sort=cmp_created_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_created_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Last Login
          (<a href="db.php?sort=cmp_lastlogin_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_lastlogin_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>Amulet</th>
        <th NOWRAP>Charm</th>
        <th NOWRAP>Helm</th>
        <th NOWRAP>Boots</th>
        <th NOWRAP>Gloves</th>
        <th NOWRAP>Ring</th>
        <th NOWRAP>Leggings</th>
        <th NOWRAP>Shield</th>
        <th NOWRAP>Tunic</th>
        <th NOWRAP>Weapon</th>
        <th NOWRAP>
          Sum
          (<a href="db.php?sort=cmp_sum_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_sum_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
        <th NOWRAP>
          Alignment
          (<a href="db.php?sort=cmp_alignment_asc">
             <img src="up.png" border="0">
           </a>
           /
          <a href="db.php?sort=cmp_alignment_desc">
             <img src="down.png" border="0">
          </a>)
        </th>
      </tr>
<?php
    foreach ($file as $line) {
      list($user,,$isadmin,$level,$class,$secs,,$uhost,$online,$idled,$x,$y,
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
      $class = str_replace("<","&lt;",$class);
      $user = str_replace("<","&lt;",$user);
      $class = str_replace(">","&gt;",$class);
      $user = str_replace(">","&gt;",$user);
      $sum = 0;
      foreach ($item as $k => $v) $sum += $v;
      $pentot = 0;
      foreach ($pen as $k => $v) $pentot += $v;
      echo "      <tr>\n".
           "        <td nowrap>$user</td>\n".
           "        <td>$level</td>\n".
           "        <td>".($isadmin?"Yes":"No")."</td>\n".
           "        <td nowrap>$class</td>\n".
           "        <td nowrap>".duration($secs)."</td>\n".
           "        <td nowrap>$uhost</td>\n".
           "        <td>".(($online == 1) ? "Yes" : "No")."</td>\n".
           "        <td nowrap>".duration($idled)."</td>\n".
           "        <td nowrap>$x</td>\n".
           "        <td nowrap>$y</td>\n".
           "        <td nowrap>".duration($pen['mesg'])."</td>\n".
           "        <td nowrap>".duration($pen['nick'])."</td>\n".
           "        <td nowrap>".duration($pen['part'])."</td>\n".
           "        <td nowrap>".duration($pen['kick'])."</td>\n".
           "        <td nowrap>".duration($pen['quit'])."</td>\n".
           "        <td nowrap>".duration($pen['quest'])."</td>\n".
           "        <td nowrap>".duration($pen['logout'])."</td>\n".
           "        <td nowrap>".duration($pentot)."</td>\n".
           "        <td nowrap>".date("D M j H:i:s Y",$created)."</td>\n".
           "        <td nowrap>".date("D M j H:i:s Y",$lastlogin)."</td>\n".
           "        <td>".$item['amulet']."</td>\n".
           "        <td>".$item['charm']."</td>\n".
           "        <td>".$item['helm']."</td>\n".
           "        <td>".$item['boots']."</td>\n".
           "        <td>".$item['gloves']."</td>\n".
           "        <td>".$item['ring']."</td>\n".
           "        <td>".$item['leggings']."</td>\n".
           "        <td>".$item['shield']."</td>\n".
           "        <td>".$item['tunic']."</td>\n".
           "        <td>".$item['weapon']."</td>\n".
           "        <td>$sum</td>\n".
           "        <td>".($alignment=='e'?"Evil":($alignment=='n'?"Neutral":"Good"))."</td>\n".
           "      </tr>\n";
    }

    echo('
    </table>
    <br><br>
    * Accounts created before Aug 29, 2003 may have incowrect data fields.
    ');
    include("footer.php");
?>
