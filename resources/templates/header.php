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
?>

<style>
<?php if (isset($header_style)) echo $header_style; ?>
</style>

</head>

<body>
<div class="page-wrap">
<header style="padding-top: 100px;">
  <nav>
    <ul class="menu"><?php
foreach ($config["menu_links"] as $emri => $linku)
{
  if (is_string($linku))
  {
    echo indent(6) . "<li><a href=\"$linku\">$emri</a></li>";
  }
  else 
  {
    echo indent(6) . "<li>";
    echo indent(8) . "<a>$emri <span class=\"shigjeta\">&#9660;</span></a>";
    echo indent(8) . "<ul>";
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