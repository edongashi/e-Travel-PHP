<?php
require_once("../../resources/config.php");

require library."/createDB.php";
$header_titulli = "Ballina";
$css_includes = Array("../css/dashboard.css", "../css/form.css");
require(dashboard_header);

if (isset($_POST['createDB']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->createDB();
}

if (isset($_POST['dropDB']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->dropDB();
}

if (isset($_POST['createUser']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->createTblUser();
}

if (isset($_POST['createUdhetimetBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;

    $db->createTblUdhetimetBus();
}

if (isset($_POST['createUdhetimetAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;

    $db->createTblUdhetimetAeroplan();
}

if (isset($_POST['createLokacionet']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->createTblLokacione();
}

if (isset($_POST['regjistroBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->createTblRezervoBus();
}

if (isset($_POST['regjistroAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->createTblRezervoAeroplan();
}

if (isset($_POST['createForumi']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new DB;
    $db->createTblForumi();
}
?>

<section class="permbajtje">
    <h1 class="center">Menaxho Databazen</h1>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo databazen" name="createDB">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije databazen" name="dropDB">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen User" name="createUser">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen UdhetimetBus" name="createUdhetimetBus">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen UdhetimetAeroplan" name="createUdhetimetAeroplan">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Lokacionet" name="createLokacionet">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Regjistro Bus" name="regjistroBus">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Regjistro Aeroplan" name="regjistroAeroplan">
    </form>
    <form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Forumi" name="createForumi">
    </form>
</section>

<?php require(dashboard_footer) ?>