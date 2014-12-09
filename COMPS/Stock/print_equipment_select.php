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
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/report_topic_style.css" />
		
		<style type="text/css">
			#middle {
				overflow: visible;
			}
			table {
				text-align: center;
			}
		</style>
		
		<script language="JavaScript" type="text/javascript">  
			function goto_url(val)
			{
				var win = window.open("print_equipment_history?id_no="+val+"",'_blank');
				win.focus();  
			}
			function validate()
			{
		 		if(document.amc_new.lab_no.value == "default" )
				{
					document.getElementById("lab_no_error").style.display="";
					document.amc_new.lab_no.focus() ;
					return false;
				}
				else
					document.getElementById("lab_no_error").style.display="none";
				
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
				<center>
					<div id="lab_no_error" style="color: #FF0000; display: none">
						* Please Select the Equipment ID!
					</div>
					<form onsubmit="return(validate());" action="" method="POST" name="print_equipment_select">
						<table id="input_tbl">
							<tr id="input">
								<td id="input" style="border: 0px solid #FF0000;">
									<font id="header4"><font id="required">* </font>Equipment ID : </font>
								</td>
								<td id="input" style="border: 0px solid #FF0000;">
									<select name="id_no" onchange="goto_url(this.value)">
										<option value="">Select Equipment ID</option>
										<?php
											require "connect.php";
											mysql_select_db("kjscomp_stock")or die (mysql_error());
											
											if ( isset($_GET['lab_no']) )
												$lab = $_GET['lab_no'];
											
											$query = "SELECT * FROM equipment_details WHERE lab='$lab'";
											$result = mysql_query($query)or die (mysql_error());
											$count = mysql_num_rows($result);
											
											if ( $count == 0 )
											{
												echo '
													<script type="text/javascript">
														alert("* No Equipment Exist for Selected Lab!\n* Please Add Equipment First!");
														window.location.href = "print_lab_select";
													</script>
												';
											}
											else
											{
												while ( $row = mysql_fetch_assoc($result) )
												{
													echo '
														<option value="' . $row['id_no'] . '">' . $row['id_no'] . '</option>
													';
												}
											}
										?>
									</select>
								</td>
							</tr>
						</table>
					</form>
				</center>
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