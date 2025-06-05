<?php
  function navigation_display($navigation)
  {
    global $config_baseHREF;

    global $config_resultsPerPage;

    global $rewrite;

    global $page;

    global $sort;

    global $q;

    $totalPages = ceil($navigation["resultCount"] / $config_resultsPerPage);

    print "<div class='pt_navigation'>";

    print "<ul>";

    if ($page > 1)
    {
      $prevPage = ($page-1);

      if ($rewrite)
      {
        if ($prevPage == 1)
        {
          $prevHREF = "./";
        }
        else
        {
          $prevHREF = $prevPage.".html";
        }
      }
      else
      {
        $prevHREF = $config_baseHREF."search.php?q=".urlencode($q)."&amp;page=".$prevPage."&amp;sort=".$sort;
      }

      print "<li><a href='".$prevHREF."'>&laquo;</a></li>";
    }
    else
    {
      print "<li><span class='pt_navigation_inactive'>&laquo;</span></li>";
    }

    if ($page < 5)
    {
      $pageFrom = 1;

      $pageTo = 9;
    }
    else
    {
      $pageFrom = ($page - 4);

      $pageTo = ($page + 4);
    }

    if ($pageTo > $totalPages)
    {
      $pageTo = $totalPages;

      $pageFrom = $totalPages - 8;
    }

    if ($pageFrom <= 1)
    {
      $pageFrom = 1;
    }
    else
    {
      if ($rewrite)
      {
        $pageOneHREF = "./";
      }
      else
      {
        $pageOneHREF = $config_baseHREF."search.php?q=".urlencode($q)."&amp;page=1&amp;sort=".$sort;
      }

      print "<li class='pt_navigation_1'><a href='".$pageOneHREF."'>1</a></li>";

      print "<li class='pt_navigation_1'><span class='pt_navigation_inactive'>&hellip;</span></li>";
    }

    for($i=$pageFrom;$i<=$pageTo;$i++)
    {
      if ($rewrite)
      {
        if ($i==1)
        {
          $pageHREF = "./";
        }
        else
        {
          $pageHREF = $i.".html";
        }
      }
      else
      {
        $pageHREF = $config_baseHREF."search.php?q=".urlencode($q)."&amp;page=".$i."&amp;sort=".$sort;
      }
      if ($page <> $i)
      {
        print "<li class='pt_navigation_1'><a href='".$pageHREF."'>".$i."</a></li>";
      }
      else
      {
        print "<li><span class='pt_navigation_active'>".$i."</span></li>";
      }
    }

    if ($page < $totalPages)
    {
      $nextPage = ($page+1);

      if ($rewrite)
      {
        $nextHREF = $nextPage.".html";
      }
      else
      {
        $nextHREF = $config_baseHREF."search.php?q=".urlencode($q)."&amp;page=".$nextPage."&amp;sort=".$sort;
      }

      print "<li><a href='".$nextHREF."'>&raquo;</a></li>";
    }
    else
    {
      print "<li><span class='pt_navigation_inactive'>&raquo;</span></li>";
    }

    print "</ul>";

    print "</div>";
  }

  if ($navigation["resultCount"] > $config_resultsPerPage)
  {
    navigation_display($navigation);
  }
?>