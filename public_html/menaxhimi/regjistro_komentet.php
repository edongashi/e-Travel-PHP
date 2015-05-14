	<br>
	<div class="komento">
	<form name="KomentForma" method="post">
	<textarea name="komenti" cols="120" rows="5"></textarea>
	<input type="submit" name="KomentSubmit" value="Dergo"></button>
	</form>
	</div>
	
<?php
require_once("../resources/config.php");
require_once(databaza);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$repo = new repository();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['KomentSubmit']))
{
    if(!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri'])){    
        header("Location: http://localhost/login.php");
    }
    else {
        
        $komenti = $_POST['komenti'];
        $komentuesi = $_SESSION['Username'];

        $repo->execute_query("Insert Into forumi(ChatID, Komentuesi, Komenti) values ('1','$komentuesi','$komenti')");
    
	header('Location: /lokacionet.php');
	exit;
    }   
}
?>