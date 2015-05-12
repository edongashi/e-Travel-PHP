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

$servername = "localhost";
$username = "root";
$password = "";
$database = "edb";

$connect = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$connect) {
    die("Connection failed!");
}   

$sql = "Select * From udhetimetBus Where Data >= Now()";

$result = mysqli_query($connect, $sql); ?>

<section class="permbajtje">
<h2 style="margin-bottom:10px;">Udhetimet me autobus</h2>
<?php
if(mysqli_num_rows($result) > 0){
	echo "<form method='Post' action='regjistro.php'><input type='hidden' name='udhetimiId'>";
    echo "<table class='tabela' cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th><th align='left'>Cmimi</th><th style='width: auto;'></th></thead>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row['Prej']."</td><td>".$row['Deri']."</td><td>".$row['Ulese']."</td><td>".$row['Data']."</td><td>".$row['Cmimi']." &#8364;</td><td style='text-align: center'>"
                . "<input type='submit' value='Rezervo' class='button button_vogel id-submit' id='id_".$row['Id']."'></td></tr>";
    }
    echo "</form></table>";
} else {
    echo "0 results";
}
?>

</section>

<?php
mysqli_close($connect);

require(templates_footer);
?>
