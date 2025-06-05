<?php
  $product_main = $product["products"][0];

  $product_bestPriceText = (count($product["products"])>1?translate("Best Price"):translate("Price"));

  $product_bestPriceMerchants = array();

  foreach($product["products"] as $p)
  {
    if ($p["price"] == $product_main["price"])
    {
      $html = "<a href='".tapestry_buyURL($p)."'>".$p["merchant"]."</a>";

      $product_bestPriceMerchants[] = $html;
    }
  }

  $product_bestPriceMerchants = implode(", ",$product_bestPriceMerchants);
?>

<div class='pt_product'>

  <h1><?php print $product_main["name"]; ?></h1>

  <?php if ($product_main["image_url"]): ?>

  <div class='pt_product_1'><div class='pt_product_1_inner'>

    <img alt='<?php print translate("Image of"); ?> <?php print htmlspecialchars($product_main["name"],ENT_QUOTES,$config_charset); ?>' src='<?php print htmlspecialchars($product_main["image_url"],ENT_QUOTES,$config_charset); ?>' />

  </div></div><?php endif; ?><div class='<?php print ($product_main["image_url"]?"pt_product_2":"pt_product_3"); ?>'>

    <?php if ($product_main["description"]): ?>

      <p><?php print $product_main["description"]; ?></p>

    <?php endif; ?>

    <p>

      <span class='pt_b'><?php print $product_bestPriceText; ?>:</span>

      <span><?php print tapestry_price($product_main["price"]); ?></span>

      <?php print translate("from"); ?>

      <?php print $product_bestPriceMerchants; ?>

    </p>

  </div>

</div>