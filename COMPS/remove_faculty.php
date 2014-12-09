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
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/add_faculty_style.css" />
		
		<script>
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
			
			function validate()
			{
			 
				if(document.remove_fac.faculty_name.value == "default")
				{
					//alert("Please Select Security Question!");
					document.getElementById("facultyname").style.display="";
					document.facsignup.question.focus() ;
					return false;
				}
				else
				{
					document.getElementById("facultyname").style.display="none";
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
			
				<div id="facultyname" style="color: #FF0000; display: none">
					* Please Select Faculty Name from the List!
				</div>
				
				<?php
	
					if (!empty($_POST['submit']))
					{
						$submit = $_POST['submit'];
						if ($submit)
						{
							$facid = strip_tags($_POST['faculty_name']);
							if ($facid != "default")
							{
								require "connect.php";
				
								//$query1 = "DELETE FROM facultyinfo WHERE fac_id='$facid';";
								$query2 = "DELETE FROM facultylogin WHERE userid='$facid';";
								
								//$result1=mysql_query($query1) or die(mysql_error());
								$result2=mysql_query($query2) or die(mysql_error());
								
								echo '
									<font style="color: #FF0000;">
										* Faculty Successfully Removed!
									</font> 
								';
							}
							else
							{
								echo '
									<font style="color: #FF0000;">
										* Please Select Faculty Name from the List!
									</font> 
								';
							}
						}
					}
				
				?>
				
				<form name="remove_fac" id="remove_fac" action="remove_faculty" method="POST"> <!--onsubmit="return(validate());"-->
				
					<center>
						
						<table id="input_tbl">
				
							<tr id="input">
							
								<td id="input" align="right">
								
									<font id="header4">Faculty Name:</font>
								
								</td>
							
								<td id="input">
						
									<?php
										require "connect.php";
										$query = mysql_query("SELECT fac_id,fac_name FROM facultyinfo"); // Run your query
			
										echo '<select name="faculty_name" id="drpdwnlst_facname" required>'; // Open your drop down box
			
											echo '<option name="defaultname" value="default">Select Faculty Name</option>';
												
											// Loop through the query results, outputing the options one by one
											while ($row = mysql_fetch_array($query))
											{
												echo '<option name="' . $row['fac_id'] . '" value="' . $row['fac_id'] . '">' . $row['fac_id'] . ' - ' . $row['fac_name'] . '</option>';
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