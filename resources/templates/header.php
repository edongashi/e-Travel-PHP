<?php
require_once(__DIR__ . "/../config.php");
function indent($level)
{
  return "\r\n" . str_repeat(" ", "$level");
}
?>
<!DOCTYPE html>
<head>

<title>
<?php if (isset($header_titulli)) echo "  " . $header_titulli . "\r\n"; ?>
</title>
<?php // Merr includes nga array ose string $css_includes
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
?>

<style>
<?php if (isset($header_style)) echo $header_style; ?>
</style>

</head>

<body>
<header>
  <nav>
    <ul><?php
foreach ($config["menu_links"] as $emri => $linku)
{
  if (is_string($linku))
  {
    echo indent(6) . "<li><a href=\"$linku\">$emri</a></li>";
  }
  else 
  {
    echo indent(6) . "<li>";
    echo indent(8) . "$emri <span class=\"shigjeta\">&#9660;</span>";
    echo indent(8) . "<ul class=\"nen-menu\">";
    foreach ($linku as $nen_emri => $nen_linku)
    {
      echo indent(10) . "<li><a href=\"$nen_linku\">$nen_emri</a>";
    }
    echo indent(8) . "</ul>";
    echo indent(6) . "</li>";
  }
}

echo "\r\n";
?>
    </ul>
  </nav>
</header>
