<?php

include("config.php");

$irpg_page_title = "Contact";

include("header.php");

    if ((isset($_POST['from']) && isset($_POST['text'])) && $_POST['from'] && $_POST['text']) {
        mail($admin_email,"IRPG: ".$_POST['from'],
             "Name: ".$_POST['name']."\nE-mail: ".$_POST['from']."\n\n".
             $_POST['text'],"From: ".$_POST['from']."\r\n");
        echo('      <blockquote>Thanks for your submission.</blockquote>');
    }
    else {
        echo('
        <form method="post" action="contact.php">
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="from">Your e-mail address</label>
              <div class="col-sm-10">
                <input type="text" size="20" maxlength="50" name="from" id="from" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="name">Your name</label>
              <div class="col-sm-10">
                <input type="text" size="20" maxlength="50" name="name" id="name" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 form-control-label" for="text">Your Message</label>
              <div class="col-sm-10">
                <textarea name="text" rows="6" cols="44"></textarea><br />
              </div>
            </div>
            <div class="form-group row">
              <div>
              <input type="submit" value="Send" />
              </div>
            </div>
        </form>
');
    }
    include("footer.php");
?>
