<?php
require_once("../resources/config.php");
require(databaza);

$header_titulli = "Galeria";
$css_includes = "css/site.css";
$header_style = <<< STYLE
.foto {
    display: inline-block;
    width: 300px;
	margin: 10px;
}

.foto img {
    width: 100%;
}

STYLE;

require(templates_header);
?>

<section class="permbajtje">
<?php 
	$db = new repository;
	$rez = $db->galeria;
	$numrifotove = count($rez);
	foreach ($rez as $fotoGal) {
		echo '<div class="foto">';
		echo '<img src="' . $fotoGal['FotoPath'] . '" />';
		echo "</div>"; 

	}
 ?>
</section>

<?php require(templates_footer); ?>