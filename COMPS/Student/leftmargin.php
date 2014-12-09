<?php
	if(!isset($_SESSION))
		session_start();
?>
<html>

	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Left Margin</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/rightmarginstyle.css" />
		
		<script src="../JavaScripts/jquery-1.11.0.min.js"></script>
		
		<script>
			/*$(document).ready(function(){
				$("#proctor_option").hide();
				$("#proctor_menu").click(function(){
					$("#detail_option").hide('slow');
					$("#proctor_option").toggle('slow');
				});
			});*/
			$(document).ready(function(){
				$("#detail_option").hide();
				$("#detail_menu").click(function(){
					//$("#proctor_option").hide('slow');
					$("#detail_option").toggle('slow');
				});
			});
			
			$(document).ready(function(){
				$("#academic_show").hide();
				$("#academic_menu").click(function(){
					$("#academic_show").toggle('slow');
				});
			});
		</script>
	
	</head>
	
	
	<body>
		<div id="firstdiv">
			<ul>
				<li>
					<font>
						<a href="javascript:void(0);" id="detail_menu">
							My Details
						</a>
					</font>
				</li>
			<ul>
		</div>
		<div id="detail_option">
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="student_personal">
										Personal Details
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
									<a href="student_academic">
										Academic Details
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
									<a href="javascript:void(0);" id="academic_menu">
										My Achievements
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			
			<div id="academic_show">
				<div id="alldiv">
					<ul style="list-style: none;">
						<li>
							<ul style="list-style: none;">
								<li>
									<ul>
										<li>
											<font>
												<a href="student_achievement">
													Insert Achievements
												</a>
											</font>										
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div id="alldiv">
					<ul style="list-style: none;">
						<li>
							<ul style="list-style: none;">
								<li>
									<ul>
										<li>
											<font>
												<a href="student_achievement_edit" target="_blank">
													Edit Achievements
												</a>
											</font>										
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="proctor_select_sem">
										Edit/View Attendence Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div id="alldiv">
			<ul>
				<li>
					<font>
						<a href="proctor_print" target="_blank">
							Print My Proctor Form
						</a>
					</font>
				</li>
			<ul>
		</div>
		<!--div id="alldiv">
			<ul>
				<li>
					<font>
						<a href="javascript:void(0);" id="proctor_menu">
							Proctor Details
						</a>
					</font>
				</li>
			<ul>
		</div>
		<div id="proctor_option">
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="proctor_print" target="_blank">
										Print My Proctor Form
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div-->

</body>

</html>