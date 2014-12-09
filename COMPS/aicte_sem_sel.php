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
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
		<style type="text/css">
		
			table {
				width: 100%;
			}
			
			#year {
				width: 50%;
				border: 0px solid blue;
			}
			
			tr {
				
			}
		
		</style>
		<script type="text/javascript">
			function validate()
			{
				if ( (document.sem_select.sem[0].checked==false) &&
					 (document.sem_select.sem[1].checked==false) &&
					 (document.sem_select.sem[2].checked==false) &&
					 (document.sem_select.sem[3].checked==false) &&
					 (document.sem_select.sem[4].checked==false) &&
					 (document.sem_select.sem[5].checked==false)
					)
				{
					
					document.getElementById("semerror").style.display="";
					return false;
				}
				else
					document.getElementById("semerror").style.display="none";
				return true;
			}
		</script>
		
	</head>
	
	<body>
	
		<div id="semerror" style="color: #FF0000; display: none;">
			* Please Select the Semester
		</div>
			
		<?php

			echo '
				<h1> Please Select Year to Display the Result </h1>
				<form onsubmit="return(validate());" name="sem_select" action="aicte" method="POST">
					<center>
						<table>
							<tr>
								<td id="year" align="left">
									<input type="radio" name="sem" value="sem_iii" /> Semester III
								</td>
								<td id="year">
									<input type="radio" name="sem" value="sem_iv" /> Semester IV
								</td>
							</tr>
							<tr>
								<td id="year" align="left">
									<input type="radio" name="sem" value="sem_v" /> Semester V
								</td>
								<td id="year">
									<input type="radio" name="sem" value="sem_vi" /> Semester VI
								</td>
							</tr>
							<tr>
								<td id="year" align="left">
									<input type="radio" name="sem" value="sem_vii" /> Semester VII
								</td>
								<td id="year">
									<input type="radio" name="sem" value="sem_viii" /> Semester VIII
								</td>
							</tr>
							<tr>
								<td id="year" colspan="3" align="center">
									<input type="submit" value="Proceed" id="submitbtn"/>
								</td>
							</tr>
						</table>
					</center>
				</form>
			';

		?>
	
	</body>
	
</html>