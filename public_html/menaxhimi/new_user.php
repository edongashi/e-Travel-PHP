<?php
require_once("../../resources/config.php");

$header_titulli = "Menaxho User";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
$script_includes = "/js/krijo_llogari.js";

require(dashboard_header);
require(databaza);
$db = new repository;
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $string_exp = "/^[A-Za-z .'-]+$/";

    if ($_POST['Username'] == ""
            || $_POST['Password'] == ""
            || $_POST['PasswordK'] == ""
            || $_POST['Emri'] == ""
            || $_POST['Mbiemri'] == ""
            || $_POST['Prioriteti'] == "") {
        $error_msg = htmlentities("Ploteso te gjitha fushat!");
    } else {
        
        if (!preg_match($string_exp, $emri)) {
            $error_msg = htmlentities("Emri jo valid!");
        } else {
            
            $username = trim($_POST['Username']);
            $password = trim($_POST['Password']);
            $emri = trim($_POST['Emri']);
            $mbiemri = trim($_POST['Mbiemri']);
            $prioriteti = trim($_POST['Prioriteti']);
            
            if ($_POST['Password'] != $_POST['PasswordK']) {
                $error_msg = htmlentities("Keni dhene password te ndryshem!");
            } else {
                $salt1 = "2%a@*/";
                $salt2 = "&9o?>";
                $pass = sha1("$salt1$password$salt2");
                if($db->execute("Insert into user(Username,Password,Emri,Mbiemri,Prioriteti) Values (%s,%s,%s,%s,%s)",$username,$pass,$emri,$mbiemri,$prioriteti)) {
                    $error_msg = htmlentities("Keni regjistruar me sukses user-in");
                } else {
                    $error_msg = htmlentities("Ka ndodhur gabim ne regjistrimin e user-it");
                }
            }           
        }
    }  
}

?>
<section class="permbajtje">
    <h1 style="text-align: center">Krijo llogari</h1>
    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table style="width: 500px; margin: 40px auto;">
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h3></td></tr>"; ?>
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
                <td>Prioriteti:</td>
                <td>
                    <select name="Prioriteti">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
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

<?php require(dashboard_footer); ?>




