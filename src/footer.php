                </div>
            </div>
        </main>
        <footer class="footer mt-auto py-3 text-muted">
            <div class="container">
                <p class="small">Questions? Comments? Suggestions? Bugs? Naked pics? <a href="contact.php"><?php print $admin_email?></a> or <?php print $admin_nick?>@IRC.
    <?php
                $hitsdb="hits.db";
                if(isset($irpg_hitsdb) && file_exists($irpg_hitsdb)) {
                    $hitsdb=$irpg_hitsdb;
                }
                $fp = fopen($hitsdb, "w");
                $hits = file($hitsdb);
                $thispage = explode("/",$_SERVER['PHP_SELF']);
                $thispage = array_pop($thispage);
                if ($fp == false) {
                    echo "Error: could not open file hits.db.";
                }
                $found=0;
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
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>
