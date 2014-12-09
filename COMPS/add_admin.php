<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "admin") )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Admin First!");
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
			$adminid = strip_tags($_POST['admin_id']);
			$adminname = strip_tags($_POST['admin_name']);
			$password = md5(strip_tags($_POST['password']));
			$confirmpassword = md5(strip_tags($_POST['cpassword']));
			$question = $_POST['question'];
			$answer = strip_tags($_POST['secanswer']);
			
			//Insert into Database
			require "connect.php";
			
			$checkquery1="SELECT * FROM adminlogin WHERE userid='$adminid'";
			$checkresult1=mysql_query($checkquery1) or die(mysql_error());
			$count1=mysql_num_rows($checkresult1);
			if ($count1==0)
			{
				$query = "INSERT INTO adminlogin (userid,password,sec_que,answer,name) VALUES ('$adminid','$password','$question','$answer','$adminname')";
				$result = mysql_query($query) or die(mysql_error());
				header("location: index");
			}
			else
			{
				echo '
					<script type="text/javascript">
						//document.getElementById("nofaculty").style.display="";
						alert ("* Admin Already Exist!");
						history.go(-1);
					</script>
				';
			}
		}	
	}
						
?>
<html>
	
	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/add_admin.css" />
		
		<script>
			function validate()
			{
			 
				if( document.add_admin.password.value.length < 8 )
				{
					//alert("Please Select Security Question!");
					document.getElementById("passworderror").style.display="";
					document.add_admin.password.focus() ;
					return false;
				}
				else
					document.getElementById("passworderror").style.display="none";
					
				if( document.add_admin.password.value != document.add_admin.cpassword.value )
				{
					//alert("Please Select Security Question!");
					document.getElementById("samepassworderror").style.display="";
					document.add_admin.password.focus() ;
					return false;
				}
				else
					document.getElementById("samepassworderror").style.display="none";
					
				if( document.add_admin.question.value == "default" )
				{
					//alert("Please Select Security Question!");
					document.getElementById("questionerror").style.display="";
					document.add_admin.question.focus() ;
					return false;
				}
				else
					document.getElementById("questionerror").style.display="none";
					
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
				<div id="questionerror" style="color: #FF0000; display: none">
					* Please Select Security Question!
				</div>
				<div id="noupdate" style="color: #FF0000; display: none">
					* Data Already Present!
				</div>
				
				<form name="add_admin" id="add_admin" action="#" method="POST" onsubmit="return(validate());">
					<center>
						<table id="input_tbl">
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Admin Display Name : </font>
								</td>
								<td id="input">
									<input type="text" name="admin_name" id="admin_name" maxlength="50" autofocus placeholder="Enter Admin Name" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Admin ID : </font>
								</td>
								<td id="input">
									<input type="text" name="admin_id" id="admin_id" maxlength="10" placeholder="Enter Admin UserID" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Password : </font>
								</td>
								<td id="input">
									<input type="password" name="password" id="password" placeholder="Enter the Password" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Confirm your Password : </font>
								</td>
								<td id="input">
									<input type="password" name="cpassword" id="cpassword" placeholder="Enter the Same Password as Above" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Choose Security Question : </font>
								</td>
								<td id="input">
									<select name="question" id="drpdwnlst_que" required>
										<option value="default">Select Question</option>
										<option value="What is your favourite color?">What is your favourite color?</option>
										<option value="What was your childhood nickname?">What was your childhood nickname?</option>
										<option value="What was your dream job as a child?">What was your dream job as a child?</option>
										<option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
									</select>
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Your Answer : </font>
								</td>
								<td id="input">
									<input type="text" name="secanswer" id="secanswer" placeholder="Enter the Answer of Question you selected Above" required />
								</td>
							</tr>
						</table>
						<br />	<br />
						<input type="submit" name="submit" value="Add Admin" />
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