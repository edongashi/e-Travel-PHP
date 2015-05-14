<?php
require_once("../../resources/config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    if($_POST['prej'] == ""  || $_POST['deri'] == "" || $_POST['nrulse'] == "0" || $_POST['data'] == "" || $_POST['cmimi'] == "0"){
        echo "Ploteso te gjitha fushat!";
        die();
    }
    
    require (databaza);
    
    $prej = $_POST['prej'];
    $deri = $_POST['deri'];
    $nrulse = $_POST['nrulse'];
    $data = $_POST['data'];
    $cmimi = $_POST['cmimi'];
    
    $db = new repository();

    $sql = "Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('$prej', '$deri', $nrulse, '$data', $cmimi)";
    $db->execute_query($sql);
}

?>

<?php
require_once("../../resources/config.php");

$header_titulli = "Ballina";
$css_includes = "../css/dashboard.css";
require(dashboard_header);
?>

<section class="permbajtje">
        <form method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <th>
                Regjistro Udhetim Autobus
            </th>
            <tr>
                <td>Prej:</td>
                <td><select name="prej">
                        <option></option>
                        <option value="Prishtine">Prishtine</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Peje">Peje</option>
                        <option value="Gjilan">Gjilan</option>
                        <option value="Mitrovice">Mitrovice</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deri:</td>
                <td><select name="deri">
                        <option></option>
                        <option value="Prishtine">Prishtine</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Peje">Peje</option>
                        <option value="Gjilan">Gjilan</option>
                        <option value="Mitrovice">Mitrovice</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Numri i uleseve</td><td><input type="number" min="1" name="nrulse" value="0" style="width:50px;"></td>
            </tr>
            <tr>
                <td>Data e nisjes</td><td><input type="date" name="data"></td>
            </tr>
            <tr>
                <td>Cmimi i biletes</td><td><input type="number" min="1" name="cmimi" value="0" style="width:50px;"> &#8364;</td>
            </tr>
            <tr>
                <td></td><td><input type="submit" value="Regjistro"> <input type="reset" value="Anulo"></td>
            </tr>
        </table>
        </form>
</section>

<?php
require(dashboard_footer);
?>
