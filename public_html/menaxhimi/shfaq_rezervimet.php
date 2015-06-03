<?php
require_once("../../resources/config.php");

$header_titulli = "Rezervimet";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
require(dashboard_header);
?>

<section class="permbajtje">
    <h2 style="margin-bottom: 10px;">Udhetimet e rezervuara me autobus</h2>
    <?php
    require_once("../../resources/config.php");
    require(databaza);

    $db = new repository;
    $username = $_SESSION['Username'];
    $sql = "Select * From user Where Username = '$username'";
    $rez = $db->get_data($sql);
    $uid = $rez[0]['Uid'];
    $rez = $db->get_data("Select rezervobus.Emri, rezervobus.Mbiemri, rezervobus.Ulese, udhetimetbus.Data, udhetimetbus.Prej, udhetimetbus.Deri FROM rezervobus INNER JOIN udhetimetbus ON rezervobus.Rid=udhetimetbus.Rid Where rezervobus.Uid = $uid ");

    echo "<table class='tabela' cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th><th align='left'>Emri</th><th align='left'>Mbiemri</th><th style='width: auto;'></th></thead>";
    foreach ($rez as $rreshti) {
        echo "<tr><td>".$rreshti['Prej']."</td><td>".$rreshti['Deri']."</td><td>".$rreshti['Ulese']."</td><td>".$rreshti['Data']."</td><td>".$rreshti['Emri']."</td><td>".$rreshti['Mbiemri']."</td><td style='text-align: center'>";
    }

    echo "</table>";
    ?>
    <br />
    <br />
    <h2 style="margin-bottom: 10px;">Udhetimet e rezervuara me aeroplan</h2>
    <?php
    $rez = $db->get_data("Select rezervoaeroplan.Emri, rezervoaeroplan.Mbiemri, rezervoaeroplan.Ulese, udhetimetaeroplan.Data, udhetimetaeroplan.Prej, udhetimetaeroplan.Deri FROM rezervoaeroplan INNER JOIN udhetimetaeroplan ON rezervoaeroplan.Rid=udhetimetaeroplan.Rid Where rezervoaeroplan.Uid = $uid ");
    echo "<table class='tabela' cellspacing='0'> <thead><th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th><th align='left'>Emri</th><th align='left'>Mbiemri</th><th style='width: auto;'></th></thead>";
    foreach ($rez as $rreshti) {
        echo "<tr><td>".$rreshti['Prej']."</td><td>".$rreshti['Deri']."</td><td>".$rreshti['Ulese']."</td><td>".$rreshti['Data']."</td><td>".$rreshti['Emri']."</td><td>".$rreshti['Mbiemri']."</td><td style='text-align: center'>";
    }

    echo "</table>";
    ?>
</section>

<?php require(dashboard_footer); ?>