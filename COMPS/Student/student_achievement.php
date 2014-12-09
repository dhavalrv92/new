<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query1 = "SELECT course FROM student_personal WHERE reg_no='$reg_no'";
		$result1 = mysql_query($query1) or die (mysql_error());
		$row1 = mysql_fetch_assoc($result1) or die (mysql_error());
		if ( empty($row1['course']) )
		{
			header("location: student_personal");
		}
	}
	else
	{
		header ("location: student_login");	
	}
?>
<?php
	if ( isset($_POST['insert']) )
	{
		$submit = $_POST['insert'];
		if ( $submit )
		{
			$student_id = $_SESSION['id'];
			$activity_type = $_POST['activity_type'];
			$event_date = $_POST['event_date'];
			if ( empty($title) )
			{
				$title = "NA";
			}
			else
			{
				$title = strtoupper($_POST['title']);
			}
			$place = strtoupper($_POST['place']);
			$achievement = $_POST['achievement'];
			$description = strtoupper($_POST['description']);
			$semester = $_POST['semester'];
			
			require_once "connect.php";
			
			$query2 = "INSERT INTO student_achievement (student_id,activity_type,event_date,title,place,achievement,description,semester) VALUES ('$student_id','$activity_type','$event_date','$title','$place','$achievement','$description','$semester')";
			$result2 = mysql_query($query2) or die (mysql_error());
			
			if ( !mysql_error() )
			{
				echo '
					<script type="text/javascript">
						alert ("Data Updated Successfully");
						window.location.href = "student_achievement";
					</script>
				';
			}
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<script type="text/javascript">
			function text_enable(val)
			{
				var value = val;
				if ( value == "Seminar" || value == "TPP" || value == "Project Showcase" || value == "Conference" )
				{
					document.getElementById("title").disabled = false;
					return true;
				}
				else
				{
					document.getElementById("title").disabled = true;
					return false;
				}
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
			
			<div id="gap"></div>
			
			<div id="middle">
				<center>
					<div id="sem_error" style="color: #FF0000; display: none;">
						<h4 style="color: #FF0000;">
							* Please select the Semester! 
						</h4>
					</div>
				</center>
				
				<form name="student_achievement" action="student_achievement" method="POST">
					<center>
						<table style="text-align: center">
							<tr>
								<th><font style="color: #FF0000;">* </font>Activity Type : </th>
								<td>
									<select name="activity_type" required onchange="text_enable(this.value);">
										<option name="" value="">Select Activity Type</option>
										<option name="seminar" value="Seminar">Seminar</option>
										<option name="tpp" value="TPP">TPP</option>
										<option name="project_showcase" value="Project Showcase">Project Showcase</option>
										<option name="conference" value="Conference">Conference</option>
										<option name="cultural_event" value="Cultural Event">Cultural Event</option>
										<option name="sports_event" value="Sports Event">Sports Event</option>
										<option name="other" value="Other">Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Date of Event : </th>
								<?php
									$date = date('Y-m-d');
									$tomorrow = date('Y-m-d',strtotime($date . "+1 days"));
								?>
								<td>
									<input type="text" max="<?php echo $date; ?>" onfocus="(this.type='date')" placeholder="Select the Date of Event" name="event_date" onclick="select();" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Title : </th>
								<td>
									<input type="text" id="title" name="title" placeholder="Enter the Title" onclick="select();" disabled required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Place : </th>
								<td>
									<input type="text" name="place" placeholder="Enter the Place" onclick="select();" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Achievement Type : </th>
								<td>
									<select name="achievement" required>
										<option name="" value="">Select Achievement Type</option>
										<option name="winner" value="Winner">Winner</option>
										<option name="participant" value="Participant">Participant</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Description : </th>
								<td>
									<textarea rows="10" cols="35" name="description" size="50" style="resize: none;" onclick="select();" placeholder="Enter Description of your Achievement" required></textarea>
								</td>
							</tr>							
							<tr>
								<th><font style="color: #FF0000;">* </font>Semester : </th>
								<td>
									<select name="semester" required>
										<option name="" value="">Select the Semester</option>
										<?php
											if ( $row1['admission_year'] == "FE" )
											{
												echo '
													<option name="sem_I" value="Sem I">Sem I</option>
													<option name="sem_II" value="Sem II">Sem II</option>
												';
											}
										?>
										<option name="sem_III" value="Sem III">Sem III</option>
										<option name="sem_IV" value="Sem IV">Sem IV</option>
										<option name="sem_V" value="Sem V">Sem V</option>
										<option name="sem_VI" value="Sem VI">Sem VI</option>
										<option name="sem_VII" value="Sem VII">Sem VII</option>
										<option name="sem_VIII" value="Sem VIII">Sem VIII</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<br /><br />
								</td>
							</tr>
							<tr>
								<td colspan="3" align="center">
									<input type="submit" value="Insert" name="insert" />
								</td>
							</tr>
						</table>
					</center>
				</form>
			
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>