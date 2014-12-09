<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query = "SELECT * FROM student_personal WHERE reg_no='$reg_no'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}
	else
	{
		header ("location: student_login");	
	}
?>
<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_POST['insert']))
	{
		$submit = $_POST['insert'];
		if ($submit)
		{
			$reg_no = $_POST['reg_no'];
			$name = strtoupper($_POST['name']);
			$gender = $_POST['gender'];
			$curr_year = $_POST['curr_year'];
			$cet_rank = $_POST['cet_rank'];
			$birth_date = $_POST['birth_date'];
			$admission_type = $_POST['admission_type'];
			$admission_date = $_POST['admission_date'];
			$admission_year = $_POST['admission_year'];
			
			$temp = explode("-",$admission_date);
			$temp_year = $temp[0];
			if ($admission_year == "FE")
				$completion_year = $temp_year + 4;
			else if ($admission_year == "DSE")
				$completion_year = $temp_year + 3;
			
			$branch = "Computer Engineering";
			$parent_name = strtoupper($_POST['parent_name']);
			$address = strtoupper($_POST['address']);
			$telephone_off = $_POST['telephone_off'];
			$telephone_res = $_POST['telephone_res'];
			$mobile_personal = $_POST['mobile_personal'];
			$mobile_parent = $_POST['mobile_parent'];
			$email = $_POST['email'];
			$blood_group = $_POST['blood_group'];
			$hobbies = strtoupper($_POST['hobbies']);
			$course = $_POST['course'];
			$faculty_name = $_POST['faculty_name'];
			
			require "connect.php";
			//mysql_select_db("kjscomp_student") or die(mysql_error());
			
			$query = "UPDATE student_personal SET name='$name',gender='$gender',curr_year='$curr_year',cet_rank='$cet_rank',birth_date='$birth_date',admission_type='$admission_type',admission_date='$admission_date',admission_year='$admission_year',completion_year='$completion_year',branch='$branch',parent_name='$parent_name',address='$address',telephone_off='$telephone_off',telephone_res='$telephone_res',mobile_personal='$mobile_personal',mobile_parents='$mobile_parent',email='$email',blood_group='$blood_group',hobbies='$hobbies',course='$course',faculty_name='$faculty_name' WHERE reg_no='$reg_no'";
			//$query = "UPDATE student_personal SET name='$name',gender='$gender',curr_year='$curr_year',cet_rank='$cet_rank',birth_date='$birth_date',admission_type='$admission_type',admission_date='$admission_date',admission_year='$admission_year',completion_year='$completion_year',branch='$branch',parent_name='$parent_name',address='$address',telephone_off='$telephone_off',telephone_res='$telephone_res',mobile_personal='$mobile_personal',mobile_parents='$mobile_parent',email='$email',blood_group='$blood_group',hobbies='$hobbies' WHERE reg_no='$reg_no'";
			$result = mysql_query($query) or die(mysql_error());
			
			$query1 = "UPDATE student_alumni_data SET student_name='$name',gender='$gender',contact_no='$mobile_personal',email='$email'  WHERE student_id='$reg_no'";
			$result1 = mysql_query($query1) or die(mysql_error());
			
			if ( $admission_year == "FE" )
			{
				$query2 = "UPDATE kjscomp_proctor.proctor_grade_fe SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
				$result2 = mysql_query($query2) or die(mysql_error());
				
				$query6 = "UPDATE kjscomp_proctor.proctor_problems_fe SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
				$result6 = mysql_query($query6) or die(mysql_error());
			}
			
			$query3 = "UPDATE kjscomp_proctor.proctor_grade_se SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result3 = mysql_query($query3) or die(mysql_error());
			$query4 = "UPDATE kjscomp_proctor.proctor_grade_te SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result4 = mysql_query($query4) or die(mysql_error());
			$query5 = "UPDATE kjscomp_proctor.proctor_grade_be SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result5 = mysql_query($query5) or die(mysql_error());
			
			$query7 = "UPDATE kjscomp_proctor.proctor_problems_se SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result7 = mysql_query($query7) or die(mysql_error());
			$query8 = "UPDATE kjscomp_proctor.proctor_problems_te SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result8 = mysql_query($query8) or die(mysql_error());
			$query9 = "UPDATE kjscomp_proctor.proctor_problems_be SET faculty_name='$faculty_name' WHERE student_id='$reg_no'";
			$result9 = mysql_query($query9) or die(mysql_error());
			
			if ( $course == "Revised" )
			{
				$check = "SELECT * FROM kjscomp_proctor.proctor_rev_sem_iii WHERE student_id = '$reg_no'";
				$check_result = mysql_query($check);
				$count = mysql_num_rows($check_result);
				if ( $count == 0 )
				{
					if ( $admission_year == "FE" )
					{
						$sem1_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_i (student_id) VALUES ('$reg_no')";
						$sem1_result = mysql_query($sem1_query) or die(mysql_error());
						$sem2_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_ii (student_id) VALUES ('$reg_no')";
						$sem2_result = mysql_query($sem2_query) or die(mysql_error());
					}
					
					$sem3_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_iii (student_id) VALUES ('$reg_no')";
					$sem4_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_iv (student_id) VALUES ('$reg_no')";
					$sem3_result = mysql_query($sem3_query) or die(mysql_error());
					$sem4_result = mysql_query($sem4_query) or die(mysql_error());
					
					$sem5_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_v (student_id) VALUES ('$reg_no')";
					$sem6_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_vi (student_id) VALUES ('$reg_no')";
					$sem5_result = mysql_query($sem5_query) or die(mysql_error());
					$sem6_result = mysql_query($sem6_query) or die(mysql_error());
					
					$sem7_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_vii (student_id) VALUES ('$reg_no')";
					$sem8_query = "INSERT INTO kjscomp_proctor.proctor_rev_sem_viii (student_id) VALUES ('$reg_no')";
					$sem7_result = mysql_query($sem7_query) or die(mysql_error());
					$sem8_result = mysql_query($sem8_query) or die(mysql_error());
				}
				
				$check = "SELECT * FROM rev_sem_iii WHERE student_id = '$reg_no'";
				$check_result = mysql_query($check);
				$count = mysql_num_rows($check_result);
				if ( $count == 0 )
				{
					if ( $admission_year == "FE" )
					{
						$sem1_query = "INSERT INTO rev_sem_i (student_id) VALUES ('$reg_no')";
						$sem1_result = mysql_query($sem1_query) or die(mysql_error());
						$sem2_query = "INSERT INTO rev_sem_ii (student_id) VALUES ('$reg_no')";
						$sem2_result = mysql_query($sem2_query) or die(mysql_error());
					}
					
					$sem3_query = "INSERT INTO rev_sem_iii (student_id) VALUES ('$reg_no')";
					$sem4_query = "INSERT INTO rev_sem_iv (student_id) VALUES ('$reg_no')";
					$sem3_result = mysql_query($sem3_query) or die(mysql_error());
					$sem4_result = mysql_query($sem4_query) or die(mysql_error());
					
					$sem5_query = "INSERT INTO rev_sem_v (student_id) VALUES ('$reg_no')";
					$sem6_query = "INSERT INTO rev_sem_vi (student_id) VALUES ('$reg_no')";
					$sem5_result = mysql_query($sem5_query) or die(mysql_error());
					$sem6_result = mysql_query($sem6_query) or die(mysql_error());
					
					$sem7_query = "INSERT INTO rev_sem_vii (student_id) VALUES ('$reg_no')";
					$sem8_query = "INSERT INTO rev_sem_viii (student_id) VALUES ('$reg_no')";
					$sem7_result = mysql_query($sem7_query) or die(mysql_error());
					$sem8_result = mysql_query($sem8_query) or die(mysql_error());
					
					$elective_query = "INSERT INTO rev_elective (student_id) VALUES ('$reg_no')";
					$elective_result = mysql_query($elective_query) or die(mysql_error());
				}
			}
			else if ( $course == "New" )
			{
				$check = "SELECT * FROM kjscomp_proctor.proctor_new_sem_iii WHERE student_id = '$reg_no'";
				$check_result = mysql_query($check);
				$count = mysql_num_rows($check_result);
				if ( $count == 0 )
				{
					if ( $admission_year == "FE" )
					{
						$sem1_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_i (student_id) VALUES ('$reg_no')";
						$sem1_result = mysql_query($sem1_query) or die(mysql_error());
						$sem2_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_ii (student_id) VALUES ('$reg_no')";
						$sem2_result = mysql_query($sem2_query) or die(mysql_error());
					}
					
					$sem3_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_iii (student_id) VALUES ('$reg_no')";
					$sem4_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_iv (student_id) VALUES ('$reg_no')";
					$sem3_result = mysql_query($sem3_query) or die(mysql_error());
					$sem4_result = mysql_query($sem4_query) or die(mysql_error());
					
					$sem5_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_v (student_id) VALUES ('$reg_no')";
					$sem6_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_vi (student_id) VALUES ('$reg_no')";
					$sem5_result = mysql_query($sem5_query) or die(mysql_error());
					$sem6_result = mysql_query($sem6_query) or die(mysql_error());
					
					$sem7_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_vii (student_id) VALUES ('$reg_no')";
					$sem8_query = "INSERT INTO kjscomp_proctor.proctor_new_sem_viii (student_id) VALUES ('$reg_no')";
					$sem7_result = mysql_query($sem7_query) or die(mysql_error());
					$sem8_result = mysql_query($sem8_query) or die(mysql_error());
				}
				
				$check = "SELECT * FROM new_sem_iii WHERE student_id = '$reg_no'";
				$check_result = mysql_query($check);
				$count = mysql_num_rows($check_result);
				if ( $count == 0 )
				{
					if ( $admission_year == "FE" )
					{
						$sem1_query = "INSERT INTO new_sem_i (student_id) VALUES ('$reg_no')";
						$sem1_result = mysql_query($sem1_query) or die(mysql_error());
						$sem2_query = "INSERT INTO new_sem_ii (student_id) VALUES ('$reg_no')";
						$sem2_result = mysql_query($sem2_query) or die(mysql_error());
					}
					
					$sem3_query = "INSERT INTO new_sem_iii (student_id) VALUES ('$reg_no')";
					$sem4_query = "INSERT INTO new_sem_iv (student_id) VALUES ('$reg_no')";
					$sem3_result = mysql_query($sem3_query) or die(mysql_error());
					$sem4_result = mysql_query($sem4_query) or die(mysql_error());
					
					$sem5_query = "INSERT INTO new_sem_v (student_id) VALUES ('$reg_no')";
					$sem6_query = "INSERT INTO new_sem_vi (student_id) VALUES ('$reg_no')";
					$sem5_result = mysql_query($sem5_query) or die(mysql_error());
					$sem6_result = mysql_query($sem6_query) or die(mysql_error());
					
					$sem7_query = "INSERT INTO new_sem_vii (student_id) VALUES ('$reg_no')";
					$sem8_query = "INSERT INTO new_sem_viii (student_id) VALUES ('$reg_no')";
					$sem7_result = mysql_query($sem7_query) or die(mysql_error());
					$sem8_result = mysql_query($sem8_query) or die(mysql_error());
					
					$elective_query = "INSERT INTO new_elective (student_id) VALUES ('$reg_no')";
					$elective_result = mysql_query($elective_query) or die(mysql_error());
				}
			}
			
			//Image Validation
			if ( !empty($_FILES['student_image']['name']) )
			{
				$allowedExts = array("jpeg", "jpg");
				$temp = explode(".", $_FILES['student_image']['name']);
				/*echo $_FILES['student_image']['name'];
				echo $temp[0];
				echo $temp[1];*/
				$extension = end($temp);
							
				if ( ( ($_FILES['student_image']['type'] == "image/jpeg") || ($_FILES['student_image']['type'] == "image/jpg") )
							&& ($_FILES['student_image']['size'] < 20000)
							&& in_array($extension, $allowedExts) )
				{
					if ( $_FILES['student_image']['error'] > 0 )
					{
						echo "Error: " . $_FILES['student_image']['error'] . "<br>";
					}
					else
					{
						/*echo "Upload: " . $_FILES['student_image']['name'] . "<br>";
						echo "Type: " . $_FILES['student_image']['type'] . "<br>";
						echo "Size: " . ($_FILES['student_image']['size'] / 1024) . " KB<br>";
						echo "Stored in: " . $_FILES['student_image']['tmp_name'];*/
					}
					/*if (file_exists("Images/" . $student_id . '.jpg'))
					{
						echo 'File Already Exist';
					}
					else
					{
						move_uploaded_file($_FILES['student_image']['tmp_name'],"Images/" . $student_id . '.jpg');
						echo '\nStored in: ' . 'Images/' . $student_id . '.jpg';
					}*/
					$image = "Images/" . $reg_no . ".jpg";
					//echo '\nStored in: ' . 'Images/' . $studentid . '.jpg';
					
					move_uploaded_file($_FILES['student_image']['tmp_name'],"Images/" . $reg_no . '.jpg');
					
					$query = "UPDATE student_login SET image='$image' WHERE user_id='$reg_no'";
					$result = mysql_query($query) or die(mysql_error());
				}
				else
				{
					if ( ($_FILES['student_image']['type'] != "image/jpeg") || ($_FILES['student_image']['type'] != "image/jpg") )
					{
						echo '
							<script type="text/javascript">
								alert ("Invalid File.\nOnly .jpeg or .jpg File are Allowed");
							</script>';
					}
					else if ( $_FILES['student_image']['size'] > 20000 )
					{
						echo '
							<script type="text/javascript">
								alert ("Invalid File.\nFile Size should be Less than 20 KB");
							</script>';
					}
				}
			}
			
			echo '
				<script type=text/javascript>
					alert ("* Data Updated Successfully!");
					window.location = "student_personal";
				</script>
			';
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<style type="text/css">
			/*body {
				width: 100%;
				Height: 100%;
				background-image: url('../Images/Stock_Background.png');
				/*background-repeat: no-repeat;
				background-attachment:fixed;
				background-position:center;*/
			/*}
			.main_body {
				/*width: 200px;
				position: absolute;
				background-image: url('../Images/Stock_Background.png');*/
				/*background-color: #787878;
				border: 0px solid red;
				display: inline-block;
			}*/
			th {
				min-width: 192px;
				/*border: 1px solid #FF0000;*/
			}
		</style>
		<script type="text/javascript">
			function validate()
			{
			 	if( document.student_detail.gender.value == "" || document.student_detail.gender.value == "default" )
				{
					document.getElementById("gender_error").style.display="";
					document.student_detail.gender.focus();
					return false;
				}
				else
					document.getElementById("gender_error").style.display="none";
				
			 	if( document.student_detail.curr_year.value == "" || document.student_detail.curr_year.value == "default" )
				{
					document.getElementById("curr_yearerror").style.display="";
					document.student_detail.curr_year.focus();
					return false;
				}
				else
					document.getElementById("curr_yearerror").style.display="none";
			 	
			 	if( document.student_detail.admission_type.value == "" || document.student_detail.admission_type.value == "default" )
				{
					document.getElementById("admission_typeerror").style.display="";
					document.student_detail.admission_type.focus();
					return false;
				}
				else
					document.getElementById("admission_typeerror").style.display="none";
				
				if( document.student_detail.course.value == "" || document.student_detail.course.value == "default" )
				{
					document.getElementById("course_error").style.display="";
					document.student_detail.course.focus();
					return false;
				}
				else
					document.getElementById("course_error").style.display="none";
				
				if( document.student_detail.faculty_name.value == "" || document.student_detail.faculty_name.value == "default" )
				{
					document.getElementById("faculty_nameerror").style.display="";
					document.student_detail.faculty_name.focus();
					return false;
				}
				else
					document.getElementById("faculty_nameerror").style.display="none";
				
				if( document.student_detail.admission_year[0].checked ==false && document.student_detail.admission_year[1].checked ==false )
				{
					document.getElementById("admission_year_error").style.display="";
					window.scrollTo(0,0);
					return false;
				}
				else
					document.getElementById("admission_year_error").style.display="none";
				
				return true;
			}
			function isNumber(evt)
			{
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57))
				{
					return false;
				}
				return true;
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
					<div id="gender_error" style="color: #FF0000; display: none">
						* Plase Select your Gender! 
					</div>
					<div id="admission_typeerror" style="color: #FF0000; display: none">
						* Plase Select your Admission Type! 
					</div>
					<div id="faculty_nameerror" style="color: #FF0000; display: none">
						* Plase Select Faculty Name! 
					</div>
					<div id="curr_yearerror" style="color: #FF0000; display: none">
						* Plase Select your Year! 
					</div>
					<div id="complete_yearerror" style="color: #FF0000; display: none">
						* Plase Select Completion date! 
					</div>
					<div id="course_error" style="color: #FF0000; display: none">
						* Plase Select your Course Type! 
					</div>
					<div id="admission_year_error" style="color: #FF0000; display: none">
						* Plase Select Admission Year! 
					</div>
					<div style="color: #FF0000;">
						* All Fields are Mandetory! 
					</div>
					<form enctype="multipart/form-data" onsubmit="return(validate());" name="student_detail" action="student_personal" method="POST">
						<table cellpadding="2" cellspacing="2">
							<tr>
								<th><font style="color: #FF0000;">* </font>Registration Number : </th>
								<td>
									<input type="text" readonly value="<?php echo $row['reg_no'] ?>" name="reg_no" maxlength="12" size="50" onclick="select();" onkeypress="return isNumber(event)" placeholder="Enter the Registration No. (ID Card no.)" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Full Name : </th>
								<td>
									<input type="text" value="<?php echo $row['name'] ?>" name="name" size="50" onclick="select();" placeholder="Enter Your Full Name" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Gender : </th>
								<td>
									<select name="gender" required>
										<option value="<?php echo $row['gender'] ?>" selected><?php echo $row['gender'] ?></option> 
										<option value="default">Select the Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Year : </th>
								<td>
									<select name="curr_year" required>
										<option value="<?php echo $row['curr_year'] ?>" selected="selected"><?php echo $row['curr_year'] ?></option> 
										<option value="default">Select the Year</option>
										<option value="SE">Second Year</option>
										<option value="TE">Third Year</option>
										<option value="BE">Final Year</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>CET Rank or Marks: </th>
								<td>
									<input type="text" value="<?php echo $row['cet_rank'] ?>" name="cet_rank" size="50" onclick="select();" value="NA" placeholder="Enter the CET Rank or write NA" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Date of Birth : </th>
								<td>
									<input type="text" value="<?php echo $row['birth_date'] ?>" onfocus="(this.type='date')" placeholder="Enter your Date of Birth" name="birth_date" onclick="select();" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Admitted As : </th>
								<td>
									<select name="admission_type" required>
										<option value="<?php echo $row['admission_type'] ?>" selected="selected"><?php echo $row['admission_type'] ?></option>
										<option value="default">Select the Admission Type</option>
										<option value="General">General</option>
										<option value="Minority">Minority</option>
										<option value="Other">Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Admitted On : </th>
								<td>
									<input type="text" value="<?php echo $row['admission_date'] ?>" name="admission_date" onfocus="(this.type='month')" size="50" placeholder="Select your Month and Year of Admission" onclick="select();" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Addmission Year : </th>
								<td>
									<?php
										if ( $row['admission_year'] == "FE" )
										{
											echo '
												<input type="radio" name="admission_year" value="FE" checked />FE
												<input type="radio" name="admission_year" value="DSE" />DSE
											';
										}
										else if ( $row['admission_year'] == "DSE" )
										{
											echo '
												<input type="radio" name="admission_year" value="FE" />FE
												<input type="radio" name="admission_year" value="DSE" checked />DSE
											';
										}
										else
										{
											echo '
												<input type="radio" name="admission_year" value="FE" />FE
												<input type="radio" name="admission_year" value="DSE" />DSE
											';
										}
									?>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Full Name of Parent : </th>
								<td>
									<input type="text" value="<?php echo $row['parent_name'] ?>" name="parent_name" size="50" onclick="select();" placeholder="Enter Parent&#39;s Full Name" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Address : </th>
								<td>
									<textarea rows="5" cols="35" name="address" size="50" style="resize: none;" onclick="select();" placeholder="Enter your Address" required><?php echo $row['address'] ?></textarea>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Office telephone No. : </th>
								<td>
									<input type="number" value="<?php echo $row['telephone_off'] ?>" name="telephone_off" size="50" onclick="select();" onkeypress="return isNumber(event)" placeholder="Enter parent&#39;s Office Number with City Code" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Residence telephone No. : </th>
								<td>
									<input type="number" value="<?php echo $row['telephone_res'] ?>" name="telephone_res" size="50" onclick="select();" onkeypress="return isNumber(event)" placeholder="Enter your Residence Number with City Code" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Your Mobile No. : </th>
								<td>
									<input type="number" value="<?php echo $row['mobile_personal'] ?>" name="mobile_personal" size="50" onclick="select();" onkeypress="return isNumber(event)" placeholder="Enter your Mobile Number" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Parent&#39;s Mobile No. : </th>
								<td>
									<input type="number" value="<?php echo $row['mobile_parents'] ?>" name="mobile_parent" size="50" onclick="select();" onkeypress="return isNumber(event)" placeholder="Enter Parent&#39;s Mobile Number" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>E-mail ID : </th>
								<td>
									<input type="email" value="<?php echo $row['email'] ?>" name="email" size="50" onclick="select();" placeholder="Enter your E-mail ID" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Blood Group : </th>
								<td>
									<input type="text" value="<?php echo $row['blood_group'] ?>" name="blood_group" size="50" onclick="select();" placeholder="Enter your Blood Group" required />
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Hobbies : </th>
								<td>
									<textarea rows="5" cols="35" name="hobbies" style="resize: none;" onclick="select();" placeholder="Enter your Hobbies separated by Comma" required><?php echo $row['hobbies'] ?></textarea>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Course : </th>
								<td>
									<select name="course" required>
										<?php
											if ( $row['course'] == "New" )
												echo '
													<option value="' . $row['course'] . '" selected="selected">' . $row['course'] . ' (CBGS)</option>
												';
											else
												echo '
													<option value="' . $row['course'] . '" selected="selected">' . $row['course'] . '</option>
												';
										?>
										<option value="default">Select the Course</option>
										<option value="Revised">Revised</option>
										<option value="New">New (CBGS)</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><font style="color: #FF0000;">* </font>Proctor Faculty Name : </th>
								<td>
									<?php
										require "../connect.php";
										$query = mysql_query("SELECT fac_name FROM rfid_info"); // Run your query
										echo '
											<select name="faculty_name" id="drpdwnlst_facname" required>
												<option value="' . $row['faculty_name'] . '" selected="selected">' .$row['faculty_name'] . '</option>
												<option name="defaultname" width="100%" value="default">Select Faculty Name</option>
										';
											// Loop through the query results, outputing the options one by one
										while ($row = mysql_fetch_assoc($query))
										{
											echo '
												<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
											';
										}
										echo '
											</select>
										';// Close your drop down box
									?>
								</td>
							</tr>
							<tr>
								<th>Image:</th>
								<td>
									<input type="file" name="student_image" />
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="submit" name="insert" value="Update" />
								</td>
							</tr>
						</table>
					</form>
				</center>
			</div>
			
			<div id="rightmargin">
				<?php include "rightmargin.php"; ?>
			</div>
		
		</div>
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>