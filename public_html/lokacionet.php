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
            echo "<div class='lokacion-mbajtesi'>";
			echo "<div class='lokacion-foto'><img src='img/content/	" .  $rreshti['Foto'] .  "' width='300px;'></div>
			<div class='lokacion-permbajtja'>
			<h1 class='lokacion-titulli'>" . $rreshti['Vendi'] . "</h1> ";
			if (strlen($rreshti['Pershkrimi']) > 260)
			{
				echo substr($rreshti['Pershkrimi'], 0, 260);
				echo "...";
			}
			else echo $rreshti['Pershkrimi'];
			echo "</div></div>";
			echo "
			<form class='form' method='GET' action=''>
			<button style='margin-left:580px; width:200px;' class='button' type='submit' name='id' value=" . $rreshti['Lid'] .">Lexo me shume</button>
			</form>";
		}
		
	}
	else
	{
		$rreshti = $repo->get_data("SELECT * FROM lokacione WHERE Lid=" . $_GET['id'])[0];
		echo "<div class='lokacion-mbajtesi'>";
		echo "<div class='lokacion-foto'><img src='img/content/	" .  $rreshti['Foto'] .  "' width='300px;'></div>
		<div class='lokacion-permbajtja'>
		<h1 class='lokacion-titulli'>" . $rreshti['Vendi'] . "</h1> ";
		echo $rreshti['Pershkrimi'];
		echo "</div></div>";
		
		include("menaxhimi/regjistro_komentet.php");
		$x = $rreshti;
		$rreshti_forum = $repo->get_data("SELECT * FROM forumi WHERE ChatID=" . $_GET["id"]);
		foreach ( $rreshti_forum as $rreshti)
		{
            echo "<div class='lokacion-mbajtesi'>";
			echo "<div class='lokacion-foto'><img src='img/content/	" .  $x['Foto'] .  "' width='200px;'></div>
			<div class='lokacion-permbajtja' style='margin-left:220px;'>
			<h1 class='lokacion-titulli' style='font-size:20px; margin-top: -15px;'>" . $rreshti['Komentuesi'] . " tha:</h1> ";
			echo "<div class='lokacion-mbajtesi' style='min-height:80px; height:auto;margin-top: -10px'>" .$rreshti['Komenti'];
			echo "</div></div></div><br>";
		}
	}
		
	?>
	

</section>

<?php
require(templates_footer);
?>
