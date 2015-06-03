<?php
require_once(dirname(__FILE__) . "/../config.php");

session_start();
if (!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri'])) {
    header("Location: /login.php");
}

function indent($level)
{
    return "\r\n" . str_repeat(" ", "$level");
}

function setClass(&$parametri)
{
    $parametri = 'class="current"';
}
?>
<!DOCTYPE html>
<head>

    <title>
        <?php if (isset($header_titulli)) echo "  " . $header_titulli . "\r\n"; ?>
    </title>
    <?php
    if (isset($script_includes))
    {
        if (is_array($script_includes))
        {
            foreach ($script_includes as $src)
            {
                echo "\r\n<script src=\"$src\"></script>";
            }
        }
        elseif (is_string($script_includes))
        {
            echo "\r\n<script src=\"$script_includes\"></script>";
        }
    }
    if (isset($header_script))
    {
        echo "\r\n<script>\r\n".$header_script."\r\n</script>\r\n";
    }
    // Merr includes nga array ose string $css_includes
    if (isset($css_includes))
    {
        if (is_array($css_includes))
        {
            foreach ($css_includes as $href)
            {
                echo "\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$href\">";
            }
        }
        elseif (is_string($css_includes))
        {
            echo "\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$css_includes\">";
        }
    }

    echo "\r\n";
    if (isset($header_style)) echo "<style>$header_style</style>"; ?>
</head>

<body>
    <div class="page-wrap">
        <div class="dashboard-header">
            <h3 style="position: fixed; left: 35px; top: 16px; color: white">Menaxhimi</h3>
            <div style="position: fixed; right: 10px; top: 16px">
                <?php
                echo "<span style='color: white'>" . $_SESSION['Username'] . " | </span> <a href='/index.php'>Home</a> 
                <span style='color:white'> | </span> <a href='/logout.php'>Log out</a>";
                ?>
            </div>
        </div>
        <div class="dashboard-sidebar">
            <nav class="menu">
                <ul><?php
                    if($_SESSION['Prioriteti'] == "Admin") {
                        $linqet = "dashboard_links_admin";
                    } else {
                        $linqet = "dashboard_links_user";
                    }

                    $self = substr($_SERVER["PHP_SELF"], strlen("/menaxhimi/"));
                    foreach ($config[$linqet] as $emri => $linku)
                    {
                        $current = "";
                        if (is_string($linku))
                        {
                            if ($linku == $self) setClass($current);
                            echo indent(6) . "<li><a $current href=\"$linku\">$emri</a></li>";
                        }
                        else
                        {
                            echo indent(6) . "<li class=\"kategori\">";
                            echo indent(8) . "<p>$emri</p>";
                            echo indent(8) . "<ul>";
                            foreach ($linku as $nen_emri => $nen_linku)
                            {
                                $current = "";
                                if ($nen_linku == $self) setClass($current);
                                echo indent(10) . "<li><a $current href=\"$nen_linku\">$nen_emri</a>";
                            }
                            echo indent(8) . "</ul>";
                            echo indent(6) . "</li>";
                        }
                    }

                    echo "\r\n";
                    ?>
                </ul>
            </nav>
        </div>

        <div class="dashboard-permbajtja">
