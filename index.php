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

<section id="mission-statement"
<h1>Welcome to Tech Check</h1>
<h2>Your home for computer science knowledge and assistance</h2>
<p></p>
<h3>What is tech check?</h3>
<p>We are a not-for-profit organization that specializes in computer science. Consisting of a diverse team of programmers and hardware technicians, Tech Check is a leading competitor in the Techos-Sphere. </p>
<h3>What is our Mission Statement?</h3>
<p>Our sole goal is to inform the average consumer about current computer science trends while keeping them up to date on how to troubleshoot and solve any issues that occur with their current devices. We pride ourselves on being lovers of knowledge and we appreciate how drastically technology has increased the free and easy flow of information. </p>
<h3>Relevant Information:</h3>
<ul><li>
<p>You can contact us via E-mail at: <a href='mailto://jwunder@jwunder.com' target='_blank' >jwunder@jwunder.com</a></p>
</li>
<li>
<p>You may call at: 212-xxx-65xx</p>
</li>
<li>
<p>Our hours of operation are:</p>
<ul><li>
Mon-Fri: 8AM - 4PM</li>
<li>
Saturday: 10AM - 4PM</li>
<li>
Sunday: 11AM - 3PM</li>
</ul>
</li>
</ul>
<p>We really appreciate our strong customer base and strongly encourage you to sign up for our newsletter so we can keep you up to date on all of our weekly updates. Peace, Love, and Technology.</p>
<p></p>
<p>--The Tech Check Team</p>
</section>

<?php include 'includes/bottom.php'; ?>
