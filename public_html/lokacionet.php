<?php
require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = "css/site.css";
require(templates_header);

?>
<section class="permbajtje">
<?php
   
    $connect = mysqli_connect($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
    // Check connection
    if (!$connect) {
        die("Connection failed!");
    }   

    $sql = "Select * From lokacione";
    
    $result = mysqli_query($connect, $sql);
            
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<p><img src='img/content/".$row['Foto']."' height='150px' width='150px'><b> ".$row['Vendi']."</b><br />".$row['Pershkrimi']."</p>";
        }
		include("menaxhimi/regjistro_komentet.php");
		$sql = "Select * From forumi Where ChatID=1";
    
		$result = mysqli_query($connect, $sql);
            
		if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
			echo '<br>' .$row["Komenti"];
            echo '<div class="koment_head">' .$row['Komentuesi'] . '</div>';
        }
    } else {
        echo "0 results";
    }
		
    } else {
        echo "0 results";
    }
	
	?>
	</ul>
	</div>
	<?php
    mysqli_close($connect);

?>
</section>

<?php
require(templates_footer);
?>
