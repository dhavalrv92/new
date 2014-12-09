<?php
	if (!isset($_SESSION))
		session_start();
	if ( isset($_SESSION['assistant']) )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				window.location.href = "assistant_login";
			</script>
		';
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/add_faculty_style.css" />
		
		<script>
			 function isNumber(evt)
			 {
				evt = (evt) ? evt : window.event;
			    var charCode = (evt.which) ? evt.which : evt.keyCode;
			    if (charCode > 31 && (charCode < 48 || charCode > 57))
			    {
			        return false;
			    }
			    document.getElementByID("std_added").style.display = "none";
			    document.getElementByID("std_error").style.display = "none";
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
			
				<?php
					if (!empty($_POST['submit']))
					{
						$submit = $_POST['submit'];
						if ($submit)
						{
							$stdid = strip_tags($_POST['std_id']);
							
							require "connect.php";
				
							$query = "SELECT * FROM kjscomp_student.student_personal WHERE reg_no='$stdid'";
							$result = mysql_query($query);// or die(mysql_error());
							$count = mysql_num_rows($result);// or die(mysql_error());
							if ($count == 0)
							{
								$query = "INSERT INTO kjscomp_student.student_personal (reg_no) VALUES ('$stdid');";
								$result = mysql_query($query) or die(mysql_error());
								
								$query1 = "INSERT INTO kjscomp_student.student_alumni_data (student_id) VALUES ('$stdid');";
								$result1 = mysql_query($query1) or die(mysql_error());
								
								$query2 = "INSERT INTO kjscomp_student.student_login (user_id) VALUES ('$stdid');";
								$result2 = mysql_query($query2) or die(mysql_error());

								echo '
									<script type="text/javascript">
										alert ("* Student Added Successfully!");
									</script>
								';
							}
							else
							{
								echo '
									<script type="text/javascript">
										alert ("* Student Already Exist with this ID!");
									</script>
								';
							}
						}
					}
				
				?>
				
				<form name="add_student" id="add_student" action="add_student" method="POST">
					<center>
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="header4" style="color: #FF0000;">* </font>Student ID : </font>
								</td>
								<td id="input">
									<input type="text" name="std_id" id="std_id" maxlength="10" autofocus placeholder="Enter Student ID Number" onkeypress="return isNumber(event)" required />
								</td>
							</tr>
						</table>
						<br />	<br />
						<input type="submit" name="submit" value="Add" />
					</center>
				</form>
			
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