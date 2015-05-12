<?php
require_once("../resources/config.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require library."/createDB.php";
    
    $db = new DB();
    
    function ShfaqError($error) {

        echo $error."<br /><br />";
        die();
    }
    
    if($_POST['Username'] == "" 
            || $_POST['Password'] == ""
            || $_POST['PasswordK'] == ""
            || $_POST['Emri'] == "" 
            || $_POST['Mbiemri'] == ""
            || $_POST['Prioriteti'] == ""){
        echo "Ploteso te gjitha fushat!";
        die();
    }
    
    $username = trim($_POST['Username']);
    $password = trim($_POST['Password']);
    $emri = trim($_POST['Emri']);
    $mbiemri = trim($_POST['Mbiemri']);
    $prioriteti = trim($_POST['Prioriteti']);
       
    if($_POST['Password'] != $_POST['PasswordK']){
        
        ShfaqError("Keni dhene password te ndryshem!");
        
    }
    
    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$emri)) {

        ShfaqError('Emri jo valid!');

    }

    if(!preg_match($string_exp,$mbiemri)) {

        ShfaqError('Mbiemri jo valid!');

    }
    
    $salt1 = "2%a@*/";
    $salt2 = "&9o?>";   
    
    $pass = sha1("$salt1$password$salt2");

    $sql = "Insert into user(Username,Password,Emri,Mbiemri,Prioriteti) Values ('$username','$pass','$emri','$mbiemri','$prioriteti')";

    $db->Insert($sql);
}

$header_titulli = "Ballina";
$css_includes = Array("css/form.css", "css/site.css");
require(templates_header);
?>

<section class="permbajtje">
  <h1 style="text-align: center">Krijo llogari</h1>
  <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="width: 500px; margin: 40px auto;">
    <tr>
      <td>Username:</td><td><input type="text" name="Username"><br /></td>
    </tr>
    <tr>
      <td>Password:</td><td><input type="password" name="Password"><br /></td>
    </tr>
    <tr>
      <td>Konfirmo Password:</td><td><input type="password" name="PasswordK"><br /></td>
    </tr>
    <tr>
      <td>Emri:</td><td><input type="text" name="Emri"><br /></td>
    </tr>
    <tr>
      <td>Mbiemri:</td><td><input type="text" name="Mbiemri"><br /></td>
    </tr>
    <tr>
      <td>Prioriteti:</td><td><select name="Prioriteti">
                                <option value="User">User</option>
                                <option value="Agent">Agjent</option>
                                <option value="Admin">Admin</option>
                              </select></td>
    </tr>
    <tr>
        <td colspan="2" style="height: 48px; text-align: center;"><input type="submit" class="button button_vogel" value="Regjistrohu"> <input type="reset" class="button button_vogel" value="Cancel"></td>
    </tr>               
    </table>
  </form>
</section>
<?php
require(templates_footer);
?>
