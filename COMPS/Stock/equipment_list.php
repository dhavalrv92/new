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
				$equip_name = $_POST['equip_name'];
				$equip_quantity = $_POST['equip_quantity'];
				
				require_once ("connect.php");
				
				$query = "INSERT INTO kjscomp_stock.stock_equipmentlist (lab_no,equipment_name,equipment_quantity) VALUES ('$lab_no','$equip_name','$equip_quantity')";
				$result = mysql_query($query);
				header ("location: equipment_list?lab=$lab_no");
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
				header ("location: stock_verification_new");
			else
			{
				/*$equip_name = $_POST['equip_name'];
				$equip_quantity = $_POST['equip_quantity'];
				
				require_once ("connect.php");
				
				$query = "INSERT INTO kjscomp_stock.stock_equipmentlist (lab_no,equipment_name,equipment_quantity) VALUES ('$lab_no','$equip_name','$equip_quantity')";
				$result = mysql_query($query);*/
				header ("location: software_list?lab=$lab_no");
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
					if (isset($_GET['lab']))
						$lab_no = $_GET['lab'];
					echo '
						<center>
							<form name="equipment" action="equipment_list" method="POST">
								<table id="input_tbl">
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Equipment Name : </font>
										</td>
										<td id="input">
											<textarea rows="3" cols="50" style="resize:none" name="equip_name" placeholder="Enter Full Equipment Name" onclick="select()" required></textarea>
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Quantity : </font>
										</td>
										<td id="input">
											<input type="text" name="equip_quantity" size="70" placeholder="Enter Total Quantity" onkeypress="return isNumber(event)" required />
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
							<form action="equipment_list" method="POST">';
								if (isset($_GET['lab']))
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