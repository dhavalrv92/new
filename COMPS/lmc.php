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
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
		<style type="text/css">
		
			td {
				text-align: center;
			};
		
		</style>
		
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
					echo '
						<center>
							<table border cellpadding=3 style="width: 100%;">
								<tr style="width: 100%;"> 
							 		<th rowspan="4" style="background-color: #00FFFF; width: 4%;"> Year </th>
							 		<th rowspan="4" style="background-color: #00FFFF; width: 16%;"> Branch </th>
									<th rowspan="4" style="background-color: #00FFFF; width: 4%;"> Semester </th>
									<th colspan="3" style="background-color: #00FFFF; width: 24%;"> December - ' . (date("Y")-1) . ' </th>
									<th rowspan="4" style="background-color: #00FFFF; width: 4%;"> Semester </th>
									<th colspan="7" style="background-color: #00FFFF; width: 48%;"> May - ' . date("Y") . ' </th>
								</tr>
								<tr style="width: 100%;">
									<th colspan="3" style="background-color: #00FFFF; width: 24%;"> ODD Semester </th>
									<th colspan="7" style="background-color: #00FFFF; width: 48%;"> EVEN Semester </th>
								</tr>
								<tr style="width: 100%;">
									<th colspan="2" style="background-color: #FFFF00; width: 16%;"> No. of Students </th>
									<th rowspan="2" style="background-color: #FFFF00; width: 8%;"> Passing % </th>
									<th colspan="2" style="background-color: #FFFF00; width: 16%;"> No. of Students </th>
									<th rowspan="2" style="background-color: #FFFF00; width: 8%;"> Passing % </th>
									<th colspan="2" rowspan="2" style="background-color: #C0FF3E; width: 12%;"> No. of Students with First Class </th>
									<th colspan="2" rowspan="2" style="background-color: #C0FF3E; width: 12%;"> No. of Students with Distinction </th>
								</tr>
								<tr style="width: 100%;">
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
						echo'	</tr>
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
						echo'	</tr>
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
						echo'	</tr>
							</table>
						</center>
					';
				?>
				<br /><br />
				<table width="100%">
					<tr>
						<td width="50%" align="right">
							<form>
								<input type="button" name="backbtn" id="backbtn" value="<< Back" onClick="window.location.href='select_format';" />
							</form>
						</td>
						<td width="50%" align="left">
							<form>
								<input type="button" name="backbtn" id="backbtn" value="Print This" onClick="window.open('lmc_print');" />
							</form>
						</td>
					</tr>
				</table>
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br />
		
		<br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>