<nav>
  <ol>
    <?php

      if (!isset($navitems)) $navitems = [
        'Home' => 'index.php',
        'Form' => 'form.php',
        'Spec' => 'spec.pdf'
      ];

      foreach ($navitems as $navname => $navfile) {
        print '<li class="';
        if ($path_parts['filename'] . '.' . $path_parts['extension'] == $navfile) {
          print 'active-page';
        }
        print '">';
        print "<a href=\"$navfile\">$navname</a>";
        print '</li>';
      }
    ?>
  </ol>
</nav>
