<?php
if (!isset($_GET["lokacioni"]) || empty($_GET["lokacioni"]))
{
    header("HTTP/1.0 404 Not Found");
    return;
}

$lokacioni = strtolower($_GET["lokacioni"]);
$filename = "../../resources/xml/$lokacioni.xml";

if (!file_exists($filename))
{
    header("HTTP/1.0 404 Not Found");
    return;
}

$file = fopen($filename, "r");
if (!$file)
{
    header("HTTP/1.0 404 Not Found");
    return;
}

$filesize = filesize($filename);
$xmlText = fread( $file, $filesize );
header('Content-type: text/xml');
echo $xmlText;

?>