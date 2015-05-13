<?php

$_DIR = str_replace('\\', '/', __DIR__);

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
            "content" => $_DIR . "/images/content",
            "layout" => $_DIR . "/images/layout"
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
		"Login" => "login.php"
    ),
    "dashboard_links_admin" => array(
        "Ballina" => "index.php",
        "Rezervimet" => array(
          "Rezervim i ri" => "rezervimi.php",
          "Shfaq rezervimet" => "shfaq_rezervimet.php"
        ),
        "Regjistro udhetime" => array(
            "Autobus" => "regjistro_bus.php",
            "Aeroplan" => "regjistro_aeroplan.php",
        ),
        "Shto lokacion" => "regjistro_lokacione.php",
        "Menaxho databazen" => "menaxhoDB.php",
		"Logout" => "../logout.php"
    ),
    "dashboard_links_user" => array(
        "Ballina" => "index.php",
        "Udhetimet" => array(
            "Autobus" => "udhetimet_bus.php",
            "Aeroplan" => "udhetimet_aeroplan.php",
        ),
        "Lokacionet" => "lokacionet.php",
        "Kontakti" => "kontakti.php",
		"Logout" => "../logout.php"
    )
);

defined("templates") or define("templates", $_DIR . "/templates");
defined("library") or define("library", $_DIR . "/library");
defined("databaza") or define("databaza", $_DIR . "/library/createDB.php");
defined("templates_header") or define("templates_header", $_DIR . "/templates/header.php");
defined("templates_footer") or define("templates_footer", $_DIR . "/templates/footer.php");
defined("dashboard_header") or define("dashboard_header", $_DIR . "/templates/dashboard_header.php");
defined("dashboard_footer") or define("dashboard_footer", $_DIR . "/templates/dashboard_footer.php");

?>