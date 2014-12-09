<?php
	
	if (isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
		if ($submit)
		{
			$answer=$_POST['answer'];
			$dbanswer=$_POST['dbanswer'];
			$dbid=$_POST['dbid'];
			if ( !($answer==$dbanswer) )
			{
				echo'
					<script type="text/javascript">
						alert ("The typed Answer is not Correct");
						history.go(-1);
					</script>
				';
			}
			else
			{
				header("location: new_password?id=$dbid");
			}
		}
	}
	
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/forgot_pass.css" />
		
		<script>
			function getCombo(sel)
			{
				var value = sel.options[sel.selectedIndex].value; 
				//alert (value);
				window.location.href = "forgot_pass?id=" + value;
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
					
					<table id="input_tbl">
				
					<tr id="input">
							
						<td id="inputcol" width="50%" align="center">
								
							<font id="header4"><font id="required">* </font><b>Faculty ID : </b></font>
								
						</td>
							
						<td id="inputcol" width="50%" align="center">
									
							<?php
								
								if (!isset($_SESSION))
									session_start();
								
								require "connect.php";
								
								$query = mysql_query("SELECT fac_id FROM facultyinfo"); // Run your query
		
								echo '<select name="faculty_id" id="drpdwnlst_facid" onchange="getCombo(this)" required>'; // Open your drop down box
		
									echo '<option name="defaultname" value="default">Select Faculty ID</option>';
											
												// Loop through the query results, outputing the options one by one
									while ($row = mysql_fetch_array($query))
									{
										echo '<option name="' . $row['fac_id'] . '" value="' . $row['fac_id'] . '">' . $row['fac_id'] . '</option>';
									}
		
								echo '</select>';// Close your drop down box
								
							echo '</td>
							
							</tr>';
							echo '<tr id="input">
								<td>
									<font id="header4"><font id="required">* </font><b>Security Question : </b></font>
								</td>
						
								<td width="100%">';
									if (isset($_GET['id']))
									{
										$facid = $_GET['id'];
										$result = mysql_query("SELECT * FROM facultylogin WHERE userid='$facid'");
										$row = mysql_fetch_array($result) or die(mysql_error());
										
										echo '
											<input type="text" class="security" readonly value="' . $row['sec_que'] . '" />
										';
									}
								echo '</td>
								
							</tr>';
																
							?>
							<form action="forgot_pass" method="POST">
								<input type="hidden" name="dbanswer" value="<?php echo $row['answer'] ?>" />
								<input type="hidden" name="dbid" value="<?php echo $row['userid'] ?>" />
								<tr id="input">
									<td>
										<font id="header4"><font id="required">* </font><b>Your Answer : </b></font>
									</td>
									<td>
										<input type="text" class="security" name="answer" placeholder="Enter Answer of above Question" size="80%" required />
									</td>
								</tr>
								<tr id="input">
									<td colspan="2">
										<input type="submit" name="submit" value="Proceed" />
									</td>
								</tr>
							</form>
						</table>
					
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