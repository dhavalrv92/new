<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query = "SELECT course FROM student_personal WHERE reg_no='$reg_no'";
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
?>
<?php
	if (isset($_POST['update_sem_1']))
	{
		$submit = $_POST['update_sem_1'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_1'];
				$maths_I = $_POST['maths_I'];
				$physics_I = $_POST['physics_I'];
				$chemistry_I = $_POST['chemistry_I'];
				$mechanics = $_POST['mechanics'];
				$bee = $_POST['bee'];
				$cp_I = $_POST['cp_I'];
				$workshop_I = $_POST['workshop_I'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem1 = "UPDATE proctor_rev_sem_i SET maths_I='$maths_I',physics_I='$physics_I',chemistry_I='$chemistry_I',mechanics='$mechanics',bee='$bee',cp_I='$cp_I',workshop_I='$workshop_I' WHERE student_id='$reg_no'";
				$result_sem1 = mysql_query($query_sem1) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_1'];
				$maths_I = $_POST['maths_I'];
				$physics_I = $_POST['physics_I'];
				$chemistry_I = $_POST['chemistry_I'];
				$mechanics = $_POST['mechanics'];
				$bee = $_POST['bee'];
				$es = $_POST['es'];
				$workshop_I = $_POST['workshop_I'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem1 = "UPDATE proctor_new_sem_i SET maths_I='$maths_I',physics_I='$physics_I',chemistry_I='$chemistry_I',mechanics='$mechanics',bee='$bee',es='$es',workshop_I='$workshop_I' WHERE student_id='$reg_no'";
				$result_sem1 = mysql_query($query_sem1) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_2']))
	{
		$submit = $_POST['update_sem_2'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_2'];
				$maths_II = $_POST['maths_II'];
				$physics_II = $_POST['physics_II'];
				$chemistry_II = $_POST['chemistry_II'];
				$comm_skills = $_POST['comm_skills'];
				$engg_drawing = $_POST['engg_drawing'];
				$cp_II = $_POST['cp_II'];
				$workshop_II = $_POST['workshop_II'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem2 = "UPDATE proctor_rev_sem_ii SET maths_II='$maths_II',physics_II='$physics_II',chemistry_II='$chemistry_II',comm_skills='$comm_skills',engg_drawing='$engg_drawing',cp_II='$cp_II',workshop_II='$workshop_II' WHERE student_id='$reg_no'";
				$result_sem2 = mysql_query($query_sem2) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_2'];
				$maths_II = $_POST['maths_II'];
				$physics_II = $_POST['physics_II'];
				$chemistry_II = $_POST['chemistry_II'];
				$engg_drawing = $_POST['engg_drawing'];
				$spa = $_POST['spa'];
				$comm_skills = $_POST['comm_skills'];
				$workshop_II = $_POST['workshop_II'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem2 = "UPDATE proctor_rev_sem_ii SET maths_II='$maths_II',physics_II='$physics_II',chemistry_II='$chemistry_II',engg_drawing='$engg_drawing',spa='$spa',comm_skills='$comm_skills',workshop_II='$workshop_II' WHERE student_id='$reg_no'";
				$result_sem2 = mysql_query($query_sem2) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_3']))
	{
		$submit = $_POST['update_sem_3'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_3'];
				$maths_III = $_POST['maths_III'];
				$edlc = $_POST['edlc'];
				$dsgt = $_POST['dsgt'];
				$dlda = $_POST['dlda'];
				$dsf = $_POST['dsf'];
				$coa = $_POST['coa'];
				$pct = $_POST['pct'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem3 = "UPDATE proctor_rev_sem_iii SET maths_III='$maths_III',edlc='$edlc',dsgt='$dsgt',dlda='$dlda',dsf='$dsf',coa='$coa',pct='$pct' WHERE student_id='$reg_no'";
				$result_sem3 = mysql_query($query_sem3) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_3'];
				$maths_III = $_POST['maths_III'];
				$oopm = $_POST['oopm'];
				$ds = $_POST['ds'];
				$dlda = $_POST['dlda'];
				$dis = $_POST['dis'];
				$eccf = $_POST['eccf'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem3 = "UPDATE proctor_new_sem_iii SET maths_III='$maths_III',oopm='$oopm',ds='$ds',dlda='$dlda',dis='$dis',eccf='$eccf' WHERE student_id='$reg_no'";
				$result_sem3 = mysql_query($query_sem3) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_4']))
	{
		$submit = $_POST['update_sem_4'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_4'];
				$maths_IV = $_POST['maths_IV'];
				$adc = $_POST['adc'];
				$dbms = $_POST['dbms'];
				$cg = $_POST['cg'];
				$aoad = $_POST['aoad'];
				$os = $_POST['os'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem4 = "UPDATE proctor_rev_sem_iv SET maths_IV='$maths_IV',adc='$adc',dbms='$dbms',cg='$cg',aoad='$aoad',os='$os' WHERE student_id='$reg_no'";
				$result_sem4 = mysql_query($query_sem4) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_4'];
				$maths_IV = $_POST['maths_IV'];
				$aoa = $_POST['aoa'];
				$coa = $_POST['coa'];
				$dbms = $_POST['dbms'];
				$tcs = $_POST['tcs'];
				$cg = $_POST['cg'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem4 = "UPDATE proctor_rev_sem_iv SET maths_IV='$maths_IV',aoa='$aoa',coa='$coa',dbms='$dbms',tcs='$tcs',cg='$cg' WHERE student_id='$reg_no'";
				$result_sem4 = mysql_query($query_sem4) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_5']))
	{
		$submit = $_POST['update_sem_5'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_5'];
				$cn = $_POST['cn'];
				$adbms = $_POST['adbms'];
				$mp = $_POST['mp'];
				$tcs = $_POST['tcs'];
				$we = $_POST['we'];
				$evs = $_POST['evs'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem5 = "UPDATE proctor_rev_sem_v SET cn='$cn',adbms='$adbms',mp='$mp',tcs='$tcs',we='$we',evs='$evs' WHERE student_id='$reg_no'";
				$result_sem5 = mysql_query($query_sem5) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
	else if (isset($_POST['update_sem_6']))
	{
		$submit = $_POST['update_sem_6'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_6'];
				$acn = $_POST['acn'];
				$spcc = $_POST['spcc'];
				$oose = $_POST['oose'];
				$amp = $_POST['amp'];
				$dwm = $_POST['dwm'];
				$seminar = $_POST['seminar'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem6 = "UPDATE proctor_rev_sem_vi SET acn='$acn',spcc='$spcc',oose='$oose',amp='$amp',dwm='$dwm',seminar='$seminar' WHERE student_id='$reg_no'";
				$result_sem6 = mysql_query($query_sem6) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
	else if (isset($_POST['update_sem_7']))
	{
		$submit = $_POST['update_sem_7'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_7'];
				$dsip = $_POST['dsip'];
				$rai = $_POST['rai'];
				$mc = $_POST['mc'];
				$ss = $_POST['ss'];
				$elective_I = $_POST['elective_I'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem7 = "UPDATE proctor_rev_sem_vii SET dsip='$dsip',rai='$rai',mc='$mc',ss='$ss',elective_I='$elective_I' WHERE student_id='$reg_no'";
				$result_sem7 = mysql_query($query_sem7) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
	else if (isset($_POST['update_sem_8']))
	{
		$submit = $_POST['update_sem_8'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_8'];
				$dc = $_POST['dc'];
				$msd = $_POST['msd'];
				$sa = $_POST['sa'];
				$elective_II = $_POST['elective_II'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem8 = "UPDATE proctor_rev_sem_viii SET dc='$dc',msd='$msd',sa='$sa',elective_II='$elective_II' WHERE student_id='$reg_no'";
				$result_sem8 = mysql_query($query_sem8) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<script type="text/javascript">
			function validate()
			{
				if (	document.choose_sem.semester[0].checked==false &&
						document.choose_sem.semester[1].checked==false &&
						document.choose_sem.semester[2].checked==false &&
						document.choose_sem.semester[3].checked==false &&
						document.choose_sem.semester[4].checked==false &&
						document.choose_sem.semester[5].checked==false &&
						document.choose_sem.semester[6].checked==false &&
						document.choose_sem.semester[7].checked==false
					)
				{
					document.getElementById("sem_error").style.display = "";
					return false;
				}
				else
					document.getElementById("sem_error").style.display = "none";
				
				return true;
			}
			
			/*function validate_1()
			{
				if ( document.sem_I.faculty_name_1.value == "default" )
				{
					document.getElementById("sem1_error").style.display = "";
					document.sem_I.faculty_name_1.focus();
					return false;
				}
				else
					document.getElementById("sem1_error").style.display = "none";
				
				return true;
			}
			function validate_2()
			{
				if ( document.sem_II.faculty_name_2.value == "default" )
				{
					document.getElementById("sem2_error").style.display = "";
					document.sem_II.faculty_name_2.focus();
					return false;
				}
				else
					document.getElementById("sem2_error").style.display = "none";
				
				return true;
			}
			function validate_3()
			{
				if ( document.sem_III.faculty_name_3.value == "default" )
				{
					document.getElementById("sem3_error").style.display = "";
					document.sem_III.faculty_name_3.focus();
					return false;
				}
				else
					document.getElementById("sem3_error").style.display = "none";
				
				return true;
			}
			function validate_4()
			{
				if ( document.sem_IV.faculty_name_4.value == "default" )
				{
					document.getElementById("sem4_error").style.display = "";
					document.sem_IV.faculty_name_4.focus();
					return false;
				}
				else
					document.getElementById("sem4_error").style.display = "none";
				
				return true;
			}
			function validate_5()
			{
				if ( document.sem_V.faculty_name_5.value == "default" )
				{
					document.getElementById("sem5_error").style.display = "";
					document.sem_V.faculty_name_5.focus();
					return false;
				}
				else
					document.getElementById("sem5_error").style.display = "none";
				
				return true;
			}
			function validate_6()
			{
				if ( document.sem_VI.faculty_name_6.value == "default" )
				{
					document.getElementById("sem6_error").style.display = "";
					document.sem_VI.faculty_name_6.focus();
					return false;
				}
				else
					document.getElementById("sem6_error").style.display = "none";
				
				return true;
			}
			function validate_7()
			{
				if ( document.sem_VII.faculty_name_7.value == "default" )
				{
					document.getElementById("sem7_error").style.display = "";
					document.sem_VII.faculty_name_7.focus();
					return false;
				}
				else
					document.getElementById("sem7_error").style.display = "none";
				
				return true;
			}
			function validate_8()
			{
				if ( document.sem_VIII.faculty_name_8.value == "default" )
				{
					document.getElementById("sem8_error").style.display = "";
					document.sem_VIII.faculty_name_8.focus();
					return false;
				}
				else
					document.getElementById("sem8_error").style.display = "none";
				
				return true;
			}*/
		</script>
		
	</head>
	
	<body>
		
		<?php include "header.php"; ?>
		
		<br />
		
		<div>
		
			<div id="leftmargin">
			
				<?php include "leftmargin.php"; ?>
			
			</div>
			
			<div id="gap"></div>
			
			<div id="middle">
				<center>
					<div id="sem_error" style="color: #FF0000; display: none;">
						<h4 style="color: #FF0000;">
							* Please select the Semester! 
						</h4>
					</div>
				</center>
				<?php
					require_once "connect.php";
					$hide = "SELECT admission_date,admission_year FROM kjscomp_student.student_personal WHERE reg_no='$reg_no'";
					$hide_result = mysql_query($hide) or die (mysql_error());
					$hide_row = mysql_fetch_assoc($hide_result) or die (mysql_error());
					$year1 = explode("-", $hide_row['admission_date']);
					$date = date('Y-m');
					$year2 = explode("-", $date);
				?>
				<form onsubmit="return (validate());" name="choose_sem" action="proctor_select_sem" method="POST">
					<center>
						<table>
							<?php
								if ( $hide_row['admission_year'] != "DSE" )
								{
							?>
									<tr>
										<?php
											if ( $date >= $year1[0]."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_I" />Semester I
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+1)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_II" />Semester II
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+1)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_III" />Semester III
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+2)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_IV" />Semester IV
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+2)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_V" />Semester V
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+3)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VI" />Semester VI
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+3)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VII" />Semester VII
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+4)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VIII" />Semester VIII
												</td>
										<?php
											}
										?>
									</tr>
							<?php
								}
								else if ( $hide_row['admission_year'] == "DSE" )
								{
							?>
									<tr>
										<?php
											if ( $date >= ($year1[0])."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_III" />Semester III
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+1)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_IV" />Semester IV
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+1)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_V" />Semester V
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+2)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VI" />Semester VI
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+2)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VII" />Semester VII
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+3)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VIII" />Semester VIII
												</td>
										<?php
											}
										?>
									</tr>
							<?php
								}
							?>
							<tr>
								<td colspan="3" align="center">
									<input type="submit" value="Proceed" name="submit_sem" />
								</td>
							</tr>
						</table>
					</center>
				</form>
				
				<?php
					if (isset($_POST['submit_sem']))
					{
						$submit = $_POST['submit_sem'];
						$course = $row['course'];
						if ($submit)
						{
							$sem = $_POST['semester'];
							if ( $course == "Revised" )
							{
								if ($sem == 'sem_I')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_i WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem1_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_1());" name="sem_I" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_1" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_I" min="0" max="100" value="' . $data_row['maths_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_I" min="0" max="100" value="' . $data_row['physics_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-I : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_I" min="0" max="100" value="' . $data_row['chemistry_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Mechnics : </font>
														</th>
														<td id="input">
															<input type="number" name="mechanics" min="0" max="100" value="' . $data_row['mechanics'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Electrical and Electronics Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="bee" min="0" max="100" value="' . $data_row['bee'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Programming-I : </font>
														</th>
														<td id="input">
															<input type="number" name="cp_I" min="0" max="100" value="' . $data_row['cp_I'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-I : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_I" min="0" max="100" value="' . $data_row['workshop_I'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_1" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_II')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_ii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem2_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_2());" name="sem_II" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_2" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_II" min="0" max="100" value="' . $data_row['maths_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_II" min="0" max="100" value="' . $data_row['physics_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-II : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_II" min="0" max="100" value="' . $data_row['chemistry_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Communication Skills : </font>
														</th>
														<td id="input">
															<input type="number" name="comm_skills" min="0" max="100" value="' . $data_row['comm_skills'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Drawing : </font>
														</th>
														<td id="input">
															<input type="number" name="engg_drawing" min="0" max="100" value="' . $data_row['engg_drawing'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Programming-II : </font>
														</th>
														<td id="input">
															<input type="number" name="cp_II" min="0" max="100" value="' . $data_row['cp_II'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-II : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_II" min="0" max="100" value="' . $data_row['workshop_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_2" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_III')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_iii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem3_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_3());" name="sem_III" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_3" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-III : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_III" min="0" max="100" value="' . $data_row['maths_III'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Electronic Devices and Linear Circuits : </font>
														</th>
														<td id="input">
															<input type="number" name="edlc" min="0" max="100" value="' . $data_row['edlc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Discrete Structure & Graph Theory : </font>
														</th>
														<td id="input">
															<input type="number" name="dsgt" min="0" max="100" value="' . $data_row['dsgt'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Logic Design and Application : </font>
														</th>
														<td id="input">
															<input type="number" name="dlda" min="0" max="100" value="' . $data_row['dlda'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Structure and Files : </font>
														</th>
														<td id="input">
															<input type="number" name="dsf" min="0" max="100" value="' . $data_row['dsf'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Organization & Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="coa" min="0" max="100" value="' . $data_row['coa'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Presentation and Communication Techniques : </font>
														</th>
														<td id="input">
															<input type="number" name="pct" min="0" max="100" value="' . $data_row['pct'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_3" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_IV')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_iv WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem4_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_4());" name="sem_IV" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_4" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-IV : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_IV" min="0" max="100" value="' . $data_row['maths_IV'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Analog & Digital Communication : </font>
														</th>
														<td id="input">
															<input type="number" name="adc" min="0" max="100" value="' . $data_row['adc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Database Management System : </font>
														</th>
														<td id="input">
															<input type="number" name="dbms" min="0" max="100" value="' . $data_row['dbms'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Graphics : </font>
														</th>
														<td id="input">
															<input type="number" name="cg" min="0" max="100" value="' . $data_row['cg'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Analysis of Algorithm & Design : </font>
														</th>
														<td id="input">
															<input type="number" name="aoad" min="0" max="100" value="' . $data_row['aoad'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Operating System : </font>
														</th>
														<td id="input">
															<input type="number" name="os" min="0" max="100" value="' . $data_row['os'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_4" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_V')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_v WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem5_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_5());" name="sem_V" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_5" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="cn" min="0" max="100" value="' . $data_row['cn'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Database Management System : </font>
														</th>
														<td id="input">
															<input type="number" name="adbms" min="0" max="100" value="' . $data_row['adbms'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="mp" min="0" max="100" value="' . $data_row['mp'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Theory of Computer Science : </font>
														</th>
														<td id="input">
															<input type="number" name="tcs" min="0" max="100" value="' . $data_row['tcs'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Web Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="we" min="0" max="100" value="' . $data_row['we'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Enviormental Studies : </font>
														</th>
														<td id="input">
															<input type="number" name="evs" min="0" max="100" value="' . $data_row['evs'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_5" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VI')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_vi WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem6_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_6());" name="sem_VI" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_6" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="acn" min="0" max="100" value="' . $data_row['acn'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Programming And Compiler Construction : </font>
														</th>
														<td id="input">
															<input type="number" name="spcc" min="0" max="100" value="' . $data_row['spcc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Object Oriented Software Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="oose" min="0" max="100" value="' . $data_row['oose'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="amp" min="0" max="100" value="' . $data_row['amp'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Warehouse And Mining : </font>
														</th>
														<td id="input">
															<input type="number" name="dwm" min="0" max="100" value="' . $data_row['dwm'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Seminar : </font>
														</th>
														<td id="input">
															<input type="number" name="seminar" min="0" max="100" value="' . $data_row['seminar'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_6" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VII')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_vii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem7_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_7());" name="sem_VII" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Signal & Image Processing : </font>
														</th>
														<td id="input">
															<input type="number" name="dsip" min="0" max="100" value="' . $data_row['dsip'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Robotics and AI : </font>
														</th>
														<td id="input">
															<input type="number" name="rai" min="0" max="100" value="' . $data_row['rai'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Mobile Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="mc" min="0" max="100" value="' . $data_row['mc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Security : </font>
														</th>
														<td id="input">
															<input type="number" name="ss" min="0" max="100" value="' . $data_row['ss'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>ELective-I : </font>
														</th>
														<td id="input">
															<input type="number" name="elective_I" min="0" max="100" value="' . $data_row['elective_I'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_7" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VIII')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_viii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem8_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_8());" name="sem_VIII" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_8" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Distributed Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="dc" min="0" max="100" value="' . $data_row['dc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Multimedia System Design : </font>
														</th>
														<td id="input">
															<input type="number" name="msd" min="0" max="100" value="' . $data_row['msd'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Software Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="sa" min="0" max="100" value="' . $data_row['sa'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Elective-II : </font>
														</th>
														<td id="input">
															<input type="number" name="elective_II" min="0" max="100" value="' . $data_row['elective_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_8" value="Update" />
											</center>
										</form>
									';
								}
							}
							else if ( $row['course'] == "New" )
							{
								if ($sem == 'sem_I')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_i WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem1_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_1());" name="sem_I" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_1" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_I" min="0" max="100" value="' . $data_row['maths_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_I" min="0" max="100" value="' . $data_row['physics_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-I : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_I" min="0" max="100" value="' . $data_row['chemistry_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Mechnics : </font>
														</th>
														<td id="input">
															<input type="number" name="mechanics" min="0" max="100" value="' . $data_row['mechanics'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Electrical and Electronics Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="bee" min="0" max="100" value="' . $data_row['bee'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Environmental studies : </font>
														</th>
														<td id="input">
															<input type="number" name="es" min="0" max="100" value="' . $data_row['es'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-I : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_I" min="0" max="100" value="' . $data_row['workshop_I'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_1" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_II')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_ii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem2_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_2());" name="sem_II" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_2" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_II" min="0" max="100" value="' . $data_row['maths_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_II" min="0" max="100" value="' . $data_row['physics_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-II : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_II" min="0" max="100" value="' . $data_row['chemistry_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Drawing : </font>
														</th>
														<td id="input">
															<input type="number" name="engg_drawing" min="0" max="100" value="' . $data_row['engg_drawing'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Structured Programming Approach : </font>
														</th>
														<td id="input">
															<input type="number" name="spa" min="0" max="100" value="' . $data_row['spa'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Communication Skills : </font>
														</th>
														<td id="input">
															<input type="number" name="comm_skills" min="0" max="100" value="' . $data_row['comm_skills'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-II : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_II" min="0" max="100" value="' . $data_row['workshop_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_2" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_III')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_iii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem3_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_3());" name="sem_III" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_3" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-III : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_III" min="0" max="100" value="' . $data_row['maths_III'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Object Oriented Programming Methodology : </font>
														</th>
														<td id="input">
															<input type="number" name="oopm" min="0" max="100" value="' . $data_row['oopm'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Structures : </font>
														</th>
														<td id="input">
															<input type="number" name="ds" min="0" max="100" value="' . $data_row['ds'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Logic Design and Analysis : </font>
														</th>
														<td id="input">
															<input type="number" name="dlda" min="0" max="100" value="' . $data_row['dlda'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Discrete Structures : </font>
														</th>
														<td id="input">
															<input type="number" name="dis" min="0" max="100" value="' . $data_row['dis'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Electronic Circuits and Communication Fundamentals : </font>
														</th>
														<td id="input">
															<input type="number" name="eccf" min="0" max="100" value="' . $data_row['eccf'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_3" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_IV')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_iv WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem4_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_4());" name="sem_IV" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_4" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-IV : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_IV" min="0" max="100" value="' . $data_row['maths_IV'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Analysis of Algorithms : </font>
														</th>
														<td id="input">
															<input type="number" name="aoa" min="0" max="100" value="' . $data_row['aoa'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Organization and Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="coa" min="0" max="100" value="' . $data_row['coa'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Base Management systems : </font>
														</th>
														<td id="input">
															<input type="number" name="dbms" min="0" max="100" value="' . $data_row['dbms'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Theoretical Computer Science : </font>
														</th>
														<td id="input">
															<input type="number" name="tcs" min="0" max="100" value="' . $data_row['tcs'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Graphics : </font>
														</th>
														<td id="input">
															<input type="number" name="cg" min="0" max="100" value="' . $data_row['cg'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_4" value="Update" />
											</center>
										</form>
									';
								}
								/*else if ($sem == 'sem_V')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_v WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem5_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_5());" name="sem_V" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_5" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="cn" min="0" max="100" value="' . $data_row['cn'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Database Management System : </font>
														</th>
														<td id="input">
															<input type="number" name="adbms" min="0" max="100" value="' . $data_row['adbms'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="mp" min="0" max="100" value="' . $data_row['mp'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Theory of Computer Science : </font>
														</th>
														<td id="input">
															<input type="number" name="tcs" min="0" max="100" value="' . $data_row['tcs'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Web Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="we" min="0" max="100" value="' . $data_row['we'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Enviormental Studies : </font>
														</th>
														<td id="input">
															<input type="number" name="evs" min="0" max="100" value="' . $data_row['evs'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_5" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VI')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_vi WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem6_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_6());" name="sem_VI" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_6" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="acn" min="0" max="100" value="' . $data_row['acn'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Programming And Compiler Construction : </font>
														</th>
														<td id="input">
															<input type="number" name="spcc" min="0" max="100" value="' . $data_row['spcc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Object Oriented Software Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="oose" min="0" max="100" value="' . $data_row['oose'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="amp" min="0" max="100" value="' . $data_row['amp'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Warehouse And Mining : </font>
														</th>
														<td id="input">
															<input type="number" name="dwm" min="0" max="100" value="' . $data_row['dwm'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Seminar : </font>
														</th>
														<td id="input">
															<input type="number" name="seminar" min="0" max="100" value="' . $data_row['seminar'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_6" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VII')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_vii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem7_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_7());" name="sem_VII" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Signal & Image Processing : </font>
														</th>
														<td id="input">
															<input type="number" name="dsip" min="0" max="100" value="' . $data_row['dsip'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Robotics and AI : </font>
														</th>
														<td id="input">
															<input type="number" name="rai" min="0" max="100" value="' . $data_row['rai'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Mobile Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="mc" min="0" max="100" value="' . $data_row['mc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Security : </font>
														</th>
														<td id="input">
															<input type="number" name="ss" min="0" max="100" value="' . $data_row['ss'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>ELective-I : </font>
														</th>
														<td id="input">
															<input type="number" name="elective_I" min="0" max="100" value="' . $data_row['elective_I'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_7" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VIII')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_viii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem8_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_8());" name="sem_VIII" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%">
													<!--tr>
														<th>
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Faculty Name : </font>
														</th>
														<td>';
															require "../connect.php";
															$query = mysql_query("SELECT fac_name FROM rfid_info");
															echo '
																<select name="faculty_name_8" required>
																	<option name="default" value="' . $data_row['faculty_name'] . '" selected>' . $data_row['faculty_name'] . '</option>
																	<option name="default" value="default">Select Faculty Name</option>
															';
															while ($row = mysql_fetch_assoc($query))
															{
																echo '
																	<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>
																';
															}
															echo '
																</select>
															';
									echo'				</td>
													</tr-->
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Distributed Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="dc" min="0" max="100" value="' . $data_row['dc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Multimedia System Design : </font>
														</th>
														<td id="input">
															<input type="number" name="msd" min="0" max="100" value="' . $data_row['msd'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Software Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="sa" min="0" max="100" value="' . $data_row['sa'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Elective-II : </font>
														</th>
														<td id="input">
															<input type="number" name="elective_II" min="0" max="100" value="' . $data_row['elective_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_8" value="Update" />
											</center>
										</form>
									';
								}*/
							}
						}
					}
				?>
			
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>