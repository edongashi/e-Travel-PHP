	<div class="komento">
	<form name="KomentForma" method="post">
	<textarea name="komenti" cols="120" rows="5"></textarea>
	<input type="submit" name="KomentSubmit" value="Dergo"></button>
	</form>
	</div>
	<div class="komentet">
	<ul>
	
	<?php

require library."/createDB.php";

$db = new DB();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $komenti = $_POST['komenti'];
    $komentuesi = "Blend Halilaj";

    $sql = "Insert Into forumi(ChatID, Komentuesi, Komenti) values ('1','$komenti','$komentuesi')";
    
    $db->Insert($sql);
	header('Location: /lokacionet.php');
	exit;
}
?>