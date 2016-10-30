<head>

  <title>
    <?php
      if (isset($TITLE)) print $TITLE;
      else print "Tech Check";
    ?>
  </title>

  <meta charset="utf-8">
  <meta name="author" content="Jacob Wunder, Trey Hurst, Kyle Barrows">
  <meta name="description" content="Tech Check">

  <?php
    $master_css_link = preg_replace(
      "/(\/.*\/tech-check).*/",
      "$1/master.css",
      $path_parts['dirname']
    );

    print "<link rel=\"stylesheet\" href=\"$master_css_link\">";

  ?>

</head>
