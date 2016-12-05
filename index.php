<?php include 'includes/top.php';?>
<?php include 'lib/csv.php';?>
  
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
    if (!verifyAlphaNum($post['txtEmail'])) $errors[] = 'txtEmail';
    
    return $errors;
  }
  
  $errors = getFormErrors($_POST);
  
  if (!empty($errors)) { 
    saveRow('../data/newsletterRegister.csv', $_POST);
    include 'homepage/submitted_page';
  }
          
  $beenSubmitted = !in_array('submit', $errors);
  if ($beenSubmitted AND count($errors) > 0){
    $errors = array_unique($errors);
    
    print '<h3>There were errors in your form</h3>';
    print '<ol> class="error-list">';
    
    foreach ($errors as $i => $error){
      $camelCase = preg_split('/(?=[A-Z])/', substr($error, 3));
      print '<li class=\"error-listing\"> $camelCase[1] </li>';
    }
    
    print '</ol>';
  } 
?>

<?php include 'homepage/homepage.php'; ?>
<?php include 'newsletter/index.php'; ?>

<section id="mission-statement"></section>

<section id="newsletter"> 
  <article>
  <form action="<?php echo $ROOT_DIRECTORY?>"
    id="newsletter"
    method="post">
      
  <p>Subscribe to our newsletter "<i>The Tech-Check Times</i>"</p>
  <fieldset class="newsletter">
  <legend>Tech-Check Times</legend>
  <p id="newsletter"><i>* = Required </i></p>
  <label class="required" for="txtName">*Full Name:
  <input
    <?php if (in_array('txtName', $errors)) print 'class="error"' ?>
    id="txtName"
    maxlength="50"
    name="txtName"
    onfocus="this.select()"
    placeholder="Full Name"
    tabindex="100"
    type="text"
    value="<?php echo $_POST['txtName'] ?>"
    >
  </label>
  <br/>
  <label class="required" for="txtEmail">*Email:
  <input
    <?php if (in_array('txtEmail', $errors)) print 'class="error"' ?>
    id="txtEmail"
    maxlength="50"
    name="txtEmail"
    onfocus="this.select()"
    placeholder="Email address"
    tabindex="100"
    type="text"
    value="<?php echo $_POST['txtEmail'] ?>"
    >
  </label>
  <br/>
  *Information:
  <label for="monthly">Monthly:
  <input id="monthly" type="radio" name="information" value="Montly">
  </label>
  
  <label for="six">Bi-Yearly:
  <input id="six" type="radio" name="information" value="Bi-Yearly">
  </label>
  
  <label for="yearly">Yearly:
  <input id="yearly" type="radio" name="information" value="Yearly">
  </label>  
  <br/>
  
  <button type="submit" value="submitted" name="submit">Submit</button>
  </fieldset>
  </form>
  </article>
</section>
<?php include 'includes/bottom.php'; ?>