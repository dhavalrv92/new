<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" />
		
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
					require_once "connect.php";
					$query = mysql_query("SELECT fac_name FROM rfid_info"); // Run your query
					
					if ( $_SESSION['role'] == "admin" )
					{
						echo '
							<center>
								<form action="retrieve_guest_lecture" method="POST">
									<table id="input_tbl">
										<tr id="input">
											<td id="input">
												<font id="header4"><font id="required" color="#FF0000">* </font>Faculty Name : </font>
											</td>
											<td id="input">
												<select name="faculty_name" required>
													<option value="all" selected="selected">All</option>
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
												<input type="submit" name="retrieve" value="Retrieve" />
											</td>
										</tr>
									</table>
								</form>
							</center>
							<br /><br /><br /><br />
						';
					}
					if ( isset($_POST['retrieve']) )
					{
						$submit = $_POST['retrieve'];
						if ( $submit )
						{
							$faculty_name = $_POST['faculty_name'];
							
							if ( $faculty_name == "all" )
							{
								$retrieve = "SELECT * FROM guest_lecture";
							}
							else
							{
								$retrieve = "SELECT * FROM guest_lecture WHERE faculty_name='$faculty_name'";
							}
							
							$result_retrieve = mysql_query($retrieve);
							$sr_no = 0;
							echo '
								<center>
									<table>
										<tr>
											<th style="border: 1px solid #000000; background-color: #FFFF00;">Sr. No.</th>
											<th style="border: 1px solid #000000; background-color: #FFFF00;">Speaker Name</th>
											<th style="border: 1px solid #000000; background-color: #FFFF00;">Faculty Name</th>
											<th style="border: 1px solid #000000; background-color: #FFFF00;">Date</th>
											<th style="border: 1px solid #000000; background-color: #FFFF00;">Topic/s</th>
										</tr>
							';
							while ( $row = mysql_fetch_assoc($result_retrieve) )
							{
								echo '
										<tr>
											<td align="center" style="border: 1px solid #000000;">' . ($sr_no + 1) . '</td>
											<td align="center" style="border: 1px solid #000000;">' . $row['speaker_name'] . '</td>
											<td align="center" style="border: 1px solid #000000;">' . $row['faculty_name'] . '</td>
											<td align="center" style="border: 1px solid #000000;">' . $row['date'] . '</td>
											<td align="center" style="border: 1px solid #000000;">' . $row['topic_name'] . '</td>
										</tr>
								';
								$sr_no = ($sr_no + 1);
							}
							
							echo '
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
											<td align="center" colspan="2">
												<form action="print_guest_lecture" method="POST" target="_blank">
													<input type="hidden" name="query" value="' . $retrieve . '" />
													<input type="submit" name="print" value="Print" />
												</form>
											</td>
										</tr>
									</table>
								</center>
							';
						}
					}
					
					else if ( $_SESSION['role'] == "faculty" )
					{
						$faculty_name = $_SESSION['fullname'];
						
						$retrieve = "SELECT * FROM guest_lecture WHERE faculty_name='$faculty_name'";
						$result_retrieve = mysql_query($retrieve);
						$sr_no = 0;
						echo '
							<center>
								<table>
									<tr>
										<th style="border: 1px solid #000000; background-color: #FFFF00;">Sr. No.</th>
										<th style="border: 1px solid #000000; background-color: #FFFF00;">Speaker Name</th>
										<th style="border: 1px solid #000000; background-color: #FFFF00;">Faculty Name</th>
										<th style="border: 1px solid #000000; background-color: #FFFF00;">Date</th>
									</tr>
						';
						while ( $row = mysql_fetch_assoc($result_retrieve) )
						{
							echo '
									<tr>
										<td align="center" style="border: 1px solid #000000;">' . ($sr_no + 1) . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['speaker_name'] . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['faculty_name'] . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['date'] . '</td>
									</tr>
							';
							$sr_no = ($sr_no + 1);
						}
						echo '
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
										<td align="center" colspan="2">
											<form action="print_guest_lecture" method="POST" target="_blank">
												<input type="hidden" name="query" value="' . $retrieve . '" />
												<input type="submit" name="print" value="Print" />
												&nbsp;&nbsp;&nbsp;&nbsp;
						';
				?>
												<input type="button" name="edit_guest_lecture" value="Edit Details" onclick="location.href='edit_guest_lecture'" />
				<?php
						echo '
											</form>
										</td>
									</tr>
								</table>
							</center>
						';
					}
				?>
			
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