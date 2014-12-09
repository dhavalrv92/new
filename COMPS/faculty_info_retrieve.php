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
		
		<script type="text/javascript">
			function gotohome() 
			{
	    		window.location.href = "index";
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
				
				$format = $_GET['data'];
				if ($format == "rfid")
				{
					require_once "connect.php";	
					
					$query = "SELECT * FROM rfid_info";
					$result = mysql_query($query) or die(mysql_error());
					echo '
						<table cellpadding="2" border="1px" style="max-width=100%; border-radius: 10px;">
							<tr>
								<th bgcolor="#FFFF00">ID</th>
								<th bgcolor="#FFFF00">Name</th>
								<th bgcolor="#FFFF00">Designation</th>
								<th bgcolor="#FFFF00">Role</th>
								<th bgcolor="#FFFF00">Department</th>
								<th bgcolor="#FFFF00">Blood Group</th>
								<th bgcolor="#FFFF00">Address</th>
								<th bgcolor="#FFFF00">Mobile No.</th>
								<th bgcolor="#FFFF00">Residence No.</th>
								<th bgcolor="#FFFF00">PAN No.</th>
								<th bgcolor="#FFFF00">PF No.</th>
								<th bgcolor="#FFFF00">Joining Date</th>
								<th bgcolor="#FFFF00">Confirmation Date</th>
								<th bgcolor="#FFFF00">Email-ID</th>
								<th bgcolor="#FFFF00">Birth Date</th>
							</tr>
						';
						while ($row = mysql_fetch_array($result))
						{
							echo '
								<tr>
									<td>' . $row['id'] . '</td>
									<td>' . $row['fac_name'] . '</td>
									<td>' . $row['designation'] . '</td>
									<td>' . $row['role'] . '</td>
									<td>' . $row['department'] . '</td>
									<td>' . $row['blood_group'] . '</td>
									<td>' . $row['address'] . '</td>
									<td>' . $row['mobile_no'] . '</td>
									<td>' . $row['residence_no'] . '</td>
									<td>' . $row['PAN_no'] . '</td>
									<td>' . $row['PF_no'] . '</td>
									<td>' . $row['join_date'] . '</td>
									<td>' . $row['confirm_date'] . '</td>
									<td>' . $row['email_id'] . '</td>
									<td>' . $row['birth_date'] . '</td>
								</tr>
							';
						}	
						echo'</table>
					';
				}
				if ($format == "hr")
				{
					require_once "connect.php";	
					
					$query = "SELECT * FROM rfid_info NATURAL JOIN hr_info";
					$result = mysql_query($query) or die(mysql_error()); //border-collapse:collapse;
					echo '
						<table cellpadding="2" border="1px" style="max-width=100%; border-radius: 10px;">
							<tr>
								<th bgcolor="#FFFF00">ID</th>
								<th bgcolor="#FFFF00">Name</th>
								<th bgcolor="#FFFF00">Designation</th>
								<th bgcolor="#FFFF00">Role</th>
								<th bgcolor="#FFFF00">Department</th>
								<th bgcolor="#FFFF00">Blood Group</th>
								<th bgcolor="#FFFF00">Address</th>
								<th bgcolor="#FFFF00">Mobile No.</th>
								<th bgcolor="#FFFF00">Residence No.</th>
								<th bgcolor="#FFFF00">PAN No.</th>
								<th bgcolor="#FFFF00">PF No.</th>
								<th bgcolor="#FFFF00">Joining Date</th>
								<th bgcolor="#FFFF00">Confirmation Date</th>
								<th bgcolor="#FFFF00">Email-ID</th>
								<th bgcolor="#FFFF00">Birth Date</th>
								<th bgcolor="#FFFF00">Gender</th>
								<th bgcolor="#FFFF00">Religion</th>
								<th bgcolor="#FFFF00">Caste</th>
								<th bgcolor="#FFFF00">Bank Account No.</th>
							</tr>
						';
						while ($row = mysql_fetch_array($result))
						{
							echo '
								<tr>
									<td>' . $row['id'] . '</td>
									<td>' . $row['fac_name'] . '</td>
									<td>' . $row['designation'] . '</td>
									<td>' . $row['role'] . '</td>
									<td>' . $row['department'] . '</td>
									<td>' . $row['blood_group'] . '</td>
									<td>' . $row['address'] . '</td>
									<td>' . $row['mobile_no'] . '</td>
									<td>' . $row['residence_no'] . '</td>
									<td>' . $row['PAN_no'] . '</td>
									<td>' . $row['PF_no'] . '</td>
									<td>' . $row['join_date'] . '</td>
									<td>' . $row['confirm_date'] . '</td>
									<td>' . $row['email_id'] . '</td>
									<td>' . $row['birth_date'] . '</td>
									<td>' . $row['sex'] . '</td>
									<td>' . $row['religion'] . '</td>
									<td>' . $row['caste'] . '</td>
									<td>' . $row['bank_ac_no'] . '</td>
								</tr>
							';
						}	
						echo'</table>
					';
				}
				if ($format == "academic")
				{
					require_once "connect.php";	
					
					$query = "SELECT id,fac_name,qualification,subject,passing_year,designation,sub_taught,joining_date,area_of_interest,appointment_nature,approval_type,approval_letterNo,previous_college,previous_college_letterNo,scale_grade,superannuation_date,teaching_experience,industry_experience,total_service_years FROM academic_info";
					$result = mysql_query($query) or die(mysql_error());
					echo '
						<table cellpadding="2" border="1px" style="max-width=100%; border-radius: 10px;">
							<tr>
								<th bgcolor="#FFFF00">ID</th>
								<th bgcolor="#FFFF00">Name</th>
								<!--th bgcolor="#FFFF00">Mobile No.</th-->
								<th bgcolor="#FFFF00">Qualification</th>
								<th bgcolor="#FFFF00">Qualifying Subject</th>
								<th bgcolor="#FFFF00">Passing Year</th>
								<th bgcolor="#FFFF00">Designation</th>
								<th bgcolor="#FFFF00">Subjects Taught</th>
								<th bgcolor="#FFFF00">Joining Date</th>
								<th bgcolor="#FFFF00">Area of Interest</th>
								<th bgcolor="#FFFF00">Presented Papers</th>
								<th bgcolor="#FFFF00">Seminars</th>
								<th bgcolor="#FFFF00">Appointment Nature</th>
								<th bgcolor="#FFFF00">Approval Type</th>
								<th bgcolor="#FFFF00">Approval Letter No.</th>
								<th bgcolor="#FFFF00">Previous College Name</th>
								<th bgcolor="#FFFF00">Previous College Appointment Letter No.</th>
								<th bgcolor="#FFFF00">Scale/Grade</th>
								<th bgcolor="#FFFF00">Supper Annuation Date</th>
								<th bgcolor="#FFFF00">Total Teaching Experience</th>
								<th bgcolor="#FFFF00">Total Industry Experience</th>
								<th bgcolor="#FFFF00">Total Service Year</th>
							</tr>
						';
						while ($row = mysql_fetch_array($result))
						{
							echo '
								<tr>
									<td>' . $row['id'] . '</td>
									<td>' . $row['fac_name'] . '</td>
									<td>' . $row['qualification'] . '</td>
									<td>' . $row['subject'] . '</td>
									<td>' . $row['passing_year'] . '</td>
									<td>' . $row['designation'] . '</td>
									<td>' . $row['sub_taught'] . '</td>
									<td>' . $row['joining_date'] . '</td>
									<td>' . $row['area_of_interest'] . '</td>
							';
									$temp_id = $row['id'];
									
									$subquery1 = "SELECT * FROM papers_presented WHERE id='$temp_id'";
									$result1 = mysql_query($subquery1);
									$count1 = mysql_num_rows($result1);
									if ($count1 == 0)
									{
										echo '
											<td>No Data Available</td>
										';
									}
									else
									{
										echo '<td>';
										while ($row1 = mysql_fetch_assoc($result1))
										{
											echo '
												* ' . $row1['title'] . '<br />
											';
										}
										echo '</td>';
									}
									
									$subquery2 = "SELECT * FROM seminars WHERE id='$temp_id'";
									$result2 = mysql_query($subquery2);
									$count2 = mysql_num_rows($result2);
									if ($count2 == 0)
									{
										echo '
											<td>No Data Available</td>
										';
									}
									else
									{
										echo '<td>';
										while ($row2 = mysql_fetch_assoc($result2))
										{
											echo '
												* ' . $row2['name'] . ' - ' . $row2['seminar_nature'] . '<br />
											';
										}
										echo '</td>';
									}
									
							echo '
									<td>' . $row['appointment_nature'] . '</td>
									<td>' . $row['approval_type'] . '</td>
									<td>' . $row['approval_letterNo'] . '</td>
									<td>' . $row['previous_college'] . '</td>
									<td>' . $row['previous_college_letterNo'] . '</td>
									<td>' . $row['scale_grade'] . '</td>
									<td>' . $row['superannuation_date'] . '</td>
									<td>' . $row['teaching_experience'] . '</td>
									<td>' . $row['industry_experience'] . '</td>
									<td>' . $row['total_service_years'] . '</td>
								</tr>
							';
						}	
						echo'</table>
					';
				}
			?>
			<?php
				echo '
					<table width="100%">
						<tr width="100%">
							<td align="center" width=33%">
								<input type="button" name="backbtn" id="backbtn" value="<< Go Back" onClick="history.go(-1)" />
							</td>
							<td align="center" width="34%">
								<form action="exportcsv" method="POST">
									<input type="hidden" name="query" value="' . $query . '">
									<input type="submit" name="exportbtn" id="exportbtn" value="Export to Excel" />
								</form>
							</td>
							<td align="center" width="33%">
								<input type="button" name="homebtn" id="homebtn" value="Home" onClick="gotohome();" />
							</td>
							</tr>
					</table>
				';
			?>
			
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