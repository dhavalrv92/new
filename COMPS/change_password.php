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
<?php
	if (isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
		if ($submit)
		{
			$currpassword = md5 ( strip_tags($_POST['currpassword']));
			$password = md5 ( strip_tags($_POST['password']));
			
			require "connect.php";
			
			if (!isset($_SESSION))
				session_start();
			$option = $_SESSION['role'];
			$id = $_SESSION['sid'];
			if ($option == "admin")
			{
				$query = "SELECT * FROM adminlogin WHERE userid='$id'";
				$result = mysql_query($query) or die (mysql_error());
				$row = mysql_fetch_array($result) or die (mysql_error());
				if ( $currpassword != $row['password'] )
				{
					echo '
						<script type="text/javascript">
							/*document.getElementById("noupdate").style.display="";
							document.change_pass.currpassword.focus();*/
							alert ("* Current Password do not Match with Stored Password!");
							history.go(-1);
						</script>
					';
				}
				else
				{
					$query = "UPDATE adminlogin SET password='$password' WHERE userid='$id'";
					$result = mysql_query($query) or die (mysql_error());
					echo '
						<script type="text/javascript">
							alert ("* Password Changed Successfully!");
							window.location.href = "signout";
						</script>
					';
				}
			}
			else if ($option == "faculty")
			{
				$query = "SELECT * FROM facultylogin WHERE userid='$id'";
				$result = mysql_query($query) or die (mysql_error());
				$row = mysql_fetch_array($result) or die (mysql_error());
				if ( $currpassword != $row['password'] )
				{
					echo '
						<script type="text/javascript">
							/*document.getElementById("noupdate").style.display="";
							document.change_pass.currpassword.focus();*/
							alert ("* Current Password do not Match with Stored Password!");
							history.go(-1);
						</script>
					';
				}
				else
				{
					$query = "UPDATE facultylogin SET password='$password' WHERE userid='$id'";
					$result = mysql_query($query) or die (mysql_error());
					echo '
						<script type="text/javascript">
							alert ("* Password Changed Successfully!");
							window.location.href = "signout";
						</script>
					';
					//header("Location: signout");
				}
			}
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/change_password.css" />
		
		<script>
			function validate()
			{
			 
				if( document.change_pass.currpassword.value.length < 8 )
				{
					//alert("Please Select Security Question!");
					document.getElementById("passworderror").style.display="";
					document.change_pass.currpassword.focus() ;
					return false;
				}
				else
					document.getElementById("passworderror").style.display="none";
				
				if( document.change_pass.password.value.length < 8 )
				{
					//alert("Please Select Security Question!");
					document.getElementById("passworderror").style.display="";
					document.change_pass.password.focus() ;
					return false;
				}
				else
					document.getElementById("passworderror").style.display="none";
					
				if( document.change_pass.password.value != document.change_pass.cpassword.value )
				{
					//alert("Please Select Security Question!");
					document.getElementById("samepassworderror").style.display="";
					document.change_pass.password.focus() ;
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
		<?php
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
				
				<form name="change_pass" id="change_pass" action="change_password" method="POST" onsubmit="return(validate());">
					<center>
						<table id="input_tbl">
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Current Password:</font>
								</td>
								<td id="input">
									<input type="password" name="currpassword" id="currpassword" placeholder="Enter the Current Password" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> New Password:</font>
								</td>
								<td id="input">
									<input type="password" name="password" id="password" placeholder="Enter the Password" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Confirm New Password:</font>
								</td>
								<td id="input">
									<input type="password" name="cpassword" id="cpassword" placeholder="Enter the Same Password as Above" required />
								</td>
							</tr>
						</table>
						<br />	<br />
						<input type="submit" name="submit" value="Update Password" />
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