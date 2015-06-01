<?php
require_once("../../resources/config.php");
require(databaza);
$css_includes = Array("../css/form.css", "../css/dashboard.css");

$script_includes = jquery;
$header_script = <<< SCRIPT
$( document ).ready( function () {
  $( ".id-submit" ).click ( function () {
    $( "input[id=udhetimiId]" ).val( this.id );
  });
});
SCRIPT;

$header_titulli = "Rezervim i ri";
require(dashboard_header);

$db = new repository();
$lokacionet = $db->get_data("Select * From lokacione Where Reklam = 0");
?>

<section class="permbajtje">
    <form class="form" method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <tr>
                <td>Mjeti:
                <select name="mjeti">
                    <option value="Bus">Autobus</option>
                    <option value="Aeroplan">Aeroplan</option>
                </select>
                </td>
                <td>Prej:
                <select name="prej">
                    <option></option>
                    <?php
                    foreach ($lokacionet as $value) {
                        echo "<option>".$value['Vendi']."</option>";
                    }
                    ?>
                </select>
                </td>
                <td>Deri:
                <select name="deri">
                    <option></option>
                    <?php
                    foreach ($lokacionet as $value) {
                        echo "<option>".$value['Vendi']."</option>";
                    }
                    ?>
                </select>
                </td>
                <td>
                    <input type="submit" value="KerkoUdhetim" class='button button-small' style="height: 40px; margin-top: 15px;">
                </td>
            </tr>
        </table>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mjeti']) && isset($_POST['prej']) && isset($_POST['deri'])) {

        $db = new repository();
        $mjeti = $_POST['mjeti'];
        $prej = $_POST['prej'];
        $deri = $_POST['deri'];
        $sql = "";

        function kerkimi($tabela) {

            global $prej, $deri, $sql;

            if ($prej != "" && $deri != "") {
                $sql = "Select * From $tabela Where Data >= Now() and Prej ='".$prej."' and Deri='".$deri."'";
            }
            else if ($_POST['prej'] != "" && $_POST['deri'] == "") {
                $sql = "Select * From $tabela Where Data >= Now() and Prej ='".$prej."'";
            }
            else if ($_POST['prej'] == "" && $_POST['deri'] != "") {
                $sql = "Select * From $tabela Where Data >= Now() and Deri ='".$deri."'";
            }
            else{
                $sql = "Select * From $tabela Where Data >= Now()";
            }
        }

        if ($mjeti == "Bus") {
            kerkimi("udhetimetBus");
            $linku = "rezervo_bus.php";
        }
        else {
            kerkimi("udhetimetAeroplan");
            $linku = "rezervo_aeroplan.php";
        }

        $rez = $db->get_data($sql);

        echo "<form method='Post' action=$linku><input type='hidden' id='udhetimiId' name='udhetimiId'>";
        echo "<table class='tabela' cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th><th align='left'>Cmimi</th><th style='width: auto;'></th></thead>";
        foreach ($rez as $rreshti) {
            echo "<tr><td>".$rreshti['Prej']."</td><td>".$rreshti['Deri']."</td><td>".$rreshti['Ulese']."</td><td>".$rreshti['Data']."</td><td>".$rreshti['Cmimi']." &#8364;</td><td style='text-align: center'>"
            . "<input type='submit' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['Rid']."'></td></tr>";
        }
        echo "</form></table>";

    }

    ?>
</section>

<?php
require(dashboard_footer);
?>