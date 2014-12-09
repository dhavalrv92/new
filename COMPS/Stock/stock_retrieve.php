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
		<title>Stock Verification (Information about Laboratories)</title>
		<style type="text/css">
			table {
				width: 100%;
			}
			th, td {
				border: 1px solid #000000;
				/*width: 50%;*/
			}
			@page {
				size 8.5in 11in;
				magin: 2cm;
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

			require "connect.php";
			
			$query1 = "SELECT * FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
			$result1 = mysql_query($query1);
			$count1 = mysql_num_rows($result1);

			if ($count1 == 0)
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
				while ($row1 = mysql_fetch_assoc($result1))
				{
					echo '
						<div class="page">
							<center>
								<hr />
								<font class="college_name"><b>K. J. SOMAIAYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY,</b></font>
								<br />
								<font class="college_name"><strong>SION, MUMBAI-400 022</strong></font>
								<br />
								<font>Ayurvihar Complex, Near Everard Nagar, Eastern Express Highway, Sion, Mumbai-400 022</font>
								<br /><hr /><br />
								<font><strong>Department of Computer Engineering</strong></font>
								<br /><br />
								<font><strong>APPENDIX V - (LABORATORY)</strong></font>
								<br /><br />
								<font>Statement showing Information about Laboratories in the Various Subjects</font>
								<br /><hr /><br />
							</center>
							<br />
							<font><strong>Lab : ' . $row1['lab_no'] . '</strong></font>
							<br />
							<font><strong>Name : ' . $row1['name'] . '</strong></font>
							<br />
							<font><u>Part 1</u></font>
							<br /><br />
							<table>
								<tr>
									<th>Subject/s</th>
									<th>Class</th>
									<th>Area in Sq. Meters</th>
									<th>No. of Students in each Batch</th>
									<th>Equipments and Apparatus (Attach list, if necessary)</th>
									<th>Fixtures and Furnitures</th>
								</tr>
								<tr>
									<td>' . $row1['subject'] . '</td>
									<td>' . $row1['class'] . '</td>
									<td>' . $row1['area'] . '</td>
									<td>' . $row1['student_count'] . '</td>
									<td>' . $row1['equipment_apparatus'] . '</td>
									<td>' . $row1['fixture_furniture'] . '</td>
								</tr>
							</table>
							<br /><hr /><br />
							<div class="page_no">
								<font class="page_no">Date. ' . date("d/m/Y") . '</font>
								<br />
								<font class="page_no">Page. ' . ($page_no = $page_no+1) . ' of 5</font>
							</div>
						</div>
					'; 
				}
			}

			$query2 = "SELECT * FROM kjscomp_stock.stock_equipmentlist WHERE lab_no='$lab_no'";
			$result2 = mysql_query($query2);
			$count2 = mysql_num_rows($result2);
			
			$query1 = "SELECT name FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
			$result1 = mysql_query($query1);
			$row1 = mysql_fetch_assoc($result1);

			/*if ($count2 == 0)
			{
				echo '
					<script type="text/javascript">
						alert ("* No Data Exist!");
						window.location.href = "select_lab";
					</script>
				';
			}
			else*/
			{
				echo '<div class="page">';
				$sr_no = 0;
				echo '
					<font><strong>Lab : ' . $lab_no . '</strong></font>
						<br />
						<font><strong>Name : ' . $row1['name'] . '</strong></font>
						<br />
						<font><u>Equipment List</u></font>
						<br /><br />
						<table>
							<tr>
								<th>Sr. No.</th>
								<th>Equipment Name</th>
								<th>Quantity</th>
							</tr>
				';
				while ($row2 = mysql_fetch_assoc($result2))
				{
					echo '
							<tr>
								<td>' . ($sr_no = $sr_no+1) . '</td>
								<td>' . $row2['equipment_name'] . '</td>
								<td>' . $row2['equipment_quantity'] . '</td>
							</tr>
					'; 
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . ' of 5</font>
					</div>
				';
				echo '</div>';
			}
			
			$query3 = "SELECT * FROM kjscomp_stock.stock_softwarelist WHERE lab_no='$lab_no'";
			$result3 = mysql_query($query3);
			$count3 = mysql_num_rows($result3);
			
			$query1 = "SELECT name FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
			$result1 = mysql_query($query1);
			$row1 = mysql_fetch_assoc($result1);

			/*if ($count3 == 0)
			{
				echo '
					<script type="text/javascript">
						alert ("* No Data Exist!");
						window.location.href = "select_lab";
					</script>
				';
			}
			else*/
			{
				echo '<div class="page">';
				$sr_no = 0;
				echo '
					<font><strong>Lab : ' . $lab_no . '</strong></font>
						<br />
						<font><strong>Name : ' . $row1['name'] . '</strong></font>
						<br />
						<font><u>Software List</u></font>
						<br /><br />
						<table>
							<tr>
								<th>Sr. No.</th>
								<th>Software Name</th>
								<th>Quantity</th>
							</tr>
				';
				while ($row3 = mysql_fetch_assoc($result3))
				{
					echo '
							<tr>
								<td>' . ($sr_no = $sr_no+1) . '</td>
								<td>' . $row3['software_name'] . '</td>
								<td>' . $row3['software_quantity'] . '</td>
							</tr>
					'; 
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . ' of 5</font>
					</div>
				';
				echo '</div>';
			}

			$query4 = "SELECT * FROM kjscomp_stock.stock_furniturelist WHERE lab_no='$lab_no'";
			$result4 = mysql_query($query4);
			$count4 = mysql_num_rows($result4);
			
			$query1 = "SELECT name FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
			$result1 = mysql_query($query1);
			$row1 = mysql_fetch_assoc($result1);

			/*if ($count4 == 0)
			{
				echo '
					<script type="text/javascript">
						alert ("* No Data Exist!");
						window.location.href = "select_lab";
					</script>
				';
			}
			else*/
			{
				echo '<div class="page">';
				$sr_no = 0;
				echo '
					<font><strong>Lab : ' . $lab_no . '</strong></font>
						<br />
						<font><strong>Name : ' . $row1['name'] . '</strong></font>
						<br />
						<font><u>Furniture List</u></font>
						<br /><br />
						<table>
							<tr>
								<th>Sr. No.</th>
								<th>Furniture Description</th>
								<th>Quantity</th>
							</tr>
				';
				while ($row4 = mysql_fetch_assoc($result4))
				{
					echo '
							<tr>
								<td>' . ($sr_no = $sr_no+1) . '</td>
								<td>' . $row4['furniture_description'] . '</td>
								<td>' . $row4['furniture_quantity'] . '</td>
							</tr>
					'; 
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . ' of 5</font>
					</div>
				';
				echo '</div>';
			}

			$query5 = "SELECT * FROM kjscomp_stock.stock_part2 WHERE lab_no='$lab_no'";
			$result5 = mysql_query($query5);
			$count5 = mysql_num_rows($result5);
			
			$query1 = "SELECT name FROM kjscomp_stock.stock_part1 WHERE lab_no='$lab_no'";
			$result1 = mysql_query($query1);
			$row1 = mysql_fetch_assoc($result1);

			/*if ($count5 == 0)
			{
				echo '
					<script type="text/javascript">
						alert ("* No Data Exist!");
						window.location.href = "select_lab";
					</script>
				';
			}
			else*/
			{
				echo '<div class="page">';
				echo '
					<font><strong>Lab : ' . $lab_no . '</strong></font>
						<br />
						<font><strong>Name : ' . $row1['name'] . '</strong></font>
						<br />
						<font><u>Part 2</u></font>
						<br /><br />
						<table>
							<tr>
								<th>Year</th>
								<th>Subject/s</th>
								<th>Recurring Cost (Consumables, Maintenance, Stationary) in <img src="../Images/Rupee_Font.png" width="8" height="10"></th>
								<th>Non-Recurring Cost in <img src="../Images/Rupee_Font.png" width="8" height="10"></th>
								<th>Total Cost in <img src="../Images/Rupee_Font.png" width="8" height="10"></th>
							</tr>
				';
				while ($row5 = mysql_fetch_assoc($result5))
				{
					echo '
							<tr>
								<td>' . $row5['year'] . '</td>
								<td>' . $row5['subject'] . '</td>
								<td>' . $row5['recurring'] . '</td>
								<td>' . $row5['nonrecurring'] . '</td>
								<td>' . $row5['total'] . '</td>
							</tr>
					'; 
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . ' of 5</font>
					</div>
				';
				echo '</div>';
			}
		?>
	</body>
</html>