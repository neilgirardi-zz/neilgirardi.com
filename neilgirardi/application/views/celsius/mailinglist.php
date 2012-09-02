<?php 
	$page_title = "Celsius 911: joing the list" ;
	
	require_once("php_includes/header.inc.php");
	
	require_once("php_includes/nav.inc.php");
	
	//	BEGIN form validation.
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		require_once (MYSQL);
		
		$errors = array();	// Initialize an error array.
		
		// Sanitize the form data.
		$scrubbed = array_map('spam_scrubber' , $_POST);
		
		if (empty($scrubbed['name_last'])) {	// Check for Last Name.
			$errors[] = '<li>You forgot to writer your last name.</li>';
		} else {
			$name_last = escape_data (strip_tags($scrubbed['name_last']));
		}
	
		if (empty($scrubbed['name_first'])) {	// Check for First Name.
			$errors[] = '<li>You forgot to write your first name</li>';
		} else {
			$name_first = escape_data (strip_tags($scrubbed['name_first']));
		}
		
		if (empty($scrubbed['email_address'])) {	// Check for Email Address.
			$errors[] = '<li>You forgot to write your email address</li>';
		} else {
			$email_address = escape_data (strip_tags($scrubbed['email_address']));
		}
	
		if (!empty($scrubbed['country_residence'])) {	// Check for Country Residence.
			$country_residence = escape_data (strip_tags($scrubbed['country_residence']));
		}
	
		if (!empty($scrubbed['city_residence'])) {	// Check for City Residence.
			$city_residence = escape_data (strip_tags($scrubbed['city_residence']));
		}
	
		// Only validate $state_residence if user is from U.S.
	
		if ($country_residence == 'United States' && !empty($scrubbed['state_residence'])) {
			$state_residence = escape_data (strip_tags($scrubbed['state_residence'])) ;
		}

		//	End of data validation and collection
		
		if (empty($errors)) {	// If all required data was entered by the user.
	
	 		// Create the query.
			$query = "INSERT INTO guest_book (name_last, name_first, country_residence, city_residence, state_residence, email_address, registration_date) VALUES ('$name_last', '$name_first', '$country_residence', '$city_residence', '$state_residence', '$email_address', NOW() )";
			
			$result = mysqli_query($dbc, $query);	// Run the Query.

			if ($result){		// If it ran okay.
			
				echo '<script type="text/javascript">window.onload = showConf;</script>';
				
				//Send an email notifying adminstrator of new submission.
				include ("php_includes/submission_email.php") ;
				// End of email section.
		
				// Clear $_POST so that form infor does not "stick" for next user.
				$_POST = array();
		
			} else {		// If it did not run okay.
			
				echo '<div id="emailListErrors">';
	
				trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($dbc));
				
				echo '</div>';  // END OF #emailListErrors
			}		// END OF if $result 
	
			mysqli_close($dbc);		// Close the database connection.
	
		} else { // Report the Missing Information Errors.
	
			echo '<div id="emailListErrors">';
					
			echo '<h2>Oops! Something wasn\'t filled out properly</h2>';
					
			echo '<ul>';
	
			foreach ($errors as $error) {	// Print each individual error in the array.
				echo $error;
			}
			echo '</ul></div>';	//	END OF #emailListErrors
			// Clear $_POST so that form infor does not "stick" for next user.
			$_POST = array();
		} // END OF if (empty($errors)) 
	}	//	END OF main Submit conditional.

	
?>

	<div id="mailingListContainer">

	<div id="mailingListConf">
    	<a href="#" id="closeConf">CLOSE</a>
    	<p>You've been added to the mailing list</p><p>Thank You</p>
    </div>
    
	<div id="guestBookForm">
	
		<a href="http://twitter.com/share?count=none&amp;via=celsius911" class="twitter-share-button">Tweet</a>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	
		<form enctype="multipart/form-data" id="mailing_list" method="post" action="mailinglist" onsubmit="return validate_email_list(this)" accept-charset="UTF-8" class="contact">  

			
			
			<h1 class="formH1">get on the list...</h1>
            
              <div class="labelAndInput">	<!--	START name_first	-->
			<label for="name_first" class="emailLabel">First Name</label>
			<input type="text" name="name_first" id="name_first" class="emailSubject"/>
			</div>	<!--	END name_first	-->
            
              <div class="labelAndInput">	<!--	START name_last	-->
			<label for="name_last" class="emailLabel">Last Name</label>
			<input type="text" name="name_last" id="name_last" class="emailSubject"/>
			</div>	<!--	END name_last	-->
			
			<div class="labelAndInput">	<!--	START email_address	-->
			<label for="email_address" class="emailLabel">email</label>
			<input type="text" name="email_address" id="email_address" class="emailSubject"/>
			</div>	<!--	END email_address	-->
            
            <div class="labelAndInput country">	<!--	START country_residence	-->
			<label for="country_residence" class="fixedWidth">Country</label>           
			<select name="country_residence" id="country_residence" class="fixedWidth">
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="Angola">Angola</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Botswana">Botswana</option>
					<option value="Brazil">Brazil</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Colombia">Colombia</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Congo">Congo</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Greece">Greece</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guyana">Guyana</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran">Iran</option>
					<option value="Ireland">Ireland</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Ivory Coast">Ivory Coast</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Korea">Korea</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Laos">Laos</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Libya">Libya</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxemburg">Luxemburg</option>
					<option value="Macau">Macau</option>
					<option value="Macedonia">Macedonia</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malawi">Malawi</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Malta">Malta</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mexico">Mexico</option>
					<option value="Moldova">Moldova</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Namibia">Namibia</option>
					<option value="Nepal">Nepal</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Philippines">Philippines</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Rwanda">Rwanda</option>
					<option value="Samoa">Samoa</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Thailand">Thailand</option>
					<option value="Trinidad and Tobago">Trinidad and Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Emirates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option selected="selected" value ="United States">United States</option>
					<option value="Uruguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Yugoslavia">Yugoslavia</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
					</select>
			</div>	<!--	END country_residence	-->

			<div class="labelAndInput">	<!--	START city_residence	-->
			<label for="city_residence" class="fixedWidth">City</label>		
			<input type="text" name="city_residence" id="city_residence" value="" class="fixedWidth"/>
			</div>	<!--	END city_residence	-->

			<div class="labelAndInput lastLAI">	<!--	START state_residence	-->
			<label for="state_residence" class="fixedWidth">State<span class="usa_only"></span></label>     
			<select name="state_residence" id="state_residence" class="fixedWidth">     
 					<option value="Alabama">Alabama</option>
					<option value="Alaska">Alaska</option>
					<option value="Arizona">Arizona</option>
					<option value="Arkansas">Arkansas</option>
					<option value="California">California</option>
					<option value="Colorado">Colorado</option>
					<option value="Connecticut">Connecticut</option>
					<option value="Delaware">Delaware</option>
					<option value="District of Columbia">District of Columbia</option>
					<option value="Florida">Florida</option>
					<option value="Georgia">Georgia</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Idaho">Idaho</option>
					<option value="Illinois">Illinois</option>
					<option value="Indiana">Indiana</option>
					<option value="Iowa">Iowa</option>
					<option value="Kansas">Kansas</option>
					<option value="Kentucky">Kentucky</option>
					<option value="Louisiana">Louisiana</option>
					<option value="Maine">Maine</option>
					<option value="Maryland">Maryland</option>
					<option value="Massachusetts">Massachusetts</option>
					<option value="Michigan">Michigan</option>
					<option value="Minnesota">Minnesota</option>
					<option value="Mississippi">Mississippi</option>
					<option value="Missouri">Missouri</option>
					<option value="Montana">Montana</option>
					<option value="Nebraska">Nebraska</option>
					<option value="Nevada">Nevada</option>
					<option value="New Hampshire">New Hampshire</option>
					<option value="New Jersey">New Jersey</option>
					<option value="New Mexico">New Mexico</option>
					<option value="New York">New York</option>
					<option value="North Carolina">North Carolina</option>
					<option value="North Dakota">North Dakota</option>
					<option value="Ohio">Ohio</option>
					<option value="Oklahoma">Oklahoma</option>
					<option value="Oregon">Oregon</option>
					<option value="Pennsylvania">Pennsylvania</option>
					<option value="Rhode Island">Rhode Island</option>
					<option value="South Carolina">South Carolina</option>
					<option value="South Dakota">South Dakota</option>
					<option value="Tennessee">Tennessee</option>
					<option value="Texas">Texas</option>
					<option value="Utah">Utah</option>
					<option value="Vermont">Vermont</option>
					<option value="Virginia">Virginia</option>
					<option value="Washington">Washington</option>
					<option value="West Virginia">West Virginia</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Wyoming">Wyoming</option>
                    <option selected="selected" value="">select your state</option>
			</select>
			</div>	<!--	END state_residence	-->
		
            <div class="buttonarea">
            <input type="submit" value="SUBMIT" />
            </div>	<!--	End of .buttonarea	-->
		<input type="hidden" name="submitted" value="true" />
		</form>
		
		</div>
		<div id="twitter1" class="twitter">
	</div>
	
	<script type="text/javascript">
	$('#twitter1').twitterSearch({
	term: 'celsius911',
	bird: false,
	colorExterior: '#1F8FDD',
	colorInterior: '#fff',
	});
	</script>
	</div>	<!-- End of .content	-->
	</div> <!--	end #siteContainer	-->
	</body>
	</html>
        