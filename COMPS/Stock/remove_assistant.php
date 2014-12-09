<?php
	if (!isset($_SESSION))
		session_start();
	
	if ( isset($_SESSION['assistant']) )
	{
		
	}
	else
	{
		header ("location: assistant_login");
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/add_faculty_style.css" />
		
		<script>
			function validate()
			{
			 
				if(document.remove_assist.assistant_name.value == "default")
				{
					document.getElementById("assistantname").style.display="";
					document.facsignup.question.focus() ;
					return false;
				}
				else
				{
					document.getElementById("assistantname").style.display="none";
					return true;
				}
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
			
				<div id="assistantname" style="color: #FF0000; display: none">
					* Please Select Assistant Name from the List!
				</div>
				
				<?php
	
					if (!empty($_POST['submit']))
					{
						$submit = $_POST['submit'];
						if ($submit)
						{
							$assistant_id = strip_tags($_POST['assistant_name']);
							if ($assistant_id != "default")
							{
								require "connect.php";
				
								$query = "DELETE FROM kjscomp_stock.assistant_login WHERE user_id='$assistant_id';";
								
								$result = mysql_query($query) or die(mysql_error());
								
								echo '
									<font style="color: #FF0000;">
										* Assistant Successfully Removed!
									</font> 
								';
							}
							else
							{
								echo '
									<font style="color: #FF0000;">
										* Please Select Assistant Name from the List!
									</font> 
								';
							}
						}
					}
				
				?>
				
				<form onsubmit="return(validate());" name="remove_assist" id="remove_assist" action="remove_assistant" method="POST">
					<center>
						<table id="input_tbl">
							<tr id="input">
								<td id="input" align="right">
									<font id="header4">Assistant Name:</font>
								</td>
								<td id="input">
									<?php
										require "connect.php";
										$query = mysql_query("SELECT user_id,name FROM kjscomp_stock.assistant_login"); // Run your query
			
										echo '<select name="assistant_name" id="drpdwnlst_assistname" required>'; // Open your drop down box
			
											echo '<option name="defaultname" value="default">Select Assistant Name</option>';
												
											// Loop through the query results, outputing the options one by one
											while ($row = mysql_fetch_array($query))
											{
												echo '<option name="' . $row['user_id'] . '" value="' . $row['user_id'] . '">' . $row['user_id'] . ' - ' . $row['name'] . '</option>';
											}
			
										echo '</select>';// Close your drop down box
									?>
									
								</td>
								
							</tr>
							
						</table>
						
						<br />	<br />
						
						<input type="submit" name="submit" value="Remove" />
						
					</center>
				
				</form>
			
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