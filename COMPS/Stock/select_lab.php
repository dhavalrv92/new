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
				window.open("stock_retrieve?lab_no="+val+"","_blank");
			}
			
			function validate()
			{
		 		if(document.stock_add.lab_no.value == "default" )
				{
					document.getElementById("lab_no_error").style.display="";
					document.stock_add.lab_no.focus() ;
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
						* Please Select the Lab No.!
					</div>
					<form onsubmit="return(validate());" action="stock_retrieve" method="POST" name="stock_find" target="_blanck">
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Lab No. : </font>
								</td>
								<td id="input">
									<select name="lab_no" onchange="goto_url(this.value);">
										<option value="default">Select Lab No.</option>
										<option value="301A">301A</option>
										<option value="301B">301B</option>
										<option value="302A">302A</option>
										<option value="302B">302B</option>
										<option value="602">602</option>
										<option value="603">603</option>
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