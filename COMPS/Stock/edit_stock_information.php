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
			/*body {
				background-image: url('../Images/Stock_Background.png');
			}
			#middle {
				width: 50%;
				min-width: 50%;
				max-width: 50%;
				text-align: center;
			}*/
			/*table, td, th, tr {
				border: 1px solid #000000;
			}*/
		</style>
		
		<script language="JavaScript" type="text/javascript">  
			function goto_url(val)
			{
				window.open(val,"_blank");
			}
			
			function validate()
			{
		 		if(document.stock_add.info_type.value == "default" )
				{
					document.getElementById("info_type_error").style.display="";
					document.stock_add.info_type.focus() ;
					return false;
				}
				else
					document.getElementById("info_type_error").style.display="none";
				
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
					<div id="info_type_error" style="color: #FF0000; display: none">
						* Please Select the Information Type you want to Edit!
					</div>
					<form onsubmit="return(validate());" action="" method="POST" name="stock_find" target="_blanck">
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Information Type : </font>
								</td>
								<td id="input">
									<select name="info_type" onchange="goto_url(this.value);">
										<option value="default">Select Information Type</option>
										<option value="edit_part1">Part 1 Form</option>
										<option value="edit_equipment_list">Equipment List</option>
										<option value="edit_software_list">Software List</option>
										<option value="edit_furniture_list">Furniture List</option>
										<option value="edit_part2">Part 2 Form</option>
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