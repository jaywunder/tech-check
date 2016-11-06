<?php include 'includes/top.php'; ?>

<h1>Home</h1>

<section id="mission-statement"></section>

<section id="newsletter">
  <p>Subscribe to our newsletter "Jacob Insert Fancy Name here..."</p>
              <form action="https://github.com/jaywunder/tech-check"
                    id="newsletter"
                    method="post">

                  <fieldset class="newsletter">
                      <legend>Tech-Check Newsletter</legend>
                      <label class="required" for="txtEmail">Email
                          <input
                              id="txtEmail"
                              maxlength="50"
                              name="txtEmail"
                              onfocus="this.select()"
                              placeholder="Enter your email address..."
                              tabindex="100"
                              type="text"
                              value=""
                              >
                      </label>
                          <br/>
                          Information:
                          <input id="weekly" type="radio" name="information" value="w">
                          <label for="weekly">Weekly</label>
                          <input id="monthly" type="radio" name="information" value="m">
                          <label for="monthly">Monthly</label>
                          <input id="six" type="radio" name="information" value="s">
                          <label for="six">6 Months</label>
                          <input id="yearly" type="radio" name="information" value="y">
                          <label for="yearly">12 months</label>
  			                  <br/>
  			                  <input class="registerButton" id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Submit" >  
                  </fieldset>
              </form>
          </section>
</section>


<?php include 'includes/bottom.php'; ?>
