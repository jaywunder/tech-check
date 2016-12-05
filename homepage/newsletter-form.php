<section id="newsletter">
  <form action="<?php echo $ROOT_DIRECTORY ?>" method="post">

    <fieldset class="newsletter">
    <legend>Subscribe to our newsletter</legend>
    <label class="required" for="txtName">Full Name</label>
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

    <label class="required" for="txtEmail">Email</label>
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

    <label for="monthly">
      <input checked id="monthly" type="radio" name="optFrequency" value="Montly">
      Monthly
    </label>

    <label for="six">
      <input id="six" type="radio" name="optFrequency" value="Bi-Yearly">
      Bi-Yearly
    </label>

    <label for="yearly">
      <input id="yearly" type="radio" name="optFrequency" value="Yearly">
      Yearly
    </label>

    <button type="submit" value="submitted" name="submit">Submit</button>

    </fieldset>
  </form>
</section>
