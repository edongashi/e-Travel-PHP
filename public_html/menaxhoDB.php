<?php
require 'createDB.php';
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

if(isset($_POST['createUdhetimet']) && ($_SERVER['REQUEST_METHOD'] == "POST"))
{
    $db = new DB;
    
    $db->createTblUdhetimet();
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
            <input type="submit" value="Krijo tabelen Udhetimet" name="createUdhetimet"></form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="submit" value="Krijo tabelen Lokacionet" name="createLokacionet"></form>
    </body>
</html>
