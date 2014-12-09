<?php
	if (!isset($_SESSION))
		session_start();
	
	if ( isset($_SESSION['assistant']) )
	{
	}
	else
	{
		header ("location: assistant_login");
	}
?>
<?php
	if (isset($_POST['update']))
	{
		$update = $_POST['update'];
		if ($update)
		{
			$lab_no = $_POST['lab'];
			if ($lab_no == '')
			{
				header ("location: amc_new");
			}
			else
			{
				$lab = $_POST['lab'];
				$id_no = $_POST['id_no'];
				$date = $_POST['date'];
				$nature_of_problem = $_POST['nature_of_problem'];
				$corrective_action_taken = $_POST['corrective_action_taken'];
				$repair_cost = $_POST['repair_cost'];
				
				require_once ("connect.php");
				mysql_select_db("kjscomp_stock") or die (mysql_error());
				
				$query = "UPDATE equipment_history SET date='$date',nature_of_problem='$nature_of_problem',corrective_action_taken='$corrective_action_taken',repair_cost='$repair_cost' WHERE lab='$lab' AND id_no='$id_no'";
				$result = mysql_query($query) or die(mysql_error());
				
				echo '
					<script type="text/javascript">
						alert ("* Data Updated Successfully!");
						window.location.href = "lab_equipment_history";
					</script>
				';
			}
		}
	}
	if (isset($_POST['back']))
	{
		header ("location: lab_equipment_history");
	}
	
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/report_topic_style.css" />
		
		<style type="text/css">
			body {
				background-image: url('../Images/Stock_Background.png');
			}
			/*#middle {
				width: 60%;
				min-width: 50%;
				max-width: 60%;
				text-align: center;
				overflow: hidden;
			}*/
			form input,textarea, select {
				width: 90%;
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
				<?php
					if (isset($_GET['lab_no']))
						$lab_no = $_GET['lab_no'];
					
					require_once ("connect.php");
					mysql_select_db("kjscomp_stock") or die (mysql_error());
					
					$query = "SELECT * FROM equipment_history WHERE lab='$lab_no'";
					$result = mysql_query($query)or die (mysql_error());
					$count = mysql_num_rows($result);
					if ( $count == 0 )
					{
						echo '
							<script type="text/javascript">
								alert("* No Equipment Exist for Selected Lab!\n* Please Add Equipment First!");
								window.location.href = "lab_equipment_history";
							</script>
						';
					}
					else
					{
						echo '
							<center>
								<form name="equipment_history" action="add_equipment_history" method="POST">
									<table id="input_tbl">
										<tr id="input">
											<td id="input">
												<font id="header4"><font id="required">* </font>Equipment ID : </font>
											</td>
											<td id="input">
												<select name=id_no required>
													<option value="">Select Equipment ID</option>
						';							
													while ( $row = mysql_fetch_assoc($result) )
													{
														echo '
															<option name="' . $row['id_no'] . '">' . $row['id_no'] . '</option>							
														';
													}
						echo '	
												</select>
											</td>
										</tr>
										<tr id="input">
											<td id="input">
												<font id="header4"><font id="required">* </font>Date : </font>
											</td>
											<td id="input">
												<input type="text" onfocus="(this.type=' . "'date'" . ')" name="date" placeholder="Select the Date" required />
											</td>
										</tr>
										<tr id="input">
											<td id="input">
												<font id="header4"><font id="required">* </font>Nature of Problem : </font>
											</td>
											<td id="input">
												<textarea name="nature_of_problem" style="resize: none;" rows="8" cols="70" placeholder="Enter Nature of Problem" required></textarea>
											</td>
										</tr>
										<tr id="input">
											<td id="input">
												<font id="header4"><font id="required">* </font>Corrective Action Taken : </font>
											</td>
											<td id="input">
												<textarea name="corrective_action_taken" style="resize: none;" rows="8" cols="70" placeholder="What Corrective Action you have Taken" required></textarea>
											</td>
										</tr>
										<tr id="input">
											<td id="input">
												<font id="header4"><font id="required">* </font>Repair Cost : </font>
											</td>
											<td id="input">
												<input type="text" onfocus="(this.type=' . "'number'" . ')" min="0" step="0.01" name="repair_cost" placeholder="Enter Repair Cost" required />
											</td>
										</tr>
									</table>
									<br /><br />
						';
						if (isset($_GET['lab_no']))
						{
							echo '
										<input type="hidden" name="lab" value="' . $lab_no . '" />
							';
						}
						echo '
									<center>
										<input type="submit" name="update" value="Update" />
									</center>
								</form>
								<br /><br /><br />
								<a href="lab_equipment_history"> << Back</a>
							</center>
						';
					}
				?>
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