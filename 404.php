<?php
    include("config.php");
    $irpg_page_title = "404 not found!";
    include("header.php");
    header("HTTP/1.0 404 Not Found");
?>

<p class="lead">We couldn't find the page you wanted so we decided to give you this one.</p>
<p>This could mean that the page you are looking for has either been removed, moved or eaten by the mighty spaceshark!</p>

<?php include("footer.php");?>
