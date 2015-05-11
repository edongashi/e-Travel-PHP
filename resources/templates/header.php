<?php require_once(__DIR__ . "/../config.php") ?>
<!DOCTYPE html>
<head>
  <title>
    <?php // Merr titullin nga $header_titulli
    if (isset($header_titulli)) 
      echo $header_titulli;
    echo "\r\n"; ?>
  </title>
  <?php // Merr includes nga $header_include
  if (isset($header_include))
    echo $header_include;
    echo "\r\n"; ?>
  <style>
    <?php // Merr style nga $header_style
    if (isset($header_style))
      echo $header_style;
    echo "\r\n"; ?>
  </style>
</head>
<body>
<header>
  <nav>
    <ul>
      <?php foreach ($config["menu_links"] as $emri => $linku)
      {
        if (is_string($linku))
        {
          echo "<li><a href=\"$linku\">$emri</a></li>";
        }
        else 
        {
          echo "$emri <span class=\"shigjeta\">&#9660;</span>";
          echo '<ul class="nen-menu">';
          foreach ($linku as $nen_emri => $nen_linku)
          {
            echo "<li><a href=\"$nen_linku\">$nen_emri</a>";
          }
          
          echo '</ul>';
        }
      }
      
      echo "\r\n"; ?>
    </ul>
  </nav>
</header>
