<?php

function saveRow($fname, $datarow) {

  $file = fopen($fname, 'a');
  fwrite($file, implode(',', $datarow));
  fwrite($file, "\n");
  fclose($file);

}

?>
