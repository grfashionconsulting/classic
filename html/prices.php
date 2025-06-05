<div class='pt_prices'>

  <table>

    <thead>

      <tr>

        <th><?php print translate("Stockist"); ?></th>

        <th class='pt_prices_name'><?php print translate("Catalogue Product Name"); ?></th>

        <th><?php print translate("Price"); ?></th>

        <th>&nbsp;</th>

      </tr>

    </thead>

    <tbody>

      <?php foreach($prices["products"] as $product): ?>

        <tr>

          <td class='pt_prices_c'>

            <?php if (file_exists("logos/".$product["merchant"].$config_logoExtension)): ?>

              <a href='<?php print tapestry_buyURL($product); ?>'><img alt='<?php print htmlspecialchars($product["merchant"],ENT_QUOTES,$config_charset); ?> <?php print translate("Logo"); ?>' src='<?php print $config_baseHREF."logos/".str_replace(" ","%20",$product["merchant"]).$config_logoExtension; ?>' /></a>

            <?php else: ?>

              <a href='<?php print tapestry_buyURL($product); ?>'><?php print $product["merchant"]; ?></a>

            <?php endif; ?>

          </td>

          <td class='pt_prices_name'><?php print $product["original_name"]; ?></td>

          <td class='pt_prices_c pt_b'><?php print tapestry_price($product["price"]); ?></td>

          <td class='pt_prices_c'><a href='<?php print tapestry_buyURL($product); ?>'><button class='pt_primary pt_radius'><?php print translate("Visit Store"); ?></button></a></td>

        </tr>

      <?php endforeach; ?>

    </tbody>

  </table>

</div>