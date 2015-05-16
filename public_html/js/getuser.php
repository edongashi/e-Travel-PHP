<?php
require_once("../../resources/config.php");
require(databaza);

$q = $_GET['q'];

$db = new repository();
$sql="SELECT * FROM user WHERE Username = '".$q."'";

if ($db->get_data($sql)) {
    echo "<img src='../img/layout/not.png' style='height:20px; width:20px;'>";
}
else
    echo "<img src='../img/layout/ok.png' style='height:20px; width:20px;'>";

?>