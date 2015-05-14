<?php
require_once("../../resources/config.php");
require(databaza);

$repo = new repository();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST['emri_lokacionit'] == "" || $_POST['emri_foto'] == "" || $_POST['pershkrimi_lokacionit'] == ""){
        echo "Ploteso te gjitha fushat";
        die();
    }


    $emri_lokacionit = $_POST['emri_lokacionit'];
    $pershkrimi_lokacionit = $_POST['pershkrimi_lokacionit'];
    $emri_foto = $_POST['emri_foto'];

    $repo->execute_query("Insert Into lokacione(Vendi, Pershkrimi, Foto) values ('$emri_lokacionit','$pershkrimi_lokacionit','$emri_foto')");
    
}
?>

<?php
require_once("../../resources/config.php");

$header_titulli = "Ballina";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
require(dashboard_header);
?>

<section class="permbajtje">
  <h1 class="center">Shto lokacion</h1>
  <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <table>
                <tr>
                    <td>Emri i Lokacionit:</td><td><input type="text" name="emri_lokacionit"></td>
                </tr>
                <tr>
                    <td>Foto e Lokacionit:</td><td><input type="text" name="emri_foto"></td>
                </tr>
                <tr>
                    <td>Pershkrimi i Lokacionit:</td><td><textarea cols="30" rows="8" name="pershkrimi_lokacionit"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="button-cell-small">
                        <input class="button button-small" type="submit" value="Regjistro">
                        <input class="button button-small" type="reset" value="Anulo">
                    </td>
                </tr>
            </table>
    </form>
</section>

<?php
require(dashboard_footer);
?>