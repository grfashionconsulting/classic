<div class='pt_menu'>

  <ul class='pt_menu_nav'>

    <li><a href='<?php print $config_baseHREF; ?>'><?php print translate("Home"); ?></a></li>

    <li class='pt_hide_m'><span class='pt_span_a' onClick='JavaScript:$(".pt_menu_main").toggle();'><?php print translate("Menu"); ?></span></li>

  </ul>

  <ul class='pt_menu_main pt_hide_s'>

    <li><a href='<?php print tapestry_indexHREF("category"); ?>'><?php print translate("Category"); ?> A-Z</a></li>

    <li><a href='<?php print tapestry_indexHREF("brand"); ?>'><?php print translate("Brand"); ?> A-Z</a></li>

    <li><a href='<?php print tapestry_indexHREF("merchant"); ?>'><?php print translate("Merchant"); ?> A-Z</a></li>

  </ul>

</div>