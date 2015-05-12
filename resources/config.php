<?php

$_DIR = str_replace('\\', '/', __DIR__);

$config = array(
    "db" => array(
        "dbname" => "database1",
        "username" => "dbUser",
        "password" => "pass",
        "host" => "localhost"
    ),
    "paths" => array(
        "resources" => $_DIR,
        "templates" => $_DIR . "/templates",
        "images" => array(
            "content" => $_DIR . "/images/content",
            "layout" => $_DIR . "/images/layout"
        )
    ),
    "menu_links" => array(
        "Ballina" => "index.php",
        "Udhetimet" => array(
            "Autobus" => "udhetimet.php",
            "Aeroplan" => "aeroplan.php",
        ),
        "Lokacionet" => "lokacionet.php",
        "Kontakti" => "kontakti.php"
    )
);

defined("templates") or define("templates", $_DIR . "/templates");
defined("templates_header") or define("templates_header", $_DIR . "/templates/header.php");
defined("templates_footer") or define("templates_footer", $_DIR . "/templates/footer.php");

?>