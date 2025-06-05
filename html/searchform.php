<?php
  print "<div class='pt_searchform'>";

    print "<form method='GET' action='".$config_baseHREF."search.php'>";

    print "<div class='pt_searchform_1'>";

    print "<input name='q' value='".((isset($q) && !isset($parts[1]) && !isset($product["products"]))?$q:"")."' />";

    print "</div>";

    print "<div class='pt_searchform_2'>";

    print "<button type='submit'>".translate("Search")."</button>";

    print "</div>";

    print "</form>";

  print "</div>";
?>