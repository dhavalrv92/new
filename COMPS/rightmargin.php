<html>

	<head>
	
		<meta charset="utf-8">
		
		<title>Right Margin</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/rightmarginstyle.css" />
		
		<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
		<script src="JavaScripts/jquery-1.11.0.min.js"></script>
		
		<script>
			$(document).ready(function(){
				$("#fac_add_remove_show").hide();
				$("#fac_add_remove_menu").click(function(){
					$("#fac_details_show").hide('slow');
					$("#student_section_show").hide('slow');
					$("#fac_add_remove_show").toggle('slow');
				});
			});
			$(document).ready(function(){
				$("#fac_details_show").hide();
				$("#fac_detail_menu").click(function(){
					$("#fac_add_remove_show").hide('slow');
					$("#student_section_show").hide('slow');
					$("#fac_details_show").toggle('slow');
				});
			});
			$(document).ready(function(){
				$("#student_section_show").hide();
				$("#student_section_menu").click(function(){
					$("#fac_details_show").hide('slow');
					$("#fac_add_remove_show").hide('slow');
					$("#student_section_show").toggle('slow');
				});
			});
			
			$(document).ready(function(){
				$("#fac_profile_show").hide();
				$("#profile_menu").click(function(){
					$("#fac_profile_show").toggle('slow');
					$("#proctor_show").hide('slow');
					$("#guest_show").hide('slow');
				});
			});
			$(document).ready(function(){
				$("#proctor_show").hide();
				$("#proctor_menu").click(function(){
					$("#proctor_show").toggle('slow');
					$("#fac_profile_show").hide('slow');
					$("#guest_show").hide('slow');
				});
			});
			$(document).ready(function(){
				$("#guest_show").hide();
				$("#guest_menu").click(function(){
					$("#guest_show").toggle('slow');
					$("#fac_profile_show").hide('slow');
					$("#proctor_show").hide('slow');
				});
			});
		</script>
		
		<script type="text/javascript">
			function isNumber(evt)
			{
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57))
				{
					return false;
				}
				return true;
			}
		</script>

		<script>
			
			function valid_alert()
			{
				//var x=document.forms["loginchoice"]["userType"].value;
				if (document.loginchoice.userType[0].checked==false && document.loginchoice.userType[1].checked==false)
				{
					alert ("Please Select Proper Login Option");
					//return false;
				}
				/*ErrorText= "";
				if ( ( form.gender[0].checked == false ) && ( form.gender[1].checked == false ) ) 
				{
					alert ( "Please choose your Gender: Male or Female" ); 
					return false;
				}
				if (ErrorText= "") 
				{
					form.submit() 
				}*/
			}

		</script>
	
	</head>
	
	
	<body>
		
		<?php
			
			if (!isset($_SESSION))
				session_start();
					
			if ( (isset($_SESSION['role'])) && (isset($_SESSION['sid'])) )
			{
				include "connect.php";
				
				$opt=$_SESSION['role'];
				
				/*$id=$_SESSION['sid'];
				
				if ($opt=="admin")
				{
					$resulta=mysql_query("SELECT * FROM adminlogin WHERE userid='" . $id . "'")
					or die(mysql_error());
					$counta=mysql_num_rows($resulta);
				}
				elseif ($opt=="faculty")
				{
					$resultf=mysql_query("SELECT * FROM facultylogin WHERE userid='" . $id . "'")
					or die(mysql_error());
					$countf=mysql_num_rows($resultf);
				}*/
				
				if ($opt=="admin")
				{
					echo '
						<div id="firstdiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="fac_add_remove_menu">
											Add or Remove User
										</a>
									</font>
								</li>
							</ul>
						</div>
						<div id="fac_add_remove_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="add_faculty">
														Add Faculty
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="remove_faculty">
														Remove Faculty
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="add_admin">
														Add Admin
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="select_sem">
											Upload Result
										</a>
									</font>
								</li>
							</ul>
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="change_password">
											Change Password
										</a>
									</font>
								</li>
							</ul>
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="fac_detail_menu">
											Faculty Details
										</a>
									</font>
								</li>
							<ul>
						</div>
						<div id="fac_details_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="faculty_info_retrieve?data=rfid">
														Retrieve Faculty Details (RFID)
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="faculty_info_retrieve?data=hr">
														Retrieve Faculty Details (HR)
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="faculty_info_retrieve?data=academic">
														Retrieve Faculty Details (Academic)
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="seminar_retrieve">
														Seminar Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="paper_retrieve">
														Presented Paper Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<!--div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="faculty_info_retrieve?data=custom">
														Retrieve Faculty Details (Customised)
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div-->
						</div>
						
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="retrieve_guest_lecture">
											Guest Lecture Details
										</a>
									</font>
								</li>
							</ul>
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="student_section_menu">
											Student Section
										</a>
									</font>
								</li>
							<ul>
						</div>
						<div id="student_section_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="student_roll_list">
														Add Student Roll No. List
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="student_roll_list_retrieve">
														Retrieve Student Roll No. List
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					';
				}
					
				elseif ($opt=="faculty")
				{
					echo '
						<div id="firstdiv">
							<ul>
								<li>
									<font>
										<a href="change_password">
											Change Password
										</a>
									</font>
								</li>
							</ul>
						</div>
					';

					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="profile_menu">
											My Profile
										</a>
									</font>
								</li>
							</ul>
						</div>
						<div id="fac_profile_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="personal_faculty">
														Update Personal Profile
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="academic_faculty">
														Update Academic Profile
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>	
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="papers_presented">
														Papers Presented
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>	
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="seminar_details">
														Seminar Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>	
							</div>
							<!--div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="faculty_data">
														My Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div-->
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="proctor_menu">
											Proctor Details
										</a>
									</font>
								</li>
							</ul>
						</div>
						<div id="proctor_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="proctor_grade">
														Edit Proctor Grade
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="proctor_problems">
														Edit Proctor Problems
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="proctor_student_list">
														Student List
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="guest_menu">
											Guest Lecture Details
										</a>
									</font>
								</li>
							</ul>
						</div>
						<div id="guest_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="add_guest_lecture">
														Insert New Guest Lecture Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="retrieve_guest_lecture">
														Retrieve Guest Lecture Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					';
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="student_roll_list_retrieve">
											Student Roll No. List
										</a>
									</font>
								</li>
							</ul>
						</div>
					';
				}
				echo '
					<div id="alldiv">
						<ul>
							<li>
								<font>
									<a href="Stock/assistant_login" target="_blanck">
										Lab Assistant Section
									</a>
								</font>
							</li>
						</ul>
					</div>
				';
			}
			
			elseif (isset($_POST['userType']))
			{
				$option = $_POST['userType'];
				
				if ($option == "admin")
				{						
					$_SESSION['role'] = $option;
					
					echo '
						<center>
							<br />
							<form name="adminLogin" onsubmit="return checkForm(this);" action="validatelogin" method="POST">
								<table>
									<tr>
										<!--td align="right">Faculty UserID:</td-->
										<td align="center"><input type="text" name="userid" placeholder="Enter the UserID" /></td>
									</tr>
									<tr>
										<!--td align="right">Password:</td-->
										<td align="center"><input type="password" name="passwd" placeholder="Enter the Password" /></td>
									</tr>
									<tr>
										<td>
											<br /><br />
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="submit" value="Submit" /></td>
									</tr>
								</table>
								<table>
									<tr>
										<td width="50%" align="left">
											<a href="signup" id="help">Sign Up</a>
										</td>
										<td width="50%" align="right">
											<a href="forgot_pass" id="help">Forgot Password</a>
										</td>
									</tr>		
								</table>
							</form>
						</center>
					';
				}
					
				elseif ($option == "faculty")
				{
					$_SESSION['role'] = $option;

					echo '
						<center>
							<br />
							<form name="adminLogin" onsubmit="return checkForm(this);" action="validatelogin" method="POST">
								<table>
									<tr>
										<!--td align="right">Faculty UserID:</td-->
										<td align="center"><input type="text" name="userid" onkeypress="return isNumber(event)" placeholder="Enter the UserID" maxLength="10" /></td>
									</tr>
									<tr>
										<!--td align="right">Password:</td-->
										<td align="center"><input type="password" name="passwd" placeholder="Enter the Password" /></td>
									</tr>
									<tr>
										<td>
											<br /><br />
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="submit" value="Submit" /></td>
									</tr>
								</table>
								<table>
									<tr>
										<td width="50%" align="left">
											<a href="signup" id="help">Sign Up</a>
										</td>
										<td width="50%" align="right">
											<a href="forgot_pass" id="help">Forgot Password</a>
										</td>
									</tr>		
								</table>
							</form>
						</center>
					';
				}
				
				echo '
					<br />
					<div id="firstdiv">
						<ul>
							<li>
								<font>
									<a href="Student/student_login" target="_blanck">
										Student Section
									</a>
								</font>
							</li>
						</ul>
					</div>
				';
				echo '
					<div id="alldiv">
						<ul>
							<li>
								<font>
									<a href="Stock/assistant_login" target="_blanck">
										Lab Assistant Section
									</a>
								</font>
							</li>
						</ul>
					</div>
				';
			}
			
			else
			{
				echo '<div id="error"></div>';
				
				echo '
					<center>
						<table>	
							<tr>
								<td>
									<center>
										<b>Log In as:</b>
									</center>
								</td>
							</tr>
							<tr>
								<td>
									<form name="loginchoice" method="post" align="center">
									<center>	
										<input type="radio" name="userType" value="admin" /> Administrator
										<input type="radio" name="userType" value="faculty" /> Faculty
										<br />
										<br />
										<input type="submit" value="Log In" onclick="valid_alert()"/>
									</form>
									</center>
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<td width="50%" align="left">
									<a href="signup" id="help">Sign Up</a>
								</td>
								<td width="50%" align="right">
									<a href="forgot_pass" id="help">Forgot Password</a>
								</td>
							</tr>		
						</table>
					</center>
				';
				echo '
					<br />
					<div id="firstdiv">
						<ul>
							<li>
								<font>
									<a href="Student/student_login" target="_blanck">
										Student Section
									</a>
								</font>
							</li>
						</ul>
					</div>
				';
				echo '
					<div id="alldiv">
						<ul>
							<li>
								<font>
									<a href="Stock/assistant_login" target="_blanck">
										Lab Assistant Section
									</a>
								</font>
							</li>
						</ul>
					</div>
				';
			}
		
		?>
	
	</body>

</html>
