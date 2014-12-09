<?php
	if (!isset($_SESSION))
		session_start();
	if ( isset($_SESSION['sid']) )
	{
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
						$facname = $_SESSION['fullname'];
						require_once "connect.php";
						mysql_select_db("kjscomp_student") or die (mysql_error());
						
						$query = "SELECT * FROM student_personal WHERE faculty_name='$facname' ORDER BY curr_year";
						$result = mysql_query($query);
						$count = mysql_num_rows($result);
						
						if ( $count == 0 )
						{
							echo '
								<script type="text/javascript">
									alert("* No Records Found!");
									window.location.href = "index";
								</script>';
						}
						else
						{
							echo '
								<center>
									<table  width="100%">
										<tr>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">FE</th>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">SE</th>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">TE</th>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">BE</th>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 10%; max-width: 10%; min-width: 10%;">Student ID</th>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 30%; max-width: 30%; min-width: 30%;">Studnt Name</th>
											<th style="background: #FFFF00; border: 1px solid #000000; width: 20%; max-width: 20%; min-width: 20%;">Student Current Year</th>
										</tr>
							';
							while ( $row = mysql_fetch_assoc($result) )
							{
								echo '
										<tr>
								';
								if ( $row['curr_year'] == "BE" )
								{
									require_once "connect.php";
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$std_id = $row['reg_no'];
																		
									//For BE
									$query_grade_be = "SELECT overall_grading FROM proctor_grade_be WHERE student_id='$std_id'";
									$result_grade_be = mysql_query($query_grade_be) or die (mysql_error());
									$row_grade_be = mysql_fetch_assoc($result_grade_be) or die (mysql_error());
									
									$query_problems_be = "SELECT actions FROM proctor_problems_be WHERE student_id='$std_id'";
									$result_problems_be = mysql_query($query_problems_be) or die (mysql_error());
									$row_problems_be = mysql_fetch_assoc($result_problems_be) or die (mysql_error());
									
									//For TE
									$query_grade_te = "SELECT overall_grading FROM proctor_grade_te WHERE student_id='$std_id'";
									$result_grade_te = mysql_query($query_grade_te) or die (mysql_error());
									$row_grade_te = mysql_fetch_assoc($result_grade_te) or die (mysql_error());
									
									$query_problems_te = "SELECT actions FROM proctor_problems_te WHERE student_id='$std_id'";
									$result_problems_te = mysql_query($query_problems_te) or die (mysql_error());
									$row_problems_te = mysql_fetch_assoc($result_problems_te) or die (mysql_error());
									
									//For SE
									$query_grade_se = "SELECT overall_grading FROM proctor_grade_se WHERE student_id='$std_id'";
									$result_grade_se = mysql_query($query_grade_se) or die (mysql_error());
									$row_grade_se = mysql_fetch_assoc($result_grade_se) or die (mysql_error());
									
									$query_problems_se = "SELECT actions FROM proctor_problems_se WHERE student_id='$std_id'";
									$result_problems_se = mysql_query($query_problems_se) or die (mysql_error());
									$row_problems_se = mysql_fetch_assoc($result_problems_se) or die (mysql_error());
									
									//For FE
									$query_grade_fe = "SELECT overall_grading FROM proctor_grade_fe WHERE student_id='$std_id'";
									$result_grade_fe = mysql_query($query_grade_fe) or die (mysql_error());
									$row_grade_fe = mysql_fetch_assoc($result_grade_fe) or die (mysql_error());
									
									$query_problems_fe = "SELECT actions FROM proctor_problems_fe WHERE student_id='$std_id'";
									$result_problems_fe = mysql_query($query_problems_fe) or die (mysql_error());
									$row_problems_fe = mysql_fetch_assoc($result_problems_fe) or die (mysql_error());
									
									//For FE
									if ( $row['admission_year'] == "FE" )
									{
										if ( ($row_grade_fe['overall_grading'] == 0) || (empty($row_problems_fe['actions'])) )
										{
											echo '
												<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
													<input type="checkbox" disabled />
												</td>
											';
										}
										else
										{
											echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
										}
									}
									else if ( $row['admission_year'] == "DSE" )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												NA
											</td>
										';
									}
									
									//For SE
									if ( ($row_grade_se['overall_grading'] == 0) || (empty($row_problems_se['actions'])) )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" disabled />
											</td>
										';
									}
									else
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
									}
									
									//For TE
									if ( ($row_grade_te['overall_grading'] == 0) || (empty($row_problems_te['actions'])) )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" disabled />
											</td>
										';
									}
									else
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
									}
									
									//For BE
									if ( ($row_grade_be['overall_grading'] == 0) || (empty($row_problems_be['actions'])) )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" disabled />
											</td>
										';	
									}
									else
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
									}
								}
								
								else if ( $row['curr_year'] == "TE" )
								{
									require_once "connect.php";
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$std_id = $row['reg_no'];
																		
									//For TE
									$query_grade_te = "SELECT overall_grading FROM proctor_grade_te WHERE student_id='$std_id'";
									$result_grade_te = mysql_query($query_grade_te) or die (mysql_error());
									$row_grade_te = mysql_fetch_assoc($result_grade_te) or die (mysql_error());
									
									$query_problems_te = "SELECT actions FROM proctor_problems_te WHERE student_id='$std_id'";
									$result_problems_te = mysql_query($query_problems_te) or die (mysql_error());
									$row_problems_te = mysql_fetch_assoc($result_problems_te) or die (mysql_error());
									
									//For SE
									$query_grade_se = "SELECT overall_grading FROM proctor_grade_se WHERE student_id='$std_id'";
									$result_grade_se = mysql_query($query_grade_se) or die (mysql_error());
									$row_grade_se = mysql_fetch_assoc($result_grade_se) or die (mysql_error());
									
									$query_problems_se = "SELECT actions FROM proctor_problems_se WHERE student_id='$std_id'";
									$result_problems_se = mysql_query($query_problems_se) or die (mysql_error());
									$row_problems_se = mysql_fetch_assoc($result_problems_se) or die (mysql_error());
									
									//For FE
									$query_grade_fe = "SELECT overall_grading FROM proctor_grade_fe WHERE student_id='$std_id'";
									$result_grade_fe = mysql_query($query_grade_fe) or die (mysql_error());
									$row_grade_fe = mysql_fetch_assoc($result_grade_fe) or die (mysql_error());
									
									$query_problems_fe = "SELECT actions FROM proctor_problems_fe WHERE student_id='$std_id'";
									$result_problems_fe = mysql_query($query_problems_fe) or die (mysql_error());
									$row_problems_fe = mysql_fetch_assoc($result_problems_fe) or die (mysql_error());
									
									//For FE
									if ( $row['admission_year'] == "FE" )
									{
										if ( ($row_grade_fe['overall_grading'] == 0) || (empty($row_problems_fe['actions'])) )
										{
											echo '
												<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
													<input type="checkbox" disabled />
												</td>
											';
										}
										else
										{
											echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
										}
									}
									else if ( $row['admission_year'] == "DSE" )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												NA
											</td>
										';
									}
									
									//For SE
									if ( ($row_grade_se['overall_grading'] == 0) || (empty($row_problems_se['actions'])) )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" disabled />
											</td>
										';
									}
									else
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
									}
									
									//For TE
									if ( ($row_grade_te['overall_grading'] == 0) || (empty($row_problems_te['actions'])) )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" disabled />
											</td>
										';
									}
									else
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
									}
									
									echo '	
										<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
											NA
										</td>
									';
								}
								
								else if ( $row['curr_year'] == "SE" )
								{
									require_once "connect.php";
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$std_id = $row['reg_no'];
																		
									//For SE
									$query_grade_se = "SELECT overall_grading FROM proctor_grade_se WHERE student_id='$std_id'";
									$result_grade_se = mysql_query($query_grade_se) or die (mysql_error());
									$row_grade_se = mysql_fetch_assoc($result_grade_se) or die (mysql_error());
									
									$query_problems_se = "SELECT actions FROM proctor_problems_se WHERE student_id='$std_id'";
									$result_problems_se = mysql_query($query_problems_se) or die (mysql_error());
									$row_problems_se = mysql_fetch_assoc($result_problems_se) or die (mysql_error());
									
									//For FE
									$query_grade_fe = "SELECT overall_grading FROM proctor_grade_fe WHERE student_id='$std_id'";
									$result_grade_fe = mysql_query($query_grade_fe) or die (mysql_error());
									$row_grade_fe = mysql_fetch_assoc($result_grade_fe) or die (mysql_error());
									
									$query_problems_fe = "SELECT actions FROM proctor_problems_fe WHERE student_id='$std_id'";
									$result_problems_fe = mysql_query($query_problems_fe) or die (mysql_error());
									$row_problems_fe = mysql_fetch_assoc($result_problems_fe) or die (mysql_error());
									
									//For FE
									if ( $row['admission_year'] == "FE" )
									{
										if ( ($row_grade_fe['overall_grading'] == 0) || (empty($row_problems_fe['actions'])) )
										{
											echo '
												<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
													<input type="checkbox" disabled />
												</td>
											';
										}
										else
										{
											echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
										}
									}
									else if ( $row['admission_year'] == "DSE" )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												NA
											</td>
										';
									}
									
									//For SE
									if ( ($row_grade_se['overall_grading'] == 0) || (empty($row_problems_se['actions'])) )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" disabled />
											</td>
										';
									}
									else
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
									}
									
									echo '	
										<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
											NA
										</td>
									';
									
									echo '	
										<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
											NA
										</td>
									';
								}
								
								else if ( $row['curr_year'] == "FE" )
								{
									require_once "connect.php";
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$std_id = $row['reg_no'];
																		
									//For FE
									$query_grade_fe = "SELECT overall_grading FROM proctor_grade_fe WHERE student_id='$std_id'";
									$result_grade_fe = mysql_query($query_grade_fe) or die (mysql_error());
									$row_grade_fe = mysql_fetch_assoc($result_grade_fe) or die (mysql_error());
									
									$query_problems_fe = "SELECT actions FROM proctor_problems_fe WHERE student_id='$std_id'";
									$result_problems_fe = mysql_query($query_problems_fe) or die (mysql_error());
									$row_problems_fe = mysql_fetch_assoc($result_problems_fe) or die (mysql_error());
									
									//For FE
									if ( $row['admission_year'] == "FE" )
									{
										if ( ($row_grade_fe['overall_grading'] == 0) || (empty($row_problems_fe['actions'])) )
										{
											echo '
												<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
													<input type="checkbox" disabled />
												</td>
											';
										}
										else
										{
											echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												<input type="checkbox" checked disabled />
											</td>
										';
										}
									}
									else if ( $row['admission_year'] == "DSE" )
									{
										echo '
											<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
												NA
											</td>
										';
									}
									
									echo '	
										<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
											NA
										</td>
									';
									
									echo '	
										<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
											NA
										</td>
									';
									
									echo '	
										<td align="center" style="border: 1px solid #000000; width: 5%; max-width: 5%; min-width: 5%;">
											NA
										</td>
									';
								}
									
								echo '			
											<td align="center" style="border: 1px solid #000000; width: 10%; max-width: 10%; min-width: 10%;"><a href="faculty_proctor_print?id=' . $row['reg_no'] . '" target="_blank" alt="' . $row['reg_no'] . '" style="color: #0000FF;">' . $row['reg_no'] . '</a></td>
											<td align="center" style="border: 1px solid #000000; width: 30%; max-width: 30%; min-width: 30%;">' . $row['name'] . '</td>
											<td align="center" style="border: 1px solid #000000; width: 20%; max-width: 20%; min-width: 20%;">' . $row['curr_year'] . '</td>
										</tr>
								';
							}
							echo '
									</table>
								</center>
							';
							echo '
								<table width="100%">
									<tr width="100%">
										<td width="50%" align="center">
											<a align="right" href="#TOP">Goto Top</a>
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
