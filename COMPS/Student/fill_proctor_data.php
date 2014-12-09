<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query = "SELECT curr_year,course,faculty_name FROM student_personal WHERE reg_no='$reg_no'";
		$result = mysql_query($query) or die (mysql_error());
		$row = mysql_fetch_assoc($result) or die (mysql_error());
	}
	else
	{
		header ("location: student_login");	
	}
?>
<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_POST['insert']))
	{
		$submit = $_POST['insert'];
		if ($submit)
		{
			$year = $_POST['curr_year'];
			$course = $_POST['course'];
			$faculty_name = $_POST['faculty_name'];
			
			require "connect.php";
			//mysql_select_db("kjscomp_student") or die(mysql_error());
			$query = "UPDATE student_personal SET course='$course' WHERE reg_no='$reg_no'";
			$result = mysql_query($query) or die(mysql_error());
			
			mysql_select_db("kjscomp_proctor") or die(mysql_error());
			/*$query1 = "UPDATE proctor_grade_$year SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result1 = mysql_query($query1) or die(mysql_error());
			$query2 = "UPDATE proctor_problems_$year SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result2 = mysql_query($query2) or die(mysql_error());*/
			
			if ( $year == "fe" )
			{
				if ( $course == "Revised" )
				{
					$sem1_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_I (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem2_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_II (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem1_result = mysql_query($sem1_query) or die(mysql_error());
					$sem2_result = mysql_query($sem2_query) or die(mysql_error());
				}
				else if ( $course == "New" )
				{
					$sem1_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_I (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem2_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_II (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem1_result = mysql_query($sem1_query) or die(mysql_error());
					$sem2_result = mysql_query($sem2_query) or die(mysql_error());
				}
			}
			else if ( $year == "se" )
			{
				if ( $course == "Revised" )
				{
					$sem3_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_III (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem4_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_IV (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem3_result = mysql_query($sem3_query) or die(mysql_error());
					$sem4_result = mysql_query($sem4_query) or die(mysql_error());
				}
				else if ( $course == "New" )
				{
					$sem3_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_III (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem4_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_IV (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem3_result = mysql_query($sem3_query) or die(mysql_error());
					$sem4_result = mysql_query($sem4_query) or die(mysql_error());
				}
			}
			else if ( $year == "te" )
			{
				if ( $course == "Revised" )
				{
					$sem5_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_V (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem6_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_VI (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem5_result = mysql_query($sem5_query) or die(mysql_error());
					$sem6_result = mysql_query($sem6_query) or die(mysql_error());
				}
				else if ( $course == "New" )
				{
					$sem5_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_V (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem6_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_VI (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem5_result = mysql_query($sem5_query) or die(mysql_error());
					$sem6_result = mysql_query($sem6_query) or die(mysql_error());
				}
			}
			else if ( $year == "be" )
			{
				if ( $course == "Revised" )
				{
					$sem7_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_VII (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem8_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_VIII (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem7_result = mysql_query($sem7_query) or die(mysql_error());
					$sem8_result = mysql_query($sem8_query) or die(mysql_error());
				}
				else if ( $course == "New" )
				{
					$sem7_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_VII (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem8_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_VIII (student_id,faculty_name) VALUES ('$reg_no','$faculty_name')";
					$sem7_result = mysql_query($sem7_query) or die(mysql_error());
					$sem8_result = mysql_query($sem8_query) or die(mysql_error());
				}
			}
			
			echo '
				<script type=text/javascript>
					alert ("* Data Updated Successfully!");
					window.location = "fill_proctor_data";
				</script>
			';
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<style type="text/css">
			/*body {
				width: 100%;
				Height: 100%;
				background-image: url('../Images/Stock_Background.png');
				/*background-repeat: no-repeat;
				background-attachment:fixed;
				background-position:center;*/
			/*}
			.main_body {
				/*width: 200px;
				position: absolute;
				background-image: url('../Images/Stock_Background.png');*/
				/*background-color: #787878;
				border: 0px solid red;
				display: inline-block;
			}*/
			th {
				min-width: 192px;
				/*border: 1px solid #FF0000;*/
			}
		</style>
		<script type="text/javascript">
			function validate()
			{
			 	if( document.student_detail.course.value == "" || document.student_detail.course.value == "default" )
				{
					document.getElementById("course_error").style.display="";
					document.student_detail.course.focus();
					return false;
				}
				else
					document.getElementById("course_error").style.display="none";
				
				if( document.student_detail.faculty_name.value == "" || document.student_detail.faculty_name.value == "default" )
				{
					document.getElementById("faculty_nameerror").style.display="";
					document.student_detail.faculty_name.focus();
					return false;
				}
				else
					document.getElementById("faculty_nameerror").style.display="none";
				
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
				<center>
					<div id="faculty_nameerror" style="color: #FF0000; display: none">
						* Plase Select Faculty Name! 
					</div>
					<div id="course_error" style="color: #FF0000; display: none">
						* Plase Select your Course Type! 
					</div>
					<div style="color: #FF0000;">
						* All Fields are Mandetory! 
					</div>
					<form onsubmit="return(validate());" name="student_detail" action="fill_proctor_data" method="POST">
						<table cellpadding="2" cellspacing="2">
							<tr>
								<th><font style="color: #FF0000;">* </font>Year : </th>
								<td>
									<select name="curr_year" required>
										<option value="<?php echo strtolower($row['curr_year']) ?>" selected="selected"><?php echo $row['curr_year'] ?></option> 
										<option value="default">Select the Year</option>
										<option value="fe">First Year</option>
										<option value="se">Second Year</option>
										<option value="te">Third Year</option>
										<option value="be">Final Year</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Course : </th>
								<td>
									<select name="course" required>
										<option value="<?php echo $row['course'] ?>" selected="selected"><?php echo $row['course'] ?></option>
										<option value="default">Select the Course</option>
										<option value="Revised">Revised</option>
										<option value="New">New</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Proctor Faculty Name : </th>
								<td>
									<?php
										require "../connect.php";
										$query = mysql_query("SELECT fac_name FROM rfid_info"); // Run your query
										echo '
											<select name="faculty_name" id="drpdwnlst_facname" required>
												<option value="' . $row['faculty_name'] . '" selected="selected">' .$row['faculty_name'] . '</option>
												<option name="defaultname" width="100%" value="default">Select Faculty Name</option>
										';
											// Loop through the query results, outputing the options one by one
										while ($row = mysql_fetch_assoc($query))
										{
											echo '
												<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
											';
										}
										echo '
											</select>
										';// Close your drop down box
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2"  align="center">
									<input type="submit" name="insert" value="Update" />
								</td>
							</tr>
						</table>
					</form>
				</center>
			</div>
			
			<div id="rightmargin">
				<?php include "rightmargin.php"; ?>
			</div>
		
		</div>
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>