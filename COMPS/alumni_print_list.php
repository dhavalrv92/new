<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "admin") )
	{
		$year_2 = $_POST['year'];
		$year_1 = ($year_2-1);
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
		<title>Alumni Detail List of the Year <?php echo $year_1 . '-' . $year_2 ?></title>
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
			a {
				text-decoration: none;
				color: #000000;
			}
		</style>
	</head>
	<body onload="window.print()">
		<div class="page">
			<center>
				<hr />
				<font class="college_name"><b>K. J. SOMAIAYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY,</b></font>
				<br />
				<!--font class="college_name"><strong>SION, MUMBAI-400 022</strong></font>
				<br /-->
				<font>Ayurvihar Complex, Near Everard Nagar, Eastern Express Highway, Sion, Mumbai-400 022</font>
				<br /><hr /><br />
				<font><strong>Department of Computer Engineering</strong></font>
				<br /><hr /><br />
				<font><strong>Alumni Detail List of the Year <?php echo $year_1 . '-' . $year_2 ?></strong></font>
				<br /><hr /><br />
				<?php
					require_once "connect.php";
					mysql_select_db("kscomp_student");
					$query = $_POST['query'];
					$result = mysql_query($query) or die(mysql_error());
					$count = mysql_num_rows($result);
					
					if ($count == 0)
					{
						echo '
							<script type="text/javascript">
								alert("No Records Found");
								window.location.href = "select_alumnioption";
							</script>';
					}
					else
					{
						echo '
							<div id="reportdiv">
								<table border="1px solid black" id="reporttbl" cellpadding="4" cellspacing="2">
									<tr border="1px solid black" id="reporttbltr" bgcolor="#FFFF00">
										<th border="1px solid black" width="10%">Student ID</th>
										<th border="1px solid black" width="30%">Name</th>
										<th border="1px solid black" width="10%">Gender</th>
										<th border="1px solid black" width="20%">Contact Number</th>
										<th border="1px solid black" width="30%">E-mail ID</th>
									</tr>';
									while($row = mysql_fetch_array($result))
									{
										echo '
											<tr border="1px solid black" id="reporttbltr">
												<td border="1px solid black" width="10%"><a href="#">' . $row['student_id'] . '</a></th>
												<td border="1px solid black" width="30%">' . $row['student_name'] . '</th>
												<td border="1px solid black" width="10%">' . $row['gender'] . '</th>
												<td border="1px solid black" width="20%">' . $row['contact_no'] . '</th>
												<td border="1px solid black" width="30%">' . $row['email'] . '</th>
											</tr>
										';
									}
						echo'	</table>
							</div>';
					}
					
				?>
			</center>
		</div>
	</body>
</html>