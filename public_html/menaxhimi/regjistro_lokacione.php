<?php
require_once("../../resources/config.php");
require(databaza);

$db = new repository;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['reklam'])) {

        if ($_POST['emri_lokacionit'] == "" || $_POST['emri_foto'] == "" || $_POST['pershkrimi_lokacionit'] == "") {

            $error_msg = htmlentities("Ploteso te gjitha fushat!");

        } else {
            $emri_lokacionit = $_POST['emri_lokacionit'];
            $pershkrimi_lokacionit = $_POST['pershkrimi_lokacionit'];
            $emri_foto = $_POST['emri_foto'];
            $mjeti = $_POST['mjeti'];

            if ($db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values (%s, %s, %s, 1, %s)", $emri_lokacionit, $pershkrimi_lokacionit, $emri_foto, $mjeti)) {
                $error_msg = htmlentities("Regjistrimi u krye me sukses");
            } else {
                $error_msg = htmlentities("Regjistrimi nuk u krye me sukses");
            }
        }
    } else {
        if ($_POST['emri_lokacionit'] == "") {
            $error_msg = htmlentities("Ploteso fushen Emri i Lokacionit!");
        } else {
            $emri_lokacionit = $_POST['emri_lokacionit'];
            $mjeti = $_POST['mjeti'];
            
            if ($db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values (%s, '', '', 0, %s)", $emri_lokacionit, $mjeti)) {
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
    <h1 class="center">Shto lokacion</h1>
    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
            <tr>
                <td>Emri i Lokacionit:</td>
                <td>
                    <input type="text" name="emri_lokacionit"></td>
            </tr>
            <tr>
                <td></td><td><input type="radio" name="mjeti" value="Bus" checked>Autobus   <input type="radio" name="mjeti" value="Aeroplan">Aeroplan</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" name="reklam" value="1">Reklam</td>
            </tr>
            <tr>
                <td>Foto e Lokacionit:</td>
                <td>
                    <input type="text" name="emri_foto"></td>
            </tr>
            <tr>
                <td>Pershkrimi i Lokacionit:</td>
                <td>
                    <textarea cols="30" rows="8" name="pershkrimi_lokacionit"></textarea></td>
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

<?php require(dashboard_footer); ?>