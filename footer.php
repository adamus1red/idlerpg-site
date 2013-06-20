    </div>
    <hr>
    <div class="footer">
        <div class="container">
        <p class="pull-right">Made with <a href="http://php.net/">php</a>, <a href="http://twitter.github.io/bootstrap/">bootstrap</a> and <a href="<?php echo $net_url;?>"><?php echo $net_name;?></a><br /><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/80x15.png" /></a> Using <?php echo $style;?> theme.</p>
        <p>
            Questions? Comments? Suggestions? Bugs? Naked pics?
            <a href="contact.php">contact us</a> or <a href="<?php echo $irpg_chan_url;?>">join the IRC</a>.
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
    </div>
    <script src="<?php echo $BASEURL;?>/theme/<?php echo $style;?>/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    </body>
</html>
