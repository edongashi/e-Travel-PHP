<?php

session_start();

if(isset($_SESSION['Username']) && isset($_SESSION['Emri']) && isset($_SESSION['Mbiemri']))
{
    header("Location: http://localhost/Menaxhimi.html");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $host = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $database = "edb";
    
    if($_POST['username'] == "" || $_POST['password'] == ""){
        echo "Ploteso fushat!";
        die();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt1 = "2%a@*/";
    $salt2 = "&9o?>";

    $connect = mysqli_connect($host, $dbuser, $dbpassword, $database);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $password = sha1("$salt1$password$salt2");

    $query = "Select * From user Where Username='$username' and Password='$password'";

    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['Emri'] = $row["Emri"];
        $_SESSION['Mbiemri'] = $row['Mbiemri'];
        $_SESSION['Username'] = $row['Username'];

        header("Location: http://localhost/Menaxhimi.html");
    }
    else
    {
        echo "Nuk mund te qaseni";
    }

    mysqli_close($connect);
}

require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = Array("css/form.css", "css/site.css");
require(templates_header);
?>

<section class="permbajtje">
  <h1 style="text-align: center">Identifikohuni</h1>
  <form method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table style="width: 400px; margin: 40px auto;">
      <tr>
        <td>Username: </td><td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password: </td><td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td style="height: 40px; padding-top: 7px"><a href="newuser.php">Nuk keni user?</a></td>
        <td align="right">
          <input class="button button_vogel" type="submit" value="Login">
          <input class="button button_vogel" type="reset" value="Cancel">
        </td>
      </tr>
    </table>
  </form>
</section>

<?php
require(templates_footer);
?>
