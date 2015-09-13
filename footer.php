        </div>
        <div class="footer">
            <p class="small">Questions? Comments? Suggestions? Bugs? Naked pics? <a href="contact.php"><?php print $admin_email?></a> or <?php print $admin_nick?>@IRC.
<?php
            $hits = file("hits.db");
            $fp = fopen("hits.db", "w");
            $thispage = explode("/",$_SERVER['PHP_SELF']);
            $thispage = array_pop($thispage);
            if ($fp == false) {
                echo "Error: could not open file hits.db.";
            }
            foreach ($hits as $line) {
                list($page,$numhits,$date) = explode("\t",trim($line));
                if ($page == $thispage) {
                    ++$numhits;
                    echo "            $numhits hits since $date";
                    $found = 1;
                }
                if ($fp) {
                    fwrite($fp,"$page\t$numhits\t$date\n");
                }
            }
            if (!$found && $fp) {
                echo "            1 hit since ".date("M j, Y",time());
                fwrite($fp,$thispage."\t1\t".date("M j, Y",time())."\n");
            }
            fclose($fp);
?>
            </p>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js" integrity="sha256-+h0g0j7qusP72OZaLPCSZ5wjZLnoUUicoxbvrl14WxM= sha512-0z9zJIjxQaDVzlysxlaqkZ8L9jh8jZ2d54F3Dn36Y0a8C6eI/RFOME/tLCFJ42hfOxdclfa29lPSNCmX5ekxnw==" crossorigin="anonymous"></script>
    </body>
</html>
