<?php
require_once("../../resources/config.php");
require(databaza);

$db = new repository;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['numri_rendor'])) {
    if ($_POST['numri_rendor'] == "" || $_POST['foto_path'] == "" ) {
        $error_msg = htmlentities("Ploteso te gjitha fushat!");
    } else {
		$foto_path = $_POST['foto_path'];
        $numri_rendor = $_POST['numri_rendor'];
		
		if ($db->execute("Insert Into galeria(FotoPath, FotoID) values (%s, %d)", $foto_path, $numri_rendor)) {
			$error_msg = htmlentities("Regjistrimi u krye me sukses");
		} else {
			$error_msg = htmlentities("Regjistrimi nuk u krye me sukses");
		}
	}
}


}
?>

<?php
require_once("../../resources/config.php");

$header_titulli = "Ballina";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
require(dashboard_header);
?>

<section class="permbajtje">

 <h1 class="center">Shto foto ne galeri:</h1>
    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <table>
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
            <tr>
                <td>Foto:</td>
                <td>
					<input type="text" name="foto_path"></td>
				</td>
            </tr>
            <tr>
                <td>Numri rendor:</td>
                <td>
                    <input type="text" name="numri_rendor"></td>
            </tr>
            <tr>
                <td></td>
                <td class="button-cell-small">
					<input name="upload" type="submit" class="button button-small" id="upload" value="Upload ">
                    <input class="button button-small" type="reset" value="Anulo">
                </td>
            </tr>
        </table>
    </form> 


</section>

<?php require(dashboard_footer); ?>