<?php
  print "<div class='pt_searchfilters'>";

    print "<div class='pt_searchfilters_1 pt_hide_m'>";

    print "<button class='pt_secondary' type='submit' onclick='JavaScript:$(\"#pt_searchfilters_id1\").show();$(this).hide();'>".translate("Filter These Results")." &darr;</button>";

    print "</div>";

    print "<form class='pt_hide_s' id='pt_searchfilters_id1' method='GET' action='".$config_baseHREF."search.php'>";

    print "<input type='hidden' name='q' value='".htmlspecialchars($q,ENT_QUOTES,$config_charset)."' />";

    if ($parts[0] != "merchant")
    {
      $sql1 = "SELECT DISTINCT(merchant) FROM `".$config_databaseTablePrefix."products` WHERE ".$where.$priceWhere." ORDER BY merchant";

      if (database_querySelect($sql1,$rows1))
      {
        print "<div class='pt_searchfilters_1'>";

        print "<label>".translate("Merchant");

        print "<select name='merchantFilter'>";

        print "<option value=''>".translate("All")."</option>";

        foreach($rows1 as $row)
        {
          $selected = ($merchantFilter==$row["merchant"]?"selected='selected'":"");

          print "<option value='".htmlspecialchars($row["merchant"],ENT_QUOTES,$config_charset)."' ".$selected.">".$row["merchant"]."</option>";
        }

        print "</select>";

        print "</label>";

        print "</div>";
      }
    }

    if ($config_useCategoryHierarchy)
    {
      $sql1 = "SELECT DISTINCT(categoryid) FROM `".$config_databaseTablePrefix."products` WHERE ".$where.$priceWhere." AND categoryid > 0";

      if (database_querySelect($sql1,$rows1))
      {
        $categoryids = array();

        foreach($rows1 as $row)
        {
          $categoryids[] = $row["categoryid"];
        }

        if ((count($categoryids) > 1) || $categoryFilter)
        {
          $categories = tapestry_categoryHierarchyArray($categoryids);

          print "<div class='pt_searchfilters_1'>";

          print "<label>".translate("Category");

          print "<select name='categoryFilter'>";

          print "<option value=''>".translate("All")."</option>";

          foreach($categories as $id => $path)
          {
            $selected = ($categoryFilter==$id?"selected='selected'":"");

            print "<option value='".$id."' ".$selected.">".$path."</option>";
          }

          print "</select>";

          print "</label>";

          print "</div>";
        }
      }
    }
    elseif ($parts[0] != "category")
    {
      $sql1 = "SELECT DISTINCT(category) FROM `".$config_databaseTablePrefix."products` WHERE ".$where.$priceWhere." AND category <> '' ORDER BY category";

      if (database_querySelect($sql1,$rows1))
      {
        print "<div class='pt_searchfilters_1'>";

        print "<label>".translate("Category");

        print "<select name='categoryFilter'>";

        print "<option value=''>".translate("All")."</option>";

        foreach($rows1 as $row)
        {
          $selected = ($categoryFilter==$row["category"]?"selected='selected'":"");

          print "<option value='".htmlspecialchars($row["category"],ENT_QUOTES,$config_charset)."' ".$selected.">".$row["category"]."</option>";
        }

        print "</select>";

        print "</label>";

        print "</div>";
      }
    }

    if ($parts[0] != "brand")
    {
      $sql1 = "SELECT DISTINCT(brand) FROM `".$config_databaseTablePrefix."products` WHERE ".$where.$priceWhere." AND brand <> '' ORDER BY brand";

      if (database_querySelect($sql1,$rows1))
      {
        print "<div class='pt_searchfilters_1'>";

        print "<label>".translate("Brand");

        print "<select class='pt_select' name='brandFilter'>";

        print "<option value=''>".translate("All")."</option>";

        foreach($rows1 as $row)
        {
          $selected = ($brandFilter==$row["brand"]?"selected='selected'":"");

          print "<option value='".htmlspecialchars($row["brand"],ENT_QUOTES,$config_charset)."' ".$selected.">".$row["brand"]."</option>";
        }

        print "</select>";

        print "</label>";

        print "</div>";
      }
    }

    print "<div class='pt_searchfilters_2'>";

      print "<label>".$config_currencyHTML."&nbsp;".translate("from")."<br />";

      print "<input type='number' name='minPrice' value='".htmlspecialchars($minPrice,ENT_QUOTES,$config_charset)."' />";

      print "</label>";

    print "</div>";

    print "<div class='pt_searchfilters_2'>";

      print "<label>".$config_currencyHTML."&nbsp;".translate("to")."<br />";

      print "<input type='number' name='maxPrice' value='".htmlspecialchars($maxPrice,ENT_QUOTES,$config_charset)."' />";

      print "</label>";

    print "</div>";

    print "<div class='pt_searchfilters_1'>";

    print "&nbsp;<br />";

    print "<button class='pt_secondary' type='submit'>".translate("Filter These Results")."</button>";

    print "</div>";

    print "</form>";

  print "</div>";
?>