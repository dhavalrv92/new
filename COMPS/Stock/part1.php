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
	if (isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
		if ($submit)
		{
			$lab_no = $_POST['lab'];
			if ($lab_no == '')
				header ("location: stock_verification_new");
			else
			{
				//echo $lab_no = $_POST['lab'];
				$subject = $_POST['subject'];
				if (isset($_POST['SE']))
				{
					if (isset($_POST['TE']))
					{
						$SE = $_POST['SE'] . ',';
					}
					else if (isset($_POST['BE']))
					{
						$SE = $_POST['SE'] . ',';
					}
					else
					{
						$SE = $_POST['SE'];
					}
				}
				else
				{
					$SE = '';
				}
				if (isset($_POST['TE']))
				{
					if (isset($_POST['BE']))
					{
						$TE = $_POST['TE'] . ',';
					}
					else
					{
						$TE = $_POST['TE'];
					}
				}
				else
				{
					$TE = '';
				}
				if (isset($_POST['BE']))
				{
					$BE = $_POST['BE'];
				}
				else
				{
					$BE = '';
				}
				$area = $_POST['area'];
				$student_count = $_POST['student_count'];
				$equipment_apparatus = $_POST['equipment_apparatus'];
				$fixture_furniture = $_POST['fixture_furniture'];
				$name = $_POST['name'];
				
				require_once ("connect.php");
				
				$query = "SELECT * FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
				$result = mysql_query($query) or die (mysql_error());
				$count = mysql_num_rows($result);
				if ($count == 1)
				{
					$query1 = "UPDATE kjscomp_stock.stock_part1 SET subject='$subject',class='$SE$TE$BE',area='$area',student_count='$student_count',equipment_apparatus='$equipment_apparatus',fixture_furniture='$fixture_furniture',name='$name' WHERE lab_no='$lab_no'";
					$result1 = mysql_query($query1);// or die(mysql_error());
					echo '
						<script type="text/javascript>
							alert ("Successfully Updated!");
						</script>
					';
					header ("location: equipment_list?lab=$lab_no");
				}
				else if ($count == 0)
				{
					$query1 = "INSERT INTO kjscomp_stock.stock_part1 VALUES ('$lab_no','$subject','$SE$TE$BE','$area','$student_count','$equipment_apparatus','$fixture_furniture','$name')";
					$result1 = mysql_query($query1);// or die (mysql_error());
					echo '
						<script type="text/javascript>
							alert ("Successfully Inserted!");
						</script>
					';
					header ("location: equipment_list?lab=$lab_no");
				}
			}
		}
	}
	if (isset($_POST['next']))
	{
		$next = $_POST['next'];
		if ($next)
		{
			$lab_no = $_POST['lab'];
			if ($lab_no == '')
			{
				header ("location: stock_verification_new");
			}
			else
			{
				/*$equip_name = $_POST['equip_name'];
				$equip_quantity = $_POST['equip_quantity'];
				
				require_once ("connect.php");
				
				$query = "INSERT INTO kjscomp_stock.stock_equipmentlist (lab_no,equipment_name,equipment_quantity) VALUES ('$lab_no','$equip_name','$equip_quantity')";
				$result = mysql_query($query);*/
				header ("location: equipment_list?lab=$lab_no");
			}
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
			function valid(theForm)
			{
				if ( (theForm.SE.checked == false) && (theForm.TE.checked == false) && (theForm.BE.checked == false) ) 
				{
					document.getElementById("class_error").style.display="";
					return false;
				}
				else
				{
					document.getElementById("class_error").style.display="none";
					return true;
				}
			}
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
				<?php
					if (isset($_GET['lab_no']))
						$lab_no = $_GET['lab_no'];
					echo '
						<center>
							<div id="class_error" style="color: #FF0000; display: none">
								* Please choose atleast One Class!
							</div>
							<form name="part_1" action="part1" onsubmit="return (valid(this));" method="POST">
								<table id="input_tbl">
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Subject/s Conducted : </font>
										</td>
										<td id="input">
											<input type="text" name="subject" size="70" placeholder="Enter Initials of Subjects" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Class : </font>
										</td>
										<td id="input">
											<input type="checkbox" name="SE" value="SE">Second Year
											&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="checkbox" name="TE" value="TE">Third Year
											&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="checkbox" name="BE" value="BE">Final Year
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Area in Sq. Meters : </font>
										</td>
										<td id="input">
											<input type="text" name="area" size="70" placeholder="Enter Area of the Lab in Sq. Meters" onkeypress="return isNumber(event)" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>No. of Students in a Batch : </font>
										</td>
										<td id="input">
											<input type="text" name="student_count" size="70" maxlength="2" placeholder="Enter No. of Students in one Batch" onkeypress="return isNumber(event)" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Equipments and Apparatus : </font>
										</td>
										<td id="input">
											<input type="text" name="equipment_apparatus" size="70" placeholder="Enter List of Equipments and Apparatus" value="List Attached" readonly required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Fixtures and Furnitures:</font>
										</td>
										<td id="input">
											<input type="text" name="fixture_furniture" size="70" placeholder="Enter List of Equipments and Apparatus" value="List Attached" readonly required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Name of Lab : </font>
										</td>
										<td id="input">
											<input type="text" name="name" size="70" placeholder="Enter Name of the Lab" required />
										</td>
									</tr>
								</table>
								<br /><br />';
								if (isset($_GET['lab_no']))
								{
									echo '<input type="hidden" name="lab" value="' . $lab_no . '" />';
								}
				echo '
								<center>
									<input type="submit" name="submit" value="Save and Continue" />
								</center>
							</form>
							<br /><br /><br />
							<form action="part1" method="POST">';
							if (isset($_GET['lab_no']))
							{
								echo '<input type="hidden" name="lab" value="' . $lab_no . '" />';
							}
				echo '
								<center>
									<input type="submit" name="next" value="Continue" />
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