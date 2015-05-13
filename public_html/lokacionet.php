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
	$row = $repo->lokacionet;
    foreach ( $row as $rreshti)
		{
            echo "<p><img src='img/content/".$rreshti['Foto']."' height='150px' width='150px'><b> ".$rreshti['Vendi']."</b><br />".$rreshti['Pershkrimi']."</p>";
        }
		include("menaxhimi/regjistro_komentet.php");
		$row = $repo->forumi;
        foreach ( $row as $rreshti)
		{
			echo '<br>' .$rreshti["Komenti"];
            echo '<div class="koment_head">' .$rreshti['Komentuesi'] . '</div>';
        }
		
 
	
	?>
	</ul>
	</div>
</section>

<?php
require(templates_footer);
?>
