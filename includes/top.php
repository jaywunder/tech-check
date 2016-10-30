<!DOCTYPE html>

<?php
  if (isset($_GET['debug'])) $debug = true;
  else $debug = false;

  function print_debug() {
    global $debug;
    $args = func_get_args();

    if ( $debug ) {
      print '<pre class="debug">';

      foreach($args as $i => $arg) {
        if (is_array($arg))
          print_r($arg);
        else
          print $arg;

        print '<br>';
      }

      print '</pre>';
    }
  }

  $domain = '//';
  $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, 'UTF-8');
  $domain .= $server;

  $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
  $path_parts = pathinfo($phpSelf);

  $ROOT_DIRECTORY = preg_replace(
    "/(\/.*\/tech-check).*/",
    "$1/",
    $path_parts['dirname']
  );
?>

<html>

  <?php include 'head.php'; ?>

  <body id="<?php print $path_parts['filename']; ?>">

    <?php
      print_debug(
        "Domain: $domain",
        "php Self: $phpSelf",
        "Path Parts:",
        $path_parts
      );
    ?>

    <!-- Start including libraries -->

    <?php
      print_debug(
        $path_parts['dirname'] . '/',
        $ROOT_DIRECTORY
      );

      if ($path_parts['dirname'] . '/' == $ROOT_DIRECTORY)
        require_once 'lib/security.php';
      else
        require_once '../lib/security.php';
    ?>

    <!-- End including libraries -->

    <?php include 'nav.php'; ?>

    <?php include 'header.php'; ?>
