<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "faculty") )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Faculty First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
		<script type="text/javascript">

			function SelDay()
			{
				//alert(this.formdisp.date.value);
				var date = this.formdisp.date.value;
				//alert (date);
				var gsDayNames = new Array(
					'Sunday',
					'Monday',
					'Tuesday',
					'Wednesday',
					'Thursday',
					'Friday',
					'Saturday'
				);

				var dat = new Date(date);
				var day = gsDayNames[dat.getDay()];
				//alert (day);
				
				document.getElementById('daytxtbox').value = day;
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
				
				<div> <!--style= "border: 1px solid red"-->
					<h5 id="required">
						* Please Fill all the Fields.
						<br />
						* Write NA wherever Details Not Applicable
					</h5>
					<div id="datemsg"></div>
				</div>
			
				<form action="confirm_report_topic" method="POST" id="formdisp">
				<!--form method="POST" id="formdisp"-->
				
					<table id="input_tbl">
				
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Faculty Name:</font>
								
							</td>
							
							<td id="input">
							
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
		
												echo '<option name="defaultname" value="default">Select Faculty Name</option>';
											
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
						
						<!--tr id="input">
							
							<td id="input">
								
								<font id="header4">Year:</font>
								
							</td>
							
							<td id="input">
							
								<select name="classyear" id="drpdwnlst_yr">
								
									<option name="defaultyr" value="default">Select Year</option>
									
									<option name="SE" value="SE">Second Year (S.E.)</option>
									
									<option name="TE" value="TE">Third Year (T.E.)</option>
									
									<option name="BE" value="BE">Final Year (B.E.)</option>
									
								</select>
							
							</td>
							
						</tr-->
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Date:</font>
								
							</td>
							
							<td id="input">
							
								<!--select name="date" id="drpdwnlst_date">
								
									<option name="defaultdate" value="default">Select Date</option>
								
									<?php
									
										for($i=1;$i<=31;$i++):
									
											echo '<option name="' . $i . '" value="' . $i . '">' .$i . '</option>';
										 
										endfor
										
									?>
									
								</select>
								
								<select name="month" id="drpdwnlst_month">
								
									<option name="defaultmonth" value="default">Select Month</option>
									
									<option name="jan" value="1">January</option>
									
									<option name="feb" value="2">February</option>
									
									<option name="march" value="3">March</option>
									
									<option name="april" value="4">April</option>
									
									<option name="may" value="5">May</option>
									
									<option name="june" value="6">June</option>
									
									<option name="july" value="7">July</option>
									
									<option name="aug" value="8">August</option>
									
									<option name="sep" value="9">September</option>
									
									<option name="oct" value="10">October</option>
									
									<option name="nov" value="11">November</option>
									
									<option name="dec" value="12">December</option>
									
								</select>
							
								<select name="year" id="drpdwnlst_year">
								
									<option name="defaultyear" value="default">Select Year</option>
									
									<?php
									
										for($i=2001;$i<=2030;$i++):
									
											echo '<option name="' . $i . '" value="' . $i . '">' .$i . '</option>';
										 
										endfor
										
									?>
									
								</select-->
								
								<!--form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="frm_date"-->
								
								<?php
									
									/*require('calendar/tc_calendar.php');
									
									$myCalendar = new tc_calendar("date", true, false);
									$myCalendar->setIcon("calendar/images/iconCalendar.gif");
									$myCalendar->setPath("calendar/");
									$myCalendar->setYearInterval(2000, date('Y'));
									$myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
									$myCalendar->setAlignment('left', 'bottom');
									//$myCalendar->autoSubmit(true, "form1");
									$myCalendar->writeScript();
									//$myCalendar->autoSubmit(true, "", "TEST");*/
									$date = date('Y-m-d');
									$tomorrow = date('Y-m-d',strtotime($date . "+1 days"));
									echo'
										<input type="date" name="date" min="2000-01-01" max="' . $date . '" required />
									';

								?>								
							
							</td>
							
						</tr>
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Day:</font>
								
							</td>
							
							<td id="input">
							
								<!--select name="day" id="drpdwnlst_day">
								
									<option name="defaultday" value="default">Select Day</option>
									
									<option name="mon" value="Monday">Monday</option>
									
									<option name="tue" value="Tuesday">Tuesday</option>
									
									<option name="wed" value="Wednesday">Wednesday</option>
									
									<option name="thu" value="Thursday">Thursday</option>
									
									<option name="fri" value="Friday">Friday</option>
									
									<option name="sat" value="Saturday">Saturday</option>
									
								</select-->
								
								<input type="text" name="daytxtbox" id="daytxtbox" readonly="readonly" value="" />
								
								<input type="button" name="datebtn" id="datebtn" value="Check Day" onClick="SelDay();" />
							
							</td>
							
						</tr>
						
						<!--tr id="input">
							
							<td id="input">
								
								<font id="header4">Lecture Type:</font>
								
							</td>
							
							<td id="input">
							
								<select name="lectype" id="drpdwnlst_lec">
								
									<option name="defaultday" value="default">Select Lecture Type</option>
									
									<option name="lec" value="Lecture">Lecture</option>
									
									<option name="pra" value="Practical">Practical</option>
									
									<option name="tut" value="Tutorial">Tutorial</option>
									
								</select>
							
							</td>
							
						</tr-->
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Subject (Theory):</font>
								
							</td>
							
							<td id="input">
							
								<input type="text" name="subject_th" id="txtbox" placeholder="Enter Subject Name OR Put NA." onclick="select()" value="NA" required />
							
							</td>
							
						</tr>
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Topics Covered (Theory):</font>
								
							</td>
							
							<td id="input">
							
								<textarea rows="10" cols="10" style="resize:none" name="topic_th" id="txtarea" placeholder="Enter Topics Covered in Theory Lecture OR Put NA." onclick="select()" required>NA</textarea>
							
							</td>
							
						</tr>
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Lecture Time:</font>
								
							</td>
							
							<td id="input">
							
								<select name="th_time" id="drpdwnlst_thtime">
								
									<option name="defaulttime" value="NA">NA</option>
									
									<option name="1" value="08:45 to 09:45 hrs.">08:45 to 09:45 hrs.</option>
									
									<option name="2" value="09:45 to 10:45 hrs.">09:45 to 10:45 hrs.</option>
									
									<option name="3" value="11:00 to 12:00 hrs.">11:00 to 12:00 hrs.</option>
									
									<option name="4" value="12:00 to 13:00 hrs.">12:00 to 13:00 hrs.</option>
									
									<option name="5" value="13:30 to 14:30 hrs.">13:30 to 14:30 hrs.</option>
									
									<option name="6" value="14:30 to 15:30 hrs.">14:30 to 15:30 hrs.</option>
									
									<option name="7" value="15:30 to 16:30 hrs.">15:30 to 16:30 hrs.</option>
									
									<option name="8" value="16:30 to 17:30 hrs.">16:30 to 17:30 hrs.</option>
									
								</select>
							
							</td>
							
						</tr>					
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Subject (Practical):</font>
								
							</td>
							
							<td id="input">
							
								<input type="text" name="subject_pr" id="txtbox" placeholder="Enter Subject Name OR Put NA." onclick="select()" value="NA" required />
							
							</td>
							
						</tr>
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Topics Covered (Practical):</font>
								
							</td>
							
							<td id="input">
							
								<textarea rows="4" cols="10" style="resize:none" name="topic_pr" id="txtarea" placeholder="Enter Topics Covered in Practical OR Put NA." onclick="select()" required>NA</textarea>
							
							</td>
							
						</tr>
						
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Batch:</font>
								
							</td>
							
							<td id="input">
							
								<input type="text" name="batch" id="txtbox" placeholder="Enter Batch Name OR Put NA." onclick="select()" value="NA" required />
							
							</td>
							
						</tr>
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4"><font id="required">* </font>Practical Time:</font>
								
							</td>
							
							<td id="input">
							
								<select name="pr_time" id="drpdwnlst_prtime">
								
									<option name="defaulttime" value="NA">NA</option>
									
									<option name="1" value="08:45 to 10:45 hrs.">08:45 to 10:45 hrs.</option>
									
									<option name="2" value="11:00 to 13:00 hrs.">11:00 to 13:00 hrs.</option>
									
									<option name="3" value="13:30 to 15:30 hrs.">13:30 to 15:30 hrs.</option>
									
									<option name="4" value="14:30 to 16:30 hrs.">14:30 to 16:30 hrs.</option>
									
									<option name="5" value="15:30 to 17:30 hrs.">15:30 to 17:30 hrs.</option>
									
								</select>
							
							</td>
							
						</tr>
						
						<tr id="input">
							
							<td id="input">
								
								<font id="header4">Remark:</font>
								
							</td>
							
							<td id="input">
							
								<textarea rows="4" cols="10" style="resize:none" name="remark" id="txtarea" placeholder="Enter Your Remarks." onclick="select()">NA</textarea>
							
							</td>
							
						</tr>
						
					</table>
					
					<br />	<br />
					
					<center>
					
						<input type="submit" value="Insert" id="submitbtn" />
					
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