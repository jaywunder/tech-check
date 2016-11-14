<?php include 'includes/top.php'; 
  
  $thisURL = $domain . $phpSelf;
  $firstName = "";
  $lastName = "";
  $email = "";
   
  $firstNameERROR = false;
  $lastNameERROR = false;
  $emailERROR = false;
  
  $errorMsg = array();
  $dataRecord = array();
    
  if (isset($_POST["btnSubmit"])) {
      
    if (!securityCheck($thisURL)) {
      $msg = "<p>Page could not be displayed. ";
      $msg .= "Security breach was detected and reported.</p>";
      die($msg);
    }
      
    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, 'UTF-8');
    $dataRecord[] = $firstName;
    
    $lastName = htmlentities($_POST["txtLastName"], ENT_QUOTES, 'UTF-8');
    $dataRecord[] = $lastName;
    
    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email;
      
    if ($firstName == "") {
      $errorMsg[] = "Please enter your first name.";
      $firstNameERROR = true;
    } elseif (!veryifyAlphaNum($firstName)){
      $errorMsg[] = "Your first name has invalid characters.";
      $firstNameERROR = true;
    }
    if ($lastName == "") {
      $errorMsg[] = "Please enter your last name.";
      $lastNameERROR = true;
    } elseif (!veryifyAlphaNum($lastName)){
      $errorMsg[] = "Your last name has invalid characters.";
      $lastNameERROR = true;
    }
    if ($email == "") {
      $errorMsg[] = "Please enter your email address.";
      $emailERROR = true;
    } elseif (!verifyEmail($email)){
      $errorMsg[] = "Please enter a valid email address.";
      $emailERROR = true;
    }
    
    if ($errorMsg) {
      if ($debug)
        print "<p>Error</p>";
    }  
      
    $fileExt = ".csv";
    $myFileName = "data/newsletterRegister";
    $fileName = $myFileName . $fileExt;
      
    if ($debug){
      print "\n\n<p>filename is " . $fileName;       
    }
      
    $file = fopen($fileName, 'a');
    fputcsv($file, $dataRecord);
    fclose($file); 
    
  }
?>

<h1>Home</h1>

<section id="mission-statement"></section>

<section id="newsletter"> 
  <article>
  <p>Subscribe to our newsletter "The Tech-Check Times"</p>
  <form action="<?php print $phpSelf ?>"
    id="newsletter"
    method="post">
 
  <fieldset class="newsletter">
  <legend>Tech-Check Times</legend>
  <p id="newsletter">* = Required (make this font smaller/intalics/red)</p>
  <label class="required" for="txtFirstName">*First Name:
  <input
    id="txtFirstName"
    maxlength="50"
    name="txtFirstName"
    onfocus="this.select()"
    placeholder="Enter your first name..."
    tabindex="100"
    type="text"
    value="<?php print $firstName ?>"
    >
  </label>
  <br/>
  <label class="required" for="txtLastName">*Last Name:
  <input 
    id="txtLastName"
    maxlength="50"
    name="txtLastName"
    onfocus="this.select()"
    placeholder="Enter your last name..."
    tabindex="100"
    type="text"
    value="<?php print $lastName ?>"
    >
  </label>
  <br/>
  <label class="required" for="txtEmail">*Email:
  <input
    id="txtEmail"
    maxlength="50"
    name="txtEmail"
    onfocus="this.select()"
    placeholder="Enter your email address..."
    tabindex="100"
    type="text"
    value="<?php print $email ?>"
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
  <input class="registerButton" id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Submit" >
  </fieldset>
  </form>
  </article>
</section>
<?php include 'includes/bottom.php'; ?>