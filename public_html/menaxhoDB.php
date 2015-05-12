<?php
require library."/createDB.php";
if(isset($_POST['createDB']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createDB();
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

?>

<html>
    <head></head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo databazen" name="createDB"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen User" name="createUser"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen UdhetimetBus" name="createUdhetimetBus"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen UdhetimetAeroplan" name="createUdhetimetAeroplan"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen Lokacionet" name="createLokacionet"></form>
    </body>
</html>
