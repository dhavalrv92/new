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
	if (isset($_POST['academic_update']))
	{
		$submit = $_POST['academic_update'];
		if ($submit)
		{
			if (!isset($_SESSION))
				session_start();
			if (isset($_SESSION['sid']))
				$id = $_SESSION['sid'];
			else
				header ("location: index");
			
			$qualification = $_POST['qualification'];
			$subject = $_POST['subject'];
			$passing_year = $_POST['passing_year'];
			$sub_taught = $_POST['sub_taught'];
			$area_of_interest = $_POST['area_of_interest'];
			$appointment_nature = $_POST['appointment_nature'];
			$approval_type = $_POST['approval_type'];
			$approval_letterNo = $_POST['approval_letterNo'];
			$previous_college = $_POST['previous_college'];
			$previous_college_letterNo = $_POST['previous_college_letterNo'];
			$scale_grade = $_POST['scale_grade'];
			$superannuation_date = $_POST['superannuation_date'];
			$total_teaching_exp = $_POST['total_teaching_exp'];
			$total_industry_exp = $_POST['total_industry_exp'];
			$total_service_years = $total_teaching_exp + $total_industry_exp;
			
			require_once "connect.php";
			
			$query = "UPDATE academic_info SET qualification='$qualification',subject='$subject',passing_year='$passing_year',sub_taught='$sub_taught',area_of_interest='$area_of_interest',appointment_nature='$appointment_nature',approval_type='$approval_type',approval_letterNo='$approval_letterNo',previous_college='$previous_college',previous_college_letterNo='$previous_college_letterNo',scale_grade='$scale_grade',superannuation_date='$superannuation_date',teaching_experience='$total_teaching_exp',industry_experience='$total_industry_exp',total_service_years='$total_service_years' WHERE id='$id'";
			
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
			 
				if( document.academic_faculty.questionappointment_nature.value == "default" )
				//if(document.academic_faculty.questionappointment_nature.selectedIndex == 0)
				{
					//alert("Please Select Security Question!");
					document.getElementById("appointmenterror").style.display="";
					document.academic_faculty.appointment_nature.focus() ;
					return false;
				}
				else
					document.getElementById("appointmenterror").style.display="none";
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
			
				<div> <!--style= "border: 1px solid red"-->
					<h5 id="required">
						* Please Fill all the Fields!
						<br />
						* Write NA wherever Details Not Applicable!
					</h5>
					<div id="appointmenterror" style="color: #FF0000; display: none">>
						* Please Select Appointment Nature!
					</div>
				</div>
				
				<?php
					require_once "connect.php";
					if (isset($_SESSION['sid']))
						$id = $_SESSION['sid'];
					else
						header ("location: index");
					
					$query = "SELECT * FROM academic_info WHERE id='$id'";
					$result = mysql_query($query) or die(mysql_error());
					$row = mysql_fetch_array($result);
				?>
				
				<form onsubmit="return(validate());" action="academic_faculty" method="POST" id="formdisp">
					<table id="input_tbl">
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Qualification:</font>
							</td>
							<td id="input">
								<input type="text" name="qualification" id="txtbox" placeholder="Enter the Qualification." onclick="select()" value="<?php echo $row['qualification'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Stream of Qualification:</font>
							</td>
							<td id="input">
								<input type="text" name="subject" id="txtbox" placeholder="Enter Subject." onclick="select()" value="<?php echo $row['subject'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Passing Year:</font>
							</td>
							<td id="input">
								<input type="month" name="passing_year" onclick="select()" value="<?php echo $row['passing_year'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Subjects Taught:</font>
							</td>
							<td id="input">
								<textarea rows="3" cols="10" style="resize:none" name="sub_taught" id="txtarea" placeholder="Enter Subjects' Abbreviation." onclick="select()" required><?php echo $row['sub_taught'];?></textarea>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Area of Interest:</font>
							</td>
							<td id="input">
								<textarea rows="5" cols="10" style="resize:none" name="area_of_interest" id="txtarea" placeholder="Enter Area of Interest." onclick="select()" required><?php echo $row['area_of_interest'];?></textarea>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Appointment Nature:</font>
							</td>
							<td id="input">
								<!--input type="text" name="appointment_nature" id="txtbox" placeholder="Enter Nature of Appointment." onclick="select()" value="<?php echo $row['appointment_nature'];?>" required /-->
								<select name="appointment_nature" required>
									<option value="default">Select Appointment Nature</option>
									<option value="Regular" selected="selected">Regular</option>
									<option value="Temporary">Temporary</option>
								</select>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Approval Type:</font>
							</td>
							<td id="input">
								<input type="text" name="approval_type" id="txtbox" placeholder="Enter Approval Type." onclick="select()" value="<?php echo $row['approval_type'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Approval Letter Number:</font>
							</td>
							<td id="input">
								<input type="text" name="approval_letterNo" id="txtbox" placeholder="Enter Approval Letter Number." onclick="select()" value="<?php echo $row['approval_letterNo'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Previous College Name:</font>
							</td>
							<td id="input">
								<input type="text" name="previous_college" id="txtbox" placeholder="Enter Name of Previous College." onclick="select()" value="<?php echo $row['previous_college'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Previous College Letter Number:</font>
							</td>
							<td id="input">
								<input type="text" name="previous_college_letterNo" id="txtbox" placeholder="Enter Previous College's Appointment Letter Number." onclick="select()" value="<?php echo $row['previous_college_letterNo'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Scale/Grade:</font>
							</td>
							<td id="input">
								<input type="text" name="scale_grade" id="txtbox" placeholder="Enter Scale/Grade." onclick="select()" value="<?php echo $row['scale_grade'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Super Annuation Date:</font>
							</td>
							<td id="input">
								<input type="date" name="superannuation_date" onclick="select()" value="<?php echo $row['superannuation_date'];?>" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Total Teaching Experience:</font>
							</td>
							<td id="input">
								<input type="text" name="total_teaching_exp" id="txtbox" onkeypress="return isNumber(event);" placeholder="Enter Total Teaching Experience." onclick="select()" value="<?php echo $row['teaching_experience'];?>" style="width: 80%;" required /> Years
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Total Industrial Experience:</font>
							</td>
							<td id="input">
								<input type="text" name="total_industry_exp" id="txtbox" onkeypress="return isNumber(event);" placeholder="Enter Total Industry Eperience." onclick="select()" value="<?php echo $row['industry_experience'];?>" style="width: 80%;" required /> Years
							</td>
						</tr>
						<!--tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Total Service Years:</font>
							</td>
							<td id="input">
								<input type="text" name="total_service_years" id="txtbox" placeholder="Enter Total Service Years." onclick="select()" value="<?php echo $row['total_service_years'];?>" required />
							</td>
						</tr-->
					</table>
					
					<br />	<br />
					
					<center>
						<input type="submit" name="academic_update" value="Update" id="submitbtn" onclick="return validate();" />
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

