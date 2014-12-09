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
				$("#user_show").hide();
				$("#add_remove_user").click(function(){
					$("#user_show").toggle('slow');
				});
			});
		</script>
	
	</head>
	
	
	<body>
		
		<div id="firstdiv">
			<ul>
				<li>
					<font>
						<a href="javascript:void(0);" id="add_remove_user">
							Add or Remove User
						</a>
					</font>
				</li>
			<ul>
		</div>
		<div id="user_show">
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="add_assistant">
										Add User
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
									<a href="remove_assistant">
										Remove User
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
									<a href="add_student">
										Add Student
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<?php
			if (isset($_SESSION['id']))
			{
				echo '
					<div id="alldiv">
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
			}
		?>
	
	</body>

</html>
