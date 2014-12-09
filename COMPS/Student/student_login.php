<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['id']))
		header ("location: index");
?>
<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_POST['login']))
	{
		$submit = $_POST['login'];
		if ($submit)
		{
			$user_id = $_POST['user_id'];
			$password = md5(strip_tags($_POST['password']));
			
			require "connect.php";
			
			$query = "SELECT * FROM student_login WHERE user_id='$user_id' AND password='$password'";
			$result = mysql_query($query) or die (mysql_error());
			$row = mysql_fetch_assoc($result);
			if ( ($user_id == $row['user_id']) && ($password == $row['password']) )
			{
				$_SESSION['student'] = $row['name'];
				$_SESSION['id'] = $row['user_id'];
				header ("location: index");
			}
			else
			{
				echo '
					<script type=text/javascript>
						alert ("* Invalid UserID or Password!");
					</script>
				';
			}
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<style type="text/css">
			/*body {
				width: 100%;
				Height: 100%;
				background-image: url('../Images/Stock_Background.png');
				/*background-repeat: no-repeat;
				background-attachment:fixed;
				background-position:center;*/
			/*}
			.main_body {
				/*width: 200px;
				position: absolute;
				background-image: url('../Images/Stock_Background.png');*/
				/*background-color: #787878;
				border: 0px solid red;
				display: inline-block;
			}*/
			td, th {
				min-width: 365px;
				max-width: 365px;
			}
		</style>
		
		<script type="text/javascript">
			function isNumber(evt)
			{
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57))
				{
					return false;
				}
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
					<form method="POST" action="student_login">
						<table>
							<tr>
								<th>
									<font style="color: #000000;">User ID : </font>
								</th>
								<td>
									<input type="text" name="user_id" placeholder="Enter the User ID" maxlength="10" onkeypress="return isNumber(event)" required />
								</td>
							</tr>
							<tr>
								<td>
									<br />
								</td>
							</tr>
							<tr>
								<th>
									<font style="color: #000000;">Password : </font>
								</th>
								<td>
									<input type="password" name="password" placeholder="Enter the Password" required />
								</td>
							</tr>
							<tr>
								<td>
									<br />
								</td>
							</tr>
							
							<tr>
								<td colspan="2" align="center">
									<input type="submit" name="login" value="Login" />
								</td>
							</tr>
							<tr>
								<td>
									<br />
								</td>
							</tr>
							<tr>
								<td width="50%" align="center">
									<a href="signup" style="color: #0000FF">Sign Up</a>
								</td>
								<td width="50%" align="center">
									<a href="forgot_password" style="color: #0000FF">Forgot Password</a>
								</td>
							</tr>
						</table>
					</form>
				</center>
			</div>
			
			<div id="rightmargin">
				<?php include "rightmargin.php"; ?>
			</div>
		
		</div>
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>