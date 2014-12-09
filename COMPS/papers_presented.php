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
	if (isset($_POST['paper_presentation']))
	{
		$submit = $_POST['paper_presentation'];
		if ($submit)
		{
			$id = $_SESSION['sid'];
			$date = $_POST['date'];
			$title = $_POST['title'];
			$place = $_POST['place'];
			
			require_once "connect.php";
			
			$query = "INSERT INTO papers_presented VALUES ('$id','$date','$title','$place')";
			
			$result = mysql_query($query) or die(mysql_error());
			
			if (!mysql_error())
			{
				echo '
					<script type="text/javascript">
						alert ("* Data Updated Successfully!");
						window.location.href = "papers_presented";
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
				<form name="paper_present" action="papers_presented" method="POST">
					<table id="input_tbl">
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Date:</font>
							</td>
							<td id="input">
								<input type="date" name="date" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Title:</font>
							</td>
							<td id="input">
								<input type="text" name="title" id="txtbox" placeholder="Enter Title of Paper Presented" required />
							</td>
						</tr>
						<tr id="input">
							<td id="input">
								<font id="header4"><font id="required">* </font>Place:</font>
							</td>
							<td id="input">
								<input type="text" name="place" id="txtbox" placeholder="Enter Place of Paper Presented" required />
							</td>
						</tr>
					</table>
					<br /><br />
					<center>
						<input type="submit" name="paper_presentation" value="Update" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="edit_paper_present" value="Edit Details" onclick="location.href='paper_presented_edit'" />
					</center>
				</form>
			</div>
			
			<div id="rightmargin">
				<?php include "rightmargin.php"; ?>
			</div>
		
		</div>
		<br /><br />
		<?php
			include "footer.html";
		?>
	</body>
</html>