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
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" />
		
		<script type="text/javascript">
			function validate ()
			{
				if ( (document.semselect.sem[0].checked==false) &&
					 (document.semselect.sem[1].checked==false) &&
					 (document.semselect.sem[2].checked==false) &&
					 (document.semselect.sem[3].checked==false) &&
					 (document.semselect.sem[4].checked==false) &&
					 (document.semselect.sem[5].checked==false)/* &&
					 (document.semselect.sem[6].checked==false) &&
					 (document.semselect.sem[7].checked==false)*/ )
				{
					document.getElementById("semerror").style.display="";
					return false;
				}
				else
					document.getElementById("semerror").style.display="none";
				
				return true;
			}
			function validate_year()
			{
				if(document.yearselect.year.value == "default" )
				{
					document.getElementById("year_error").style.display="";
					document.yearselect.year.focus() ;
					return false;
				}
				else
					document.getElementById("year_error").style.display="none";
				
				return true;
			}
		</script>
		
		<style type="text/css">
			#input {
				text-align: center;
			}
		</style>
		
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
					<div id="semerror" style="color: #FF0000; display: none;">
						* Please Select Semester!
					</div>
					<div id="year_error" style="color: #FF0000; display: none;">
						* Please Select Year!
					</div>
				</center>
				<center>
					<form name="semselect" onsubmit="return (validate());" action="student_roll_list" method="POST">
						<table id="input_tbl">
							<!--tr id="input">
								<td id="input">
									<b>First Year :</b> 
								</td>
								<td id="input">
									<input type="radio" name="sem" id="sem" value="I">Semester I
								</td>
								<td id="input">
									<input type="radio" name="sem" id="sem" value="II">Semester II
								</td>
							</tr-->
							<tr id="input">
								<!--td id="input">
									<b>Second Year :</b> 
								</td-->
								<td id="input">
									<input type="radio" name="sem" id="sem" value="III">Semester III
								</td>
								<td id="input">
									<input type="radio" name="sem" id="sem" value="IV">Semester IV
								</td>
							</tr>
							<tr id="input">
								<!--td id="input">
									<b>Third Year :</b> 
								</td-->
								<td id="input">
									<input type="radio" name="sem" id="sem" value="V">Semester V
								</td>
								<td id="input">
									<input type="radio" name="sem" id="sem" value="VI">Semester VI
								</td>
							</tr>
							<tr id="input">
								<!--td id="input">
									<b>Final Year :</b>
								</td-->
								<td id="input">
									<input type="radio" name="sem" id="sem" value="VII">Semester VII
								</td>
								<td id="input">
									<input type="radio" name="sem" id="sem" value="VIII">Semester VIII
								</td>
							</tr>
							<tr id="input">
								<br />
							</tr>
							<tr id="input">
								<br />
							</tr>
							<tr id="input">
								<td id="input" colspan="3" align="center">
									<input type="submit" name="submit" value="Proceed" />
								</td>
							</tr>
						</table>
					</form>
				</center>
				<br /><br /><br /><br />
				<?php
					if (isset($_POST['submit']))
					{
						$submit = $_POST['submit'];
						if ($submit)
						{
							if (isset($_POST['sem']))
							{
								$sem = $_POST['sem'];
								echo '
									<form onsubmit="return (validate_year());" enctype="multipart/form-data" name="yearselect" action="upload_roll_list" method="POST">
										<center>
											<table id="input_tbl">
												<tr id="input">
													<td id="input">
														<font style="color: #FF0000;"><b>* </b></font>
														<b>Semester :</b>
													</td>
													<td id="input">
														<input type="text" name="sem_name" id="sem_name" readonly value="Sem_' . $sem . '" />
													</td>
												</tr>
												<tr id="input">
													<td id="input">
														<font style="color: #FF0000;"><b>* </b></font>
														<b>Year :</b>
													</td>
													<td id="input">
														<select name="year">
															<option value="default" selected="selected">Select Year</option>
								';
								for ($i=2000;$i<=2030;$i++)
								{
									echo '
															<option value="' . $i . '-' . ($i+1) . '">' . $i . '-' . ($i+1) . '</option>
									';						
								}
								echo'					</select>
														<!--input type="text" name="year" id="year" placeholder="Please write the Year" required /-->
													</td>
												</tr>
												<tr id="input">
													<td id="input">
														<font style="color: #FF0000;"><b>* </b></font>
														<b>Select File :</b>
													</td>
													<td id="input">
														<input type="file" name="sem_file" id="sem_file" required />
													</td>
												</tr>
												<tr id="input">
													<td id="input" colspan="2" align="center">
														<input type="submit" name="submit_upload" value="Proceed" />
													</td>
												</tr>
											</table>
										</center>
									</form>
								';
							}
						}
					}
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