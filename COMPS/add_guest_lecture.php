<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && (isset($_SESSION['role']))=="faculty" )
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
	if ( isset($_POST['insert']) )
	{
		$submit = $_POST['insert'];
		if ( $submit )
		{
			$faculty_name = $_SESSION['fullname'];
			$speaker_name = $_POST['speaker_name'];
			$date = $_POST['date'];
			
			require_once "connect.php";
			$query = "INSERT INTO guest_lecture (faculty_name,speaker_name,date,topic_name) VALUES ('$faculty_name','$speaker_name','$date','$topic_name')";
			$result = mysql_query($query);
			if ( !mysql_error() )
			{
				echo '
					<script type="text/javascript">
						alert ("* Data Inserted Successfully!");
					</script>
				';
			}
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
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
					<form action="add_guest_lecture" method="POST">
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Speaker Name : </font>
								</td>
								<td id="input">
									<input type="text" name="speaker_name" placeholder="Enter Name of Speaker" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Date : </font>
								</td>
								<td id="input">
									<?php
										$date = date('Y-m-d');
									?>
									<input type="date" name="date" min="2001-01-01" max="<?php echo $date; ?>" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Topic Name : </font>
								</td>
								<td id="input">
									<input type="text" name="topic_name" placeholder="Enter Name of Topic/s (Separated by Comma)" required />
								</td>
							</tr>
							<tr>
								<td>
									<br />
								</td>
							</tr>
							<tr>
								<td>
									<br />
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="submit" name="insert" value="Insert" />
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
		<br />
		<br />
		<?php
			include "footer.html";
		?>
	</body>
	
</html>