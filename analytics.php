<?php
    if ($classic_analytics == False) {
        echo "    <script>\n".
             "        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n".
             "        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n".
             "        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n".
             "        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');\n".
             "        ga('create', ',".$analytics_tracking_code."', '".$analytics_tracking_domain."');\n".
             "        ga('send', 'pageview');\n".
             "    </script>\n";
    } else {
        echo "    <script>\n".
             "         var _gaq = _gaq || [];\n".
             "         _gaq.push(['_setAccount', '".$analytics_tracking_code."']);\n".
             "         _gaq.push(['_setDomainName', '".$analytics_tracking_domain."']);\n".
             "         _gaq.push(['_trackPageview']);\n".
             "         (function() {\n".
             "            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n".
             "            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n".
             "            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);\n".
             "         })();\n".
             "     </script>\n";
    }
?>