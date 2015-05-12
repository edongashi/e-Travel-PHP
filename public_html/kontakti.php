<?php
require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = Array("css/form.css", "css/site.css");
require(templates_header);
?>

<section class="permbajtje">
<form style="width: 640px; margin: 30px auto;" name="kontaktforma" method="post" action="dergo_mail.php">
 
<table>
 
<tr>
 
 <td valign="center">
 
  <label for="emri">Emri</label>
 
 </td>
 
 <td valign="center">
 
  <input  type="text" name="emri" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="center"">
 
  <label for="mbiemri	">Mbiemri</label>
 
 </td>
 
 <td valign="center">
 
  <input  type="text" name="mbiemri" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="center">
 
  <label for="email">Email Address</label>
 
 </td>
 
 <td valign="center">
 
  <input  type="text" name="email" maxlength="80" size="30">
 
 </td>
 
</tr>
 
 
<tr>
 
 <td valign="center">
 
  <label for="komenti">Permbajtja</label>
 
 </td>
 
 <td valign="center">
 
  <textarea name="komenti" maxlength="1000" cols="32" rows="5"></textarea>
 
 </td>
 
</tr>
 
<tr>
 
 <td colspan="2" style="text-align: right; height: 60px;">
 
  <input class="button" type="submit" value="Dergo">
 
 </td>
 
</tr>
 
</table>
 
</form>
</section>
<?php
require(templates_footer);
?>