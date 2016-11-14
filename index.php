<?php include 'includes/top.php'; ?>

<h1>Home</h1>

<section id="mission-statement"></section>

<section id="newsletter">
  <p>Subscribe to our newsletter "The Tech-Check Times"</p>
              <form action="https://github.com/jaywunder/tech-check"
                    id="newsletter"
                    method="post">

                  <fieldset class="newsletter">
                      <legend>Tech-Check Times</legend>

                      <label class="required" for="txtFirstName">First Name:
                        	<input
                            	id="txtFirstName"
                            	maxlength="50"
                            	name="txtFirstName"
                            	onfocus="this.select()"
                            	placeholder="Enter your first name..."
                            	tabindex="100"
                            	type="text"
                        	    value=""
                            	>
                      </label>
                      <br/>
                      <label class="required" for="txtLastName">Last Name:
                         <input id="txtLastName"
                            	maxlength="50"
                            	name="txtLastName"
                            	onfocus="this.select()"
                           	  placeholder="Enter your last name..."
                            	tabindex="100"
                            	type="text"
                            	value=""
                            	>
                      </label>
                      <br/>
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
                          <input id="monthly" type="radio" name="information" value="m">
                          <label for="monthly">Monthly</label>
                          <input id="six" type="radio" name="information" value="s">
                          <label for="six">Bi-Yearly</label>
                          <input id="yearly" type="radio" name="information" value="y">
                          <label for="yearly">Yearly</label>
  			                  <br/>
  			                  <input class="registerButton" id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Submit" >
                  </fieldset>
              </form>
          </section>
</section>


<?php include 'includes/bottom.php'; ?>
