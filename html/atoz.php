<?php
  $atoz["itemsByLetter"] = array();

  foreach($atoz["items"] as $item)
  {
    $atoz_letter = tapestry_mb_strtoupper(tapestry_mb_substr($item["name"],0,1));

    $atoz["itemsByLetter"][$atoz_letter][] = $item;
  }
?>

<div class='pt_atoz'>

  <?php foreach($atoz["itemsByLetter"] as $atoz_letter => $atoz_items): ?>

    <div><?php print $atoz_letter; ?></div>

    <ul>

      <?php foreach($atoz_items as $atoz_item): ?>

        <li>

          <a href='<?php print $atoz_item["href"]; ?>'>

            <?php if (isset($atoz_item["logo"])): ?>

              <img alt='<?php print htmlspecialchars($atoz_item["name"],ENT_QUOTES,$config_charset); ?>' src='<?php print $atoz_item["logo"]; ?>' />

            <?php else: ?>

              <?php print $atoz_item["name"]; ?>

            <?php endif; ?>

          </a>

        </li>

      <?php endforeach; ?>

    </ul>

  <?php endforeach; ?>

</div>
