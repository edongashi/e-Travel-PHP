<?php
require_once("../resources/config.php");
require(databaza);
$db = new repository();

$header_titulli = "Ballina";
$css_includes = Array("css/site.css", "css/form.css");
$script_includes = jquery;

$header_script = <<< SCRIPT
$( document ).ready( function () {
    $( ".id-submit" ).click ( function () {
        $( "input[id=udhetimiId]" ).val( this.id );
    });
});
$(document).ready(function() {
	$(".item1").hide();
	$(".item2").hide();
	$(".item3").hide();
	$(".item1").fadeIn(3000);
	var ni = true;
	var dy = false;
	var tre = false;
	function Ndrrimi() {
		if ( ni == true)
		{
			$(".item1").fadeOut(1000);
			$(".item2").delay(1020).fadeIn(2500);
			ni = false;
			dy = true;
		}
		else if ( dy == true)
		{
			$(".item2").fadeOut(1000);
			$(".item3").delay(1020).fadeIn(2500);
			dy = false;
			tre = true;
		}
		else if ( tre == true)
		{
			$(".item3").fadeOut(1000);
			$(".item1").delay(1020).fadeIn(2500);
			tre = false;
			ni = true;
		}
    }

	window.setInterval(Ndrrimi, 5000);
});
SCRIPT;

require(templates_header);
?>

<section class="permbajtje">
    <div id="slideshow" style="height: 300px">
        <div class="item1">
            <img width="960" height="300" src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage1.jpg" alt="The Last of us">
        </div>
        <div class="item2">
            <img width="960" height="300" src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage2.jpg" alt="GTA V">
        </div>
        <div class="item3">
            <img width="960" height="300" src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage3.jpg" alt="Mirror Edge">
        </div>
    </div>
    <div>
        <h3>5 Udhetimet e ardhshme Autobus</h3>
        <form method='Post' action='rezervo_bus.php'><input type='hidden' id='udhetimiId' name='udhetimiId'>
        <table class='tabela'cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Data</th><th style='width: auto;'></th></thead>
            <?php           
                $rez = $db->get_data("Select * From udhetimetBus Where Data >= Now() order by Data Limit 5");
                
                foreach ($rez as $rreshti) {
                    echo "<tr><td>".$rreshti['Prej']."</td><td>".$rreshti['Deri']."</td><td>".$rreshti['Data']."</td><td style='text-align: center'>"
                        . "<input type='submit' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['Rid']."'></td></tr>";
                }
            ?>
        </table>
        </form>
    </div>
    <div>
        <h3>5 Udhetimet e ardhshme Aeroplan</h3>
        <form method='Post' action='rezervo_aeroplan.php'><input type='hidden' id='udhetimiId' name='udhetimiId'>
        <table class='tabela'cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Data</th><th style='width: auto;'></th></thead>
            <?php 
                $rez = $db->get_data("Select * From udhetimetAeroplan Where Data >= Now() order by Data Limit 5");
                
                foreach ($rez as $rreshti) {
                    echo "<tr><td>".$rreshti['Prej']."</td><td>".$rreshti['Deri']."</td><td>".$rreshti['Data']."</td><td style='text-align: center'>"                       
                        . "<input type='submit' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['Rid']."'></td></tr>";
                }
            ?>
        </table>
        </form>
    </div>
    <div>
        <h3>3 Lokacione random</h3>
        <?php
            $rez = $db->get_data("Select * From lokacione Where Reklam = 1 Order By rand() Limit 3");
            foreach ($rez as $rreshti) {
                echo "<h4>".$rreshti['Vendi']."</h4><br>";
            }
        ?>
    </div>
</section>

<?php require(templates_footer); ?>