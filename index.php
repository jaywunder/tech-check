<?php include 'includes/top.php';?>
<?php include 'lib/csv.php';?>

<?php include 'homepage/homepage.php'; ?>

<?php
  print_debug($_POST);

  function getFormErrors($post) {
    $errors = [];

    if(empty($post)) return ['submit'];

    foreach ($post as $name => $value) {
      if ($value == '') {
        $errors[] = $name;
      }
    }

    if (!verifyAlphaNum($post['txtName'])) $errors[] = 'txtName';
    if (!verifyEmail($post['txtEmail'])) $errors[] = 'txtEmail';

    return $errors;
  }

  $errors = getFormErrors($_POST);

  if (empty($errors)) {
    saveRow('data/newsletter_register.csv', $_POST);
    include 'homepage/submitted-page.php';
  } else {
    include 'homepage/newsletter-form.php';
  }

  $beenSubmitted = !in_array('submit', $errors);
  if ($beenSubmitted AND count($errors) > 0) {
    $errors = array_unique($errors);

    print '<h3>There were errors in your form</h3>';
    print '<ol class="error-list">';

    foreach ($errors as $i => $error){
      $camelCase = preg_split('/(?=[A-Z])/', substr($error, 3));
      print "<li class=\"error-listing\"> $camelCase[1] </li>";
    }

    print '</ol>';
  }
?>



<?php include 'includes/bottom.php'; ?>
