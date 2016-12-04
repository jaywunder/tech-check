<?php

function saveRow($fname, $datarow) {

  $file = fopen($fname, 'a');
  fwrite($file, implode(',', $datarow));
  fclose($file);

}

?>
