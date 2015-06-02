<?php
require_once("../../resources/config.php");

require library."/databaza.php";
$header_titulli = "Ballina";
$css_includes = Array("../css/dashboard.css", "../css/form.css");
require(dashboard_header);

if (isset($_POST['createDB']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_db();
	echo $rez;
}

if (isset($_POST['dropDB']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_db();
	echo $rez;
}

if (isset($_POST['createUser']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_User();
	$salt1 = "2%a@*/";
    $salt2 = "&9o?>";
	$passi = "admin";
    $pass = sha1("$salt1$passi$salt2");
    $db->execute("Insert into user(Username,Password,Emri,Mbiemri,Prioriteti) Values (%s,%s,%s,%s,%s)", "admin", $pass, "Admin", "Admin", "Admin");
	echo $rez;
}

if (isset($_POST['createUdhetimetBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_UdhetimetBus();
	echo $rez;
}

if (isset($_POST['createUdhetimetAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_UdhetimetAeroplan();
	echo $rez;
}

if (isset($_POST['createLokacionet']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_Lokacione();
	echo $rez;
}

if (isset($_POST['regjistroBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_RezervoBus();
	echo $rez;
}

if (isset($_POST['regjistroAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_RezervoAeroplan();
	echo $rez;
}

if (isset($_POST['createForumi']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_Forumi();
	echo $rez;
}

if (isset($_POST['createGaleria']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_Galeria();
	echo $rez;
}

if (isset($_POST['dropGaleria']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_Galeria();
	echo $rez;
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
	<form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Galeria" name="createGaleria">
    </form>
	<form class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Drop tabelen Galeria" name="dropGaleria">
    </form>
</section>

<?php require(dashboard_footer) ?>