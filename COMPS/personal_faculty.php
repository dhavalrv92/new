<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "faculty") )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Faculty First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<?php
	if (isset($_POST['update_submit']))
	{
		$submit = $_POST['update_submit'];
		if ($submit)
		{
			if (!isset($_SESSION))
				session_start();
			if (isset($_SESSION['sid']))
				$id = $_SESSION['sid'];
			else
				$id = 0;
			/*echo $fullname = $_POST['fullname'] . '<br />';
			echo $designation = $_POST['designation'] . '<br />';
			echo $role = $_POST['role'] . '<br />';
			echo $dept = $_POST['dept'] . '<br />';
			echo $blood_group = $_POST['blood_group'] . '<br />';
			echo $address = $_POST['address'] . '<br />';
			echo $mobile_no = $_POST['mobile_no'] . '<br />';
			echo $residential_no = $_POST['residential_no'] . '<br />';
			echo $pan_no = $_POST['pan_no'] . '<br />';
			echo $pf_no = $_POST['pf_no'] . '<br />';
			echo $join_date = $_POST['join_date'] . '<br />';
			echo $confirm_date =  $_POST['confirm_date'] . '<br />';
			echo $e_mail = $_POST['e_mail'] . '<br />';
			echo $birth_date = $_POST['birth_date'] . '<br />';
			echo $sex = $_POST['sex'] . '<br />';
			echo $religion = $_POST['religion'] . '<br />';
			echo $caste = $_POST['caste'] . '<br />';
			echo $bank_ac_no = $_POST['bank_ac_no'] . '<br />';*/
			$fullname = $_POST['fullname'];
			$designation = $_POST['designation'];
			$role = $_POST['role'];
			$dept = $_POST['dept'];
			$blood_group = $_POST['blood_group'];
			$address = $_POST['address'];
			$mobile_no = $_POST['mobile_no'];
			$residential_no = $_POST['residential_no'];
			$pan_no = $_POST['pan_no'];
			$pf_no = $_POST['pf_no'];
			$join_date = $_POST['join_date'];
			$confirm_date =  $_POST['confirm_date'];
			$e_mail = $_POST['e_mail'];
			$birth_date = $_POST['birth_date'];
			$sex = $_POST['sex'];
			$religion = $_POST['religion'];
			$caste = $_POST['caste'];
			$bank_ac_no = $_POST['bank_ac_no'];
			
			require_once "connect.php";
			
			$query1 = "UPDATE rfid_info SET fac_name='$fullname',designation='$designation',role='$role',department='$dept',blood_group='$blood_group',address='$address',mobile_no='$mobile_no',residence_no='$residential_no',PAN_no='$pan_no',PF_no='$pf_no',join_date='$join_date',confirm_date='$confirm_date',email_id='$e_mail',birth_date='$birth_date' WHERE id='$id'";
			$query2 = "UPDATE hr_info SET sex='$sex',religion='$religion',caste='$caste',bank_ac_no='$bank_ac_no' WHERE id='$id'";
			$query = "UPDATE academic_info SET designation='$designation',joining_date='$join_date' WHERE id='$id'";
			
			$result1 = mysql_query($query1);// or die(mysql_error());
			$result2 = mysql_query($query2);// or die(mysql_error());
			$result = mysql_query($query);// or die(mysql_error());
			
			/*if (!mysql_error())
			{*/
				echo '
					<script type="text/javascript">
						alert ("* Data Updated Successfully!");
						window.location.href = "index";
					</script>
				';
			//}
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
		<script type="text/javascript">

			function validate()
			{
			 
				if( document.personal_detail.role.value == "default" )
				{
					//alert("Please Select Security Question!");
					document.getElementById("roleerror").style.display="";
					document.personal_detail.role.focus() ;
					return false;
				}
				else
					document.getElementById("roleerror").style.display="none";
				
				if ( (document.personal_detail.sex[0].checked==false) &&
					 (document.personal_detail.sex[1].checked==false) )
				{
					
					document.getElementById("gendererror").style.display="";
					return false;
				}
				else
					document.getElementById("gendererror").style.display="none";
					
				return true;
			}
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
		
	</head>
	
	<body>
		
		<?php include "header.php"; ?>
		
		<br />
		
		<div>
		
			<div id="leftmargin">
			
				<?php include "leftmargin.php"; ?>
			
			</div>
			
			<div id="gap">
			</div>
			
			<div id="middle">
			
				<?php
					if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "faculty") )
						$id = $_SESSION['sid'];
				?>
			
				<div> <!--style= "border: 1px solid red"-->
					<h5 id="required">
						* Please Fill all the Fields.
						<br />
						* Write NA wherever Details Not Applicable
					</h5>
					<div id="datemsg"></div>
					<div id="roleerror" style="color: #FF0000; display: none">
						* Please Select the Role!
					</div>
					<div id="gendererror" style="color: #FF0000; display: none">
						* Please Select Gender!
					</div>
				</div>
				
				<?php
					require_once "connect.php";
					
					$query = "SELECT * FROM rfid_info NATURAL JOIN hr_info WHERE id='$id'";
					$result = mysql_query($query) or die(mysql_error());
					$row = mysql_fetch_array($result);
				?>
			
				<form onsubmit="return(validate());" action="personal_faculty" method="POST" name="personal_detail" id="personal_detail">
					<table id="input_tbl">
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Full Name:</font>
							</td>
							<td id="input">
								<input type="text" name="fullname" id="txtbox" placeholder="Enter Full Name." onclick="select()" value="<?php echo $row['fac_name']?>" required/>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Designation:</font>
							</td>
							<td id="input">
								<select name="designation" required>
									<?php
										if ( !empty($row['designation']) )
										{
											echo '
												<option value="' . $row['designation'] . '">' . $row['designation'] . '</option>
												<option name="Assistant_Professor" value="Assistant Professor">Assistant Professor</option>
												<option name="Lecturer" value="Lecturer">Lecturer</option>
											';
										}
										else
										{
											echo '
												<option name="default" value="">Select Designation</option>
												<option name="Assistant_Professor" value="Assistant Professor">Assistant Professor</option>
												<option name="Lecturer" value="Lecturer">Lecturer</option>
											';
										}
									?>
								</select>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Role:</font>
							</td>
							<td id="input">
								<select name="role">
									<?php
										if ($row['role'])
										{
											echo '
												<option value="' . $row['role'] . '" selected>' . $row['role'] . '</option>
											';
										}
									?>
									<option name="default" value="default">Select the Role</option>
									<option name="faculty" value="Faculty">Faculty</option>
									<option name="staff" value="Staff">Staff</option>
								</select>
							</td>
						</tr>

						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Department:</font>
							</td>
							<td id="input">
								<input type="text" name="dept" id="txtbox" placeholder="Enter Department." onclick="select()" value="Computer Engineering" />
								<!--select name="dept">
									<option name="default" value="default">Select the Department</option>
									<option name="comps" value="faculty">Computer Engineering</option>
									<option name="it" value="staff">Information Technology</option>
									<option name="elex" value="staff">Electronics</option>
									<option name="extc" value="staff">Electronics and Telecommunication</option>
									// value="<?php echo $row['join_date']?>"
								</select-->
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Blood Group:</font>
							</td>
							<td id="input">
								<input type="text" name="blood_group" id="txtbox" placeholder="Enter Blood Group." onclick="select()" value="<?php echo $row['blood_group']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Address:</font>
							</td>
							<td id="input">
								<textarea rows="10" cols="10" style="resize:none" name="address" id="txtarea" placeholder="Enter Address." onclick="select()" required><?php echo $row['address']?></textarea>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Mobile No.:</font>
							</td>
							<td id="input">
								<input type="number" name="mobile_no" id="txtbox" placeholder="Enter Mobile No." onclick="select()" value="<?php echo $row['mobile_no']?>" onkeypress="return isNumber(event)" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Residential No.:</font>
							</td>
							<td id="input">
								<input type="number" name="residential_no" id="txtbox" placeholder="Enter Residential No." onclick="select()" value="<?php echo $row['residence_no']?>" onkeypress="return isNumber(event)" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>PAN No.:</font>
							</td>
							<td id="input">
								<input type="text" name="pan_no" id="txtbox" placeholder="Enter PAN No." onclick="select()" value="<?php echo $row['PAN_no']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>PF No.:</font>
							</td>
							<td id="input">
								<input type="text" name="pf_no" id="txtbox" placeholder="Enter PF No." onclick="select()" value="<?php echo $row['PF_no']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Join Date:</font>
							</td>
							<td id="input">
<!--input name="join_date" type="text" id="join_date" onfocus="javascript:NewCal('join_date','yyyymmdd');" onclick="javascript:NewCal('join_date','yyyymmdd');" readonly required />
<a href = "javascript:NewCal('join_date','yyyymmdd');">
<img src="Images/Calendar.gif" width="16" onclick="javascript:NewCal('join_date','yyyymmdd');" height="16" border="0" alt="Pick a date" />
</a-->
								<!--?php
									size="15" maxlength="12"
									require('calendar/tc_calendar.php');
									
									$myCalendar = new tc_calendar("join_date", true, false);
									$myCalendar->setIcon("calendar/images/iconCalendar.gif");
									$myCalendar->setPath("calendar/");
									$myCalendar->setYearInterval(2000, date('Y'));
									$myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
									$myCalendar->setAlignment('left', 'bottom');
									//$myCalendar->autoSubmit(true, "form1");
									$myCalendar->writeScript();
									//$myCalendar->autoSubmit(true, "", "TEST");

								?-->
								<input type="date" name="join_date" value="<?php echo $row['join_date']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Confirm Date:</font>
							</td>
							<td id="input">
								<!--?php
									
									//require('calendar/tc_calendar.php');
									
									$myCalendar = new tc_calendar("confirm_date", true, false);
									$myCalendar->setIcon("calendar/images/iconCalendar.gif");
									$myCalendar->setPath("calendar/");
									$myCalendar->setYearInterval(2000, date('Y'));
									$myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
									$myCalendar->setAlignment('left', 'bottom');
									//$myCalendar->autoSubmit(true, "form1");
									$myCalendar->writeScript();
									//$myCalendar->autoSubmit(true, "", "TEST");

								?-->
								<input type="date" name="confirm_date" value="<?php echo $row['confirm_date']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>E-mail id:</font>
							</td>
							<td id="input">
								<input type="email" name="e_mail" id="txtbox" placeholder="Enter E-mail Address." onclick="select()" value="<?php echo $row['email_id']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Date of Birth:</font>
							</td>
							<td id="input">
								<!--?php
										
									//require('calendar/tc_calendar.php');
										
									$myCalendar = new tc_calendar("birth_date", true, false);
									$myCalendar->setIcon("calendar/images/iconCalendar.gif");
									$myCalendar->setPath("calendar/");
									$myCalendar->setYearInterval(2000, date('Y'));
									$myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
									$myCalendar->setAlignment('left', 'bottom');
									//$myCalendar->autoSubmit(true, "form1");
									$myCalendar->writeScript();
									//$myCalendar->autoSubmit(true, "", "TEST");
	
								?-->
								<input type="date" name="birth_date" value="<?php echo $row['birth_date']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Sex:</font>
							</td>
							<?php
								if ( $row['sex'] == "male" )
								{
									echo '
										<td id="input">
											<input type="radio" name="sex" value="male" checked />Male
											&nbsp;
											<input type="radio" name="sex" value="female">Female
										</td>
									';
								}
								else if ( $row['sex'] == "female" )
								{
									echo '
										<td id="input">
											<input type="radio" name="sex" value="male" />Male
											&nbsp;
											<input type="radio" name="sex" value="female" checked />Female
										</td>
									';
								}
								else
								{
									echo '
										<td id="input">
											<input type="radio" name="sex" value="male" />Male
											&nbsp;
											<input type="radio" name="sex" value="female" />Female
										</td>
									';
								}
							?>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Religion:</font>
							</td>
							<td id="input">
								<input type="text" name="religion" id="txtbox" placeholder="Enter Religion." onclick="select()" value="<?php echo $row['religion']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Caste:</font>
							</td>
							<td id="input">
								<input type="text" name="caste" id="txtbox" placeholder="Enter Caste." onclick="select()" value="<?php echo $row['caste']?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Bank Account No.:</font>
							</td>
							<td id="input">
								<input type="text" name="bank_ac_no" id="txtbox" placeholder="Enter Bank Account No." onclick="select()" value="<?php echo $row['bank_ac_no']?>" required />
							</td>
						</tr>
					</table>
					
					<br />	<br />
					
					<center>
						<input type="submit" name="update_submit" value="Update" id="submitbtn" />
					</center>
				</form>
			
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br />
		
		<br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>
