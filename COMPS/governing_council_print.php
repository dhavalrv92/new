<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "admin") )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Admin First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Governing Council Result Format</title>
		<style type="text/css">
			table {
				width: 100%;
			}
			th, td {
				border: 1px solid #000000;
				width: 14%;
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
	<body onload="javascript:window.print()">
		<?php
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
						<font><strong>Governing Council Result Format</strong></font>
						<br /><hr /><br />
					</center>
					<center>
						<table border cellpadding=3 style="width: 100%;">
							<tr style="width: 100%;"> 
								<th style="background-color: #FFFF00; width: 16%;"> Year </th>
								<th style="background-color: #FFFF00; width: 20%;"> Branch </th>
								<th style="background-color: #FFFF00; width: 16%;"> Passing Percentage May - ' . date("Y") . ' </th>
								<th style="background-color: #FFFF00; width: 16%;"> Standard Intake </th>
								<th style="background-color: #FFFF00; width: 16%;"> No. of Students with First Class May - ' . date("Y") . ' </th>
								<th style="background-color: #FFFF00; width: 16%;"> No. of Students with Distinction May - ' . date("Y") . ' </th>
							</tr>
							<tr>
								<td>SE</td>
								<td>Computer Engineering</td>
					';
								include "govt_se.php";
			echo '			
							</tr>
							<tr>
								<td>TE</td>
								<td>Computer Engineering</td>
			';
								include "govt_te.php";
			echo '			
							</tr>
							<tr>
								<td>BE</td>
								<td>Computer Engineering</td>
			';
								include "govt_be.php";
			echo '			
							</tr>
						</table>
					</center>
				</div>
			';
		?>
	</body>
</html>