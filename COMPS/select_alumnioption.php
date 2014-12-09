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
<?php
	
	if (isset($_POST['submitfile']))
	{
		$submit = $_POST['submitfile'];
		if ($submit)
		{
			
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" />
		
		<script LANGUAGE="JavaScript">
			function ValidateFormOp(form)
			{
				ErrorTextOp= "";
				if ( ( form.option[0].checked == false ) && ( form.option[1].checked == false ) && ( form.option[2].checked == false ) ) 
				{
					alert ("Please choose any one Option from below!");
					return false;
					history.go(-1);
				}
				if (ErrorTextOp= "")
				{
					form.submit();
				}
			}
			/*function ValidateFormFile(form)
			{
				ErrorTextFile= "";
				if(document.file_select.filename.value == "default")
				{
					alert ("Please choose Year from below!"); 
					return false;
					history.go(-1);
				}
				if (ErrorTextFile= "")
				{
					form.submit();
				}
			}
			function ValidateFormYr(form)
			{
				ErrorTextYr= "";
				if(document.choose_year.year.value == "default")
				{
					alert ("Please choose Year from below!");
					history.go(-1);
					return false;
					//history.go(-1);
				}
				if (ErrorTextYr= "")
				{
					form.submit();
				}
			}*/
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
				<form name="choose_option" action="select_alumnioption" method="POST">
					<center>
						<table>
							<tr>
								<td align="left">
									<input type="radio" name="option" id="option" value="upload" />Upload Alumni Details
								</td>
							</tr>
							<tr>
								<td align="left">
									<input type="radio" name="option" id="option" value="retrieve" />Retrieve Alumni Details
								</td>
							</tr>
							<tr>
								<td align="left">
									<input type="radio" name="option" id="option" value="retrieve_list" />Retrieve Alumni Details (Old Uploaded List)
								</td>
							</tr>
							<tr>
								<td colspan="3" align="center">
									<input type="submit" value="Proceed" name="submitop" id="submitop" onClick="ValidateFormOp(this.form)" />
								</td>
							</tr>
						</table>
					</center>
				</form>
				
				<?php
					if (isset($_POST['option']))
					{
						$option = $_POST['option'];

						if ($option == 'upload')
						{
							echo '
								<br /><br /><br /><br />
								<form enctype="multipart/form-data" name="file_select" action="alumni_upload" method="POST">
									<center>
										<table width="100%">
											<tr width="100%" border="1px solid black">
												<td align="right" width="50%" border="1px solid black">
													<font style="color: #FF0000;">* </font>Select Year from the List
												</td>
												<td align="left" width="50%" border="1px solid black">
													<select name="filename" required>
														<option value="default">Select the Year</option>';
													for ($i=2004 ; $i<=2020 ; $i++)
													{
														echo '<option name="' . $i . '_' . ($i+1) . '" value="' . $i . '_' . ($i+1) . '">' . $i . '-' . ($i+1) . '</option>
															<!--option value="2004-2005">2004-2005</option-->';
													}
							echo'					</select>
												 </td>
											</tr>
											<tr width="100%" border="1px solid black">
												<td colspan="2" align="center" border="1px solid black">
													<input type="file" name="alumni_file" id="alumni_file" required />
												</td>
											</tr>
											<tr>
												<td colspan="2" align="center" border="1px solid black">
													<input type="submit" name="submitfile" value="Proceed" id="submitfile" onClick="ValidateFormFile(this.form)" />
												</td>
											</tr>
										</table>
									</center>
								</form>
							';
						}
						else if ($option == 'retrieve')
						{
							echo '
								<br /><br /><br /><br />
								<form name="choose_year" action="alumni_retrieve" method="POST">
									<center>
										<table width="100%">
											<tr width="100%" border="1px solid black">
												<td align="right" width="50%" border="1px solid black">
													<font style="color: #FF0000;">* </font>Select Year from the List
												</td>
												<td align="left" width="50%" border="1px solid black">
													<select name="year" required>
														<option value="default">Select the Year</option>';
													for ($i=2004 ; $i<=2020 ; $i++)
													{
														echo '<option name="' . $i . '-' . ($i+1) . '" value="' . ($i+1) . '">' . $i . '-' . ($i+1) . '</option>';
													}
							echo'					</select>
												 </td>
											</tr>
											<tr>
												<td colspan="2" align="center" border="1px solid black">
													<input type="submit" value="Proceed" name="submityr" id="submityr" onClick="ValidateFormYr(this.form)" />
												</td>
											</tr>
										</table>
									</center>
								</form>
							';
						}
						else if ($option == 'retrieve_list')
						{
							echo '
								<br /><br /><br /><br />
								<form name="choose_year" action="alumni_retrieve_list" method="POST">
									<center>
										<table width="100%">
											<tr width="100%" border="1px solid black">
												<td align="right" width="50%" border="1px solid black">
													<font style="color: #FF0000;">* </font>Select Year from the List
												</td>
												<td align="left" width="50%" border="1px solid black">
													<select name="year" required>
														<option value="default">Select the Year</option>';
													for ($i=2004 ; $i<=2020 ; $i++)
													{
														echo '<option name="' . $i . '_' . ($i+1) . '" value="' . $i . '_' . ($i+1) . '">' . $i . '-' . ($i+1) . '</option>';
													}
							echo'					</select>
												 </td>
											</tr>
											<tr>
												<td colspan="2" align="center" border="1px solid black">
													<input type="submit" value="Proceed" name="submityr" id="submityr" onClick="ValidateFormYr(this.form)" />
												</td>
											</tr>
										</table>
									</center>
								</form>
							';
						}
					}
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
