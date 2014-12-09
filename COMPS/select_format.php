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
			
			#format {
				width: 50%;
				border: 0px solid blue;
			}
			
			tr {
				
			}
		
		</style>
		<script type="text/javascript">
			function validate()
			{
				if ( (document.result_format.format[0].checked==false) &&
					 (document.result_format.format[1].checked==false) &&
					 (document.result_format.format[2].checked==false) &&
					 (document.result_format.format[3].checked==false) &&
					 (document.result_format.format[4].checked==false)
					)
				{
					
					document.getElementById("formaterror").style.display="";
					return false;
				}
				else
					document.getElementById("formaterror").style.display="none";
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
			
				<div id="formaterror" style="color: #FF0000; display: none;">
					* Please Select the Format
				</div>
			
				<?php
				
					echo '
						<!--h1> Please Select Format of Result tobe Displayed </h1-->
						<form onsubmit="return(validate());" name="result_format" action="resultRetrieve" method="POST">
							<center>
								<table>
									<tr>
										<td id="format" align="left">
											<input type="radio" name="format" id="format" value="aicte">AICTE
										</td>
									</tr>
									<tr>
										<td id="format" align="left">
											<input type="radio" name="format" id="format" value="lmc">LMC
										</td>
									</tr>
									<tr>
										<td id="format" align="left">
											<input type="radio" name="format" id="format" value="govt">Governing Council
										</td>
									</tr>
									<tr>
										<td id="format" align="left">
											<input type="radio" name="format" id="format" value="accr">Accredative
										</td>
									</tr>
									<tr>
										<td id="format" align="left">
											<input type="radio" name="format" id="format" value="subject">Subject Wise Result
										</td>
									</tr>
									<tr>
										<td id="format" colspan="3" align="center">
											<input type="submit" value="Proceed" id="submitbtn"/>
										</td>
									</tr>
								</table>
							</center>
						</form>
					';
					
				?>
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
