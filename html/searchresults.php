<?php
  if (file_exists("html/user_searchresults_before.php")) require("html/user_searchresults_before.php");
?>

<div class='pt_searchresults'>

  <?php foreach($searchresults["products"] as $product): ?>

    <div><div class='pt_searchresults_1'>

      <?php if ($product["image_url"]): ?>

        <a href='<?php print $product["productHREF"]; ?>'><img class='pt_img_thumb' alt='<?php print translate("Image of"); ?> <?php print htmlspecialchars($product["name"],ENT_QUOTES,$config_charset); ?>' src='<?php print htmlspecialchars($product["image_url"],ENT_QUOTES,$config_charset); ?>' /></a>

      <?php endif; ?>

    </div><div class='pt_searchresults_2'>

      <div class='pt_searchresults_2_inner'>

        <h4>

        <a href='<?php print $product["productHREF"]; ?>'><?php print $product["name"]; ?></a>

        </h4>

        <?php if ($product["description"]): ?>

          <p><?php print tapestry_substr($product["description"],250,"..."); ?></p>

        <?php endif; ?>

      </div>

    </div><div class='pt_searchresults_3'>

      <span class='pt_s'>

        <span class='pt_i'><?php print ($product["numMerchants"]>1?translate("from")."&nbsp;":""); ?></span>

        <span class='pt_b'><?php print tapestry_price($product["minPrice"]); ?></span>

      </span>

      <br />

      <a href='<?php print $product["productHREF"]; ?>'><button class='pt_secondary pt_radius'><?php print ($product["numMerchants"]>1?translate("Compare")." ".$product["numMerchants"]." ".translate("Prices"):translate("More Information")); ?></button></a>

    </div></div>

    <hr class='pt_hide_m' />

  <?php endforeach; ?>

</div>

<?php
  if (file_exists("html/user_searchresults_after.php")) require("html/user_searchresults_after.php");
?>