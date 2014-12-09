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
<!DOCTYPE html>
<html>
	<head>
		<title>Stock Verification (Equipment History)</title>
		<style type="text/css">
			table, tr {
				width: 100%;
				table-layout: auto;
			}
			th, td {
				border: 1px solid #000000;
				width: 20%;
				text-align: center;
			}
			@page {
				size 8.5in 11in;
				magin: 2cm;
				size: portrait;
			}
			.page {
				page-break-after: always;
			}
			.page2 {
				size 8.5in 11in;
				magin: 2cm;
				size: landscape;
				page-break-after: always;
			}
			.page_no {
				text-align: right;
			}
		</style>
	</head>
	<body><!-- onload="window.print()"-->
		<?php
			$id_no = $_GET['id_no'];

			require "connect.php";
			
			$query1 = "SELECT * FROM kjscomp_stock.equipment_details WHERE id_no='$id_no'";
			$result1 = mysql_query($query1) or die (mysql_error());
			$row1 = mysql_fetch_assoc($result1);
			$count = mysql_num_rows($result1);

			if ($count == 0)
			{
				echo '
					<script type="text/javascript">
						alert ("* No Data Exist!");
						//window.close();
					</script>
				';
			}
			else
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font class="college_name"><b>K. J. SOMAIAYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY,</b></font>
							<br />
							<font class="college_name"><strong>EVERARD NAGAR, AYURVIHAR, SION, MUMBAI-400 022</strong></font>
							<br /><hr /><br />
							<font><strong>Department of Computer Engineering</strong></font>
							<br /><br />
							<font><strong>CAPITAL EQUIPMENT LOG SHEET</strong></font>
							<br /><hr /><br />
						</center>
						
						<center>
							<table cellpadding="20">
								<tr>
									<th colspan="2">Department</th>
									<td colspan="3">' . $row1['dept'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Laboratory</th>
									<td colspan="3">' . $row1['lab'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Name of Equipment</th>
									<td colspan="3">' . $row1['name_equip'] . '</td>
								</tr>
								<tr>
									<th>Year of Purchase</th>
									<td>' . $row1['yr_purc'] . '</td>
									<th>ID Numbar</th>
									<td colspan="2">' . $row1['id_no'] . '</td>
								</tr>
								<tr>
									<th>Date Installed</th>
									<td>' . $row1['dt_instal'] . '</td>
									<th>Date Commissioned</th>
									<td colspan="2">' . $row1['dt_commission'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Name of Supplier</th>
									<td colspan="3">' . $row1['name_supp'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Address</th>
									<td colspan="3">' . $row1['address'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Cost of Equipment ( <img src="../Images/Rupee_Font.png" width="8" height="10"> )</th>
									<td colspan="3">' . $row1['cost_equip_rs'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Warranty Period Expired on</th>
									<td>' . $row1['warranty_exp'] . '</td>
									<th>AMC Signed on</th>
									<td>' . $row1['amc_sign'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Name of Maintenance Agency</th>
									<td colspan="3">' . $row1['name_maintenance'] . '</td>
								</tr>
								<tr>
									<th colspan="2">Telephone No.</th>
									<td colspan="3">' . $row1['telephone'] . '</td>
								</tr>
							</table>
						</center>
					</div>
				';
			}

			$lab = $row1['lab'];
			$query2 = "SELECT * FROM kjscomp_stock.equipment_history WHERE lab='$lab' AND id_no='$id_no'";
			$result2 = mysql_query($query2) or die (mysql_error());
			
			echo '
				<div class="page">
					<center>
						<table style="width: 100%">
							<tr style="width: 100%">
								<th colspan="6" style="padding: 20px;">EQUIPMENT HISTORY CARD for Equipment No. ' . $id_no . '</th>
							</tr>
							<tr style="width: 100%">
								<th style="padding: 20px; width: 10%;">Date</th>
								<th style="padding: 20px; width: 31%;">Nature of Problem</th>
								<th style="padding: 20px; width: 30%;">Corrective Action Taken</th>
								<th style="padding: 20px; width: 15%;">Repair Cost</th>
								<th style="padding: 20px; width: 7%;">Initials Lab I/C</th>
								<th style="padding: 20px; width: 7%;">Initials HOD</th>
							</tr>
			';
			while ( $row2 = mysql_fetch_assoc($result2) )
			{
				echo '
							<tr style="width: 100%">
								<th style="width: 10%;">' . $row2['date'] . '</th>
								<th style="width: 31%;">' . $row2['nature_of_problem'] . '</th>
								<th style="width: 30%;">' . $row2['corrective_action_taken'] . '</th>
								<th style="width: 15%;">' . $row2['repair_cost'] . '</th>
								<th style="width: 7%;"><br /></th>
								<th style="width: 7%;"><br /></th>
							</tr>
				';
			}
			echo '
						</table>
					</center>
				</div>
			';
			
		?>
	</body>
</html>