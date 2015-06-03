<?php
$_DIR = str_replace('\\', '/', __DIR__);

function errorLogger($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return false;
    }
    
    global $_DIR;
    static $krijuar = false;
    
    $koha = $_SERVER["REQUEST_TIME"];
    $emri = date('YmdHis', $koha);
    $emri .= str_replace("/", "@", $_SERVER["PHP_SELF"]);
    $filename = $_DIR . "/error_logs/$emri.txt";
    $file = fopen($filename, "a");
    
    // Nese nuk mund te hapet fajlli nuk vazhdojme.
    if ($file == false)
    {
        return false;
    }
    
    $data = date("d/m/Y", $koha);
    $ora = date("H:i:s", $koha);
    $mesazhi = "";
    if (!$krijuar) {
        $mesazhi = "===================================\r\n"
        . "Gabim me daten $data $ora\r\n"
        . "PHP " . PHP_VERSION . " (" . PHP_OS . ")\r\n"
        . "===================================\r\n\r\n";
    }
    
    switch ($errno) {
        case E_ERROR:
            $mesazhi .= "Error [$errno] $errstr";
            break;     
        case E_PARSE:
            $mesazhi .= "Gabim parser [$errno] $errstr";
            break;
        case E_WARNING:
            $mesazhi .= "Verejtje [$errno] $errstr<br />\n";
            break;
        case E_NOTICE:
            $mesazhi .= "Njoftim [$errno] $errstr";
            break;
        default:
            $mesazhi .= "Gabim i panjoftur [$errno] $errstr";
            break;
    }
    
    $mesazhi .= "\r\nGabim ne rreshtin $errline ne fajllin $errfile\r\n\r\n";
    fwrite($file, $mesazhi);
    fclose($file);
    $krijuar = true;
    // Lejojme default handler te vazhdoje
    return false;
}

set_error_handler("errorLogger");

$config = array(
    "db" => array(
        "dbname" => "edb",
        "username" => "root",
        "password" => "",
        "host" => "localhost"
    ),
    "paths" => array(
        "resources" => $_DIR,
        "templates" => $_DIR . "/templates",
        "library" => $_DIR . "/library",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/img/layout"
        )
    ),
    "menu_links" => array(
        "Ballina" => "index.php",
        "Udhetimet" => array(
            "Autobus" => "udhetimet_bus.php",
            "Aeroplan" => "udhetimet_aeroplan.php",
        ),
        "Lokacionet" => "lokacionet.php",
        "Kontakti" => "kontakti.php",
		"Galeria" => "galeria.php"
    ),
    "dashboard_links_admin" => array(
        "Ballina" => "index.php",
        "Rezervimet" => array(
          "Rezervim i ri" => "rezervim_iri.php",
          "Shfaq rezervimet" => "shfaq_rezervimet.php"
        ),
        "Regjistro udhetime" => array(
            "Autobus" => "regjistro_udhetim_bus.php",
            "Aeroplan" => "regjistro_udhetim_aeroplan.php",
        ),
        "Shto lokacion" => "regjistro_lokacione.php",
		"Shto foto ne galeri" => "regjistro_fotoGaleri.php",
        "Menaxho User" => "menaxho_user.php",
        "Menaxho databazen" => "menaxhoDB.php",
        "Vendos ngjyren" => "ngjyra.php",
		"Logout" => "../logout.php"
    ),
    "dashboard_links_user" => array(
        "Ballina" => "index.php",
        "Rezervimet" => array(
          "Rezervim i ri" => "rezervim_iri.php",
          "Shfaq rezervimet" => "shfaq_rezervimet.php"
        ),
        "Menaxho User" => "menaxho_user.php",
        "Vendos ngjyren" => "ngjyra.php",
        "Logout" => "../logout.php"
    )
);

defined("library") or define("library", $_DIR . "/library");
defined("databaza") or define("databaza", $_DIR . "/library/databaza.php");

defined("jquery") or define("jquery", "/js/jquery-2.1.4.min.js");

defined("templates") or define("templates", $_DIR . "/templates");
defined("templates_header") or define("templates_header", $_DIR . "/templates/header.php");
defined("templates_footer") or define("templates_footer", $_DIR . "/templates/footer.php");
defined("dashboard_header") or define("dashboard_header", $_DIR . "/templates/dashboard_header.php");
defined("dashboard_footer") or define("dashboard_footer", $_DIR . "/templates/dashboard_footer.php");

?>