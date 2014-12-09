<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" />
		
		<script type="text/css">
			#reporttbl {
				width: 100%;
			}
			
			#reporttbltr {
				width: 100%;
			}
			
			#reporttblth {
				/*width: 10%;*/
				bgcolor: #FF00FF;
				
			}
			
			/*#reporttbltd {
				width: 10%;
				text-align: center;
				border: 1px solid black;
			}*/
			
			#reportdiv {
				width: 100%;
			}
		</script>
		
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
				
				<center>
					<?php
						if (!isset($_SESSION))
							session_start();
						
						include "connect.php";
						
						if ($_POST['year'] == "default")
						{
							echo '
								<script type="text/javascript">
									alert("Please choose Year");
									window.location.href = "select_alumnioption";
								</script>';
						}
						else
						{
							$year = $_POST['year'];
						
							$query = "SELECT * FROM $year";
							$result = mysql_query($query);
							if (!mysql_error())
							{
								$count = mysql_num_rows($result);	
							}
							if (mysql_error() == "Table 'kjscomp.$year' doesn't exist")
							{
								echo '
									<script type="text/javascript">
										alert("No Records Found");
										window.location.href = "select_alumnioption";
									</script>';
							}
							else if ($count==0)
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
														<td border="1px solid black" width="10%">' . $row['std_ID'] . '</th>
														<td border="1px solid black" width="30%">' . $row['std_Name'] . '</th>
														<td border="1px solid black" width="10%">' . $row['std_Gender'] . '</th>
														<td border="1px solid black" width="20%">' . $row['std_Ct_Num'] . '</th>
														<td border="1px solid black" width="30%">' . $row['std_EmailID'] . '</th>
													</tr>
												';
											}
								echo'	</table>
									</div>';
							}
							echo '
								<table width="100%">
									<tr width="100%">
										<td width="50%" align="center">
											<a href="select_alumnioption"><< Back</a>
										</td>
										<td width="50%" align="center">
											<a align="right" href="#TOP">Goto Top</a>
										</td>
									</tr>
									<tr>
										<td width="50%" align="center" colspan="2">
											<form action="alumni_list_print" method="POST" target="_blank">
												<input type="hidden" name="query" value="' . $query . '">
												<input type="hidden" name="year" value="' . $year . '">
												<input type="submit" name="printbtn" id="printbtn" value="Print This List" />
											</form>
										</td>
										<td width="50%" align="center">
											
										</td>
									</tr>
								</table>
							';
						}
					?>
				</center>
				
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