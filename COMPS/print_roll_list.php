<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Student Roll No. List</title>
		
		<style type="text/css">
			table {
				border-spacing: 1px;
				width: 100%;
			}
			th, td {
				 
				border: 1px solid #000000;
				/*width: 50%;*/
			}
			@page {
				size 8.5in 11in;
				magin: 4cm;
			}
			div.page {
				page-break-after: always;
			}
			.page_no {
				float: right;
				text-align: right;
			}
		</style>
		
	</head>
	<body onload="window.print()">
		
		<?php
			$sem = $_POST['sem_name'];
			$tbl = $_POST['tbl_name'];
			
			require_once "connect.php";
			$query = "SELECT * FROM $tbl";
			$result = mysql_query($query);
		?>
		<div class="page">
			<center>
				<table>
					<tr>
						<th colspan="3" style="background-color: #FF00FF">SEMESTER <?php echo $sem; ?></th>
					</tr>
					<tr>
						<th width="10%" style="background-color: #FFFF00">Roll No.</th>
						<th width="70%" style="background-color: #FFFF00">Student Name</th>
						<th width="20%" style="background-color: #FFFF00">Year</th>
					</tr>
					<?php
						while ( $row = mysql_fetch_assoc($result) )
						{
							echo '
								<tr>
									<td width="10%" align="center">' . $row['roll_no'] . '</td>
									<td width="70%" align="center">' . $row['student_name'] . '</td>
									<td width="20%" align="center">' . $row['year'] . '</td>
								</tr>
							';
						}
					?>
				</table>
			</center>
		</div>
		
	</body>
	
</html>