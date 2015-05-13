<?php
require_once("../../resources/config.php");
require library."/createDB.php";

if(isset($_POST['createDB']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createDB();
}

if(isset($_POST['dropDB']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->dropDB();
}

if(isset($_POST['createUser']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblUser();
}

if(isset($_POST['createUdhetimetBus']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblUdhetimetBus();
}

if(isset($_POST['createUdhetimetAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblUdhetimetAeroplan();
}

if(isset($_POST['createLokacionet']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblLokacione();
}

if(isset($_POST['regjistroBus']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblRezervoBus();
}

if(isset($_POST['regjistroAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblRezervoAeroplan();
}

if(isset($_POST['createForumi']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblForumi();
}

?>

<html>
    <head></head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo databazen" name="createDB"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Fshije databazen" name="dropDB"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen User" name="createUser"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen UdhetimetBus" name="createUdhetimetBus"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen UdhetimetAeroplan" name="createUdhetimetAeroplan"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen Lokacionet" name="createLokacionet"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen Regjistro Bus" name="regjistroBus"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen Regjistro Aeroplan" name="regjistroAeroplan"></form>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen Forumi" name="createForumi"></form>
    </body>
</html>
