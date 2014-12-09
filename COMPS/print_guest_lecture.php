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
		<title>Guest Lecture Details</title>
		
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
		<center>
			<?php
				$retrieve = $_POST['query'];
				
				require_once "connect.php";
				$retrieve_result = mysql_query($retrieve);
				$sr_no = 0;
			?>
			<center>
				<table>
					<tr>
						<th style="border: 1px solid #000000; background-color: #FFFF00;">Sr. No.</th>
						<th style="border: 1px solid #000000; background-color: #FFFF00;">Speaker Name</th>
						<th style="border: 1px solid #000000; background-color: #FFFF00;">Faculty Name</th>
						<th style="border: 1px solid #000000; background-color: #FFFF00;">Date</th>
						<th style="border: 1px solid #000000; background-color: #FFFF00;">Topic/s Covered</th>
					</tr>
					<?php
						while ( $row = mysql_fetch_assoc($retrieve_result) )
						{
							echo '
									<tr>
										<td align="center" style="border: 1px solid #000000;">' . ($sr_no + 1) . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['speaker_name'] . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['faculty_name'] . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['date'] . '</td>
										<td align="center" style="border: 1px solid #000000;">' . $row['topic_name'] . '</td>
									</tr>
							';
							$sr_no = ($sr_no + 1);
						}
					?>
				</table>
			</center>
		</center>
	</body>
</html>