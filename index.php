<?php
	include 'header.php';
?>

<?php session_start(); ?>

<?php

  function getGUID(){
      if (function_exists('com_create_guid')){
          return com_create_guid();
      }else{
          mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
          $charid = strtoupper(md5(uniqid(rand(), true)));
          $hyphen = chr(45);// "-"
          $uuid = chr(123)// "{"
              .substr($charid, 0, 8).$hyphen
              .substr($charid, 8, 4).$hyphen
              .substr($charid,12, 4).$hyphen
              .substr($charid,16, 4).$hyphen
              .substr($charid,20,12)
              .chr(125);// "}"
          return $uuid;
      }
  }

  $guidString = getGUID();
  $GUID = substr($guidString, 1, -1);

  $guid = isset($_SESSION["step2-guid"]) ? $_SESSION["step2-guid"] : $GUID;

?>

	<div class="full-registration" ng-app="UserApp" ng-controller="UserListCtrl">
		<div class="container">
      <div class="f-space15"></div>
      <div class="row">
        <div class="heading">CRUD Application using AngularJS and LocalStorage (Web Storage API)</div>
      </div>
      <hr />
			<div class="full-step3">
        <div class="row">
          <div class="col-sm-6 form-box">
            <div class="step3form-heading">Add a person</div>
            <div class="f-space10"></div>
            <div class="add-user">
              <form id="step3-form" name="addUserForm" class="form-horizontal" ng-validate="validationOptions">
                <input type="hidden" name="id" ng-model="id">
                <input type="hidden" name="guid" value="<?php echo $guid; ?>" ng-model="guid" initial-value>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="fullname" class="full-label">Full Name&nbsp;<em>*</em></label>
                    <input type="text" class="form-control full-input" name="full_name" placeholder="Full name" ng-model="full_name" initial-value>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="position" class="full-label">Position in company&nbsp;<em>*</em></label>
                    <select class="form-control full-select" name="position" ng-model="position">
                      <option value="CEO">CEO</option>
                      <option value="CTO">CTO</option>
                      <option value="CFO">CFO</option>
                      <option value="COO">COO</option>
                      <option value="MD">MD</option>
                    </select> 
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="email-addr" class="full-label">Email Address&nbsp;<em>*</em></label>
                    <input type="email" class="form-control full-input" name="email_addr" ng-model="email_addr" placeholder="Email address" initial-value>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="dob" class="full-label">Date of Birth&nbsp;<em>*</em></label>
                    <div class="datepicker" date-format="MMMM d, y" button-prev='<i class="fa fa-arrow-circle-left"></i>' button-next='<i class="fa fa-arrow-circle-right"></i>'>
                      <input ng-model="dob" type="text" name="dob" id="dob" class="form-control full-input angular-datepicker-input" placeholder="Date of Birth"/>
                    </div>
                    <!-- <input type="text" class="form-control full-input" name="dob" id="dob" ng-model="dob" placeholder="Date of Birth" datepicker> -->
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="countries" class="full-label">Country&nbsp;<em>*</em></label>
                    <select name="select_country" id="select_country" class="form-control full-select">
                      <option value="United Kingdom">United Kingdom</option>                
                      <option value="United States">United States</option>
                      <option value="Afghanistan">Afghanistan</option>
                      <option value="Aland Islands">Aland Islands</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                      <option value="American Samoa">American Samoa</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Anguilla">Anguilla</option>
                      <option value="Antarctica">Antarctica</option>
                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Aruba">Aruba</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaijan">Azerbaijan</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bahrain">Bahrain</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                      <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Bouvet Island">Bouvet Island</option>
                      <option value="Brazil">Brazil</option>
                      <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Cape Verde">Cape Verde</option>
                      <option value="Cayman Islands">Cayman Islands</option>
                      <option value="Central African Republic">Central African Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Christmas Island">Christmas Island</option>
                      <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Congo">Congo</option>
                      <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                      <option value="Cook Islands">Cook Islands</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Cote D&apos;ivoire">Cote D'ivoire</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curacao">Curacao</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech Republic">Czech Republic</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican Republic">Dominican Republic</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Ethiopia">Ethiopia</option>
                      <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                      <option value="Faroe Islands">Faroe Islands</option>
                      <option value="Fiji">Fiji</option>
                      <option value="Finland">Finland</option>
                      <option value="France">France</option>
                      <option value="French Guiana">French Guiana</option>
                      <option value="French Polynesia">French Polynesia</option>
                      <option value="French Southern Territories">French Southern Territories</option>
                      <option value="Gabon">Gabon</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Gibraltar">Gibraltar</option>
                      <option value="Greece">Greece</option>
                      <option value="Greenland">Greenland</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guadeloupe">Guadeloupe</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guernsey">Guernsey</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea-bissau">Guinea-bissau</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                      <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                      <option value="Iraq">Iraq</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Isle of Man">Isle of Man</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jersey">Jersey</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Korea, Democratic People&apos;s Republic of">Korea, Democratic People's Republic of</option>
                      <option value="Korea, Republic of">Korea, Republic of</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Lao People&apos;s Democratic Republic">Lao People's Democratic Republic</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libya">Libya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macao">Macao</option>
                      <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall Islands">Marshall Islands</option>
                      <option value="Martinique">Martinique</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mayotte">Mayotte</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                      <option value="Moldova, Republic of">Moldova, Republic of</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montenegro">Montenegro</option>
                      <option value="Montserrat">Montserrat</option>
                      <option value="Morocco">Morocco</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Namibia">Namibia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Netherlands">Netherlands</option>
                      <option value="New Caledonia">New Caledonia</option>
                      <option value="New Zealand">New Zealand</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Niue">Niue</option>
                      <option value="Norfolk Island">Norfolk Island</option>
                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                      <option value="Norway">Norway</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau">Palau</option>
                      <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Pitcairn">Pitcairn</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Reunion">Reunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russian Federation">Russian Federation</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="Saint Barthelemy">Saint Barthelemy</option>
                      <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                      <option value="Saint Lucia">Saint Lucia</option>
                      <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                      <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                      <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                      <option value="Samoa">Samoa</option>
                      <option value="San Marino">San Marino</option>
                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Serbia">Serbia</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leone">Sierra Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                      <option value="Slovakia">Slovakia</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Solomon Islands">Solomon Islands</option>
                      <option value="Somalia">Somalia</option>
                      <option value="South Africa">South Africa</option>
                      <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                      <option value="South Sudan">South Sudan</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                      <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Timor-leste">Timor-leste</option>
                      <option value="Togo">Togo</option>
                      <option value="Tokelau">Tokelau</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                      <option value="Tunisia">Tunisia</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                      <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                      <option value="Viet Nam">Viet Nam</option>
                      <option value="Virgin Islands, British">Virgin Islands, British</option>
                      <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                      <option value="Wallis and Futuna">Wallis and Futuna</option>
                      <option value="Western Sahara">Western Sahara</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="home-postcode" class="full-label home-postcode">Home address postcode&nbsp;<em>*</em></label>
                  <div class="col-xs-8">
                    <input type="text" class="form-control full-input" name="postcode" ng-model="postcode" placeholder="Post code" initial-value>
                  </div>
                  <div class="col-xs-4">
                    <button class="btn btn-success" name="searchPostcode">Find Address</button>                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="postcode-results" class="full-label">Select a home address:</label>
                    <select class="form-control full-select" name="postcode-results">
                      <option>Please choose</option>
                    </select>
                  </div>   
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="home-address" class="full-label">Home Address 1&nbsp;<em>*</em></label>
                    <input type="text" class="form-control full-input" name="addr_first" ng-model="addr_first" placeholder="Line 1" initial-value>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="home-address" class="full-label">Home Address 2&nbsp;<em>*</em></label>
                    <input type="text" class="form-control full-input" name="addr_second" ng-model="addr_second" placeholder="Line 2" initial-value>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="home-address" class="full-label">Home Address 3</label>
                    <input type="text" class="form-control full-input" name="addr_third" ng-model="addr_third" placeholder="Line 3" initial-value>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="authorise" class="full-label authorise-trader">Authorise to trade ?</label>
                    <label for="authorise-user" class="checkbox-inline authorise-label">
                      <input name="agree" type="checkbox" value="" ng-model="authorized" ng-true-value="'YES'" ng-false-value="'NO'">This person is authorised to trade for my company
                    </label>
                  </div>
                </div>
            
                <div class="form-group">
                  <div class="col-xs-offset-7 col-xs-5">
                    <button class="button orange styled" type="submit" name="add_newuser" ng-show='add_user' ng-click="user_submit($event)">ADD USER</button>
                    <button class="button orange styled" type="submit" name="update_user" ng-show='update_user' ng-click="user_update($event)">UPDATE USER</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-6 form-box">
            <div class="step3form-heading">People added</div>
            <div class="f-space10"></div>
            <div class="add-user">
              <!-- <div class="added-heading">People you have added</div> -->
              <div class="people-group" ng-repeat="users in pagedItems">
                <!-- <div class="user-count">Person {{ $index + 1 }}</div> -->
                <div class="person-info">
                  <div class="user-fullname">{{ users.fullname }}</div>
                  <div class="row">
                    <div class="col-xs-6">
                      <p>Address: {{ users.firstAddress }}</p>
                      <p>Address: {{ users.secondAddress }}</p>
                      <p>Address: {{ users.thirdAddress }}</p>
                      <p>Postcode: {{ users.postCode }}</p>
                    </div>
                    <div class="col-xs-6">
                      <p>Position: {{ users.currentPosition }}</p>
                      <p>DOB: {{ users.dateOfBirth }}</p>
                      <p>Email: {{ users.emailAddress }}</p>
                      <p>Authorised: {{ users.authorization }}</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <button class="button orange edit-delete" ng-click="user_edit(users.id)">EDIT</button>
                  </div>
                  <div class="col-xs-6">
                    <button class="button orange edit-delete" ng-click="user_delete(users.id, $index)">DELETE</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
	include 'footer.php';
?>