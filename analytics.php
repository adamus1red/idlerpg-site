<?php
    echo "\n<script>\n"
    if ($analytics_type == "google") {
        echo "        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n".
             "        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n".
             "        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n".
             "        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');\n".
             "        ga('create', ',".$analytics_tracking_code."', '".$analytics_tracking_domain."');\n".
             "        ga('send', 'pageview');\n"
    } else if ($analytics_type == "piwik") {
        echo "  var _paq = _paq || [];\n".
             "  _paq.push(['trackPageView']);\n".
             "  _paq.push(['enableLinkTracking']);\n".
             "  (function() {\n".
             "    var u=\"".$piwik_address."\";\n".
             "    _paq.push(['setTrackerUrl', u+'piwik.php']);\n".
             "    _paq.push(['setSiteId', ".$piwik_siteID."]);\n".
             "    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';\n".
             "    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);\n".
             "  })();\n"
    }
    echo "</script>\n"
?>