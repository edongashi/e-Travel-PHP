<?php
require_once("../resources/config.php");
require(databaza);

$header_titulli = "Galeria";
$css_includes = "css/site.css";
$header_style = <<< STYLE
.row {
    display: table;
    width: 100%;
    table-layout: fixed;
    border-spacing: 10px;
}

.col {
    display: table-cell;
    height: 200px;
}

    .col img {
        height: 100%;
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
		if ( $fotoGal['FotoID'] % 3 == 1 || $fotoGal['FotoID'] == 1 )
		{
			echo '<div class="row">';
		}
		echo '<div class="col">';
		echo '<img src="' . $fotoGal['FotoPath'] . '" />';
		echo "</div>";
		if ( $fotoGal['FotoID'] % 3 == 0 || $fotoGal['FotoID'] == $numrifotove )
			{
				echo "</div>"; 
			}
	}
 ?>
</section>

<?php require(templates_footer); ?>