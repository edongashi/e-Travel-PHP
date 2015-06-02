<?php
require_once("../../resources/config.php");
require(databaza);

$user = $_GET['user'];

$db = new repository();

if ($db->get_data("SELECT * FROM user WHERE Username = %s", $user)) {
    echo "<img src='../img/layout/not.png' style='height:20px; width:20px;'>";
}
else
    echo "<img src='../img/layout/ok.png' style='height:20px; width:20px;'>";

?>