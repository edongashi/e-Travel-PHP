<?php
require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = "css/site.css";
require(templates_header);
require(databaza);

?>
<section class="permbajtje">
<?php
    
	$repo = new repository();
	$rows = $repo->lokacionet;
    foreach ($rows as $rreshti)
		{
            echo "<p><img src='img/content/".$rreshti['Foto']."' height='150px' width='150px'><b> ".$rreshti['Vendi']."</b><br />".$rreshti['Pershkrimi']."</p>";
        
		include("menaxhimi/regjistro_komentet.php");
		$rows_forum = $repo->forumi;

        foreach ( $rows_forum as $rreshti_forum)
		{
			echo '<br>' . '<ul>' .$rreshti_forum["Komenti"];
            echo '<div class="koment_head">' .$rreshti_forum['Komentuesi'] . '</div> </ul><br>';
        }

		}
 
	
	?>

</section>

<?php
require(templates_footer);
?>
