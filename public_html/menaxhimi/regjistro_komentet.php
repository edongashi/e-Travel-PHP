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

$repo = new repository();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $komenti = $_POST['komenti'];
    $komentuesi = "Blend Halilaj";

    $repo->execute_query("Insert Into forumi(ChatID, Komentuesi, Komenti) values ('1','$komenti','$komentuesi')");
    
	header('Location: /lokacionet.php');
	exit;
}
?>