<?php
	if (!isset($_SESSION))
		session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		<style type="text/css">
			table {
				width: 50%;
			}
			th {
				/*border: 1px solid black;*/
				border-style: inset;
				width: 50%;
			}
			td {
				/*border: 1px solid black;*/
				border-style: inset;
				width: 50%;
			}
		</style>
		<script type="text/javascript">
			function validate()
			{
			 	if( document.admin_proctor.faculty_name.value == "default" )
				{
					document.getElementById("faculty_nameerror").style.display="";
					document.admin_proctor.faculty_name.focus();
					return false;
				}
				else
					document.getElementById("faculty_nameerror").style.display="none";
				
				if( document.admin_proctor.year.value == "default" )
				{
					document.getElementById("yearerror").style.display="";
					document.admin_proctor.year.focus();
					return false;
				}
				else
					document.getElementById("yearerror").style.display="none";
				
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
		<?php
			if (isset($_SESSION['proctor_user']))
			{
				$user = $_SESSION['proctor_user'];
			
				if ( $user == "admin" )
				{
					echo '
						<center>
							<div id="faculty_nameerror" style="color: #FF0000; display: none">
								* Plase Select Faculty Name! 
							</div>
							<div id="yearerror" style="color: #FF0000; display: none">
								* Plase Select the Year! 
							</div>
							<form onsubmit="return(validate());" name="admin_proctor" action="proctor_print" method="POST" target="_blank">
								<table cellpadding="2" cellspacing="2">
									<tr>
										<th>Faculty Name : </th>
										<td>';
											require "../connect.php";
											$query = mysql_query("SELECT fac_name FROM rfid_info"); // Run your query
											echo '
												<select name="faculty_name" id="drpdwnlst_facname" required>
											'; // Open your drop down box
											echo '
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
					echo'				</td>
									</tr>
									<tr>
										<th>Year : </th>
										<td>
											<select name="year">
												<option value="default">Select the Year</option>
												<option value="SE">Second Year</option>
												<option value="TE">Third Year</option>
												<option value="BE">Final Year</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"  align="center">
											<input type="submit" name="retrieve" value="Retrieve" />
										</td>
									</tr>
								</table>
							</form>
						</center>
					';
				}
			}
			else
			{
				echo '
					<script type="text/javascript">
						alert ("* Please Login First to Continue!");
						window.location.href "index";
					</script>
				'; 	
			}
		?>
	</body>
</html>