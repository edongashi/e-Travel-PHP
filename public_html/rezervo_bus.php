<?php
require_once("../resources/config.php");
require library."/createDB.php";

session_start();

if(!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri']))
{
    header("Location: http://localhost/login.php");
}

$connect = mysqli_connect($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
// Check connection
if (!$connect) {
    die("Connection failed!");
}

$username = $_SESSION['Username'];
$emriUser = $_SESSION['Emri'];
$mbiemriUser = $_SESSION['Mbiemri'];
$Rid = $_POST['udhetimiId'];
$Rid = substr($Rid, 3);

$db = new DB();

$sql = "Select * From user Where Username = '$username'";
$rez = $db->Get($sql);
$prioriteti = $rez[0]['Prioriteti'];


$sql1 = "Select * From udhetimetbus Where Id = '$Rid'";
$rez = $db->Get($sql1);
$Prej = $rez[0]['Prej'];
$Deri = $rez[0]['Deri'];
$Cmimi = $rez[0]['Cmimi'];


if($prioriteti == "Admin"){
    RezervoSiUser();
}else{
    echo "jeni loguar si user";
}


function RezervoSiUser(){
    global $Prej, $Deri, $emriUser, $mbiemriUser, $Cmimi;
    ?>
        <html>
            <head></head>
            <body>
                <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table>
                        <tr>
                            <td>Emri: </td><td><input type="text" name="EmriRezervuar" value="<?php echo $emriUser; ?>"></td>
                        </tr>
                        <tr>
                            <td>Mbiemri: </td><td><input type="text" name="MbiemriRezervuar" value="<?php echo $mbiemriUser; ?>"></td>
                        </tr>
                        <tr>
                            <td>Prej: </td><td><input type="text" name="PrejRezervuar" value="<?php echo $Prej; ?> " readonly></td>
                        </tr>
                        <tr>
                            <td>Deri: </td><td><input type="text" name="DeriRezervuar" value="<?php echo $Deri; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Ulese: </td><td><input type="number" name="UleseRezervuar" value="1"></td>
                        </tr>
                        <tr>
                            <td>Cmimi: </td><td><input type="text" name="CmimiRezervuar" value="<?php echo $Cmimi; ?>" readonly> &#8364;</td>
                        </tr>
                        <tr>
                            <td></td><td><input type="submit" value="Konfirmo Rezervimin"></td>
                        </tr>
                    </table>
                </form>
            </body>
        </html>
    <?php
}

?>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
}

?>