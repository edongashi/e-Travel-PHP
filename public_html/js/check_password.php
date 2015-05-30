<?php
require_once("../../resources/config.php");

$pass = $_GET['pass'];

if (preg_match("/^.*(?=.{3,}).*$/",$pass)) {
    echo "<img src='../img/layout/ok.png' style='height:20px; width:20px;'>";
}
else
    echo "<img src='../img/layout/not.png' style='height:20px; width:20px;'>";

?>