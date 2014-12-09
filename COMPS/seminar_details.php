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
	if (!isset($_SESSION))
		session_start();
	if (isset($_POST['seminar_attended']))
	{
		$submit = $_POST['seminar_attended'];
		if ($submit)
		{
			$id = $_SESSION['sid'];
			$date_from = $_POST['date_from'];
			$date_to = $_POST['date_to'];
			$name = $_POST['name'];
			$place = $_POST['place'];						
			$seminar_nature = $_POST['seminar_nature'];

			require_once "connect.php";
			
			$query = "INSERT INTO seminars (id,date_from,date_to,name,place,seminar_nature) VALUES ('$id','$date_from','$date_to','$name','$place','$seminar_nature')";
			
			$result = mysql_query($query) or die(mysql_error());
			
			if (!mysql_error())
			{
				echo '
					<script type="text/javascript">
						alert ("* Data Updated Successfully!");
						window.location.href = "seminar_details";
					</script>
				';
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
			 	if(document.seminar_detail.seminar_nature.value == "default")
				{
					document.getElementById("seminar_nature_error").style.display="";
					document.seminar_detail.seminar_nature.focus() ;
					return false;
				}
				else
					document.getElementById("seminar_nature_error").style.display="none";
				
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
			
				<div id="seminar_nature_error" style="color: #FF0000; display: none">
					* Please Select type of Seminar!
				</div>
				<form onsubmit="return(validate());" action="seminar_details" method="POST" name="seminar_detail">
					<table id="input_tbl">
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Date From : </font>
							</td>
							<td id="input">
								<input type="text" name="date_from" placeholder="Enter the Start Date" onfocus="(this.type='date')" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Date To : </font>
							</td>
							<td id="input">
								<input type="text" name="date_to" placeholder="Enter the End Date" onfocus="(this.type='date')" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Seminar Name : </font>
							</td>
							<td id="input">
								<input type="text" name="name" id="txtbox" placeholder="Enter Name of Seminar" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Place : </font>
							</td>
							<td id="input">
								<input type="text" name="place" id="txtbox" placeholder="Enter Place of Seminar" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Given/Attended : </font>
							</td>
							<td id="input">
								<select name="seminar_nature">
									<option value="default">Select Seminar type</option>
									<option value="Given">Given</option>
									<option value="Attended">Attended</option>
								</select>
							</td>
						</tr>
					</table>
					<br />	<br />
					<center>
						<input type="submit" name="seminar_attended" value="Update" id="submitbtn" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="edit_seminar_details" value="Edit Details" onclick="location.href='edit_seminar_details'" />
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
