                </div>
            </div>
        </main>
        <footer class="text-muted">
            <div class="container">
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
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
