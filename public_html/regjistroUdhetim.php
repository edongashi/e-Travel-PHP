<html>
    <head></head>
    <body>
        <form method="Post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <th>
                Regjistro Udhetim
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
                <td>Numri i uleseve</td><td><input type="number" name="nrulse" value="0" style="width:50px;"></td>
            </tr>
            <tr>
                <td>Data e nisjes</td><td><input type="date" name="data"></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" value="Regjistro"> <input type="reset" value="Anulo"></td>
            </tr>
        </table>
        </form>
    </body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    if($_POST['prej'] == ""  || $_POST['deri'] == "" || $_POST['nrulse'] == "0" || $_POST['data'] == ""){
        echo "Ploteso te gjitha fushat!";
        die();
    }
    
    require "createDB.php";
    
    $prej = $_POST['prej'];
    $deri = $_POST['deri'];
    $nrulse = $_POST['nrulse'];
    $data = $_POST['data'];

    $db = new DB();

    $sql = "Insert into udhetimet(Prej, Deri, Ulese, Data) Values ('$prej', '$deri', $nrulse, '$data')";
    $db->Insert($sql);
}

?>

