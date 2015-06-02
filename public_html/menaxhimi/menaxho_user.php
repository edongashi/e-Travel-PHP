<?php
require_once("../../resources/config.php");

$header_titulli = "Menaxho User";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
$script_includes = jquery;
$header_script = <<< SCRIPT
$( document ).ready( function () {
    $( ".id-submit" ).click ( function () {
        $( "input[id=userId]" ).val( this.id );
    });
});
SCRIPT;
require(dashboard_header);
require(databaza);
$db = new repository;
?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userId'])){
    if(preg_match("/^edit_/", $_POST['userId'])) {
        $Uid = $_POST['userId'];
        $Uid = substr($Uid, 5);
        header("Location: http://localhost/menaxhimi/edit_user.php?uid=$Uid");
    } else {
        $Uid = $_POST['userId'];
        $Uid = substr($Uid, 5);
        $db->execute("Delete from user where Uid = %d",$Uid);
        header("Location: http://localhost/menaxhimi/menaxho_user.php");
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['si_user'])) {
    $emri = $_POST['Emri'];
    $mbiemri = $_POST['Mbiemri'];
    $password = $_POST['password'];
    $password_ri = $_POST['password_ri'];
    $password_k = $_POST['password_k'];
    $salt1 = "2%a@*/";
    $salt2 = "&9o?>";
    $password = sha1("$salt1$password$salt2");
          
    $rez = $db->get_data("Select * from user where Username = %s", $_SESSION['Username']);
    if($password != $rez[0]['Password']) {
        $error_msg = htmlentities("Keni dhene password-in gabim!");
    } else {
        if($emri == "" || $mbiemri == "") {
            $error_msg = htmlentities("Ploteso fushat emri dhe mbiemri!");
        } else {
            if($password_ri != "" || $password_k != "") {
                if($password_ri != $password_k) {
                    $error_msg = htmlentities("Keni dhene password te ndryshem!");
                } else {
                    $password_ri = sha1("$salt1$password_ri$salt2");
                    if($db->execute("Update user set Emri = %s, Mbiemri = %s, Password = %s Where Username = %s",$emri,$mbiemri,$password_ri,$_SESSION['Username']))
                        $error_msg = htmlentities("Te dhenat u ndryshuan me sukses!");
                    else
                        $error_msg = htmlentities("Ka ndodhur gabim ne ndryshimin e te dhenave!");    
                }
            } else {
                if($db->execute("Update user set Emri = %s, Mbiemri = %s Where Username = %s",$emri,$mbiemri,$_SESSION['Username']))
                    $error_msg = htmlentities("Te dhenat u ndryshuan me sukses!");
                else
                    $error_msg = htmlentities("Ka ndodhur gabim ne ndryshimin e te dhenave!");
            }
        }        
    }
    
    if (isset($error_msg)) echo "<h4 class='error-msg'>$error_msg</h4>";
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kerko_user'])) {
    if($_POST['kerko_user'] == "") {
        $rez_user = $db->users;
    } else {
        $rez_user = $db->get_data("Select * from user Where Username=%s",$_POST['kerko_user']);
    } 
}
else {
    $rez_user = $db->users;
}

?>

<section class="permbajtje">
    <?php
        $rez = $db->get_data("Select * from user where Username=%s",$_SESSION['Username']);
        if($rez[0]['Prioriteti'] == 'Admin') {
            si_admin();
        } else {
            si_user();
        }
            
    ?>
</section>

<?php require(dashboard_footer); ?>



<?php

function si_admin() {
    ?>
        <form method='Post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
        <table class="tabela"> 
            <tr>
                <td style="height:60px; width: 130px;"><a href="new_user.php" ><img src="../img/layout/user_add.png" style='height:40px; width:40px;'>Shto user</a></td>
                <td style="text-align: right"><input style="max-width: 300px" type="text" name="kerko_user" placeholder="Username"> </td>
                <td style="width: 100px; text-align: center"><input type="submit" value="Kerko" class="button"></td>
            </tr>           
        </table>
        </form>
        <form method='Post' action='<?php echo $_SERVER['PHP_SELF'];?>'><input type='hidden' id='userId' name='userId'>
        <table class="tabela">
            <tr>
                <th align='left'>Uid</th><th align='left'>Username</th><th align='left'>Password</th><th align='left'>Emri</th><th align='left'>Mbiemri</th><th align='left'>Prioriteti</th><th align='left'>Edit Command</th>
            </tr>
            <?php
            global $db,$rez_user;
            foreach ($rez_user as $rreshti)
                echo "<tr><td>".$rreshti['Uid']."</td><td>".$rreshti['Username']."</td><td>********</td><td>".$rreshti['Emri']."</td><td>".$rreshti['Mbiemri']."</td><td>".$rreshti['Prioriteti']."</td>"
                    . "<td><input type='submit' value='Edit' class='button button-small id-submit' id='edit_".$rreshti['Uid']."'> <a onclick=\"return confirm('A jeni te sigurt qe deshironi ta fshini?');\"> <input type='submit' value='Delete' class='button button-small id-submit' id='dele_".$rreshti['Uid']."'></a></td></tr>";
            ?>
        </table>
        </form>
    <?php
}

function si_user() {
    ?>
<form class="form" method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table class="tabela">
        <?php
            $db = new repository;
            $rez = $db->get_data("Select * from user where Username = %s",$_SESSION['Username']);
            echo "<tr><td>Emri</td><td><input type='text' name='Emri' value='".$rez[0]["Emri"]."'></td></tr>";
            echo "<tr><td>Mbiemri</td><td><input type='text' name='Mbiemri' value='".$rez[0]["Mbiemri"]."'></td></tr>";
            echo "<tr><td>Username</td><td><input type='text' name='Username' value='".$rez[0]["Username"]."' readonly></td></tr>";
            echo "<tr><td>Prioriteti</td><td><input type='text' name='Prioriteti' value='".$rez[0]["Prioriteti"]."' readonly></td></tr>";
            echo "<tr><td>Password i ri</td><td><input type='password' name='password_ri'></td></tr>";
            echo "<tr><td>Konfirmo Password-in e ri</td><td><input type='password' name='password_k'></td></tr>";
            echo "<tr><td style='height:35px;'>Pas qdo ndryshimi shenoni passwordin</td><td></td></tr>";
            echo "<tr><td>Password</td><td><input type='password' name='password'></td></tr>";
            echo "<tr><td></td><td><input type='submit' name='si_user' value='Ruaj' class='button'>  <input type='reset' value='Anulo' class='button'></td></tr>"
        ?>
    </table>
</form>

    <?php
}
?>


