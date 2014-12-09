<html>

	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Left Margin</title>
		
		<!--link rel="stylesheet" type="text/css" href="CSS Files/leftmarginstyle1.css" /-->
		
		<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
		<script src="JavaScripts/jquery-1.11.0.min.js"></script>
		
		<script>
			$(document).ready(function(){
				$("#weekly_report_show").hide();
				$("#weekly_report_menu").click(function(){
					$("#weekly_report_show").toggle('slow');
				});
			});
		</script>
	
	</head>
	
	
	<body>
	
		<div id="firstdiv">
		
			<ul>
				<li>
					<font>
						<a href="index">
							About
						</a>
					</font>
				</li>
			</ul>
		
		</div>
		
		<div id="alldiv">
		
			<ul>
				<li>
					<font>
						Head of the Department
					</font>
				</li>
			</ul>
		
		</div>
		
		<div id="alldiv">
		
			<ul>
				<li>
					<font>
						<a href="faculty_list">
							Faculty Details
						</a>
					</font>
				</li>
			</ul>
		
		</div>
		
		<div id="alldiv">
		
			<ul>
				<li>
					<font>
						Faculty Achievements
					</font>
				</li>
			</ul>
		
		</div>
		
		<div id="alldiv">
		
			<ul>
				<li>
					<font>
						<a href="placement_home">
							Placement Details
						</a>
					</font>
				</li>
			</ul>
		
		</div>
		
		<div id="alldiv">
		
			<ul>
				<li>
					<font>
						Infrastructure
					</font>
				</li>
			</ul>
		
		</div>
		
		<?php
		
			if (!isset($_SESSION))
				session_start();
			
			if (isset($_SESSION['role']))
			{
				$option=$_SESSION['role'];
			}

			if (isset($_SESSION['role']) && isset($_SESSION['sid']))
			{
				if ($option == "faculty")
				{
					echo '
						<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="javascript:void(0);" id ="weekly_report_menu">
											Weekly Report
										</a>
									</font>
								</li>
							</ul>
						</div>
						<div id="weekly_report_show">
							<div id="alldiv">
								<ul style="list-style: none;">
									<li>
										<ul>
											<li>
												<font>
													<a href="create_report_topic">
														Create Weekly Report
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
													<a href="select_report_topic">
														Retrieve Weekly Report
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
		
		<?php
		
			if (!isset($_SESSION))
				session_start();
			
			if (isset($_SESSION['role']))
			{
				$option=$_SESSION['role'];
			}

			if (isset($_SESSION['role']) && isset($_SESSION['sid']))
			{
				if ($option == "admin")
				{
					echo '<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="select_report_topic">
											Retrieve Weekly Report
										</a>
									</font>
								</li>
							</ul>
						</div>';
				}
			}
			
		?>
		
		<?php
		
			if (!isset($_SESSION))
				session_start();
			
			if (isset($_SESSION['role']))
			{
				$option=$_SESSION['role'];
			}

			if (isset($_SESSION['role']) && isset($_SESSION['sid']))
			{
				if ($option == "admin")
				{
					echo '<div id="alldiv">
							<ul>
								<li>
									<font>
										<a href="select_format">
											Result Retrieve
										</a>
									</font>
								</li>
							</ul>
						</div>';
				}
			}
			
		?>

		<?php
		
			if (!isset($_SESSION))
				session_start();
			
			if (isset($_SESSION['role']))
			{
				$option=$_SESSION['role'];
			}

			if (isset($_SESSION['role']) && isset($_SESSION['sid']))
			{
				if ($option == "admin" || $option == "faculty")
				{
					echo '<div id="alldiv">
			
							<ul>
								<li>
									<font>
										<a href="topRank">
											Top Rankers
										</a>
									</font>
								</li>
							</ul>
			
						</div>';
				}
			}
			
		?>
		
		<?php
		
			if (!isset($_SESSION))
				session_start();
			
			if (isset($_SESSION['role']))
			{
				$option=$_SESSION['role'];
			}

			if (isset($_SESSION['role']) && isset($_SESSION['sid']))
			{
				if ($option == "admin")
				{
					echo '<div id="alldiv">
			
							<ul>
								<li>
									<font>
										<a href="select_alumnioption">
											Alumni Details
										</a>
									</font>
								</li>
							</ul>
			
						</div>';
				}
			}
			
		?>
		
		<br />
		
		<br />
	
	</body>

</html>