<br />
<div class="lokacion-mbajtesi">
    <p class="lokacion-titulli lokacion-foto" style="margin: 20px 40px">Komento: </p>
    <form class="form lokacion-permbajtja" style="margin-left: 280px; margin-bottom: 50px;" name="KomentForma" method="post">
        <textarea name="komenti" cols="120" rows="5" maxlength="300"></textarea>
        <button style='float:right; margin-top:10px;' class='button' type="submit" name="<?php $_GET['id'] ?>">Dergo</button>
    </form>
</div>
<br />

<?php
require_once("../resources/config.php");
require(databaza);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$db = new repository;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['komenti']))
{
    if (!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri']))	{
        header("Location: http://localhost/login.php");
    } else {
        $komenti = $_POST['komenti'];
        $komentuesi = $_SESSION['Username'];
        $db->execute("Insert Into forumi(ChatID, Komentuesi, Komenti) values (" . $_GET["id"] .",'$komentuesi','$komenti')");
        header('Location: /lokacionet.php?id='. $_GET['id']);
        exit;
    }
}
?>