<?php
session_start();
if (isset($_SESSION['Username']) && isset($_SESSION['Emri']) && isset($_SESSION['Mbiemri'])) {
    header("Location: index.php");
}

require_once("../resources/config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['username'] == "" || $_POST['password'] == "") {
        $error_msg = htmlentities("Plotëso fushat!");
    }
    else {
        require(databaza);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $salt1 = "2%a@*/";
        $salt2 = "&9o?>";
        $password = sha1("$salt1$password$salt2");
        $db = new repository;     
        $rows = $db->get_data("Select * From user Where Username=%s and Password=%s",$username,$password);
        if (count($rows) > 0) {
            $_SESSION['Emri'] = $rows[0]["Emri"];
            $_SESSION['Mbiemri'] = $rows[0]['Mbiemri'];
            $_SESSION['Username'] = $rows[0]['Username'];
            $_SESSION['Prioriteti'] = $rows[0]['Prioriteti'];
            header("Location: index.php");
        } else {
            $error_msg = htmlentities("Shfrytëzuesi ose fjalëkalimi i gabuar!");
        }
    }
}

$header_titulli = "Login";
$css_includes = Array("css/form.css", "css/site.css");
require(templates_header);
?>

<section class="permbajtje">
    <h1 class="center">Identifikohuni</h1>
    <form class="form form-small" method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password"></td>
            </tr>
            <tr>
                <td style="height: 40px; padding-top: 7px"><a href="newuser.php">Nuk keni user?</a></td>
                <td align="right">
                    <input class="button button-small" type="submit" value="Login">
                    <input class="button button-small" type="reset" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
</section>

<?php require(templates_footer); ?>