<?php
require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = Array("../css/form.css", "../css/site.css");
require(templates_header);
require(databaza);

?>
<section class="permbajtje">
<?php
    
	$repo = new repository();
	$rows = $repo->lokacionet;
	if ( !isset($_GET["id"]))
	{
    foreach ($rows as $rreshti)
		{
            echo "<p><img src='img/content/".$rreshti['Foto']."' height='150px' width='150px'><b> ".$rreshti['Vendi']."</b><br />".$rreshti['Pershkrimi']."</p>";
			echo "
			<form method='GET' action=''>
			<button type='submit' name='id' value=" . $rreshti['Lid'] .">Vazhdo</button>
			</form>";
		}
	}
	else
	{
		$_SESSION['ID'] = $_GET['id'];
		$rreshti = $repo->get_data("SELECT * FROM lokacione WHERE Lid=" . $_GET['id'])[0];
		echo "<p><img src='img/content/". $rreshti['Foto'] ."' height='150px' width='150px'><b> ".$rreshti['Vendi']."</b><br />".$rreshti['Pershkrimi']."</p>";
		
		include("menaxhimi/regjistro_komentet.php");
		
		$rreshti_forum = $repo->get_data("SELECT * FROM forumi WHERE ChatID=" . $_GET["id"]);
		foreach ( $rreshti_forum as $rreshti)
		{
			echo '<br><div class="form"><span class="tabela">' .$rreshti['Komentuesi'];
			echo '</span><br><div class="tabela">' .$rreshti['Komenti'] . '</div> </ul></form>';
		}
	}
		
	?>
	

</section>

<?php
require(templates_footer);
?>
