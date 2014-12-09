<?php
	if (!isset($_SESSION))
		session_start();
	if ( isset($_SESSION['sid']) )
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
	
		<title>Select Topicwise Report</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
		<script>
			function validate()
			{
				if (document.select_report.faculty_name.value == "default")
				{
					document.getElementById("fac_name_error").style.display="";
					document.select_report.faculty_name.focus();
					return false;
				}
				else
					document.getElementById("fac_name_error").style.display="none";
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
			
				<div name="fac_name_error" style="display: none;color: #FF0000;">
					* Please Select Faculty Name.
				</div>
			
				<form onSubmit="return(validate());" name="select_report" action="see_report_topic" method="POST">
					<center>
						<table id="input_tbl">
							<tr id="input">
								<td width="30%">
									<font id="header4"><font id="required">* </font>Faculty Name : </font>
								</td>
								<td width="70%">
									
									<?php
										if (!isset($_SESSION))
										session_start();
									
										if ( (isset($_SESSION['role'])) && (isset($_SESSION['sid'])) )
										{
											include "connect.php";
											$opt=$_SESSION['role'];
											if ($opt=="admin")
											{
												$query = mysql_query("SELECT fac_name FROM rfid_info"); // Run your query
												echo '<select name="faculty_name" id="drpdwnlst_facname" required>'; // Open your drop down box
													echo '<option name="defaultname" width="100%" value="default">Select Faculty Name</option>';
												// Loop through the query results, outputing the options one by one
												while ($row = mysql_fetch_array($query))
												{
													echo '<option name="' . $row['fac_name'] . '" value="' . $row['fac_name'] . '">' . $row['fac_name'] . '</option>';
												}
												echo '</select>';// Close your drop down box
											}
											elseif ($opt=="faculty")
											{
												$id=$_SESSION['sid'];
												$query = mysql_query("SELECT fac_name FROM rfid_info WHERE id='" . $id ."'");
											
												while ($row = mysql_fetch_array($query))
												{
													echo '<input type="text" name="faculty_name" id="faculty_name" value="' . $row['fac_name'] . '" readonly="readonly" />';
												}
											}
										}
									?>
								</td>
							</tr>
							<tr id="input">
								<td width="30%">
									<font id="header4"><font id="required">* </font>Date:</font>
								</td>
								<td width="70%">
									<table width="100%">
										<tr width="100%">
											<td width="50%">
												<!--div id="datenamediv">From</div-->
												<?php
													/*$dateFrom_default = date('2000-01-01');
													require('calendar/tc_calendar.php');
													
													$myCalendar = new tc_calendar("dateFrom", true, false);
													$myCalendar->setIcon("calendar/images/iconCalendar.gif");
													$myCalendar->setPath("calendar/");
													$myCalendar->setYearInterval(2000, date('Y'));
													$myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
													$myCalendar->setAlignment('left', 'bottom');
													//$myCalendar->setDate(date('2000-01-01'));//setDate(date('d', strtotime($dateFrom_default)), date('m', strtotime($dateFrom_default)), date('Y', strtotime($dateFrom_default)));
													//$myCalendar->autoSubmit(true, "form1");
													$myCalendar->writeScript();
													//$myCalendar->autoSubmit(true, "", "TEST");*/
													$date = date('Y-m-d');
													$tomorrow = date('Y-m-d',strtotime($date . "+1 days"));
												?>
														<input placeholder="From" name="dateFrom" type="text" onfocus="(this.type='date')" min="2000-01-01" min="<?php echo $date; ?>" required />
											</td>
											<td width="50%">
												<!--div id="datenamediv">To</div-->
												<?php
													
													/*$dateTo_default = date('Y-m-d');
												
													//require('calendar/tc_calendar.php');
													
													$myCalendar = new tc_calendar("dateTo", true, false);
													$myCalendar->setIcon("calendar/images/iconCalendar.gif");
													$myCalendar->setPath("calendar/");
													$myCalendar->setYearInterval(2000, date('Y'));
													$myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
													$myCalendar->setAlignment('left', 'bottom');
													//$myCalendar->setDate(date('Y-m-d'));//setDate(date('d', strtotime($dateTo_default)), date('m', strtotime($dateTo_default)), date('Y', strtotime($dateTo_default)));
													//$myCalendar->autoSubmit(true, "form1");
													$myCalendar->writeScript();
													//$myCalendar->autoSubmit(true, "", "TEST");*/
													$date = date('Y-m-d');
													$tomorrow = date('Y-m-d',strtotime($date . "+1 days"));
												?>
													<input placeholder="To" name="dateTo" type="text" onfocus="(this.type='date')" min="2000-01-01" min="<?php echo $date; ?>" required />
											</td>
										</tr>
									</table>
								</td>
							</tr>
							
						</table>
						
						<br />	<br />
						
						<input type="submit" value="Display" id="submitbtn"/>
						
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
