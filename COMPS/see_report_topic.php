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
				alert ("* Please Login First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>

	<head>
	
		<title>Topicwise Report</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/display_report_topic_style.css" />
		
		<style type="text/css">
		
			#reporttbl {
				border: 1px solid black;
				text-align: center;
				width: 100%;
			}
			
			#reporttblth {
				border: 1px solid black;
				background-color: #FFFF00;
			}
			
			#reporttbltr {
				border: 1px solid black;
				width: 100%;
			}
			
			#reporttbltd {
				border: 1px solid black;
			}
		
		</style>
		
		<script type = "text/javascript">						

			/*$("button").click(function ()
			{
				var str="";
				$("tr").each(function()
				{
					$(this).find("td").each(function()
					{
						str=str+$(this).html()+"\t";
					});
					str=str+"\n";
				});
				alert(str);
				window.open("data:application/vnd.ms-excel," + encodeURIComponent(str));
			});*/
		function gotohome() 
		{
    		window.location.href = "index";
		}
		
	</script>
	
	</head>
	
	<body>
	
		<?php include "header.php"; ?>
		
		<br />
		
		<div>
		
			<div id="middle">
			
				<?php
				
					if (!isset($_SESSION))
						session_start();

					include "connect.php";

					if ( ((isset($_POST['faculty_name'])) && ($_POST['faculty_name']=='default')) || ((isset($_POST['dateFrom'])) && ($_POST['dateFrom']=='0000-00-00')) || ((isset($_POST['dateTo'])) && ($_POST['dateTo']=='0000-00-00')) )
					{
						if ( (isset($_POST['faculty_name'])) && ($_POST['faculty_name']=='default') )
						{
							if ( (isset($_POST['dateFrom'])) && ($_POST['dateFrom']=='0000-00-00') )
							{
								if ( (isset($_POST['dateTo'])) && ($_POST['dateTo']=='0000-00-00') )
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + Faculty Name \n + Start Date \n + End Date");
												history.go(-1);
											</script>';
								}
								else
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + Faculty Name \n + Start Date");
												history.go(-1);
											</script>';
								}
							}
							else
							{
								if ( (isset($_POST['dateTo'])) && ($_POST['dateTo']=='0000-00-00') )
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + Faculty Name \n + End Date");
												history.go(-1);
											</script>';
								}
								else
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + Faculty Name");
												history.go(-1);
											</script>';
								}	
							}
								
						}
						else
						{
							if ( (isset($_POST['dateFrom'])) && ($_POST['dateFrom']=='0000-00-00') )
							{
								if ( (isset($_POST['dateTo'])) && ($_POST['dateTo']=='0000-00-00') )
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + Start Date \n + End Date");
												history.go(-1);
											</script>';
								}
								else
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + Start Date");
												history.go(-1);
											</script>';
								}
							}
							else
							{
								if ( (isset($_POST['dateTo'])) && ($_POST['dateTo']=='0000-00-00') )
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Select the following Information:\n + End Date");
												history.go(-1);
											</script>';
								}
								/*else
								{
									echo $faculty_name=$_POST['faculty_name'];
									echo $dateFrom=$_POST['dateFrom'];
									echo $dateTo=$_POST['dateTo'];
								}*/	
							}
						}
					}
					
					else
					{
						/*echo $faculty_name=$_POST['faculty_name'];
						echo '<br />';
						echo $dateFrom=$_POST['dateFrom'];
						echo '<br />';
						echo $dateTo=$_POST['dateTo'];
						echo '<br />';*/
						$faculty_name=$_POST['faculty_name'];
						$dateFrom=$_POST['dateFrom'];
						$dateTo=$_POST['dateTo'];
						
						//SELECT * FROM topicreport WHERE fac_name='F100' AND (date BETWEEN '2013-12-01' AND '2013-12-28')
						//SELECT * FROM topicreport WHERE fac_name='F100' AND date IN (SELECT date FROM topicreport WHERE date BETWEEN '2013-12-01' AND '2013-12-05')
						//echo $query="SELECT * FROM topicreport WHERE fac_name='F100' AND (date BETWEEN '2013-12-01' AND '2013-12-31')";
						$query="SELECT fac_name,date,day,sub_th,topic_th,lec_time,sub_pr,topic_pr,batch,pr_time,remark FROM topicreport WHERE fac_name='$faculty_name' AND (date BETWEEN '$dateFrom' AND '$dateTo') ORDER BY date";
						$result=mysql_query($query);//or die(mysql_error());
						echo mysql_error();
						
						//$_SESSION['equery']=$faculty_name;					
						
						$count=mysql_num_rows($result);
						//echo '<br />No. of Records Extracted is:	' . $count . '<br />';
						
						if ($count==0)
						{
							echo '
							<script type="text/javascript">
										
								alert("No Records Found");
								//history.go(-1);
								history.back();
							
							</script>';
						}
						else
						{
							echo '
							<div id="reportdiv">
								<table id="reporttbl" cellpadding="4" cellspacing="2">
								
									<tr id="reporttbltr">
									
										<th id="reporttblth">Faculty Name</th>
										<th id="reporttblth">Date</th>
										<th id="reporttblth">Day</th>
										<th id="reporttblth">Subject (Theory)</th>										
										<th id="reporttblth">Topic (Theory)</th>
										<th id="reporttblth">Lecture Time</th>
										<th id="reporttblth">Subject (Practical)</th>										
										<th id="reporttblth">Topic (Practical)</th>
										<th id="reporttblth">Batch</th>
										<th id="reporttblth">Practical Time</th>
										<th id="reporttblth">Remark</th>
									
									</tr>';
									
									while($row = mysql_fetch_array($result))
									{
										echo '<tr id="reporttbltr">';
											echo '<td id="reporttbltd">' . $row['fac_name'] . '</td>';
											echo '<td id="reporttbltd">' . $row['date'] . '</td>';
											echo '<td id="reporttbltd">' . $row['day'] . '</td>';
											echo '<td id="reporttbltd">' . $row['sub_th'] . '</td>';
											echo '<td id="reporttbltd">' . $row['topic_th'] . '</td>';
											echo '<td id="reporttbltd">' . $row['lec_time'] . '</td>';
											echo '<td id="reporttbltd">' . $row['sub_pr'] . '</td>';
											echo '<td id="reporttbltd">' . $row['topic_pr'] . '</td>';
											echo '<td id="reporttbltd">' . $row['batch'] . '</td>';
											echo '<td id="reporttbltd">' . $row['pr_time'] . '</td>';
											echo '<td id="reporttbltd">' . $row['remark'] . '</td>';
										echo '</tr>';
									}
									
								echo '</table>';
								
								echo '<br />	<br />';
		
								if (!isset($_SESSION))
									session_start();
		
								if (isset($_SESSION['role']) && isset($_SESSION['sid']))
								{
									$option=$_SESSION['role'];
									
									if ($option == "faculty")
									{
										echo '
											<table width="100%">
												<tr width="100%">
													<td align="center" width="25%">
														<input type="button" name="backbtn" id="backbtn" value="<< Go Back" onClick="history.go(-1)" />
													</td>
													<td align="center" width="25%">
														<form action="exportcsv" method="POST">
															<input type="hidden" name="query" value="' . $query . '">
															<input type="submit" name="exportbtn" id="exportbtn" value="Export to Excel" />
														</form>
													</td>
													<td align="center" width="25%">
														<input type="button" name="homebtn" id="homebtn" value="Home" onClick="gotohome();" />
													</td>
													<td align="center" width="25%">
														<form action="edit_report" method="POST">
															<input type="hidden" name="dateFrom" value="' . $dateFrom . '">
															<input type="hidden" name="dateTo" value="' . $dateTo . '">
															<input type="submit" name="editbtn" id="editbtn" value="Edit" />
														</form>
													</td>
												</tr>
											</table>
										';
									}
									else
									{
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
							echo '</div>';								
						}
					}
				
				?>
			
			</div>
			
		</div>
		
		<br />
		
		<br />
		
		<?php
			include "footer.html";
		?>
	
	</body>

</html>
