<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		if (isset($_SESSION['id']))
			$id = $_SESSION['id'];
		else
			$id = 0;
		
		$query = "SELECT * FROM student_alumni_data WHERE student_id='$id'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
	}
	else
	{
		header ("location: student_login");	
	}
?>
<?php

	if (isset($_POST['student_alumni']))
	{
		$submit = $_POST['student_alumni'];
		
		if ($submit)
		{
			if (!isset($_SESSION))
				session_start();
			if (isset($_SESSION['id']))
				$id = $_SESSION['id'];
			else
				$id = 0;
			
			$passing_year = $_POST['passing_year'];
			$employed = $_POST['employed'];
			$placed = $_POST['placed'];
			$company_name = $_POST['company_name'];
			$pursuing_higher_study = $_POST['pursuing_higher_study'];
			if ($pursuing_higher_study == "No")
				$higher_study = "NA";
			else
				$higher_study = $_POST['higher_study'];
			$higher_study_score = $_POST['higher_study_score'];
			$preparing_higher_study = $_POST['preparing_higher_study'];
			$address = $_POST['address'];
			$employer = $_POST['employer'];
			$improvement = $_POST['improvement'];
			$fees = $_POST['fees'];
			$other_comment = $_POST['other_comment'];
			$contribution = $_POST['contribution'];			
			require_once "connect.php";
			
			
			$query = "UPDATE student_alumni_data SET passing_year='$passing_year',employed='$employed',placed='$placed',company_name='$company_name',pursuing_higher_study='$pursuing_higher_study',higher_study='$higher_study',higher_study_score='$higher_study_score',preparing_higher_study='$preparing_higher_study',address='$address',employer='$employer',improvement='$improvement',fees='$fees',other_comment='$other_comment',contribution='$contribution' WHERE student_id= '$id'";
			$result = mysql_query($query) or die(mysql_error());
			
			if (!mysql_error())
			{
				echo '
					<script type="text/javascript">
						alert ("* Data Updated Successfully!");
						window.location.href = "fill_alumni_data";
					</script>
				';
			}
			else
			{
				echo mysql_error();
			}
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/report_topic_style.css" />
		
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

			
			function company_show() 
			{
				if (document.student_alumni.placed.value =="Yes" ) 
				{
					document.getElementById('company_name').readOnly=false;
					document.getElementById('company_name').setAttribute("required",true);
					document.getElementById('company_name').setAttribute("value","");
				}
				else 
				{
					document.getElementById('company_name').setAttribute("value","NA");
				}
			}
			function higher_study_show()
			{
				if (document.student_alumni.pursuing_higher_study.value =="Yes") 
				{
					document.getElementById('higher_study').readOnly=false;
					document.getElementById('higher_study').setAttribute("required",true);
				}
				else
				{
					document.getElementById('higher_study').readOnly=true;
				}
			}
			function validate()
			{
				if ( (document.student_alumni.passing_year.value == "") || (document.student_alumni.passing_year.value == "default") )
				{
					document.getElementById("passing_year_error").style.display = "";
					document.student_alumni.passing_year.focus();
					return false;
				}
				else
					document.getElementById("passing_year_error").style.display = "none";
				
				if ( (document.student_alumni.employed.value == "") || (document.student_alumni.employed.value == "default") )
				{
					document.getElementById("employed_error").style.display = "";
					document.student_alumni.employed.focus();
					return false;
				}
				else
					document.getElementById("employed_error").style.display = "none";
				
				if ( (document.student_alumni.placed.value == "") || (document.student_alumni.placed.value == "default") )
				{
					document.getElementById("placed_error").style.display = "";
					document.student_alumni.placed.focus();
					return false;
				}
				else
					document.getElementById("placed_error").style.display = "none";
				
				if ( (document.student_alumni.pursuing_higher_study.value == "") || (document.student_alumni.placed.pursuing_higher_study == "default") )
				{
					document.getElementById("pursuing_higher_study_error").style.display = "";
					document.student_alumni.pursuing_higher_study.focus();
					return false;
				}
				else
					document.getElementById("pursuing_higher_study_error").style.display = "none";
				
				if ( (document.student_alumni.preparing_higher_study.value == "") || (document.student_alumni.preparing_higher_study.value == "default") )
				{
					document.getElementById("preparing_higher_study_error").style.display = "";
					document.student_alumni.preparing_higher_study.focus();
					return false;
				}
				else
					document.getElementById("preparing_higher_study_error").style.display = "none";
				
				if ( (document.student_alumni.employer.value == "") || (document.student_alumni.employer.value == "default") )
				{
					document.getElementById("employer_error").style.display = "";
					document.student_alumni.employer.focus();
					return false;
				}
				else
					document.getElementById("employer_error").style.display = "none";
				
				if ( (document.student_alumni.improvement.value == "") || (document.student_alumni.improvement.value == "default") )
				{
					document.getElementById("improvement_error").style.display = "";
					document.student_alumni.improvement.focus();
					return false;
				}
				else
					document.getElementById("improvement_error").style.display = "none";
				
				return true;
			}
		</script>
		
		<style type="text/css">
			select, input {
				width: 100%;
			}
		</style>
		
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
				<center>
					<div style="color: #FF0000;">
						* All Fields are Mandetory! 
					</div>
					<div style="color: #FF0000;">
						* Write NA Wherever Necessary! 
					</div>
					<div id="passing_year_error" style="display: none;color: #FF0000;">
						* Please Select Passing Year! 
					</div>
					<div id="employed_error" style="display: none;color: #FF0000;">
						* Please Select Employment Status! 
					</div>
					<div id="placed_error" style="display: none;color: #FF0000;">
						* Please Select Whether you were Placed from Campus or Not! 
					</div>
					<div id="pursuing_higher_study_error" style="display: none;color: #FF0000;">
						* Please Select Whether you are Pursuing Higher Study or Not! 
					</div>
					<div id="preparing_higher_study_error" style="display: none;color: #FF0000;">
						* Please Select Whether you are Preparing for Higher Studies or Not!
					</div>
					<div id="employer_error" style="display: none;color: #FF0000;">
						* Please Select Whether to send Details to Employer or Not! 
					</div>
					<div id="improvement_error" style="display: none;color: #FF0000;">
						* Please Select Whether Almamater has the Potential to Improve or Not! 
					</div>
					
					<form onsubmit="return(validate());" name="student_alumni" action="fill_alumni_data" method="POST">
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Passing Year : </font>
								</td>
								<td id="input">
									<select name="passing_year" required>
										<option value="<?php echo $row['passing_year'] ?>" selected><?php echo $row['passing_year'] ?></option>
										<?php 
											echo '<option value="default">Please Select Passing Year</option>';
											for($i=2000; $i<=2030; $i++)
											{
												echo "<option value=".$i.">".$i."</option>";
											}
										?>   
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Are you Presently Employed? : </font>
								</td>
								<td id="input">
									
									<select name="employed" required>
										<option value="<?php echo $row['employed'] ?>" selected><?php echo $row['employed'] ?></option>
										<option value="default">Please Select current Employment Status</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Were you Placed through College? : </font>
								</td>
								<td id="input">
									<select name="placed" onchange='company_show()' required>
										<option value="<?php echo $row['placed'] ?>" selected><?php echo $row['placed'] ?></option>
										<option value="default">Please Select Placement Status</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4">Name of the Company : </font>
								</td>
								<td id="input">
									<input type="text" id="company_name" name="company_name" readonly value="<?php echo $row['company_name'] ?>" required />			
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Are you Pursuing Higher Studies? : </font>
								</td>
								<td id="input">
									<select name="pursuing_higher_study" onchange='higher_study_show()' required>
										<option value="<?php echo $row['pursuing_higher_study'] ?>" selected><?php echo $row['pursuing_higher_study'] ?></option>
										<option value="default">Please Select Higher Studies Status</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input" >
								<td id="input" >
									<font id="header4">Give details of current Pursuing Course : </font>
								</td>
								<td id="input">
									<textarea rows="5" cols="40" style="resize:none;" readonly id="higher_study" name="higher_study" required><?php echo $row['higher_study'] ?></textarea>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input" >
								<td id="input" >
									<font id="header4"><font id="required">* </font>Your CAT/GATE/Other Exam Score/Rank (if any) : </font>
								</td>
								<td id="input">
									<input type="text" name="higher_study_score" value="<?php echo $row['higher_study_score'] ?>" required />			
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input" >
								<td id="input" >
									<font id="header4"><font id="required">* </font>Are you Preparing for any of Above/Doing Other Course? : </font>
								</td>
								<td id="input">
									<select name="preparing_higher_study" >
										<option value="<?php echo $row['preparing_higher_study'] ?>" selected><?php echo $row['preparing_higher_study'] ?></option>
										<option value="default">Please Select Course Details</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>								
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Your Complete Postal Address : </font>
								</td>
								<td id="input">
									<textarea rows="5" cols="40" style="resize:none" name="address" required ><?php echo $row['address'] ?></textarea>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Can we Send your Details to Potential Employers : </font>
								</td>
								<td id="input">
									<select name="employer" required>
										<option value="<?php echo $row['employer'] ?>" selected><?php echo $row['employer'] ?></option>
										<option value="default">Please Select</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Do you think Almamater has the Potential to Improve? : </font>
								</td>
								<td id="input">
									<select name="improvement" required>
										<option value="<?php echo $row['improvement'] ?>" selected><?php echo $row['improvement'] ?></option>
										<option value="default">Please Select</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Do you think Alumni Association Fees (Currently Rs.400 for life membership) is Adequate? If Not, How Much should it be? : </font>
								</td>
								<td id="input">
									<textarea rows="5" cols="40" style="resize:none" name="fees" required><?php echo $row['fees'] ?></textarea>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Any other Comments you Wish to Make : </font>
								</td>
								<td id="input">
									<textarea rows="5" cols="40" style="resize:none" name="other_comment" required><?php echo $row['other_comment'] ?></textarea>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>How do you Think you AS ALUMNI could Contribute to the College Resources and Strengthen it to become a Global Institution:</font>
								</td>
								<td id="input">
									<textarea rows="5" cols="40" style="resize:none" name="contribution" required><?php echo $row['contribution'] ?></textarea>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<br />
								</td>
								<td id="input">
									<br />
								</td>
							</tr>
						</table>
						<br />	<br />
						<center>
							<input type="submit" name="student_alumni" value="Update" style="width: 20%" />
						</center>
					</form>
				</center>
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