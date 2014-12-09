<?php
	
	if (isset($_POST['reset']))
	{
		$submit = $_POST['reset'];
		if ($submit)
		{
			$answer=$_POST['answer'];
			$dbanswer=$_POST['dbanswer'];
			$id=$_POST['id'];
			if ( !($answer==$dbanswer) )
			{
				echo'
					<script type="text/javascript">
						alert ("The typed Answer is not Correct");
						window.location.href = "forgot_password";
					</script>
				';
			}
			else
			{
				header("location: new_password?id='" . $id . "'");
			}
		}
	}
	
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/forgot_pass.css" />
		
		<script type="text/javascript">
			function getCombo(sel)
			{
				var value = sel.options[sel.selectedIndex].value; 
				//alert (value);
				window.location.href = "forgot_pass?id=" + value;
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
				<div id="input_id">
					<center>
						<form name="id_input" action="forgot_password" method="POST">
							<table id="input_tbl">
								<tr id="input">
									<td id="inputcol" width="50%" align="center">
										<font id="header4"><font id="required">* </font>Student ID : </font>
									</td>
									<td id="inputcol" width="50%" align="center">
										<input type="text" name="assistant_id" maxlength="10" placeholder="Enter the User ID" onkeypress="return (isNumber(event));" required />
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" name="submit" value="Next >>" />
									</td>
								</tr>
							</table>
						</form>
					</center>
				</div>
				<div id="input_answer">
					<?php
						if (isset($_POST['submit']))
						{
							$submit = $_POST['submit'];
							if ($submit)
							{
								$id = $_POST['assistant_id'];
								
								require_once "connect.php";
								
								$query = "SELECT * FROM kjscomp_student.student_login WHERE user_id=$id";
								$result = mysql_query($query);
								$count = mysql_num_rows($result);
								if ($count == 1)
								{
									$row = mysql_fetch_assoc($result);
									echo '
										<center>
											<form name="reset_pass" action="forgot_password" method="POST">
												<table id="input_tbl">
													<tr id="input">
														<td id="inputcol" width="50%" align="center">
															' . $row['sec_que'] . '
														</td>
													</tr>
													<tr id="input">
														<td id="inputcol" width="50%" align="center">
															<input type="text" name="answer" placeholder="Enter your Answer" required />
														</td>
													</tr>
													<tr>
														<input type="hidden" name="dbanswer" value="' . $row['answer'] . '" />
														<input type="hidden" name="id" value="' . $id . '" />
													</tr>
													<tr>
														<td colspan="2" align="center">
															<input type="submit" name="reset" value="Reset Password" />
														</td>
													</tr>
												</table>
											</form>
										</center>
									';
								}
								else
								{
									echo '
										<script type="text/javascript">
											alert ("* User ID not Valid!");
											history.go(-1);
										</script>
									';
								}
							}
						}
					?>
				</div>
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