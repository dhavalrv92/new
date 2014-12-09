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
							<table border cellpadding=3 style=" style="width: 100%;">
								<tr style=" style="width: 100%;"> 
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
								<input type="button" name="backbtn" id="backbtn" value="Print This" onClick="window.open('governing_council_print');" />
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