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
		<title>AICTE Result Format</title>
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
			$sem = $_GET['semester'];
			
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
						<font><strong>AICTE Result Format</strong></font>
						<br /><hr /><br />
					</center>
					<center>
						<table border cellpadding=3>
							<tr> 
								<th style="background-color: #FFFF00; width: 15%;"> Semester </th>
								<th style="background-color: #FFFF00; width: 15%;"> Branch </th>
								<th style="background-color: #FFFF00; width: 14%;"> 70 % and Above </th>
								<th style="background-color: #FFFF00; width: 14%;"> 60 % and Above </th>
								<th style="background-color: #FFFF00; width: 14%;"> Total Appeared </th>
								<th style="background-color: #FFFF00; width: 14%;"> Total Passed </th>
								<th style="background-color: #FFFF00; width: 14%;"> Pass Percentage </th>
							</tr>
							<tr>
			';
			if ($sem == "sem_iii")
			{
				echo '
								<td> III </td>
				';
				include "aicte_sem_result.php";
				echo '								
							</tr>
				';
			}
			else if ($sem == "sem_iv")
			{
				echo '
								<td> IV </td>
				';
				include "aicte_sem_result.php";
				echo '								
							</tr>
				';
			}
			else if ($sem == "sem_v")
			{
				echo '
								<td> V </td>
				';
				include "aicte_sem_result.php";
				echo '								
							</tr>
				';
			}
			if ($sem == "sem_vi")
			{
				echo '
								<td> VI </td>
				';
				include "aicte_sem_result.php";
				echo '								
							</tr>
				';
			}
			else if ($sem == "sem_vii")
			{
				echo '
								<td> VII </td>
				';
				include "aicte_sem_result.php";
				echo '								
							</tr>
				';
			}
			else if ($sem == "sem_viii")
			{
				echo '
								<td> VIII </td>
				';
				include "aicte_sem_result.php";
				echo '								
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