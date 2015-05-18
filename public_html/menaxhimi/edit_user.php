<?php
require_once("../../resources/config.php");

$header_titulli = "Menaxho User";
$css_includes = Array("../css/form.css", "../css/dashboard.css");

require(dashboard_header);
require(databaza);
$db = new repository;
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Modifiko'])) {
    if ($_POST['Username'] == ""
            || $_POST['Emri'] == ""
            || $_POST['Mbiemri'] == ""
            || $_POST['Prioriteti'] == "") {
        $error_msg = htmlentities("Ploteso te gjitha fushat!");
    } else {
        $username = trim($_POST['Username']);
        $emri = trim($_POST['Emri']);
        $mbiemri = trim($_POST['Mbiemri']);
        $prioriteti = trim($_POST['Prioriteti']);
        
        if($db->execute("Update user set Emri=%s, Mbiemri=%s, Prioriteti=%s Where Username=%s",$emri,$mbiemri,$prioriteti,$username)) {
            header("Location: http://localhost/menaxhimi/menaxho_user.php");
        } else {
            $error_msg = htmlentities("Ka ndodhur gabim ne modifikim!");
        }
    }    
} else {
    $Uid = $_GET['uid'];
    $rez = $db->get_data("Select * From user Where Uid=%d",$Uid);
}

?>

<section class="permbajtje">
    <h1 style="text-align: center">Edit user</h1>
    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table style="width: 500px; margin: 40px auto;">
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="Username" value="<?php echo $rez[0]['Username'];?>" readonly>
                </td>
                <td style="width: 20px">
                    <p id="user_search"></p>
                </td>
            </tr>
            <tr>
                <td>Emri:</td>
                <td>
                    <input type="text" name="Emri" value="<?php echo $rez[0]['Emri'];?>"></td>
            </tr>
            <tr>
                <td>Mbiemri:</td>
                <td>
                    <input type="text" name="Mbiemri" value="<?php echo $rez[0]['Mbiemri'];?>">
                </td>
            </tr>
            <tr>
                <td>Prioriteti:</td>
                <td>
                    <select name="Prioriteti" value="<?php echo $rez[0]['Prioriteti'];?>">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="height: 48px; text-align: center;">
                    <input type="submit" class="button button-small" name="Modifiko" value="Modifiko">
                    <input type="reset" class="button button-small" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
</section>

<?php require(dashboard_footer); ?>


