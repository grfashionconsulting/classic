<?php
  if (file_exists("html/user_header_before.php")) require("html/user_header_before.php");

  header("Content-Type: text/html;charset=".$config_charset);
?>
<!DOCTYPE HTML>

<html>

  <head>

    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <title><?php print (isset($header["title"])?htmlspecialchars($header["title"],ENT_QUOTES,$config_charset):$config_title); ?></title>

      <?php if (isset($header["meta"])): foreach($header["meta"] as $name => $content): ?>

        <meta name='<?php print $name; ?>' content='<?php print htmlspecialchars($content,ENT_QUOTES,$config_charset); ?>' />

      <?php endforeach; endif; ?>

      <link rel='stylesheet' href='<?php print $config_baseHREF; ?>html/layout.css' />

      <link rel='stylesheet' href='<?php print $config_baseHREF; ?>html/style.css' />

      <script src='<?php print $config_baseHREF; ?>html/vendor/jquery.min.js'></script>

    </head>

  <body>

  <div class='pt'>

  <?php
    if (file_exists("html/user_header_after.php")) require("html/user_header_after.php");
  ?>