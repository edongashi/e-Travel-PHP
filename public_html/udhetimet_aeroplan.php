<?php
require_once("../resources/config.php");

$header_titulli = "Udhetimet Aeroplan";
$css_includes = Array("css/site.css", "css/form.css");
$script_includes = jquery;
$header_script = <<< SCRIPT
$( document ).ready( function () {
    $( ".id-submit" ).click ( function () {
        $( "input[id=udhetimiId]" ).val( this.id );
    });
});
SCRIPT;

require(templates_header);
require(databaza);

$db = new repository;
$sql = "Select * From udhetimetAeroplan Where Data >= Now()";

if (isset($_POST['prej']) && isset($_POST['deri'])) {
    if ($_POST['prej'] != "" && $_POST['deri'] != "") {
        $sql = "Select * From udhetimetAeroplan Where Data >= Now() and Prej ='".$_POST['prej']."' and Deri='".$_POST['deri']."'";
    }
    else if ($_POST['prej'] != "" && $_POST['deri'] == "") {
        $sql = "Select * From udhetimetAeroplan Where Data >= Now() and Prej ='".$_POST['prej']."'";
    }
    else if ($_POST['prej'] == "" && $_POST['deri'] != "") {
        $sql = "Select * From udhetimetAeroplan Where Data >= Now() and Deri ='".$_POST['deri']."'";
    }
    else {
        $sql = "Select * From udhetimetAeroplan Where Data >= Now()";
    }
}

$rez = $db->get_data($sql);
$lokacionet = $db->get_data("Select * From lokacione Where Reklam = 0 and Mjeti = 'Aeroplan'");
?>

<section class="permbajtje">
    <h2 style="margin-bottom: 10px;">Udhetimet me aeroplan</h2>
    <br />
    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <tr>
                <td>Prej:
                <select name="prej">
                    <option></option>
                    <?php
                    foreach ($lokacionet as $value) {
                        echo "<option>".$value['Vendi']."</option>";
                    } ?>
                </select>
                </td>
                <td>Deri:
                <select name="deri">
                    <option></option>
                    <?php
                    foreach ($lokacionet as $value) {
                        echo "<option>".$value['Vendi']."</option>";
                    } ?>
                </select>
                </td>
                <td>
                    <input type="submit" value="Kerko" class='button button-small' style="width: 100px; height: 35px; margin-top: 15px; margin-left: 15px;">
                </td>
            </tr>
        </table>
    </form>
    <br />
    <br />
    <?php
    echo "<form method='Post' action='rezervo_aeroplan.php'><input type='hidden' id='udhetimiId' name='udhetimiId'>";
    echo "<table class='tabela' cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th><th align='left'>Cmimi</th><th style='width: auto;'></th></thead>";
    foreach ($rez as $rreshti) {
        echo "<tr><td>".$rreshti['Prej']."</td><td>".$rreshti['Deri']."</td><td>".$rreshti['Ulese']."</td><td>".$rreshti['Data']."</td><td>".$rreshti['Cmimi']." &#8364;</td><td style='text-align: center'>"
        . "<input type='submit' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['Rid']."'></td></tr>";
    }
    echo "</form></table>";
    ?>
</section>

<?php require(templates_footer); ?>