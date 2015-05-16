<?php
require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = "css/site.css";
$script_includes = jquery;

$header_script = <<< SCRIPT
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
    <div id="slideshow" class="owl-carousel owl-theme">
        <div class="item1">
            <img src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage1.jpg" alt="The Last of us">
        </div>
        <div class="item2">
            <img src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage2.jpg" alt="GTA V">
        </div>
        <div class="item3">
            <img src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage3.jpg" alt="Mirror Edge">
        </div>
    </div>
</section>

<?php require(templates_footer); ?>