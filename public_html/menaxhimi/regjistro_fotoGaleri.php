<?php
require_once("../../resources/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['numri_rendor'] == "" || $_POST['foto_path'] == "" ) {
        $error_msg = htmlentities("Ploteso te gjitha fushat!");
		die();
    }
}
?>

<?php
require_once("../../resources/config.php");

$header_titulli = "Regjistro foto";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
require(dashboard_header);
?>

<section class="permbajtje">

 <h1 class="center">Shto foto ne galeri:</h1>
 <form action="file_upload.php" method="post" enctype="multipart/form-data">
    <table>
        <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
        <tr>
            <td>Foto:</td>
            <td>
			    <input type="file" name="fileToUpload" id="fileToUpload">
			</td>
        </tr>
	    <tr>
            <td>Numri rendor:</td>
			<td>
                <input type="text" name="numri_rendor">
			</td>
        </tr>
		<tr>
			<td class="button-cell-small">
				<input class="button button-small" type="submit" value="Upload Image" name="submit">
                <input class="button button-small" type="reset" value="Anulo">
            </td>
		</tr>
    </table>			    
</form>

</section>

<?php require(dashboard_footer); ?>