<?php
    include("config.php");
    $irpg_page_title = "Licence";
    include("header.php");
?>

<p><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US">
<img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" />
</a></p>
<p><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">IdleRPG Website</span> by 
<a xmlns:cc="http://creativecommons.org/ns#" href="http://github.com/adamus1red/" property="cc:attributionName" rel="cc:attributionURL">
adamus1red</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US">
Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.</p>
<p>Based on a work at <a xmlns:dct="http://purl.org/dc/terms/" href="http://idlerpg.net/" rel="dct:source">http://idlerpg.net/</a>.</p>

For additional permissions please use the following contact page
<?php
if ($_POST['from'] && $_POST['text']) {
        mail("adamus1red@hushmail.com","Licence IRPG: ".$_POST['from'],
             "Name: ".$_POST['name']."\nE-mail: ".$_POST['from']."\n\n".
             $_POST['text'],"From: ".$_POST['from']."\r\n");
        echo('      <blockquote>Thanks for your submission.</blockquote>');
    }
    else {
        echo('
        <form method="post" action="licence.php">
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

    include("footer.php");
?>