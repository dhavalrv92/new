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

	if (isset($_POST['update']))
	{
		$submit = $_POST['update'];
		if ($submit)
		{
			require_once "connect.php";
			mysql_select_db("kjscomp_proctor") or die(mysql_error());
			
			$student_id = $_POST['student_id'];
			$year = $_POST['year'];
			$problems = $_POST['problems'];
			$warnings = $_POST['warnings'];
			$actions = $_POST['actions'];
			
			$test_query = "SELECT * FROM kjscomp_proctor.proctor_problems_$year WHERE student_id='$student_id' AND faculty_name='$faculty_name'";
			$test_result = mysql_query($test_query) or die(mysql_error());
			$count = mysql_num_rows($test_result);
			if ( $count == 0 )
			{
				echo '
					<script type="text/javascript">
						alert ("* Either Student ID does not Exist or You are Not a Proctor of this Student!");
						window.location.href = "proctor_problems";
					</script>
				';
			}
			else
			{
				$query = "UPDATE kjscomp_proctor.proctor_problems_$year SET problems='$problems',warnings='$warnings',actions='$actions' WHERE student_id='$student_id' AND faculty_name='$faculty_name'";		
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
						</h4>
					</center>
				</div>
				
				<form onsubmit="return (validate());" action="proctor_problems" method="POST">
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
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Major Problems : </font>
							</td>
							<td id="input">
								<textarea rows="5" cols="50" style="resize:none" name="problems" required></textarea>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Warnings Issued : </font>
							</td>
							<td id="input">
								<textarea rows="5" cols="50" style="resize:none" name="warnings" required></textarea>
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Disciplinary Actions Taken : </font>
							</td>
							<td id="input">
								<textarea rows="5" cols="50" style="resize:none" name="actions" required></textarea>
							</td>
						</tr>
					</table>
					
					<br />	<br />
					
					<center>
						<input type="submit" name="update" value="Update" />
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