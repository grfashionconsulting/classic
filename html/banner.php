<div class='pt_banner'>

  <ul>
  
    <li><a href='<?php print $config_baseHREF; ?>'>Home</a></li>

    <?php if (isset($banner["breadcrumbs"])): ?>

      <?php
        $banner_breadcrumbMax = (count($banner["breadcrumbs"])-1);

        foreach($banner["breadcrumbs"] as $k => $banner_breadcrumb)
        {
          if ($k < $banner_breadcrumbMax)
          {
            print "<li><a href='".$banner_breadcrumb["href"]."'>".$banner_breadcrumb["title"]."</a></li>";
          }
          else
          {
            print "<li>".$banner_breadcrumb["title"]."</li>"; 
          }
        }      
      ?>

    <?php else: ?>

      <?php print (isset($banner["h2"])?"<li>".$banner["h2"]."</li>":""); ?>

    <?php endif; ?>    

  </ul>

  <?php print (isset($banner["h3"])?"<p>".$banner["h3"]."</p>":""); ?>

</div>