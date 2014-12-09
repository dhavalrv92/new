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
		
		<link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" />
		
		<script type="text/javascript">
			function gotohome() 
			{
	    			window.location.href = "index";
			}
			function validate()
			{
				if ( document.paper.year.value == "default" )
				{
					document.getElementById('year_error').style.display = "";
					document.paper.year.focus();
					return false;
				}
				else
					document.getElementById('year_error').style.display = "none";
				
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
					<div id="year_error" style="color: #FF0000; display: none;">
						* Please Select the Year!
					</div>
				</center>
				<form onsubmit="return (validate());" name="paper" id="paper" action="paper_retrieve" method="POST">
					<table id="input_tbl">
						<tr id="input">
							<td id="input">
								<font id="header4">Enter the time period:</font>
							</td>
							<td>
								<?php
									echo '
										<select name="year" required>
											<option value="default">Select the Year</option>
									';
												for ($i=2000 ; $i<=2030 ; $i++)
												{
													echo '<option name="' . $i . '" value="' . ($i) . '">' . $i . '</option>';
												}
									echo '
										</select>
									';
								?>
							</td>
						</tr>
					</table>
					<br /><br />
					<center>
						<input type="submit" name="submit" value="Submit" />
					</center>
				</form>
			
				<?php
					if ( isset($_POST['submit']) )
					{
						$submit = $_POST['submit'];
							
						if ( $submit )
						{
							if (!isset($_SESSION))
								session_start();
							if (isset($_SESSION['sid']))
								$id = $_SESSION['sid'];
							else
								$id = 0;
								
							$year = $_POST['year'];
							require_once "connect.php";	
							
							$query = "SELECT p.id,fac_name,p.date,p.title,p.place FROM papers_presented p NATURAL JOIN rfid_info WHERE EXTRACT(YEAR FROM date)='$year'";
							$result = mysql_query($query) or die(mysql_error());
							$count = mysql_num_rows($result);
							if ($count == 0)
							{
								echo '
									<script type="text/javascript">
										alert ("* No Data Exist!");
										window.location.href = "seminar_retrieve";
									</script>
								';
							}
							else
							{
								echo '
									<center>
										<table cellpadding="2" border="1px" style="max-width=100%; border-radius: 10px;">
											<tr>
												<th bgcolor="#FFFF00">ID</th>
												<th bgcolor="#FFFF00">Faculty Name</th>
												<th bgcolor="#FFFF00">Date</th>
												<th bgcolor="#FFFF00">Title</th>
												<th bgcolor="#FFFF00">Place</th>
											</tr>
								';
								while ($row = mysql_fetch_array($result))
								{
									echo '
										<tr>
											<td>' . $row['id'] . '</td>
											<td>' . $row['fac_name'] . '</td>
											<td>' . $row['date'] . '</td>
											<td>' . $row['title'] . '</td>
											<td>' . $row['place'] . '</td>
										</tr>
									';
								}	
								echo'
										</table>
									</center>
								';
								
								echo '
									<table width="100%">
										<tr width="100%">
											<td align="center" width=33%">
												<input type="button" name="backbtn" id="backbtn" value="<< Go Back" onClick="history.go(-1)" />
											</td>
											<td align="center" width="34%">
												<form action="exportcsv" method="POST">
													<input type="hidden" name="query" value="' . $query . '">
													<input type="submit" name="exportbtn" id="exportbtn" value="Export to Excel" />
												</form>
											</td>
											<td align="center" width="33%">
												<input type="button" name="homebtn" id="homebtn" value="Home" onClick="gotohome();" />
											</td>
										</tr>
									</table>
								';
							}
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
