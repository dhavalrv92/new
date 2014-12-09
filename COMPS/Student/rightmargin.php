<?php
	if(!isset($_SESSION))
		session_start();
?>
<html>

	<head>
	
		<meta charset="utf-8">
		
		<title>Right Margin</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/rightmarginstyle.css" />
		
		<script src="../JavaScripts/jquery-1.11.0.min.js"></script>
		
		<script>
			$(document).ready(function(){
				$("#alumni_option").hide();
				$("#alumni_menu").click(function(){
					$("#alumni_option").toggle('slow');
				});
			});
		</script>
	
	</head>
	
	
	<body>
		
		<?php
		
			if (isset($_SESSION['id']))
			{
				require_once "connect.php";
				mysql_select_db("kjscomp_student") or die(mysql_error());
				$id = $_SESSION['id'];
				$query = "SELECT * FROM student_personal WHERE reg_no='$id'";
				$result = mysql_query($query) or die (mysql_error());
				$row = mysql_fetch_assoc($result);
				echo '
					<div id="firstdiv">
						<ul>
							<li>
								<font>
									<a href="change_password">
										Change Password
									</a>
								</font>
							</li>
						<ul>
					</div>
				';
				if (date("Y") >= $row['completion_year'])
				{
					/*echo'
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="fill_alumni_data">
											Alumni Details
										</a>
									</font>
								</li>
							<ul>
						</div>
					';*/
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id="alumni_menu">
											Alumni Details
										</a>
									</font>
								</li>
							<ul>
						</div>
						<div id="alumni_option">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="fill_alumni_data">
														Edit Alumni Details
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="../alumni_print?id=' . $id . '" target="_blank">
														Print My Form
													</a>
												</font>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					';
				}
			}
		?>
	
	</body>

</html>