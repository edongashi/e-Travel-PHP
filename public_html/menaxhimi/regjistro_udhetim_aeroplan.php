<?php
require_once("../../resources/config.php");
require(databaza);

$db = new repository();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['prej'] == ""  || $_POST['deri'] == "" || $_POST['nrulse'] == "0" || $_POST['data'] == "" || $_POST['cmimi'] == "0") {
        $error_msg = htmlentities("Ploteso te gjitha fushat!");
    } else {

        $prej = $_POST['prej'];
        $deri = $_POST['deri'];
        $nrulse = $_POST['nrulse'];
        $data = $_POST['data'];
        $ora = $_POST['ora'];
        $cmimi = $_POST['cmimi'];
        $datetime = $data." ".$ora;

        if ($db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values (%s,%s,%d,%s,%d)", $prej, $deri, $nrulse, $datetime, $cmimi)) {
            $error_msg = htmlentities("Regjistrimi u krye me sukses");
        } else {
            $error_msg = htmlentities("Regjistrimi nuk u krye me sukses");
        }
    }
}
$lokacionet = $db->get_data("Select * From lokacione Where Reklam = 0 and Mjeti = 'Aeroplan'");

?>

<?php
require_once("../../resources/config.php");

$header_titulli = "Regjistro udhetime-Aeroplan";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
require(dashboard_header);
?>

<section class="permbajtje">
    <h1 class="center">Regjistro Udhetim Aeroplan</h1>
    <form class="form" method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <?php if (isset($error_msg)) echo "<tr><td colspan='2'><h4 class='error-msg'>$error_msg</h4></td></tr>"; ?>
            <tr>
                <td>Prej:</td>
                <td>
                    <select name="prej">
                        <option></option>
                        <?php
                        foreach ($lokacionet as $value) {
                            echo "<option>".$value['Vendi']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deri:</td>
                <td>
                    <select name="deri">
                        <option></option>
                        <?php
                        foreach ($lokacionet as $value) {
                            echo "<option>".$value['Vendi']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Numri i uleseve</td>
                <td>
                    <input type="number" min="1" name="nrulse" value="0"></td>
            </tr>
            <tr>
                <td>Data dhe ora e nisjes</td>
                <td>
                    <input type="date" name="data" style="width: 63%">
                    <input type="time" name="ora" style="float: right; width: 35%">
                </td>
            </tr>
            <tr>
                <td>Cmimi i biletes</td>
                <td>
                    <input type="number" min="1" name="cmimi" value="0" style="width: -moz-calc(100% - 20px); width: -webkit-calc(100% - 20px); width: calc(100% - 20px);">
                    &#8364;
                </td>
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