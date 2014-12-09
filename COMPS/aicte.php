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
							<table border cellpadding=3>
								<tr> 
							 		<th style="background-color: #FFFF00;"> Semester </th>
									<th style="background-color: #FFFF00;"> Branch </th>
									<th style="background-color: #FFFF00;"> 70 % and Above </th>
									<th style="background-color: #FFFF00;"> 60 % and Above </th>
									<th style="background-color: #FFFF00;"> Total Appeared </th>
									<th style="background-color: #FFFF00;"> Total Passed </th>
									<th style="background-color: #FFFF00;"> Pass Percentage </th>
								</tr>
								<tr>
					';
					if (isset($_POST['sem']))
					{
						$sem=$_POST['sem'];
						
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
						else if ($sem == "sem_vi")
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
					}
					echo '
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
								<input type="button" name="backbtn" id="backbtn" value="Print This" onClick="window.open('aicte_print?semester=<?php echo $sem ?>');" />
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