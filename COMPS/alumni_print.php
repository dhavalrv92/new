<!DOCTYPE html>
<html>
	<head>
		<title>Alumni Details</title>
		<style type="text/css">
			table {
				border-spacing: 1px;
				width: 100%;
			}
			th, td {
				 
				border: 1px solid #000000;
				/*width: 50%;*/
			}
			img {
				width: 60%;
				height: 30%;
			}
			@page {
				size 11in 8.5in;
				magin: 4cm;
				size: landscape
			}
			div.page {
				page-break-after: always;
			}
			.page_no {
				float: right;
				text-align: right;
			}
			.name_table {
				border: 0px solid #000000;
			}
			.question {
				width: 70%;
			}
			.answer {
				width: 30%;
			}
		</style>
	</head>
	<body onload="window.print()">
		<?php
			
			if (isset ($_GET['id']))
			{
				$id = $_GET['id'];
				
				require "connect.php";
				
				mysql_select_db("kscomp_student");
				$query = "SELECT * FROM kjscomp_student.student_alumni_data WHERE student_id='$id'";
				$result = mysql_query($query) or die(mysql_error());
				$count = mysql_num_rows($result) or die(mysql_error());
				
				$query1 = "SELECT image FROM kjscomp_student.student_login WHERE user_id='$id'";
				$result1 = mysql_query($query1) or die(mysql_error());
				$row1 = mysql_fetch_assoc($result1);
			
				while ($row = mysql_fetch_assoc($result))
				{
					echo '
						<div class="page">
							<center>
								<hr />
								<font class="college_name"><b>K. J. SOMAIYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY,</b></font>
								<br />
								<!--font class="college_name"><strong>SION, MUMBAI-400 022</strong></font>
								<br /-->
								<font>Ayurvihar Complex, Near Everard Nagar, Eastern Express Highway, Sion, Mumbai-400 022</font>
								<br /><hr />
								<font><strong>Department of Computer Engineering</strong></font>
								<br />
								<font><u>Alumni Details</u></font>
								<hr />
							</center>
							
							<table class="name_table" width="100%" border="0px solid blue">
								<tr class="name_table" width="100%" border="0px solid blue">
									<td class="name_table" width="90%" border="0px solid blue">
										<font>Name : <strong>' . $row['student_name'] . '</strong></font>
										<br />
										<font>Year of Passing : <strong>' . $row['passing_year'] . '</strong></font>
										<br />
										<font>Cell No : <strong>' . $row['contact_no'] . '</strong></font>
										<br />
										<font>Email Id : <strong>' . $row['email'] . '</strong></font>
									</td>
									<td class="name_table" width="10%" align="center">
										<img src="Student/' . $row1['image'] . '" alt="Image not Available!" border="0px solid blue" />
									</td>
								</tr>
							</table>
							<hr />
							<table>
								<tr>
									<th class="question">Question</th>
									<th class="answer">Feedback</th>
								</tr>
								<tr>
									<tr>
										<td class="question">Are you Presently Employed?</td>
										<td class="answer">' . $row['employed'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Were you Placed through College?</td>
										<td class="answer">' . $row['placed'] . '</td>
									</tr>

									<tr>
										<td class="question">Name of the Company</td>
										<td class="answer">' . $row['company_name'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Are you Pursuing Higher Studies?</td>
										<td class="answer">' . $row['pursuing_higher_study'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Details of current Pursuing Course</td>
										<td class="answer">' . $row['higher_study'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Your CAT/GATE/Other Exam Score/Rank (if any)</td>
										<td class="answer">' . $row['higher_study_score'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Are you Preparing for any of Above/Doing Other Course?</td>
										<td class="answer">' . $row['preparing_higher_study'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Complete Postal Address</td>
										<td class="answer">' . $row['address'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Can we Send your Details to Potential Employers?</td>
										<td class="answer">' . $row['employer'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Do you think Almamater has the Potential to Improve?</td>
										<td class="answer">' . $row['improvement'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Do you think Alumni Association Fees (Currently Rs.400 for life membership) is Adequate?<br />If Not, How Much should it be?</td>
										<td class="answer">' . $row['fees'] . '</td>
									</tr>

									
									<tr>
										<td class="question">Any other Comments</td>
										<td class="answer">' . $row['other_comment'] . '</td>
									</tr>
									
									<tr>
										<td class="question">How do you Think you AS ALUMNI could Contribute to the College Resources and Strengthen it to become a Global Institution</td>
										<td class="answer">' . $row['contribution'] . '</td>
									</tr>
								</tr>
							</table>
							<div width="100%">
								<div width="50%" style="float: left">
									<font class="page_no">Signature</font>
								</div>
								<div width="50%" class="page_no">
									<font class="page_no">Date. ' . date("d/m/Y") . '</font>
								</div>
							</div>
						</div>
					'; 
				}
			}
			else if (isset ($_POST['year_all']))
			{
				$year_all = $_POST['year_all'];
				
				require "connect.php";
				
				mysql_select_db("kscomp_student");
				$query = "SELECT * FROM kjscomp_student.student_alumni_data WHERE passing_year=$year_all";
				$result = mysql_query($query) or die(mysql_error());
			
				while ($row = mysql_fetch_assoc($result))
				{
					$id = $row['student_id'];
					
					$query1 = "SELECT image FROM kjscomp_student.student_login WHERE user_id='$id'";
					$result1 = mysql_query($query1) or die(mysql_error());
					$row1 = mysql_fetch_assoc($result1);
					echo '
						<div class="page">
							<center>
								<hr />
								<font class="college_name"><b>K. J. SOMAIYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY,</b></font>
								<br />
								<font class="college_name"><strong>SION, MUMBAI-400 022</strong></font>
								<br />
								<font>Ayurvihar Complex, Near Everard Nagar, Eastern Express Highway, Sion, Mumbai-400 022</font>
								<br /><hr />
								<font><strong>Department of Computer Engineering</strong></font>
								<br />
								<font><u>Alumni Details</u></font>
								<hr />
							</center>
							
							<table class="name_table" width="100%" border="0px solid blue">
								<tr class="name_table" width="100%" border="0px solid blue">
									<td class="name_table" width="90%" border="0px solid blue">
										<font>Name : <strong>' . $row['student_name'] . '</strong></font>
										<br />
										<font>Year of Passing : <strong>' . $row['passing_year'] . '</strong></font>
										<br />
										<font>Cell No : <strong>' . $row['contact_no'] . '</strong></font>
										<br />
										<font>Email Id : <strong>' . $row['email'] . '</strong></font>
									</td>
									<td class="name_table" width="10%" align="center">
										<img src="Student/' . $row1['image'] . '" alt="Image not Available!" border="1px solid blue" />
									</td>
								</tr>
							</table>
							<hr />
							<table>
								<tr>
									<th class="question">Question</th>
									<th class="answer">Feedback</th>
								</tr>
								<tr>
									<tr>
										<td class="question">Are you Presently Employed?</td>
										<td class="answer">' . $row['employed'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Were you Placed through College?</td>
										<td class="answer">' . $row['placed'] . '</td>
									</tr>

									<tr>
										<td class="question">Name of the Company</td>
										<td class="answer">' . $row['company_name'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Are you Pursuing Higher Studies?</td>
										<td class="answer">' . $row['pursuing_higher_study'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Details of current Pursuing Course</td>
										<td class="answer">' . $row['higher_study'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Your CAT/GATE/Other Exam Score/Rank (if any)</td>
										<td class="answer">' . $row['higher_study_score'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Are you Preparing for any of Above/Doing Other Course?</td>
										<td class="answer">' . $row['preparing_higher_study'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Complete Postal Address</td>
										<td class="answer">' . $row['address'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Can we Send your Details to Potential Employers?</td>
										<td class="answer">' . $row['employer'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Do you think Almamater has the Potential to Improve?</td>
										<td class="answer">' . $row['improvement'] . '</td>
									</tr>
									
									<tr>
										<td class="question">Do you think Alumni Association Fees (Currently Rs.400 for life membership) is Adequate?<br />If Not, How Much should it be?</td>
										<td class="answer">' . $row['fees'] . '</td>
									</tr>

									
									<tr>
										<td class="question">Any other Comments</td>
										<td class="answer">' . $row['other_comment'] . '</td>
									</tr>
									
									<tr>
										<td class="question">How do you Think you AS ALUMNI could Contribute to the College Resources and Strengthen it to become a Global Institution</td>
										<td class="answer">' . $row['contribution'] . '</td>
									</tr>
								</tr>
							</table>
							<div width="100%">
								<div width="50%" style="float: left">
									<font class="page_no">Signature</font>
								</div>
								<div width="50%" class="page_no">
									<font class="page_no">Date. ' . date("d/m/Y") . '</font>
								</div>
							</div>
						</div>
					'; 
				}
			}
		?>
	</body>
</html>