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
		<title>LMC Result Format</title>
		<style type="text/css">
			table {
				width: 100%;
			}
			th, td {
				border: 1px solid #000000;
				width: 14%;
			}
			@page {
				size: 8.5in 11in;
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
						<font><strong>LMC Result Format</strong></font>
						<br /><hr /><br />
					</center>
					<center>
						<table border cellpadding=3 style=" style="width: 100%;">
							<tr style=" style="width: 100%;"> 
								<th rowspan="4" style="background-color: #00FFFF; width: 4%;"> Year </th>
								<th rowspan="4" style="background-color: #00FFFF; width: 16%;"> Branch </th>
								<th rowspan="4" style="background-color: #00FFFF; width: 4%;"> Semester </th>
								<th colspan="3" style="background-color: #00FFFF; width: 24%;"> December - ' . (date("Y")-1) . ' </th>
								<th rowspan="4" style="background-color: #00FFFF; width: 4%;"> Semester </th>
								<th colspan="7" style="background-color: #00FFFF; width: 48%;"> May - ' . date("Y") . ' </th>
							</tr>
							<tr style=" style="width: 100%;">
								<th colspan="3" style="background-color: #00FFFF; width: 24%;"> ODD Semester </th>
								<th colspan="7" style="background-color: #00FFFF; width: 48%;"> EVEN Semester </th>
							</tr>
							<tr style=" style="width: 100%;">
								<th colspan="2" style="background-color: #FFFF00; width: 16%;"> No. of Students </th>
								<th rowspan="2" style="background-color: #FFFF00; width: 8%;"> Passing % </th>
								<th colspan="2" style="background-color: #FFFF00; width: 16%;"> No. of Students </th>
								<th rowspan="2" style="background-color: #FFFF00; width: 8%;"> Passing % </th>
								<th colspan="2" rowspan="2" style="background-color: #C0FF3E; width: 12%;"> No. of Students with First Class </th>
								<th colspan="2" rowspan="2" style="background-color: #C0FF3E; width: 12%;"> No. of Students with Distinction </th>
							</tr>
							<tr style=" style="width: 100%;">
								<th rowspan="1" style="background-color: #836FFF; width: 8%;"> Appeared </th>
								<th rowspan="1" style="background-color: #836FFF; width: 8%;"> Passed </th>
								<th rowspan="1" style="background-color: #836FFF; width: 8%;"> Appeared </th>
								<th rowspan="1" style="background-color: #836FFF; width: 8%;"> Passed </th>
							</tr>
							<tr style="width: 100%;">
								<td style="width: 4%;">SE</td>
								<td style="width: 16%;">Computer Engineering</td>
								<td style="width: 4%;">III</td>
			';
								include "lmc_sem_III.php";
			echo '			
								<td style="width: 4%;">IV</td>
			';
								include "lmc_sem_IV.php";
			echo'			</tr>
							<tr style="width: 100%;">
								<td style="width: 4%;">TE</td>
								<td style="width: 16%;">Computer Engineering</td>
								<td style="width: 4%;">V</td>
			';
								include "lmc_sem_V.php";
			echo '			
								<td style="width: 4%;">VI</td>
			';
								include "lmc_sem_VI.php";
			echo'			</tr>
							<tr style="width: 100%;">
								<td style="width: 4%;">BE</td>
								<td style="width: 16%;">Computer Engineering</td>
								<td style="width: 4%;">VII</td>
			';
								include "lmc_sem_VII.php";
			echo '			
								<td style="width: 4%;">VIII</td>
			';
								include "lmc_sem_VIII.php";
			echo'			</tr>
						</table>
					</center>
				</div>
			';
		?>
	</body>
</html>