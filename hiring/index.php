<?php include '../includes/top.php'; ?>

  <?php
    print_debug($_POST);

    function getFormErrors($post) {
      $errors = [];

      if (empty($post)) return ['submit'];

      foreach ($post as $name => $value) {
        if ($value == '') {
          $errors[] = $name;
        }
      }

      if (!verifyAlphaNum($post['txtName'])) $errors[] = 'txtName';

      if (!verifyEmail($post['txtEmail'])) $errors[] = 'txtEmail';

      if (!verifyPhone($post['txtPhone'])) $errors[] = 'txtPhone';

      return $errors;
    }

    $errors = getFormErrors($_POST);

    if (!empty($errors)) include './hiring-form.php';

    else include 'valid-submit.php';
  ?>

<?php include '../includes/bottom.php'; ?>
