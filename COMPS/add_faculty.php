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
					if ( isset($_SESSION['sid']) )
						$id = $_SESSION['sid'];
					
					if (!empty($_POST['submit']))
					{
						$submit = $_POST['submit'];
						if ($submit)
						{
							$facid = strip_tags($_POST['fac_id']);
							
							require "connect.php";
				
							/*$query = "SELECT * FROM facultyinfo WHERE fac_id='$facid'";
							$result = mysql_query($query);//or die(mysql_error());
							echo $count = mysql_num_rows($result);//or die(mysql_error());
							if ($count == 0)
							{*/
								$query1="INSERT INTO facultyinfo (fac_id,fac_image) VALUES ('$facid','Images/Demo_Image.jpg');";
								$query2="INSERT INTO facultylogin (userid) VALUES ('$facid');";
								$query3="INSERT INTO rfid_info (id) VALUES ('$facid');";
								$query4="INSERT INTO hr_info (id) VALUES ('$facid');";
								$query5="INSERT INTO academic_info (id) VALUES ('$facid');";
								$query6="INSERT INTO faculty_detail (id) VALUES ('$facid')";
								
								$result1=mysql_query($query1);// or die(mysql_error());
								/*$result2=mysql_query($query2) or die(mysql_error());
								$result3=mysql_query($query3) or die(mysql_error());
								$result4=mysql_query($query4) or die(mysql_error());
								$result5=mysql_query($query5) or die(mysql_error());*/
								
								
							/*}
							
							else*/if (mysql_error() == "Duplicate entry '$facid' for key 'PRIMARY'")
							{
								echo '
									<font style="color: #FF0000;">* Faculty Already Exist with this ID!</font>
								';
							}
							else
							{
								$result2=mysql_query($query2) or die(mysql_error());
								$result3=mysql_query($query3) or die(mysql_error());
								$result4=mysql_query($query4) or die(mysql_error());
								$result5=mysql_query($query5) or die(mysql_error());
								$result6=mysql_query($query6) or die(mysql_error());
								echo '
									<font style="color: #FF0000;">* Faculty Added Successfully!</font>
								';
							}
						}
					}
				
				?>
				
				<form name="add_fac" id="add_fac" action="add_faculty" method="POST">
				
					<center>
						
						<table id="input_tbl">
				
							<tr id="input">
							
								<td id="input">
								
									<font id="header4">Faculty ID:</font>
								
								</td>
							
								<td id="input">
						
									<input type="text" name="fac_id" id="fac_id" maxlength="10" autofocus placeholder="Enter Faculty ID Number" onkeypress="return isNumber(event)" required />
									
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
		
		<br />
		
		<br />
		
		<?php
			include "footer.html";
		?>
		
	</body>
	
</html>
