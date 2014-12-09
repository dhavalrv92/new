<?php
	if (!isset($_SESSION))
		session_start();
	if ( isset($_GET['id']) )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				window.location.href = "forgot_password";
			</script>
		';
	}
?>
<?php

	if (isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
		if ($submit)
		{
			$id = $_GET['id'];
			$password = md5(strip_tags($_POST['password']));
			$confirmpassword = md5(strip_tags($_POST['cpassword']));
			
			//Insert into Database
			require "connect.php";
			
			$query="UPDATE kjscomp_student.student_login SET password='" . $password . "' WHERE user_id=" . $id . "";
			$result=mysql_query($query) or die(mysql_error());
			
			echo '
				<script type="text/javascript">
					alert ("Password was changed Successfully");
					window.location.href = "student_login";
				</script>
			';
		}
	}

?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<script>
			 
			function validate()
			{
			 
				if( document.new_pass.password.value.length < 8 )
				{
					//alert("Please Select Security Question!");
					document.getElementById("passworderror").style.display="";
					//document.facsignup.password.focus() ;
					return false;
				}
				else
					document.getElementById("passworderror").style.display="none";
				if( document.new_pass.password.value != document.new_pass.cpassword.value )
				{
					//alert("Please Select Security Question!");
					document.getElementById("samepassworderror").style.display="";
					//document.facsignup.password.focus() ;
					return false;
				}
				else
					document.getElementById("samepassworderror").style.display="none";
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
				
				<div id="passworderror" style="color: #FF0000; display: none">
					* Minimum Password length should be 8!
				</div>
				
				<div id="samepassworderror" style="color: #FF0000; display: none">
					* Password do not Match!
				</div>
				<form name="new_pass" action="new_password?id=<?php echo $_GET['id']; ?>" method="POST" onsubmit="return(validate());">
					<table width="100%">
						<tr>
							<td style="border: 0px solid red" width="50%" align="center">
								<font><font style="color: #FF0000;">* </font>New Password:</font>
							</td>
							<td style="border: 0px solid red" width="50%" align="center">
								<input type="password" name="password" placeholder="Enter the Password" required /> 
							</td>
						</tr>
						<tr>
							<td style="border: 0px solid red" width="50%" align="center">
								<font><font style="color: #FF0000;">* </font>Confirm New Password:</font>
							</td>
							<td style="border: 0px solid red" width="50%" align="center">
								<input type="password" name="cpassword" placeholder="Confirm the Password" required />
							</td>
						</tr>
						<tr>
							<td style="border: 0px solid red" width="50%" align="center" colspan="2">
								<input type="submit" name="submit" value="Update Password" />
							</td>
						</tr>
					</table>
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