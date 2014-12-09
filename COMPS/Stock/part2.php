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
				header ("location: stock_verification_new");
			else
			{
				$year = $_POST['year'];
				$subject = $_POST['subject'];
				$recurring_cost = $_POST['recurring_cost'];
				$nonrecurring_cost = $_POST['nonrecurring_cost'];
				$total = $recurring_cost+$nonrecurring_cost; 
				
				require_once ("connect.php");
				
				$query = "INSERT INTO kjscomp_stock.stock_part2 (lab_no,year,subject,recurring,nonrecurring,total) VALUES ('$lab_no','$year','$subject','$recurring_cost/-','$nonrecurring_cost/-','$total/-')";
				$result = mysql_query($query);
				header ("location: part2?lab=$lab_no");
			}
		}
	}
	if (isset($_POST['finish']))
	{
		$finish = $_POST['finish'];
		if ($finish)
		{
			echo '
				<script type=text/javascript>
					window.location = "stock_verification_new";
				</script>
			';
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/report_topic_style.css" />
		
		<style type="text/css">
			/*body {
				background-image: url('../Images/Stock_Background.png');
			}
			#middle {
				width: 60%;
				min-width: 50%;
				max-width: 60%;
				text-align: center;
				overflow: hidden;
			}*/
		</style>
		
		<script type="text/javascript" language="JavaScript">
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
			
			function validate()
			{
		 		if(document.part_2.year.value == "default" )
				{
					document.getElementById("year_error").style.display="";
					document.part_2.year.focus() ;
					return false;
				}
				else
					document.getElementById("year_error").style.display="none";
				
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
					<div id="year_error" style="color: #FF0000; display: none">
						* Please Select the Year!
					</div>
				</center>
				<?php
					if (isset($_GET['lab']))
					{
						$lab_no = $_GET['lab'];
	
						require_once "connect.php";
	
						$queryfind = "SELECT subject FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
						$resultfind = mysql_query($queryfind);
						$rowfind = mysql_fetch_assoc($resultfind);
					}
					echo '
						<center>
							<form onsubmit="return(validate());" name="part_2" action="part2" method="POST">
								<table id="input_tbl">
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Year : </font>
										</td>
										<td id="input">
											<select name=year>
												<option value="default" selected="selected">Select Year</option>
					';
					for ($i=2000;$i<=2020;$i++)
					{
						echo '
												<option value="' . $i . '-' . ($i+1) . '">' . $i . '-' . ($i+1) . '</option>
						';						
					}
					echo '					</select>
											<!--input type="text" name="year" size="70" placeholder="Enter Year" required /-->
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Subject/s Conducted : </font>
										</td>
										<td id="input">
					';
					if (isset($_GET['lab']))
					{
						echo '				<input type="text" name="subject" size="70" placeholder="Enter Initials of Subject which are conducted in the Lab separated by Comma" value="' . $rowfind['subject'] . '" readonly required />';
					}
					else
					{
						echo '				<input type="text" name="subject" size="70" placeholder="Enter Initials of Subject which are conducted in the Lab separated by Comma" readonly required />';
					}
						echo '			</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Recurring Cost : </font>
										</td>
										<td id="input">
											<input type="text" name="recurring_cost" size="70" placeholder="Enter Total Recurring Cost" onkeypress="return isNumber(event)" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Non-Recurring Cost : </font>
										</td>
										<td id="input">
											<input type="text" name="nonrecurring_cost" size="70" placeholder="Enter Total Non-Recurring Cost" onkeypress="return isNumber(event)" required />
										</td>
									</tr>
								</table>
								<br /><br />';
								if (isset($_GET['lab']))
								{
									echo '<input type="hidden" name="lab" value="' . $lab_no . '" />';
								}
						echo '
								<center>
									<input type="submit" name="update" value="Save" />
								</center>
							</form>
							<br /><br /><br />
							<form action="part2" method="POST">';
						echo '
								<center>
									<input type="submit" name="finish" value="Finish" />
								</center>
							</form>
						</center>
					';
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