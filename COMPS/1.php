<html>
	<title>Test Selection</title>
	<head>
		<script LANGUAGE="JavaScript">
			function ValidateForm(form)
			{
				if ( ( oneform.personal.checked == false ) && ( oneform.technical.checked == false ) && ( oneform.other.checked == false ) ) 
				{
					document.getElementById("checkbox1error").style.display="";
					return false;
				}
				else
				{
					document.getElementById("checkbox1error").style.display="none";
					form.submit();
				}
				return true;
			}
		</script>
	</head>
	<body>
		<center>
			<div id="checkbox1error" style="color: #FF0000; display: none">
				* Please choose from below Option!
			</div>
			<form name="oneform" action="1" method="POST" onsubmit="return(ValidateForm());">
				<table width="100%" align="center">
					<tr width="100%">
						<td width="33%" align="center" style="border: 1px solid black">
							<input type="checkbox" name="personal" value="Personal" />Personal Details
						</td>
						<td width="34%" align="center" style="border: 1px solid black">
							<input type="checkbox" name="technical" value="Technical" />Technical Details
						</td>
						<td width="33%" align="center" style="border: 1px solid black">
							<input type="checkbox" name="other" value="Other" />Other Details
						</td>
					</tr>
					<tr width="100%">
						<td colspan="3" align="center" style="border: 1px solid black">
							<input type="submit" name="submit_one" value="Proceed" />
						</td>
					</tr>
				</table>
			</form>
		</center>
		<center>
			<div id="checkbox2error" style="color: #FF0000; display: none">
				* Please choose from below Option!
			</div>
				<?php
					if (isset($_POST['submit_one']))
					{
						$submit = $_POST['submit_one'];
						if ($submit)
						{
							echo '<form name="twoform" action="1" method="POST" onsubmit="return(Validate());">';
								echo '<table align="center">';
									echo '<tr>';
										if (isset ($_POST['personal']))
										{
											echo '<td><input type="checkbox" name="p_1" value="P_1" />P_1</td>';
											echo '<td><input type="checkbox" name="p_2" value="P_2" />P_2</td>';
										}
									echo '</tr>';
									echo '<tr>';
										if (isset ($_POST['technical']))
										{
											echo '<td><input type="checkbox" name="t_1" value="T_1" />T_1</td>';
											echo '<td><input type="checkbox" name="t_2" value="T_2" />T_2</td>';
										}
									echo '</tr>';
									echo '<tr>';
										if (isset ($_POST['other']))
										{
											echo '<td><input type="checkbox" name="o_1" value="O_1" />O_1</td>';
											echo '<td><input type="checkbox" name="o_2" value="O_2" />O_2</td>';
										}
									echo '</tr>';
									//echo '<tr>';
										//echo '<input type="submit" name="submit_two" value="Display" />';
									//echo '</tr>';
								echo '</table>';
								echo '<input type="submit" name="submit_two" value="Display" />';
							echo '</form>';
						}
					}
				?>
		</center>
	</body>
</html>