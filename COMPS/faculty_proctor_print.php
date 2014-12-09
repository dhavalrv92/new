<!--?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query = "SELECT * FROM kjscomp_student.student_personal WHERE reg_no='$reg_no'";
		$result = mysql_query($query) or die (mysql_error());
		$row = mysql_fetch_assoc($result) or die (mysql_error());
		if ( empty($row['course']) )
		{
			header("location: student_personal");
		}
	}
	else
	{
		header ("location: student_login");	
	}
?-->
<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "faculty") )
	{
		require_once "connect.php";
		
		if ( isset($_GET['id']) )
		{
			$reg_no = $_GET['id'];
			$query = "SELECT * FROM kjscomp_student.student_personal WHERE reg_no='$reg_no'";
			$result = mysql_query($query) or die (mysql_error());
			$row = mysql_fetch_assoc($result) or die (mysql_error());
		}
		else
		{
			header("location: proctor_student_list");
		}
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Faculty First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Proctor Form</title>
		<style type="text/css">
			table {
				width: 100%;
			}
			th, td {
				border: 1px solid #000000;
				width: 50%;
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
			.problems td {
				width: 12.5%;
			}
			.problems .head {
				width: 50%;
			}
			.semester_data {
				width: 12.5%;
				text-align: center;
			}
			.semester_head {
				width: 50%;
				align: center;
			}
		</style>
	</head>
	<body>
		<?php
			$page_no = 0;
		?>
		<div class="page">
			<center>
				<hr />
				<font class="college_name"><b>K. J. SOMAIAYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY,</b></font>
				<br />
				<font class="college_name"><strong>SION, MUMBAI-400 022</strong></font>
				<br />
				<font>Ayurvihar Complex, Near Everard Nagar, Eastern Express Highway, Sion, Mumbai-400 022</font>
				<br /><hr /><br />
				<font><strong>PROCTORIAL FORM</strong></font>
				<br /><hr /><br />
			</center>
			<table>
				<tr>
					<th>Registration Number : </th>
					<td><?php echo $row['reg_no']; ?></td>
				</tr>
				<tr>
					<th>Name : </th>
					<td><?php echo $row['name']; ?></td>
				</tr>
				<tr>
					<th>Year : </th>
					<td><?php echo $row['curr_year']; ?></td>
				</tr>
				<tr>
					<th>CET Rank : </th>
					<td><?php echo $row['cet_rank']; ?></td>
				</tr>
				<tr>
					<th>Date of Birth : </th>
					<td><?php echo $row['birth_date']; ?></td>
				</tr>
				<tr>
					<th>Admitted as : </th>
					<td><?php echo $row['admission_type']; ?></td>
				</tr>
				<tr>
					<th>Admitted on : </th>
					<td><?php echo $row['admission_date']; ?></td>
				</tr>
				<tr>
					<th>Branch : </th>
					<td><?php echo $row['branch']; ?></td>
				</tr>
				<tr>
					<th>Parent&#39;s Full Name : </th>
					<td><?php echo $row['parent_name']; ?></td>
				</tr>
				<tr>
					<th>Address : </th>
					<td><?php echo $row['address']; ?></td>
				</tr>
				<tr>
					<th>Telephone No. (Office) : </th>
					<td><?php echo $row['telephone_off']; ?></td>
				</tr>
				<tr>
					<th>Telephone No. (Residence) : </th>
					<td><?php echo $row['telephone_res']; ?></td>
				</tr>
				<tr>
					<th>Mobile No. (Personal) : </th>
					<td><?php echo $row['mobile_personal']; ?></td>
				</tr>
				<tr>
					<th>Mobile No. (Parent) : </th>
					<td><?php echo $row['mobile_parents']; ?></td>
				</tr>
				<tr>
					<th>E-mail ID : </th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Blood Group : </th>
					<td><?php echo $row['blood_group']; ?></td>
				</tr>
				<tr>
					<th>Hobbies : </th>
					<td><?php echo $row['hobbies']; ?></td>
				</tr>
			</table>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
		
		<div class="page">
			<br /><br /><br /><br />
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_yr1 = "SELECT * FROM proctor_grade_fe WHERE student_id='$reg_no'";
				$query_yr2 = "SELECT * FROM proctor_grade_se WHERE student_id='$reg_no'";
				$query_yr3 = "SELECT * FROM proctor_grade_te WHERE student_id='$reg_no'";
				$query_yr4 = "SELECT * FROM proctor_grade_be WHERE student_id='$reg_no'";
				
				$result_yr1 = mysql_query ($query_yr1);
				$result_yr2 = mysql_query ($query_yr2);
				$result_yr3 = mysql_query ($query_yr3);
				$result_yr4 = mysql_query ($query_yr4);
				
				$row_yr1 = mysql_fetch_assoc($result_yr1);
				$row_yr2 = mysql_fetch_assoc($result_yr2);
				$row_yr3 = mysql_fetch_assoc($result_yr3);
				$row_yr4 = mysql_fetch_assoc($result_yr4);
			?>
			<center>
				<table style="width: 100%;">
					<tr style="width: 100%;">
						<td align="center" style="width: 30%;"><strong>Grading at each Year *</strong></td>
						<td align="center" style="width: 12.5%;"><strong>Year 1</strong></td>
						<td align="center" style="width: 12.5%;"><strong>Year 2</strong></td>
						<td align="center" style="width: 12.5%;"><strong>Year 3</strong></td>
						<td align="center" style="width: 12.5%;"><strong>Year 4</strong></td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">General Discipline</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['discipline']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['discipline']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['discipline']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['discipline']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Communicative skill</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['comm_skill']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['comm_skill']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['comm_skill']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['comm_skill']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">General Grooming</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['grooming']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['grooming']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['grooming']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['grooming']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Response to Co-Curricular Activity</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['co_curricular']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['co_curricular']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['co_curricular']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['co_curricular']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Response to Extra-Curricular Activity</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['extra_curricular']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['extra_curricular']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['extra_curricular']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['extra_curricular']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Community Responsibility</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['responsibility']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['responsibility']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['responsibility']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['responsibility']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Punctuality in Classes</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['punctuality']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['punctuality']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['punctuality']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['punctuality']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Behaviour towards Faculty</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['behaviour']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['behaviour']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['behaviour']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['behaviour']; ?>
						</td>
					</tr>
					<tr>
						<td align="left" style="width: 30%;">Overall Grading</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr1['overall_grading']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr2['overall_grading']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr3['overall_grading']; ?>
						</td>
						<td align="center" style="width: 12.5%;">
							<?php echo $row_yr4['overall_grading']; ?>
						</td>
					</tr>
					<tr>
						<th colspan="5">
							* 5: Excellent, 4: Very Good, 3: Needs to Improve, 2: Needs Counselling, 1: Needs to be Warned, 0: NA
						</th>
					</tr>
				</table>
				<br /><br /><br /><br />
				<table style="border: 0px solid #000000;">
					<tr style="border: 0px solid #000000;">
						<th align="center" style="border: 0px solid #000000;" cellspacing="5"><?php echo $row_yr2['faculty_name']; ?></th>
						<th align="center" style="border: 0px solid #000000;" cellspacing="5"><br /></th>
					</tr>
					<tr>
						<td align="center" style="border: 0px solid #000000;">Name of the Proctor</td>
						<td align="center" style="border: 0px solid #000000;">Signature</td>
					</tr>
				</table>
			</center>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
		<div class="page">
			<br /><br /><br /><br />
				<?php
					require_once "connect.php";
					mysql_select_db("kjscomp_proctor") or die (mysql_error());
					
					$query_yr1 = "SELECT * FROM proctor_problems_fe WHERE student_id='$reg_no'";
					$query_yr2 = "SELECT * FROM proctor_problems_se WHERE student_id='$reg_no'";
					$query_yr3 = "SELECT * FROM proctor_problems_te WHERE student_id='$reg_no'";
					$query_yr4 = "SELECT * FROM proctor_problems_be WHERE student_id='$reg_no'";
					
					$result_yr1 = mysql_query ($query_yr1);
					$result_yr2 = mysql_query ($query_yr2);
					$result_yr3 = mysql_query ($query_yr3);
					$result_yr4 = mysql_query ($query_yr4);
					
					$row_yr1 = mysql_fetch_assoc($result_yr1);
					$row_yr2 = mysql_fetch_assoc($result_yr2);
					$row_yr3 = mysql_fetch_assoc($result_yr3);
					$row_yr4 = mysql_fetch_assoc($result_yr4);
				?>
			<center>
				<table class="problems">
					<tr>
						<td class="head"><strong>Problems : </strong></td>
						<td>
							<?php echo $row_yr1['problems']; ?>
						</td>
						<td>
							<?php echo $row_yr2['problems']; ?>
						</td>
						<td>
							<?php echo $row_yr3['problems']; ?>
						</td>
						<td>
							<?php echo $row_yr4['problems']; ?>
						</td>
					</tr>
					<tr>
						<td class="head"><strong>Warnings Issued : </strong></td>
						<td>
							<?php echo $row_yr1['warnings']; ?>
						</td>
						<td>
							<?php echo $row_yr2['warnings']; ?>
						</td>
						<td>
							<?php echo $row_yr3['warnings']; ?>
						</td>
						<td>
							<?php echo $row_yr4['warnings']; ?>
						</td>
					</tr>
					<tr>
						<td class="head"><strong>Disciplinary Actions Taken : </strong></td>
						<td>
							<?php echo $row_yr1['actions']; ?>
						</td>
						<td>
							<?php echo $row_yr2['actions']; ?>
						</td>
						<td>
							<?php echo $row_yr3['actions']; ?>
						</td>
						<td>
							<?php echo $row_yr4['actions']; ?>
						</td>
					</tr>
				</table>
				<br /><br /><br /><br />
				<table style="border: 0px solid #000000;">
					<tr style="border: 0px solid #000000;">
						<th align="center" style="border: 0px solid #000000;" cellspacing="5"><?php echo $row_yr2['faculty_name']; ?></th>
						<th align="center" style="border: 0px solid #000000;" cellspacing="5"><br /></th>
					</tr>
					<tr>
						<td align="center" style="border: 0px solid #000000;">Name of the Proctor</td>
						<td align="center" style="border: 0px solid #000000;">Signature</td>
					</tr>
				</table>
			</center>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
		
		<div class="page">
			<center>
				<hr />
				<font><strong>Examination Results and Attendence Analysis</strong></font>
				<br /><hr /><br />
				<hr />
				<?php
					$check = "SELECT admission_year FROM kjscomp_student.student_personal WHERE reg_no='$reg_no'";
					$result_check = mysql_query($check) or die (mysql_error());
					$row_check = mysql_fetch_assoc($result_check) or die (mysql_error());
					if ( $row_check['admission_year'] != "DSE" )
					{
				?>
						<font><strong>Semester I</strong></font>
						<br /><hr /><br />
						</center>
						<?php
							require_once "connect.php";
							mysql_select_db("kjscomp_proctor") or die (mysql_error());
							if ( $row['course'] == "Revised" )
							{
								$query_data = "SELECT * FROM proctor_rev_sem_i WHERE student_id='$reg_no'";
								$result_data = mysql_query($query_data);
								$row_data = mysql_fetch_assoc($result_data);
							}
							else if ( $row['course'] == "New" )
							{
								$query_data = "SELECT * FROM proctor_new_sem_i WHERE student_id='$reg_no'";
								$result_data = mysql_query($query_data);
								$row_data = mysql_fetch_assoc($result_data);
							}
						?>
						<?php
							if ( $row['course'] == "Revised" )
							{
						?>
								<table>
									<tr>
										<th>Name of the Subject</th>
										<th>Attendence in %</th>
									</tr>
									<tr>
										<td>Applied Mathematics-I</td>
										<td><?php echo $row_data['maths_I']; ?></td>
									</tr>
									<tr>
										<td>Applied Physics-I</td>
										<td><?php echo $row_data['physics_I']; ?></td>
									</tr>
									<tr>
										<td>Applied Chemistry-I</td>
										<td><?php echo $row_data['chemistry_I']; ?></td>
									</tr>
									<tr>
										<td>Engineering Mechanics</td>
										<td><?php echo $row_data['mechanics']; ?></td>
									</tr>
									<tr>
										<td>Basic Electrical and Electronics Engineering</td>
										<td><?php echo $row_data['bee']; ?></td>
									</tr>
									<tr>
										<td>Computer Programming-I</td>
										<td><?php echo $row_data['cp_I']; ?></td>
									</tr>
									<tr>
										<td>Basic Workshop and Programming-I</td>
										<td><?php echo $row_data['workshop_I']; ?></td>
									</tr>
								</table>
						<?php
							}
							else if ( $row['course'] == "New" )
							{
						?>
								<table>
									<tr>
										<th>Name of the Subject</th>
										<th>Attendence in %</th>
									</tr>
									<tr>
										<td>Applied Mathematics-I</td>
										<td><?php echo $row_data['maths_I']; ?></td>
									</tr>
									<tr>
										<td>Applied Physics-I</td>
										<td><?php echo $row_data['physics_I']; ?></td>
									</tr>
									<tr>
										<td>Applied Chemistry-I</td>
										<td><?php echo $row_data['chemistry_I']; ?></td>
									</tr>
									<tr>
										<td>Engineering Mechanics</td>
										<td><?php echo $row_data['mechanics']; ?></td>
									</tr>
									<tr>
										<td>Basic Electrical and Electronics Engineering</td>
										<td><?php echo $row_data['bee']; ?></td>
									</tr>
									<tr>
										<td>Environmental Studies</td>
										<td><?php echo $row_data['es']; ?></td>
									</tr>
									<tr>
										<td>Basic Workshop and Programming-I</td>
										<td><?php echo $row_data['workshop_I']; ?></td>
									</tr>
								</table>
						<?php
							}
						?>
						<br /><hr /><br />
						
						<center>
							<br /><hr /><br />
							<font><strong>Semester II</strong></font>
							<br /><hr /><br />
						</center>
						<?php
							require_once "connect.php";
							mysql_select_db("kjscomp_proctor") or die (mysql_error());
							if ( $row['course'] == "Revised" )
							{
								$query_data = "SELECT * FROM proctor_rev_sem_ii WHERE student_id='$reg_no'";
								$result_data = mysql_query($query_data);
								$row_data = mysql_fetch_assoc($result_data);
							}
							else if ( $row['course'] == "New" )
							{
								$query_data = "SELECT * FROM proctor_new_sem_ii WHERE student_id='$reg_no'";
								$result_data = mysql_query($query_data);
								$row_data = mysql_fetch_assoc($result_data);
							}
						?>
						<?php
							if ( $row['course'] == "Revised" )
							{
						?>
								<table>
									<tr>
										<th>Name of the Subject</th>
										<th>Attendence in %</th>
									</tr>
									<tr>
										<td>Applied Mathematics-II</td>
										<td><?php echo $row_data['maths_II']; ?></td>
									</tr>
									<tr>
										<td>Applied Physics-II</td>
										<td><?php echo $row_data['physics_II']; ?></td>
									</tr>
									<tr>
										<td>Applied Chemistry-II</td>
										<td><?php echo $row_data['chemistry_II']; ?></td>
									</tr>
									<tr>
										<td>Communication Skills</td>
										<td><?php echo $row_data['comm_skills']; ?></td>
									</tr>
									<tr>
										<td>Engineering Drawing</td>
										<td><?php echo $row_data['engg_drawing']; ?></td>
									</tr>
									<tr>
										<td>Computer Programming-II</td>
										<td><?php echo $row_data['cp_II']; ?></td>
									</tr>
									<tr>
										<td>Basic Workshop and Programming-II</td>
										<td><?php echo $row_data['workshop_II']; ?></td>
									</tr>
								</table>
						<?php
							}
							else if ( $row['course'] == "New" )
							{
						?>
								<table>
									<tr>
										<th>Name of the Subject</th>
										<th>Attendence in %</th>
									</tr>
									<tr>
										<td>Applied Mathematics-II</td>
										<td><?php echo $row_data['maths_II']; ?></td>
									</tr>
									<tr>
										<td>Applied Physics-II</td>
										<td><?php echo $row_data['physics_II']; ?></td>
									</tr>
									<tr>
										<td>Applied Chemistry-II</td>
										<td><?php echo $row_data['chemistry_II']; ?></td>
									</tr>
									<tr>
										<td>Engineering Drawing</td>
										<td><?php echo $row_data['engg_drawing']; ?></td>
									</tr>
									<tr>
										<td>Structured Programming Approach</td>
										<td><?php echo $row_data['spa']; ?></td>
									</tr>
									<tr>
										<td>Communication Skills</td>
										<td><?php echo $row_data['comm_skills']; ?></td>
									</tr>
									<tr>
										<td>Basic Workshop and Programming-II</td>
										<td><?php echo $row_data['workshop_II']; ?></td>
									</tr>
								</table>
						<?php
							}
						?>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
				
		<div class="page">
			<center>
				<hr />
				<br />
				<br /><hr /><br />
				<hr />
				<?php
					}
				?>
				<font><strong>Semester III</strong></font>
				<br /><hr /><br />
			</center>
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				if ( $row['course'] == "Revised" )
				{
					$query_data = "SELECT * FROM proctor_rev_sem_iii WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data) or die (mysql_error());
					$row_data = mysql_fetch_assoc($result_data) or die (mysql_error());
					
					$query_exam = "SELECT * FROM kjscomp_student.rev_sem_iii WHERE student_id='$reg_no'";
					$result_exam = mysql_query($query_exam) or die (mysql_error());
					$row_exam = mysql_fetch_assoc($result_exam) or die (mysql_error());
				}
				else if ( $row['course'] == "New" )
				{
					$query_data = "SELECT * FROM proctor_new_sem_iii WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
				}
			?>
			<?php
				if ( $row['course'] == "Revised" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td class="semester_head">Applied Mathematics-III</td>
							<td class="semester_data"><?php echo $row_data['maths_III']; ?></td>
							<td class="semester_data"><?php echo $row_exam['maths_III_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['maths_III_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Electronic Devices and Linear Circuits</td>
							<td class="semester_data"><?php echo $row_data['edlc']; ?></td>
							<td class="semester_data"><?php echo $row_exam['edlc_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['edlc_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['edlc_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Discrete Structure & Graph Theory</td>
							<td class="semester_data"><?php echo $row_data['dsgt']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsgt_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsgt_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Digital Logic Design and Application</td>
							<td class="semester_data"><?php echo $row_data['dlda']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dlda_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dlda_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Data Structure and Files</td>
							<td class="semester_data"><?php echo $row_data['dsf']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsf_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsf_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsf_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Computer Organization & Architecture</td>
							<td class="semester_data"><?php echo $row_data['coa']; ?></td>
							<td class="semester_data"><?php echo $row_exam['coa_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['coa_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Presentation and Communication Techniques</td>
							<td class="semester_data"><?php echo $row_data['pct']; ?></td>
							<td class="semester_data">NA</td>
							<td class="semester_data"><?php echo $row_exam['pct_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<th class="semester_head">Total</th>
							<td colspan="4"><?php echo $row_exam['total']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Percentage %</th>
							<td colspan="4"><?php echo round(( ($row_exam['total']*100)/850 ),2); ?></td>
						</tr>
					</table>
			<?php
				}
				else if ( $row['course'] == "New" )
				{
			?>
					<table>
						<tr>
							<th>Name of the Subject</th>
							<th>Attendence in %</th>
						</tr>
						<tr>
							<td>Applied Mathematics-III</td>
							<td><?php echo $row_data['maths_III']; ?></td>
						</tr>
						<tr>
							<td>Object Oriented Programming Methodology</td>
							<td><?php echo $row_data['oopm']; ?></td>
						</tr>
						<tr>
							<td>Data Structures</td>
							<td><?php echo $row_data['ds']; ?></td>
						</tr>
						<tr>
							<td>Digital Logic Design and Application</td>
							<td><?php echo $row_data['dlda']; ?></td>
						</tr>
						<tr>
							<td>Discrete Structures</td>
							<td><?php echo $row_data['dis']; ?></td>
						</tr>
						<tr>
							<td>Electronic Circuits and Communication Fundamentals</td>
							<td><?php echo $row_data['eccf']; ?></td>
						</tr>
					</table>
			<?php
				}
			?>
			<br /><hr /><br />
			<center>
				<br /><hr /><br />
				<font><strong>Semester IV</strong></font>
				<br /><hr /><br />
			</center>
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				if ( $row['course'] == "Revised" )
				{
					$query_data = "SELECT * FROM proctor_rev_sem_iv WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
						
					$query_exam = "SELECT * FROM kjscomp_student.rev_sem_iv WHERE student_id='$reg_no'";
					$result_exam = mysql_query($query_exam) or die (mysql_error());
					$row_exam = mysql_fetch_assoc($result_exam) or die (mysql_error());
				}
				else if ( $row['course'] == "New" )
				{
					$query_data = "SELECT * FROM proctor_new_sem_iv WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
				}
			?>
			<?php
				if ( $row['course'] == "Revised" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td class="semester_head">Applied Mathematics-IV</td>
							<td class="semester_data"><?php echo $row_data['maths_IV']; ?></td>
							<td class="semester_data"><?php echo $row_exam['maths_IV_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['maths_IV_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Analog & Digital Communication</td>
							<td class="semester_data"><?php echo $row_data['adc']; ?></td>
							<td class="semester_data"><?php echo $row_exam['adc_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['adc_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Database Management System</td>
							<td class="semester_data"><?php echo $row_data['dbms']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dbms_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dbms_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dbms_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Computer Graphics</td>
							<td class="semester_data"><?php echo $row_data['cg']; ?></td>
							<td class="semester_data"><?php echo $row_exam['cg_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['cg_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['cg_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Analysis of Algorithm & Design</td>
							<td class="semester_data"><?php echo $row_data['aoad']; ?></td>
							<td class="semester_data"><?php echo $row_exam['aoad_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['aoad_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['aoad_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Operating System</td>
							<td class="semester_data"><?php echo $row_data['os']; ?></td>
							<td class="semester_data"><?php echo $row_exam['os_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['os_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['os_pr']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Total</th>
							<td colspan="4"><?php echo $row_exam['total']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Percentage %</th>
							<td colspan="4"><?php echo round(( ($row_exam['total']*100)/850 ),2); ?></td>
						</tr>
					</table>
			<?php
				}
				else if ( $row['course'] == "New" )
				{
			?>
					<table>
						<tr>
							<th>Name of the Subject</th>
							<th>Attendence in %</th>
						</tr>
						<tr>
							<td>Applied Mathematics-IV</td>
							<td><?php echo $row_data['maths_IV']; ?></td>
						</tr>
						<tr>
							<td>Analysis of Algorithms</td>
							<td><?php echo $row_data['aoa']; ?></td>
						</tr>
						<tr>
							<td>Computer Organization and Architecture</td>
							<td><?php echo $row_data['coa']; ?></td>
						</tr>
						<tr>
							<td>Data Base Management systems</td>
							<td><?php echo $row_data['dbms']; ?></td>
						</tr>
						<tr>
							<td>Theoretical Computer Science</td>
							<td><?php echo $row_data['tcs']; ?></td>
						</tr>
						<tr>
							<td>Computer Graphics</td>
							<td><?php echo $row_data['cg']; ?></td>
						</tr>
					</table>
			<?php
				}
			?>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
		
		<div class="page">
			<center>
				<hr />
				<br />
				<br /><hr /><br />
				<hr />
				<font><strong>Semester V</strong></font>
				<br /><hr /><br />
			</center>
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				if ( $row['course'] == "Revised" )
				{
					$query_data = "SELECT * FROM proctor_rev_sem_v WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
						
					$query_exam = "SELECT * FROM kjscomp_student.rev_sem_v WHERE student_id='$reg_no'";
					$result_exam = mysql_query($query_exam) or die (mysql_error());
					$row_exam = mysql_fetch_assoc($result_exam) or die (mysql_error());
				}
				else if ( $row['course'] == "New" )
				{
					$query_data = "SELECT * FROM proctor_new_sem_v WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
				}
			?>
			<?php
				if ( $row['course'] == "Revised" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td class="semester_head">Computer Network</td>
							<td class="semester_data"><?php echo $row_data['cn']; ?></td>
							<td class="semester_data"><?php echo $row_exam['cn_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['cn_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['cn_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Advance Database Management System</td>
							<td class="semester_data"><?php echo $row_data['adbms']; ?></td>
							<td class="semester_data"><?php echo $row_exam['adbms_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['adbms_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['adbms_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Microprocessor</td>
							<td class="semester_data"><?php echo $row_data['mp']; ?></td>
							<td class="semester_data"><?php echo $row_exam['mp_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['mp_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['mp_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Theory of Computer Science</td>
							<td class="semester_data"><?php echo $row_data['tcs']; ?></td>
							<td class="semester_data"><?php echo $row_exam['tcs_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['tcs_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<td class="semester_head">Web Engineering</td>
							<td class="semester_data"><?php echo $row_data['we']; ?></td>
							<td class="semester_data"><?php echo $row_exam['we_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['we_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['we_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Enviormental Studies</td>
							<td class="semester_data"><?php echo $row_data['evs']; ?></td>
							<td class="semester_data"><?php echo $row_exam['evs_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['evs_tw']; ?></td>
							<td class="semester_data">NA</td>
						</tr>
						<tr>
							<th class="semester_head">Total</th>
							<td colspan="4"><?php echo $row_exam['total']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Percentage %</th>
							<td colspan="4"><?php echo round(( ($row_exam['total']*100)/850 ),2); ?></td>
						</tr>
					</table>
			<?php
				}
				/*else if ( $row['course'] == "New" )
				{
			?>
					<table>
						<tr>
							<th>Name of the Subject</th>
							<th>Attendence in %</th>
						</tr>
						<tr>
							<td>Computer Network</td>
							<td><?php echo $row_data['cn']; ?></td>
						</tr>
						<tr>
							<td>Advance Database Management System</td>
							<td><?php echo $row_data['adbms']; ?></td>
						</tr>
						<tr>
							<td>Microprocessor</td>
							<td><?php echo $row_data['mp']; ?></td>
						</tr>
						<tr>
							<td>Theory of Computer Science</td>
							<td><?php echo $row_data['tcs']; ?></td>
						</tr>
						<tr>
							<td>Web Engineering</td>
							<td><?php echo $row_data['we']; ?></td>
						</tr>
						<tr>
							<td>Enviormental Studies</td>
							<td><?php echo $row_data['evs']; ?></td>
						</tr>
					</table>
			<?php
				}*/
			?>
			<br /><hr /><br />
			
			<center>
				<br /><hr /><br />
				<font><strong>Semester VI</strong></font>
				<br /><hr /><br />
			</center>
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				if ( $row['course'] == "Revised" )
				{
					$query_data = "SELECT * FROM proctor_rev_sem_vi WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
						
					$query_exam = "SELECT * FROM kjscomp_student.rev_sem_vi WHERE student_id='$reg_no'";
					$result_exam = mysql_query($query_exam) or die (mysql_error());
					$row_exam = mysql_fetch_assoc($result_exam) or die (mysql_error());
				}
				else if ( $row['course'] == "New" )
				{
					$query_data = "SELECT * FROM proctor_new_sem_vi WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
				}
			?>
			<?php
				if ( $row['course'] == "Revised" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td class="semester_head">Advance Computer Network</td>
							<td class="semester_data"><?php echo $row_data['acn']; ?></td>
							<td class="semester_data"><?php echo $row_exam['acn_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['acn_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['acn_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">System Programming And Compiler Construction</td>
							<td class="semester_data"><?php echo $row_data['spcc']; ?></td>
							<td class="semester_data"><?php echo $row_exam['spcc_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['spcc_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['spcc_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Object Oriented Software Engineering</td>
							<td class="semester_data"><?php echo $row_data['oose']; ?></td>
							<td class="semester_data"><?php echo $row_exam['oose_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['oose_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['oose_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Advance Microprocessor</td>
							<td class="semester_data"><?php echo $row_data['amp']; ?></td>
							<td class="semester_data"><?php echo $row_exam['amp_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['amp_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['amp_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Data Warehouse And Mining</td>
							<td class="semester_data"><?php echo $row_data['dwm']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dwm_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dwm_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dwm_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Seminar</td>
							<td class="semester_data"><?php echo $row_data['seminar']; ?></td>
							<td class="semester_data">NA</td>
							<td class="semester_data"><?php echo $row_exam['seminar_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['seminar_pr']; ?></td>
						</tr>
							<th class="semester_head">Total</th>
							<td colspan="4"><?php echo $row_exam['total']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Percentage %</th>
							<td colspan="4"><?php echo round(( ($row_exam['total']*100)/850 ),2); ?></td>
						</tr>
					</table>
			<?php
				}
				/*else if ( $row['course'] == "New" )
				{
			?>
					<table>
						<tr>
							<th>Name of the Subject</th>
							<th>Attendence in %</th>
						</tr>
						<tr>
							<td>Advance Computer Network</td>
							<td><?php echo $row_data['acn']; ?></td>
						</tr>
						<tr>
							<td>System Programming And Compiler Construction</td>
							<td><?php echo $row_data['spcc']; ?></td>
						</tr>
						<tr>
							<td>Object Oriented Software Engineering</td>
							<td><?php echo $row_data['oose']; ?></td>
						</tr>
						<tr>
							<td>Advance Microprocessor</td>
							<td><?php echo $row_data['amp']; ?></td>
						</tr>
						<tr>
							<td>Data Warehouse And Mining</td>
							<td><?php echo $row_data['dwm']; ?></td>
						</tr>
						<tr>
							<td>Seminar</td>
							<td><?php echo $row_data['seminar'] ?></td>
						</tr>
					</table>
			<?php
				}*/
			?>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
		
		<div class="page">
			<center>
				<hr />
				<br />
				<br /><hr /><br />
				<hr />
				<font><strong>Semester VII</strong></font>
				<br /><hr /><br />
			</center>
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				if ( $row['course'] == "Revised" )
				{
					$query_data = "SELECT * FROM proctor_rev_sem_vii WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
						
					$query_exam = "SELECT * FROM kjscomp_student.rev_sem_vii WHERE student_id='$reg_no'";
					$result_exam = mysql_query($query_exam) or die (mysql_error());
					$row_exam = mysql_fetch_assoc($result_exam) or die (mysql_error());
					
					$query_elective = "SELECT * FROM kjscomp_student.rev_elective WHERE student_id='$reg_no'";
					$result_elective = mysql_query($query_elective) or die (mysql_error());
					$row_elective = mysql_fetch_assoc($result_elective) or die (mysql_error());
				}
				else if ( $row['course'] == "New" )
				{
					$query_data = "SELECT * FROM proctor_new_sem_vii WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
				}
			?>
			<?php
				if ( $row['course'] == "Revised" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td class="semester_head">Digital Signal & Image Processing</td>
							<td class="semester_data"><?php echo $row_data['dsip']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsip_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsip_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dsip_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Robotics and AI</td>
							<td class="semester_data"><?php echo $row_data['rai']; ?></td>
							<td class="semester_data"><?php echo $row_exam['rai_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['rai_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['rai_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Mobile Computing</td>
							<td class="semester_data"><?php echo $row_data['mc']; ?></td>
							<td class="semester_data"><?php echo $row_exam['mc_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['mc_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['mc_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">System Security</td>
							<td class="semester_data"><?php echo $row_data['ss']; ?></td>
							<td class="semester_data"><?php echo $row_exam['ss_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['ss_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['ss_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head"><?php echo $row_elective['elective_VII']; ?></td>
							<td class="semester_data"><?php echo $row_data['elective_I']; ?></td>
							<td class="semester_data"><?php echo $row_exam['elective_I_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['elective_I_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['elective_I_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Project-I</td>
							<td class="semester_data">NA</td>
							<td class="semester_data">NA</td>
							<td class="semester_data"><?php echo $row_exam['project_I_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['project_I_pr']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Total</th>
							<td colspan="4"><?php echo $row_exam['total']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Percentage %</th>
							<td colspan="4"><?php echo round(( ($row_exam['total']*100)/800 ),2); ?></td>
						</tr>
					</table>
			<?php
				}
				/*else if ( $row['course'] == "New" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td>Digital Signal & Image Processing</td>
							<td><?php echo $row_data['dsip']; ?></td>
						</tr>
						<tr>
							<td>Robotics and AI</td>
							<td><?php echo $row_data['rai']; ?></td>
						</tr>
						<tr>
							<td>Mobile Computing</td>
							<td><?php echo $row_data['mc']; ?></td>
						</tr>
						<tr>
							<td>System Security</td>
							<td><?php echo $row_data['ss']; ?></td>
						</tr>
						<tr>
							<td>Elective-I</td>
							<td><?php echo $row_data['elective_I']; ?></td>
						</tr>
					</table>
			<?php
				}*/
			?>
			<br /><hr /><br />
			
			<center>
				<br /><hr /><br />
				<font><strong>Semester VIII</strong></font>
				<br /><hr /><br />
			</center>
			<?php
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				if ( $row['course'] == "Revised" )
				{
					$query_data = "SELECT * FROM proctor_rev_sem_viii WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
						
					$query_exam = "SELECT * FROM kjscomp_student.rev_sem_viii WHERE student_id='$reg_no'";
					$result_exam = mysql_query($query_exam) or die (mysql_error());
					$row_exam = mysql_fetch_assoc($result_exam) or die (mysql_error());
					
					$query_elective = "SELECT * FROM kjscomp_student.rev_elective WHERE student_id='$reg_no'";
					$result_elective = mysql_query($query_elective) or die (mysql_error());
					$row_elective = mysql_fetch_assoc($result_elective) or die (mysql_error());
				}
				else if ( $row['course'] == "New" )
				{
					$query_data = "SELECT * FROM proctor_new_sem_viii WHERE student_id='$reg_no'";
					$result_data = mysql_query($query_data);
					$row_data = mysql_fetch_assoc($result_data);
				}
			?>
			<?php
				if ( $row['course'] == "Revised" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td class="semester_head">Distributed Computing</td>
							<td class="semester_data"><?php echo $row_data['dc']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dc_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dc_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['dc_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Multimedia System Design</td>
							<td class="semester_data"><?php echo $row_data['msd']; ?></td>
							<td class="semester_data"><?php echo $row_exam['msd_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['msd_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['msd_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Software Architecture</td>
							<td class="semester_data"><?php echo $row_data['sa']; ?></td>
							<td class="semester_data"><?php echo $row_exam['sa_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['sa_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['sa_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head"><?php echo $row_elective['elective_VIII']; ?></td>
							<td class="semester_data"><?php echo $row_data['elective_II']; ?></td>
							<td class="semester_data"><?php echo $row_exam['elective_II_th']; ?></td>
							<td class="semester_data"><?php echo $row_exam['elective_II_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['elective_II_pr']; ?></td>
						</tr>
						<tr>
							<td class="semester_head">Project-II</td>
							<td class="semester_data">NA</td>
							<td class="semester_data">NA</td>
							<td class="semester_data"><?php echo $row_exam['project_II_tw']; ?></td>
							<td class="semester_data"><?php echo $row_exam['project_II_pr']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Total</th>
							<td colspan="4"><?php echo $row_exam['total']; ?></td>
						</tr>
						<tr>
							<th class="semester_head">Percentage %</th>
							<td colspan="4"><?php echo round(( ($row_exam['total']*100)/700 ),2); ?></td>
						</tr>
					</table>
			<?php
				}
				/*else if ( $row['course'] == "New" )
				{
			?>
					<table>
						<tr>
							<th class="semester_head">Name of the Subject</th>
							<th class="semester_data">Attendence in %</th>
							<th class="semester_data">Theory</th>
							<th class="semester_data">Term Work</th>
							<th class="semester_data">Practical/Oral</th>
						</tr>
						<tr>
							<td>Distributed Computing</td>
							<td><?php echo $row_data['dc']; ?></td>
						</tr>
						<tr>
							<td>Multimedia System Design</td>
							<td><?php echo $row_data['msd']; ?></td>
						</tr>
						<tr>
							<td>Software Architecture</td>
							<td><?php echo $row_data['sa']; ?></td>
						</tr>
						<tr>
							<td>Elective-II</td>
							<td><?php echo $row_data['elective_II']; ?></td>
						</tr>
					</table>
			<?php
				}*/
			?>
			<br /><hr /><br />
			<div class="page_no">
				<font class="page_no">Date. <?php echo date("d/m/Y"); ?></font>
				<br />
				<font class="page_no">Page. <?php echo ($page_no = $page_no+1); ?></font>
			</div>
		</div>
		
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem I' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
				';
				if ( $row_check['admission_year'] != "DSE" )
				{
					echo '
							<font><strong>Semester I</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
					';
					while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
					{
						echo '
							<tr style="width: 100%;">
								<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
								<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
								<td style="width: 14%;">' . $row_achievement['title'] . '</td>
								<td style="width: 14%;">' . $row_achievement['place'] . '</td>
								<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
								<td style="width: 30%;">' . $row_achievement['description'] . '</td>
							</tr>
						';
					}
					echo '
						</table>
						<br /><hr /><br />
						<div class="page_no">
							<font class="page_no">Date. ' . date("d/m/Y") . '</font>
							<br />
							<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
						</div>
					';
					echo '
						</div>
					';
				}
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem II' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
				';
				if ( $row_check['admission_year'] != "DSE" )
				{
					echo '
							<font><strong>Semester II</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
					';
					while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
					{
						echo '
							<tr style="width: 100%;">
								<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
								<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
								<td style="width: 14%;">' . $row_achievement['title'] . '</td>
								<td style="width: 14%;">' . $row_achievement['place'] . '</td>
								<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
								<td style="width: 30%;">' . $row_achievement['description'] . '</td>
							</tr>
						';
					}
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem III' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
							<font><strong>Semester III</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
				';
				while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
				{
					echo '
						<tr style="width: 100%;">
							<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
							<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
							<td style="width: 14%;">' . $row_achievement['title'] . '</td>
							<td style="width: 14%;">' . $row_achievement['place'] . '</td>
							<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
							<td style="width: 30%;">' . $row_achievement['description'] . '</td>
						</tr>
					';
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem IV' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
							<font><strong>Semester IV</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
				';
				while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
				{
					echo '
						<tr style="width: 100%;">
							<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
							<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
							<td style="width: 14%;">' . $row_achievement['title'] . '</td>
							<td style="width: 14%;">' . $row_achievement['place'] . '</td>
							<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
							<td style="width: 30%;">' . $row_achievement['description'] . '</td>
						</tr>
					';
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem V' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
							<font><strong>Semester V</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
				';
				while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
				{
					echo '
						<tr style="width: 100%;">
							<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
							<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
							<td style="width: 14%;">' . $row_achievement['title'] . '</td>
							<td style="width: 14%;">' . $row_achievement['place'] . '</td>
							<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
							<td style="width: 30%;">' . $row_achievement['description'] . '</td>
						</tr>
					';
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem VI' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
							<font><strong>Semester VI</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
				';
				while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
				{
					echo '
						<tr style="width: 100%;">
							<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
							<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
							<td style="width: 14%;">' . $row_achievement['title'] . '</td>
							<td style="width: 14%;">' . $row_achievement['place'] . '</td>
							<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
							<td style="width: 30%;">' . $row_achievement['description'] . '</td>
						</tr>
					';
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem VII' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
							<font><strong>Semester VII</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
				';
				while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
				{
					echo '
						<tr style="width: 100%;">
							<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
							<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
							<td style="width: 14%;">' . $row_achievement['title'] . '</td>
							<td style="width: 14%;">' . $row_achievement['place'] . '</td>
							<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
							<td style="width: 30%;">' . $row_achievement['description'] . '</td>
						</tr>
					';
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
		<?php
			$achievement_query = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$reg_no' AND semester='Sem VIII' ORDER BY activity_type";
			$achievement_check = mysql_query($achievement_query) or die (mysql_error());
			$achievement_count = mysql_num_rows($achievement_check);
			if ( $achievement_count > 0 )
			{
				echo '
					<div class="page">
						<center>
							<hr />
							<font><strong>Student Achievement Details</strong></font>
							<br /><hr /><br />
							<hr />
							<font><strong>Semester VIII</strong></font>
							<br /><hr /><br />
						</center>
						<table style="text-align: center; width: 100%;">
							<tr style="width: 100%;">
								<th style="width: 14%;">Activity Type</th>
								<th style="width: 14%;">Event Date</th>
								<th style="width: 14%;">Title</th>
								<th style="width: 14%;">Place</th>
								<th style="width: 14%;">Achievement</th>
								<th style="width: 30%;">Description</th>
							</tr>
				';
				while ( $row_achievement = mysql_fetch_assoc($achievement_check) )
				{
					echo '
						<tr style="width: 100%;">
							<td style="width: 14%;">' . $row_achievement['activity_type'] . '</td>
							<td style="width: 14%;">' . $row_achievement['event_date'] . '</td>
							<td style="width: 14%;">' . $row_achievement['title'] . '</td>
							<td style="width: 14%;">' . $row_achievement['place'] . '</td>
							<td style="width: 14%;">' . $row_achievement['achievement'] . '</td>
							<td style="width: 30%;">' . $row_achievement['description'] . '</td>
						</tr>
					';
				}
				echo '
					</table>
					<br /><hr /><br />
					<div class="page_no">
						<font class="page_no">Date. ' . date("d/m/Y") . '</font>
						<br />
						<font class="page_no">Page. ' . ($page_no = $page_no+1) . '</font>
					</div>
				';
				echo '
					</div>
				';
			}
		?>
	</body>
</html>