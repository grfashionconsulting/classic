<?php
  require("includes/common.php");

  require("html/header.php");

  require("html/menu.php");

  require("html/searchform.php");

  require("html/banner.php");

  $sql = "SELECT * FROM `".$config_databaseTablePrefix."featured` ORDER BY sequence";

  if (database_querySelect($sql,$rows))
  {
    $sqlNames = array();

    $sqlCase = "CASE normalised_name";

    foreach($rows as $featured)
    {
      $featured["name"] = tapestry_normalise($featured["name"]);

      $sqlNames[] = "'".$featured["name"]."'";

      $sqlCase .= " WHEN '".database_safe($featured["name"])."' THEN ".$featured["sequence"];
    }

    $sqlCase .= " END AS sequence";

    $sqlIn = implode(",",$sqlNames);

    $sql = "SELECT * , MIN( price ) AS minPrice, MAX( price ) AS maxPrice, COUNT( id ) AS numMerchants, ".$sqlCase." FROM `".$config_databaseTablePrefix."products` WHERE normalised_name IN (".$sqlIn.") GROUP BY normalised_name ORDER BY sequence";

    database_querySelect($sql,$rows);

    $featured["products"] = $rows;

    foreach($featured["products"] as $k => $product)
    {
      $featured["products"][$k]["productHREF"] = tapestry_productHREF($product);
    }
  }

  if (isset($featured)) require("html/featured.php");

  require("html/footer.php");
?>