<nav>
  <ol>
    <?php

      if (!isset($navitems)) $navitems = [
        'Home' => [
          'rootlink' => '',
          'About' => 'about/',
          'Linux' => 'linux/',
          'Crypto' => 'crypto/',
          'FAQ' => 'faq/'

        ],
        'About' => 'about/',
        'Linux' => 'linux/',
        'Crypto' => [
          'rootlink' =>  'crypto/',
          'Whitepaper' => 'whitepaper/'
        ],
        'FAQ' => 'faq/',
        'We\'re Hiring' => 'hiring/',
      ];

      foreach ($navitems as $navname => $navitem) {

        $is_active = false;

        if (is_array($navitem))
          print_dropdown($navname, $navitem, $is_active);

        else
          print_item($navname, $navitem, $is_active);
      }

      function print_dropdown($name, $array, $is_active) {
        global $ROOT_DIRECTORY;

        if ($is_active) $activeclass = 'active-page';
        else $activeclass = '';

        $rootlink = $array['rootlink'];
        unset($array['rootlink']);

        print '<li class="dropdown '. $activeclass .'">';
        print '<a href="'. $ROOT_DIRECTORY . $rootlink .'">'. $name .'</a>';
        print '<ol class="dropdown-content">';

        foreach ($array as $name => $link) {
          print_item($name, $link);
        }

        print '</ol>';
        print '</li>';
      }

      function print_item($name, $link, $is_active = false) {
        global $ROOT_DIRECTORY;

        if ($is_active)
          print '<li class="active">';
        else
          print '<li>';

        print '<a href="'. $ROOT_DIRECTORY . $link .'">'. $name .'</a>';
        print '</li>';
      }
    ?>
  </ol>
</nav>
