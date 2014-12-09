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
		<title>Stock Verification (Challan Details)</title>
		<style type="text/css">
			table {
				width: 100%;
			}
			th, td {
				border: 1px solid #000000;
				/*width: 50%;*/
			}
			@page {
				size 11in 8.5in;
				magin: 2cm;
				size: landscape;
			}
			div.page {
				page-break-after: always;
			}
			.page_no {
				text-align: right;
			}
		</style>
	</head>
	<body onload="window.print()">
		<?php
			$lab_no = $_GET['lab_no'];
			$page_no = 0;
			$sr_no = 0;

			require "connect.php";
			
			$query = "SELECT * FROM kjscomp_stock.challan_details WHERE lab_no='$lab_no'";
			$result = mysql_query($query) or die (mysql_error());
			$row = mysql_fetch_assoc($result);
			$count = mysql_num_rows($result);

			if ($count == 0)
			{
				echo '
					<script type="text/javascript">
						alert ("* No Data Exist!");
						window.close();
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
							<font class="college_name"><strong>SION, MUMBAI-400 022</strong></font>
							<br /><hr /><br />
							<font><strong>Department of Computer Engineering</strong></font>
							<br /><br />
							<font><strong>' . $row['name'] . ' (' . $row['lab_no'] . ')</strong></font>
							<br /><hr /><br />
						</center>
						
						<table>
							<tr>
								<th>Sr. No.</th>
								<th>GI. No.</th>
								<th>Invoice No.</th>
								<th>Challan No.</th>
								<th>Date of Receipt</th>
								<th>Supplier/Mnufacturer Name</th>
								<th>Description</th>
								<th>Equipment No.</th>
								<th>Unit</th>
								<th>Unit Cost</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Remarks</th>
							</tr>
				';
				$result = mysql_query($query) or die (mysql_error());
				while ( $row = mysql_fetch_assoc($result) )
				{
					echo '
							<tr>
								<td>' . $sr_no = ($sr_no+1) . '</td>
								<td>' . $row['GI_No'] . '</td>
								<td>' . $row['invoice_no'] . '</td>
								<td>' . $row['challan_no'] . '</td>
								<td>' . $row['date_receipt'] . '</td>
								<td>' . $row['supplier_manufacturer'] . '</td>
								<td>' . $row['description'] . '</td>
								<td>' . $row['equipment_no'] . '</td>
								<td>' . $row['unit'] . '</td>
								<td>' . $row['unit_cost'] . '</td>
								<td>' . $row['quantity'] . '</td>
								<td>' . $row['amount'] . '</td>
								<td>' . $row['remarks'] . '</td>
							</tr>
					';
				}
				echo '
						</table>
					</div>
				';
			}
		?>
	</body>
</html>