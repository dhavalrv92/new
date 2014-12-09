<?php
	if ( !isset($_SESSION) )
		session_start();
	if ( isset($_SESSION['role']) )
	{
		if ( $_SESSION['role'] == "faculty" )
		{
			if ( isset ($_SESSION['sid']) )
			{
				if ( isset ($_SESSION['fullname']) )
					$faculty_name = $_SESSION['fullname'];
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
	}
	else
	{
		header("location: index");
	}
?>
<?php

	if (isset($_POST['save']))
	{
		$submit = $_POST['save'];
		if ($submit)
		{
			require_once "connect.php";
			mysql_select_db("kjscomp_proctor") or die(mysql_error());
			
			$student_id = $_POST['student_id'];
			$year = $_POST['year'];
			$discipline = $_POST['discipline'];
			$comm_skill = $_POST['comm_skill'];
			$grooming = $_POST['grooming'];
			$co_curricular = $_POST['co_curricular'];
			$extra_curricular = $_POST['extra_curricular'];
			$responsibility = $_POST['responsibility'];
			$punctuality = $_POST['punctuality'];
			$behaviour = $_POST['behaviour'];
			$overall_grading = $_POST['overall_grading'];
			
			$test_query = "SELECT * FROM kjscomp_proctor.proctor_grade_$year WHERE student_id='$student_id' AND faculty_name='$faculty_name'";
			$test_result = mysql_query($test_query) or die(mysql_error());
			$count = mysql_num_rows($test_result);
			if ( $count == 0 )
			{
				echo '
					<script type="text/javascript">
						alert ("* Either Student ID does not Exist or You are Not a Proctor of this Student!");
						window.location.href = "proctor_grade";
					</script>
				';
			}
			else
			{
				$query = "UPDATE kjscomp_proctor.proctor_grade_$year SET discipline='$discipline',comm_skill='$comm_skill',grooming='$grooming',co_curricular='$co_curricular',extra_curricular='$extra_curricular',responsibility='$responsibility',punctuality='$punctuality',behaviour='$behaviour',overall_grading='$overall_grading' WHERE student_id='$student_id' AND faculty_name='$faculty_name'";		
				$result = mysql_query($query) or die(mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Updated Successfully!");
							window.location.href = "proctor_grade";
						</script>
					';
				}
			}
		}
	}
	else if ( isset($_POST['continue']) )
	{
		$continue = $_POST['continue'];
		if ($continue)
		{
			require_once "connect.php";
			mysql_select_db("kjscomp_proctor") or die(mysql_error());
			
			$student_id = $_POST['student_id'];
			$year = $_POST['year'];
			$discipline = $_POST['discipline'];
			$comm_skill = $_POST['comm_skill'];
			$grooming = $_POST['grooming'];
			$co_curricular = $_POST['co_curricular'];
			$extra_curricular = $_POST['extra_curricular'];
			$responsibility = $_POST['responsibility'];
			$punctuality = $_POST['punctuality'];
			$behaviour = $_POST['behaviour'];
			$overall_grading = $_POST['overall_grading'];
			
			$test_query = "SELECT * FROM kjscomp_proctor.proctor_grade_$year WHERE student_id='$student_id' AND faculty_name='$faculty_name'";
			$test_result = mysql_query($test_query) or die(mysql_error());
			$count = mysql_num_rows($test_result);
			if ( $count == 0 )
			{
				echo '
					<script type="text/javascript">
						alert ("* Either Student ID does not Exist or You are Not a Proctor of this Student!");
						window.location.href = "proctor_grade";
					</script>
				';
			}
			else
			{
				$query = "UPDATE kjscomp_proctor.proctor_grade_$year SET discipline='$discipline',comm_skill='$comm_skill',grooming='$grooming',co_curricular='$co_curricular',extra_curricular='$extra_curricular',responsibility='$responsibility',punctuality='$punctuality',behaviour='$behaviour',overall_grading='$overall_grading' WHERE student_id='$student_id' AND faculty_name='$faculty_name'";		
				$result = mysql_query($query) or die(mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Updated Successfully!");
							window.location.href = "proctor_problems";
						</script>
					';
				}
			}
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
				if ( document.proctor_grade.year.value == "default" )
				{
					document.getElementById("year_error").style.display = "";
					document.proctor_grade.year.focus();
					return false;
				}
				else
					document.getElementById("year_error").style.display = "none";
				
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
				
				<div>
					<center>
						<h4 id="required">
							* Please Fill All the Fields!
							<br />
							* All the Grades should be between 1 to 5!
						</h4>
						<div id="year_error" style="color: #FF0000; display: none">
							* Please Select the Year!
						</div>
						* <strong>5</strong>: Excellent, <strong>4</strong>: Very Good, <strong>3</strong>: Needs to Improve, <strong>2</strong>: Needs Counselling, <strong>1</strong>: Needs to be Warned, <strong>0</strong>: NA
						<br /><hr /><br />
					</center>
				</div>
				
				<form onsubmit="return (validate());" name="proctor_grade" action="proctor_grade" method="POST">
					<table id="input_tbl">
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Student ID : </font>
							</td>
							<td id="input">
								<input type="number" name="student_id" required \>		
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Year : </font>
							</td>
							<td id="input">
								<select name="year" required>
									<option value="default">Please Select the Year</option>
									<option value="fe">First Year</option>
									<option value="se">Second Year</option>
									<option value="te">Third Year</option>
									<option value="be">Final Year</option>
								</select>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>General Discipline : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="discipline" required min="0" max="5" \>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Communicative Skill : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="comm_skill" required min="0" max="5" \>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>General Grooming : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="grooming" required min="0" max="5" \>			
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Response to Co-Curricular Activities : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="co_curricular" required min="0" max="5" \>			
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Response to Extra-Curricular Activity : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="extra_curricular" required min="0" max="5" \>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Community Responsibility : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="responsibility" required min="0" max="5" \>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Punctuality in Classes : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="punctuality" required min="0" max="10" \>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Behaviour towards Faculty : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="behaviour" required min="0" max="5" \>
							</td>
						</tr>
						<tr id="input" >
							<td id="input" >
								<font id="header4"><font id="required">* </font>Overall Grading : </font>
							</td>
							<td id="input">
								<input type="number" size="50%" name="overall_grading" required min="0" max="5" \>
							</td>
						</tr>
					</table>
					
					<br />	<br />
					
					<center>
						<input type="submit" name="save" value="Save" />
						<input type="submit" name="continue" value="Save and Continue" />
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