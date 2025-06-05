<div class='pt_featured'>

  <?php foreach($featured["products"] as $k=> $product): ?><div class='pt_featured_each'>

    <div>

      <a href='<?php print $product["productHREF"]; ?>'><?php print $product["name"]; ?></a>

    </div>

    <?php if ($product["image_url"]): ?>

      <div>

        <a href='<?php print $product["productHREF"]; ?>'><img class='pt_img_thumb' alt='<?php print translate("Image of"); ?> <?php print htmlspecialchars($product["name"],ENT_QUOTES,$config_charset); ?>' src='<?php print htmlspecialchars($product["image_url"],ENT_QUOTES,$config_charset); ?>' /></a>

      </div>

    <?php endif; ?>

    <div class='pt_s'>

      <span class='pt_i'><?php print ($product["numMerchants"]>1?translate("from")."&nbsp;":""); ?></span>

      <span class='pt_b'><?php print tapestry_price($product["minPrice"]); ?></span>

    </div>

    <div>

      <a href='<?php print $product["productHREF"]; ?>'><button class='pt_secondary pt_radius'><?php print ($product["numMerchants"]>1?translate("Compare")." ".$product["numMerchants"]." ".translate("Prices"):translate("More Information")); ?></button></a>

    </div>

  </div><?php endforeach; ?>

 </div>