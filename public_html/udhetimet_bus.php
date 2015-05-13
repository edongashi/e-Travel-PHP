<?php
require_once("../resources/config.php");

$header_titulli = "Udhetimet Autobus";
$css_includes = Array("css/form.css", "css/site.css");
$include_jquery = true;
$header_script = <<<END
  $( document ).ready( function () {
    $( ".id-submit" ).click ( function () {
      $( "input[id=udhetimiId]" ).val( this.id );
    });
  });
END;
require(templates_header);

$connect = mysqli_connect($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
// Check connection
if (!$connect) {
    die("Connection failed!");
}   

$sql = "Select * From udhetimetBus Where Data >= Now()";

$result = mysqli_query($connect, $sql); ?>

<section class="permbajtje">
<h2 style="margin-bottom:10px;">Udhetimet me autobus</h2>
<?php
if(mysqli_num_rows($result) >= 0){
	echo "<form method='Post' action='rezervo_bus.php'><input type='hidden' id='udhetimiId' name='udhetimiId'>";
    echo "<table class='tabela' cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th><th align='left'>Cmimi</th><th style='width: auto;'></th></thead>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row['Prej']."</td><td>".$row['Deri']."</td><td>".$row['Ulese']."</td><td>".$row['Data']."</td><td>".$row['Cmimi']." &#8364;</td><td style='text-align: center'>"
                . "<input type='submit' value='Rezervo' class='button button_vogel id-submit' id='id_".$row['Rid']."'></td></tr>";
    }
    echo "</form></table>";
}
?>

</section>

<?php
mysqli_close($connect);

require(templates_footer);
?>
