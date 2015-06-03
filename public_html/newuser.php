<?php
require_once("../resources/config.php");

require(databaza);
$db = new repository;

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ($_POST['Username'] == ""
            || $_POST['Password'] == ""
            || $_POST['PasswordK'] == ""
            || $_POST['Emri'] == ""
            || $_POST['Mbiemri'] == "") {
        
        $error_msg = htmlentities("Ploteso te gjitha fushat!");
    
    } else {
        
        $username = trim($_POST['Username']);
        $password = trim($_POST['Password']);
        $emri = trim($_POST['Emri']);
        $mbiemri = trim($_POST['Mbiemri']);
        $prioriteti = "User";
        
        if ($db->get_data("SELECT * FROM user WHERE Username = %s",$username)) {
            
            $error_msg = htmlentities("Ky username ekziston!");
            
        } else {
            
            if(($_POST['Password'] != $_POST['PasswordK']) || !preg_match("/^.*(?=.{3,}).*$/",$password)) {
            
                $error_msg = htmlentities("Keni dhene password te ndryshem ose gabim!");
            
            } else {
                
                $string_exp = "/^[A-Za-z .'-]+$/";
                
                if (!preg_match($string_exp, $emri) || !preg_match($string_exp, $mbiemri)) {
                    $error_msg = htmlentities("Emri ose Mbiemri jo valid!");
                } else {
                    
                    $salt1 = "2%a@*/";
                    $salt2 = "&9o?>";
                    $pass = sha1("$salt1$password$salt2");
                    $db->execute("Insert into user(Username,Password,Emri,Mbiemri,Prioriteti) Values (%s,%s,%s,%s,%s)",$username,$pass,$emri,$mbiemri,$prioriteti);
                    $error_msg = htmlentities("Keni krijuar llogari me sukses!");
                }              
            }
        }   
    } 
}

$header_titulli = "Krijo llogari";
$css_includes = Array("css/form.css", "css/site.css");
$script_includes = "/js/krijo_llogari.js";
require(templates_header);
?>

<section class="permbajtje">
    <h1 style="text-align: center">Krijo llogari</h1>
    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table style="width: 500px; margin: 40px auto;">
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="Username" onchange="showUser(this.value)">
                </td>
                <td style="width: 20px">
                    <p id="user_search"></p>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="Password" onchange="showPassword(this.value)">
                </td>
                <td style="width: 20px">
                    <p id="password_check"></p>
                </td>
            </tr>
            <tr>
                <td>Konfirmo Password:</td>
                <td>
                    <input type="password" name="PasswordK">
                </td>
            </tr>
            <tr>
                <td>Emri:</td>
                <td>
                    <input type="text" name="Emri"></td>
            </tr>
            <tr>
                <td>Mbiemri:</td>
                <td>
                    <input type="text" name="Mbiemri">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="height: 48px; text-align: center;">
                    <input type="submit" class="button button-small" value="Regjistrohu">
                    <input type="reset" class="button button-small" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
</section>

<?php require(templates_footer); ?>