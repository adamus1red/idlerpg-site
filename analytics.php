<?php
    if ($classic_analytics == False) {
        echo "    <script>\n"
        echo "        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n"
        echo "        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n"
        echo "        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n"
        echo "        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');\n"
        echo "        ga('create', ',".$analytics_tracking_code."', '".$analytics_tracking_domain."');\n"
        echo "        ga('send', 'pageview');\n"
        echo "    </script>\n"
    } else {
        echo "    <script>\n"
        echo "         var _gaq = _gaq || [];\n"
        echo "         _gaq.push(['_setAccount', '".$analytics_tracking_code."']);\n"
        echo "         _gaq.push(['_setDomainName', '".$analytics_tracking_domain."']);\n"
        echo "         _gaq.push(['_trackPageview']);\n"
        echo "         (function() {\n"
        echo "            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n"
        echo "            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n"
        echo "            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);\n"
        echo "         })();\n"
        echo "     </script>\n"
    }
?>