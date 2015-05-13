<html>
    <head></head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <table>
                <tr>
                    <td>Emri i Lokacionit:</td><td><input type="text" name="emri_lokacionit"></td>
                </tr>
                <tr>
                    <td>Foto e Lokacionit:</td><td><input type="text" name="emri_foto"></td>
                </tr>
                <tr>
                    <td valign="top">Pershkrimi i Lokacionit:</td><td><textarea cols="30" rows="8" name="pershkrimi_lokacionit"></textarea></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit" value="Regjistro"> <input type="reset" value="Anulo"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
require_once("../../resources/config.php");
require library."/createDB.php";

$db = new DB();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST['emri_lokacionit'] == "" || $_POST['emri_foto'] == "" || $_POST['pershkrimi_lokacionit'] == ""){
        echo "Ploteso te gjitha fushat";
        die();
    }


    $emri_lokacionit = $_POST['emri_lokacionit'];
    $pershkrimi_lokacionit = $_POST['pershkrimi_lokacionit'];
    $emri_foto = $_POST['emri_foto'];

    $sql = "Insert Into lokacione(Vendi, Pershkrimi, Foto) values ('$emri_lokacionit','$pershkrimi_lokacionit','$emri_foto')";
    
    $db->Insert($sql);
}
?>