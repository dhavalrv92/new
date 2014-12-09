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
			
				<?php
					if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "admin") )
						$id = $_SESSION['sid'];
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
							//$result = mysql_db_query ("kjscomp_student","SELECT student_id,student_name,gender,contact_no,email FROM kjscomp_student.student_alumni_data WHERE passing_year=$year") or die(mysql_error());
							//require "connect.php";
							mysql_select_db("kscomp_student");
							$query = "SELECT student_id,student_name,gender,contact_no,email FROM kjscomp_student.student_alumni_data WHERE passing_year=$year";
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
														<td border="1px solid black" width="10%"><a href="alumni_print?id=' . $row['student_id'] . '" target="_blank" style="color: #0000FF;">' . $row['student_id'] . '</a></th>
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
										<td width="50%" align="center">
											<form action="alumni_print_list" method="POST" target="_blank">
												<input type="hidden" name="query" value="' . $query . '">
												<input type="hidden" name="year" value="' . $year . '">
												<input type="submit" name="printbtn" id="printbtn" value="Print This List" />
											</form>
										</td>
										<td width="50%" align="center">
											<form action="alumni_print" method="POST" target="_blank">
												<input type="hidden" name="year_all" value="' . $year . '">
												<input type="submit" name="printbtn_all" id="printbtn_all" value="Print Details of All Students" />
											</form>
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