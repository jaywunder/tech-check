<?php

  // print('ERRORS:');
  // print_r($errors);

  $beenSubmitted = !in_array('submit', $errors);

  if ($beenSubmitted AND count($errors) > 0) {
    $errors = array_unique($errors);

    print '<h3>There were some errors in your form submition</h3>';
    print '<ol class="error-list">';

    foreach ($errors as $i => $error) {
      $camelCase = preg_split('/(?=[A-Z])/', substr($error, 3));

      print "<li class=\"error-listing\"> $camelCase[1] </li>";
    }

    print '</ol>';
  }

?>

<section id="hiring-form-section">
  <form action="<?php echo $ROOT_DIRECTORY . 'hiring/' ?>" method="post">
    <fieldset>
      <legend>Contact Info</legend>
      <!-- Full Name -->
      <label for="txtName">Full Name</label>
      <input
        <?php if (in_array('txtName', $errors)) print 'class="error"' ?>
        type="text"
        name="txtName"
        id="txtName"
        placeholder="John Doe"
        onfocus="this.select()"
        value="<?php echo $_POST['txtName'] ?>"
      >

      <!-- Email -->
      <label for="txtEmail">Email</label>
      <input
        <?php if (in_array('txtEmail', $errors)) print 'class="error"' ?>
        type="text"
        name="txtEmail"
        id="txtEmail"
        placeholder="johndoe@example.com"
        onfocus="this.select()"
        value="<?php echo $_POST['txtEmail'] ?>"
      >

      <!-- Phone Number -->
      <label for="txtPhone">Phone Number</label>
      <input
        <?php if (in_array('txtPhone', $errors)) print 'class="error"' ?>
        type="text"
        name="txtPhone"
        id="txtPhone"
        placeholder="555-555-5555"
        onfocus="this.select()"
        value="<?php echo $_POST['txtPhone'] ?>"
      >

      <br>
      <!-- Gender -->
      <input type="radio" id="gender-male" name="optGender" value="male">
      <label for="gender-male">Male</label>
      <br>
      <input type="radio" id="gender-female" name="optGender" value="female">
      <label for="gender-female">Female</label>
      <br>
      <input checked type="radio" id="gender-other" name="optGender" value="other">
      <label for="gender-other">Other</label>


    </fieldset>

    <fieldset>
      <legend>Job Info</legend>
      <label for="optJob">What job are you applying for?</label>
      <select id="optJob" name="optJob">
        <option value="wizard">Wizard</option>
        <option value="mage">Mage</option>
        <option value="software-consultant">Software Consultant</option>
        <option value="hardware consultant">Hardware Consultant</option>
        <option value="head-of-software-solutions">Head of Software Solutions</option>
        <option value="head-of-hardware-solutions">Head of Hardware Solutions</option>
        <option value="web-designer">Web Designer</option>
        <option value="algorithm-cracker">Algorithm Cracker</option>
        <option value="ritz-cracker">Ritz Cracker</option>
        <option value="head-hacker">Head Hacker</option>
        <option value="ddos-attacker">DDoS Attacker</option>
        <option value="head-of-slack-interactions">Head of slack Interactions (slacker)</option>
      </select>
    </fieldset>

    <fieldset>
      <legend>What types of animals do you like?</legend>

      <label><input type="checkbox" id="penguins" value="penguins">Penguins</label><br>
      <label><input type="checkbox" id="giraffes" value="giraffes">Giraffes</label><br>
      <label><input type="checkbox" id="fish" value="fish">Fish</label><br>
    </fieldset>

    <button type="submit" value="submitted" name="submit">Submit</button>

  </form>
</section>
