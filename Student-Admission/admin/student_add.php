<!-- ===============================================
	**** A COMPLETE VALIDATE FORM WITH PHP ****
================================================ -->

<!-- ==============  PHP begin  =================-->
<?php
					$sname = "";
					$gname = "";
					$contact = "";
					$email = "";
					$address = "";
					$class = "";
					$shift = "";
					$gender = "";
					$blgroup = "";
					$Faculty = "";
					$esname = "";
					$egname = "";
					$econtact = "";
					$eemail = "";
					$eaddress = "";
					$eclass = "";
					$eshift = "";
					$egender = "";
					$eblgroup = "";
					$eFaculty = "";
					
					if(isset($_POST['submit']))
					{
					$sname = $_POST['sname'];
					$gname = $_POST['gname'] ;
					$contact = $_POST['contact'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$class = $_POST['class'];
					$shift = $_POST['shift'];
						
					if(isset($_POST['gender']))
					$gender = $_POST['gender'];
						
					$blgroup = $_POST['blgroup'];
					$Faculty = $_POST['Faculty'];
						
						$er = 0;
						
						if($sname == "")
						{
							$er++;
							$esname = "*Required";
						}
						else{
							$sname = test_input($sname);
							if(!preg_match("/^[a-zA-Z ]*$/",$sname)){
							$er++;
							$esname = "*Only letters and white space allowed";
						}
						}

						if($gname == "")
						{
							$er++;
							$egname = "*Required";
						}
						else{
							$gname = test_input($gname);
							if(!preg_match("/^[a-zA-Z ]*$/",$gname)){
							$er++;
							$egname = "*Only letters and white space allowed";
						}
						}

						if($contact == "")
						{
							$er++;
							$econtact = "*Required";
						}
						else{
							$contact = test_input($contact);
							if(!preg_match("/^[+0-9]*$/",$contact)){
							$er++;
							$econtact = "*Only numbers are allowed";
							}
							
						}

						if($email == "")
						{
							$er++;
							$eemail = "*Required";
						}
						else
						{
							$email = test_input($email);
							if(!filter_var($email, FILTER_VALIDATE_EMAIL))
							{
								$er++;
								$eemail = "*Email format is invalid";
							}
							
						}

						if($address == "")
						{
							$er++;
							$eaddress = "*Required";
						}

						if($class == "")
						{
							$er++;
							$eclass = "*Required";
						}

						if($shift == "None")
						{
							$er++;
							$eshift = "*Please select shift";
						}

						 if (empty($gender)) {
						 	$er++;
						    $egender = "*Gender is required";
						  } else {
						    $gender = test_input($gender);
						  }

						if($blgroup == "")
						{
							$er++;
							$eblgroup = "*Required";
                        }
                        elseif(strlen($blgroup) > 3)
                        {
                            $er++;
                            $eblgroup = "*Not more than 3 character";
                        }
                            
                        else
                        {
                            $blgroup = test_input($blgroup);
                            if(!preg_match("/^[a-zA-Z+-]*$/",$blgroup))
                            {
                                $er++;
                                $eblgroup = "*Blood group not valid";
                            }

                        }

						if($Faculty == 0)
						{
							$er++;
							$eFaculty = "*Please select Faculty";
						}
						
						if($er == 0)
						{
                            /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
							
							$sql = "INSERT INTO student (sname, gname, contact, email, address, class, shift, gender, blgroup, Faculty) VALUES (
							'".mysqli_real_escape_string($cn, strip_tags($sname))."',
							'".mysqli_real_escape_string($cn, strip_tags($gname))."', 
							'".mysqli_real_escape_string($cn, strip_tags($contact))."', 
							'".mysqli_real_escape_string($cn, strip_tags($email))."', 
							'".mysqli_real_escape_string($cn, strip_tags($address))."', 
							'".mysqli_real_escape_string($cn, strip_tags($class))."', 
							'".mysqli_real_escape_string($cn, strip_tags($shift))."', 
							'".mysqli_real_escape_string($cn, strip_tags($gender))."', 
							'".mysqli_real_escape_string($cn, strip_tags($blgroup))."', 
							'".mysqli_real_escape_string($cn, strip_tags($Faculty))."'
							)";
							
							if(mysqli_query($cn , $sql))
							{
								print '<span class = "successMessage">Data saved into system.</span>';
								$sname = "";
								$gname = "";
								$contact = "";
								$email = "";
								$address = "";
								$class = "";
								$shift = "";
								$gender = "";
								$blgroup = "";
								$Faculty = "";
									
							}
							else
							{
								print '<span class= "errorMessage">'.mysqli_error($cn).'</span>';
							}
						}
						else
						{
							print '<span class = "errorMessage">Please fill all the required fields correctly.</span>';
						}
					}
					
					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
					
//================================ PHP End =============================	
?>

<div class="form-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3>Admission form</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
										<h5><label for="sname">Student name</label>
										<span class="error"><?php print $esname; ?></span></h5>
										<p><input type="text" name="sname" value="<?php print $sname; ?>"></p>

										<h5><label for="gname">Guardian name</label><span class="error">
												<?php print $egname; ?></span></h5>
										<p><input type="text" name="gname" value="<?php print $gname; ?>"></p>

										<h5><label for="contact">Contact</label><span class="error">
												<?php print $econtact; ?></span></h5>
										<p><input type="text" name="contact" value="<?php print $contact; ?>"></p>

										<h5><label for="email">Email</label><span class="error">
												<?php print $eemail; ?></span></h5>
										<p><input type="text" name="email" value="<?php print $email; ?>"></p>

										<h5><label for="address">Address</label><span class="error">
												<?php print $eaddress; ?></span></h5>
										<p><textarea name="address"><?php print $address; ?></textarea></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										<h5><label for="class">Class</label><span class="error">
												<?php print $eclass; ?></span></h5>
										<p><input type="text" name="class" value="<?php print $class; ?>"></p>

										<h5><label for="shift">Shift</label></h5>
										<p><select name="shift" id="">
												<option value="None">select</option>
												<option value="morning">morning</option>
												<option value="evening">evening</option>
											</select><span class="error">
												<?php print $eshift; ?></span></p>


										<h5><label for="gender">Gender</label></h5>
										<input type="radio" name="gender" value="male"><span>Male</span>
										<input type="radio" name="gender" value="female"><span>Female</span>
										<input type="radio" name="gender" value="others"><span>Others</span>
										<span class="error">
											<?php print $egender; ?></span>

										<h5><label for="blgroup">Blood group</label><span class="error">
												<?php print $eblgroup; ?></span></h5>

										<p><input type="text" name="blgroup" value="<?php print $blgroup; ?>"></p>

										<h5><label for="Faculty">Faculty</label></h5>
										<p><select name="Faculty" id="">
												<option value="None">N/A</option>
												<option value="science">Science</option>
												<option value="commerce">Commerce</option>
												<option value="arts">Arts</option>
											</select><span class="error">
												<?php print $eFaculty; ?></span></p>
											
												<form method="post" action="index.php">
    <p><input type="submit" name="submit" value="Submit"></p>
</form>
										<!-- <li><a href="Forms/reg.php">REGISTER</a></li></p> -->
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
