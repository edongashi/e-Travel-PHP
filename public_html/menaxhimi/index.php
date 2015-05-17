<?php
require_once("../../resources/config.php");

$header_titulli = "Ballina";
$css_includes = "../css/dashboard.css";
require(dashboard_header);
require(databaza);
$db = new repository;
?>

<section class="permbajtje">
    <h1>Agjensioni i udhetimeve</h1>
	
		
		<div id="tiles-wrapper" class="justify-content" >
			<div class="tile">
				<h1>Lokacionet bus:</h1>
				<?php
					$rows = $db->get_data("Select * From lokacione");
					foreach ($rows as $rreshti)
					{
						echo "<p>" . $rreshti['Vendi'] . "</p>";
					}
				?>
			</div>
			<div class="tile">
				<h1>Lokacionet aeroplan:</h1>
				<?php
					$rows = $db->get_data("Select * From lokacione");
					foreach ($rows as $rreshti)
					{
						echo "<p>" . $rreshti['Vendi'] . "</p>";
					}
				?>
			</div>
			<div class="tile">
				<h1>Rezervimet bus:</h1>
				<?php
					$rows = $db->rezervimet_bus;
					echo "<p>" . count($rows) . "</p><br /><br /><br /><br />";
				?>
				<h1>Rezervimet aeroplan:</h1>
				<?php
					$rows = $db->rezervimet_aeroplan;
					echo "<p>" . count($rows) . "</p>";
				?>
			</div>
			<div class="tile">
				<h1>Udhetimet bus:</h1>
				<?php
					$rows = $db->udhetimet_bus;
					foreach ($rows as $rreshti)
					{
						echo "<p>" . $rreshti['Prej'] . " ->" . $rreshti['Deri'] . "</p>";
					}
				?>
			</div>
			<div class="tile">
				<h1>Udhetimet aeroplan:</h1>
				<?php
					$rows = $db->udhetimet_aeroplan;
					foreach ($rows as $rreshti)
					{
						echo "<p>" . $rreshti['Prej'] . " ->" . $rreshti['Deri'] . "</p>";
					}
				?>
			</div>
			<div class="tile">
				<h1>Numri i userave:</h1>
				<?php
					$rows = $db->users;
					echo count($rows);
				?>
				<h1>Nr userave online:</h1>
				<?php
					echo "1"; #me bo?
				?>
				<h1>Nr i guest:</h1>
				<?php
					echo "1"; #me bo?
				?>
				<h1>Nr i vizitimeve:</h1>
				<?php
					echo "1"; #me bo?
				?>
			</div>
		</div>
</section>

<?php require(dashboard_footer); ?>