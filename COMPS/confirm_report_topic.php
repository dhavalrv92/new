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
	
		<title>Confirmation of Insertion of Topic Report</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
	
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
			
			<div id="middle" align="center">
			
				<?php
		
					if (!isset($_SESSION))
						session_start();
				
					include "connect.php";
					
					$required = array('faculty_name' , 'date' , 'th_time' , 'pr_time');
					
					$error=FALSE;
					
					foreach ($required as $field)
					{
						if (empty($_POST[$field]) || $_POST[$field]=='default' || $_POST[$field]=='0000-00-00')
						{
							$error=TRUE;
						}
					}
					
					if ($error)
					{
						echo '
							<script type="text/javascript">
								alert ("One of the Following Fields are not Selected:\n + Faculty Name\n + Date");
								window.history.back()
							</script>
						';
					}
					else
					{
						/*echo $faculty_name=$_POST['faculty_name'] . '<br />';
						echo $date=$_POST['date'] . '<br />';
						echo $day= date("l",strtotime($date)) . '<br />';
						echo $topic_th=$_POST['topic_th'] . '<br />';
					 	echo $sub_th=$_POST['subject_th'] . '<br />';
					 	echo $topic_pr=$_POST['topic_pr'] . '<br />';
						echo $sub_pr=$_POST['subject_pr'] . '<br />';
					 	echo $batch=$_POST['batch'] . '<br />';
					 	echo $remark=$_POST['remark'] . '<br />';*/
						
						$faculty_name=$_POST['faculty_name'];
						$date=$_POST['date'];
						$day= date("l",strtotime($date));
						$sub_th=$_POST['subject_th'];
						$topic_th=$_POST['topic_th'];
						$th_time=$_POST['th_time'];
						$sub_pr=$_POST['subject_pr'];
					 	$topic_pr=$_POST['topic_pr'];
					 	$batch=$_POST['batch'];
					 	$pr_time=$_POST['pr_time'];
					 	$remark=$_POST['remark'];
						
						$query="INSERT INTO topicreport (fac_name,date,day,sub_th,topic_th,lec_time,sub_pr,topic_pr,batch,pr_time,remark) VALUES ('$faculty_name','$date','$day','$sub_th','$topic_th','$th_time','$sub_pr','$topic_pr','$batch','$pr_time','$remark')";
					
						if(mysql_query($query))
						{
							echo 'Data Inserted';
							header ("Location: create_report_topic");
						}   
						else
						{
							echo 'Error In SQL' . mysql_error();
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
