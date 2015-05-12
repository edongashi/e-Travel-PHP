<?php

session_start();

if(isset($_SESSION['Username']) && isset($_SESSION['Emri']) && isset($_SESSION['Mbiemri']))
{
    header("Location: http://localhost/Menaxhimi.html");
}

?>

<html>
    <head><title>Login</title></head>
    <body>
        <div style="width:100%;">
        <div style="float:left; width:30%;">.</div>
        <div style="float:left; width: 40%;" align="center">
        <form method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset>
                <legend>LOGIN</legend>
                <table>
                    <tr>
                        <td>Username: </td><td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password: </td><td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td></td><td align="right"><input type="submit" value="Login"> <input type="reset" value="Cancel"></td>
                    </tr>
                    <tr>
                        <td><a href="newuser.php">Nuk keni user?</a></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        </div>
        <div style="float:left; width:30%;"></div>
        </div>
    </body>
</html>

<?php

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


?>
