<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login First!");
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
		</script>
		
		<style type="text/css">
			table, td, th {
				width: 50%;
			}
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
				</center>
				<center>
					<form name="semselect" onsubmit="return (validate());" action="student_roll_list_retrieve" method="POST">
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
				
				<?php
					if ( isset($_POST['submit']) )
					{
						$submit = $_POST['submit'];
						if ( $submit )
						{
							$sem = "roll_no_sem_" . strtolower($_POST['sem']);
							
							require_once "connect.php";
							
							$query = "SELECT * FROM $sem";
							$result = mysql_query($query);
							
							if ( mysql_error()== "Table 'kjscomp.$sem' doesn't exist" )
							{
								echo '
									<script type="text/javascript">
										alert ("* No Records Exist!");
										window.location.href = "student_roll_list_retrieve";
									</script>
								';
							}
							else
							{
								echo '
									<table>
										<tr>
											<th border="1px solid #000000;" align="center" colspan="3" style="background-color: #FF00FF">SEMESTER ' . $_POST['sem'] . '</th>
										</tr>
										<tr>
											<th style="background-color: #FFFF00">Roll No.</th>
											<th style="background-color: #FFFF00">Student Name</th>
											<th style="background-color: #FFFF00">Year</th>
										</tr>
								';
								while ( $row = mysql_fetch_assoc($result) )
								{
									echo '
										<tr>
											<td align="center">' . $row['roll_no'] . '</td>
											<td align="center">' . $row['student_name'] . '</td>
											<td align="center">' . $row['year'] . '</td>
										</tr>
									';
								}
								echo '
									</table>
									<br /><br /><br /><br />
									<center>
										<form action="print_roll_list" target="_blank" method="POST">
											<input type="hidden" name="tbl_name" value="' . $sem . '" />
											<input type="hidden" name="sem_name" value="' . $_POST['sem'] . '" />
											<input type="submit" name="print" value="Print List" />
										</form>
									</center>
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