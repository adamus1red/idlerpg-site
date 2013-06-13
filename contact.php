<?php

include("config.php");

$irpg_page_title = "Contact";

include("header.php");

    echo "<h1>Contact</h1>";
    if ($_POST['from'] && $_POST['text']) {
        mail($admin_email,"IRPG: ".$_POST['from'],
             "Name: ".$_POST['name']."\nE-mail: ".$_POST['from']."\n\n".
             $_POST['text'],"From: ".$_POST['from']."\r\n");
        echo('      <blockquote>Thanks for your submission.</blockquote>');
    }
    else {
        echo('
        <form method="post" action="contact.php">
          <table border="0">
            <tr>
              <th align="left"><label for="from">Your e-mail address</label></th>
              <td align="right">
                <input type="text" size="20" maxlength="50" name="from" id="from" />
              </td>
            </tr>
            <tr>
              <th align="left"><label for="name">Your name</label></th>
              <td align="right">
                <input type="text" size="20" maxlength="50" name="name" id="name" />
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <textarea name="text" rows="6" cols="44"></textarea><br />
              </td>
            </tr>
            <tr>
              <td colspan="2" align="right">
                <input type="submit" class="btn btn-success" value="Send" />
              </td>
            </tr>
          </table>
        </form>
');
    }
    include("footer.php");
?>
