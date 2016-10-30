<?php

function securityCheck($formURL = "") {
  $debugThis = false;
  $status = true;

  if ($formURL != "") {
    $fromPage = htmlentities($_SERVER['HTTP_REFERER'], ENT_QUOTES, "UTF-8");

    $fromPage = preg_replace('#^https?:#', '', $fromPage);

    if ($debugThis) print_debug("From: $fromPage should match your Url: $formURL");

    if ($fromPage != $formURL) {
      $status = false;
    }
  }

  return $status;
}

?>
