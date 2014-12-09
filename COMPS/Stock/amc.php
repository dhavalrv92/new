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
				$name_equip = $_POST['name_equip'];
				$yr_purc = $_POST['yr_purc'];
				$id_no = $_POST['id_no'];
				$dt_instal = $_POST['dt_instal'];
				$dt_commission = $_POST['dt_commission'];
				$name_supp = $_POST['name_supp'];
				$address = $_POST['address'];
				$cost_equip_rs = $_POST['cost_equip_rs'];
				$warranty_exp = $_POST['warranty_exp'];
				$amc_sign = $_POST['amc_sign'];
				$name_maintenance = $_POST['name_maintenance'];
				$telephone = $_POST['telephone'];
				
				require_once ("connect.php");
				mysql_select_db("kjscomp_stock") or die (mysql_error());
				
				$query1 = "INSERT INTO equipment_details (lab,name_equip,yr_purc,id_no,dt_instal,dt_commission,name_supp,address,cost_equip_rs,warranty_exp,amc_sign,name_maintenance,telephone) VALUES ('$lab','$name_equip','$yr_purc','$id_no','$dt_instal','$dt_commission','$name_supp','$address','$cost_equip_rs','$warranty_exp','$amc_sign','$name_maintenance','$telephone')";
				$result1 = mysql_query($query1) or die(mysql_error());
				
				$query2 = "INSERT INTO equipment_history (lab,id_no) VALUES ('$lab','$id_no')";
				$result2 = mysql_query($query2) or die(mysql_error());
				
				echo '
					<script type="text/javascript">
						alert ("* Data Updated Successfully!");
						window.location.href = "amc_new";
					</script>
				';
			}
		}
	}
	if (isset($_POST['back']))
	{
		header ("location: amc_new");
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
					if (isset($_GET['lab_no']))
						$lab_no = $_GET['lab_no'];
					
					echo '
						<center>
							<form name="amc" action="amc" method="POST">
								<table id="input_tbl">
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Name of the Equipment : </font>
										</td>
										<td id="input">
											<input type="text" name="name_equip" size="70" placeholder="Enter Name of Equipment" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Year of Purchase : </font>
										</td>
										<td>
											<select name="yr_purc" required>
												<option value=""></option>
				';
				for ($i=2000 ; $i<=2030 ; $i++)
				{
					echo '						
												<option name="' . $i . '" value="' . ($i) . '">' . $i . '</option>
						';
				}
					echo'
											</select>
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>ID Number : </font>
										</td>
										<td id="input">
											<input type="text" name="id_no" size="70" placeholder="Enter ID Number" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Date Installed : </font>
										</td>
										<td id="input">
											<input type="text" name="dt_instal" size="70" placeholder="Enter Installation Date" onfocus="(this.type=' . "'date'" . ')" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Date Comissioned : </font>
										</td>
										<td id="input">
											<input type="text" name="dt_commission" size="70" placeholder="Enter Comissioned Date" onfocus="(this.type=' . "'date'" . ')" required />
											</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Name of Supplier : </font>
										</td>
										<td id="input">
											<input type="text" name="name_supp" size="70" placeholder="Enter Name of Supplier" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Address : </font>
										</td>
										<td id="input">
											<textarea name="address" style="resize: none;" rows="5" cols="70" placeholder="Enter Address of Supplier" required></textarea>
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Cost of Equipment : </font>
										</td>
										<td id="input">
											<input type="number" name="cost_equip_rs" min="0" size="70" step="0.01" placeholder="Enter Cost of Equipment" onkeypress="return isNumber(event)"  required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Warranty Period Expired On : </font>
										</td>
										<td id="input">
											<input type="text" name="warranty_exp" size="70" placeholder="Enter Expiry Date" onfocus="(this.type=' . "'date'" . ')" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>AMC Signed On : </font>
										</td>
										<td id="input">
											<input type="text" name="amc_sign" size="70" placeholder="Enter AMC Sign Date" onfocus="(this.type=' . "'date'" . ')" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Name of Maintenance Agency : </font>
										</td>
										<td id="input">
											<input type="text" name="name_maintenance" size="70" placeholder="Enter Name of Maintenance Agency" required />
										</td>
									</tr>
									<tr id="input">
										<td id="input">
											<font id="header4"><font id="required">* </font>Telephone Nos : </font>
										</td>
										<td id="input">
											<input type="number" name="telephone" min="0" size="70" placeholder="Enter Telephone No. of Maintenance Agency" onkeypress="return isNumber(event)"  required />
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
							<a href="amc_new"> << Back</a>
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