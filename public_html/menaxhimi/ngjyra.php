<?php
require_once("../../resources/config.php");
$css_includes = Array("../css/form.css", "../css/dashboard.css");
$header_titulli = "Ngjyra";
require(dashboard_header);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['vendos'])) {
        $ngjyra = $_POST["ngjyra"];
        setcookie("ngjyra", $ngjyra, time() + 24 * 60 * 60, "/");
        $mesazhi = "<h3>Ngjyra u vendos! <a href=\"../index.php\">Vizitoni faqen kryesore</a> per ta pare ate.</h3>";
    } else {
        $ngjyra = "#cc0000";
        setcookie("ngjyra", "", time() - 3600, "/");
        $mesazhi = "<h3>Ngjyra u resetua.</h3>";
    }
} else {
    if (isset($_COOKIE["ngjyra"])) {
        $ngjyra = $_COOKIE["ngjyra"];
    } else {
        $ngjyra = "#cc0000";
    }
    
    $mesazhi = "<h3>Zgjedhni ngjyren e faqes kryesore</h3>";
}
?>

<form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php
    echo $mesazhi;
    ?>
    <input type="color" style="width: 100%; height: 50px; margin: 10px 0" name="ngjyra" value="<?php echo $ngjyra; ?>" />
    <div style="text-align: right">
        <input type="submit" class="button button-small" name="vendos" value="Vendos" />
        <input type="submit" class="button button-small" name="reseto" value="Reseto" />
    </div>
</form>

<?php
require(dashboard_footer);
?>