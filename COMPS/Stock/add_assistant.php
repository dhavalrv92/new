<?php
	if (!isset($_SESSION))
		session_start();
	
	if ( isset($_SESSION['assistant']) )
	{
		
	}
	else
	{
		header ("location: assistant_login");
	}
?>
<?php
	if (isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
		if ($submit)
		{
			$assistant_id = strip_tags($_POST['assistant_id']);
			$assistant_name = strip_tags($_POST['assistant_name']);
			$password = md5(strip_tags($_POST['password']));
			$confirmpassword = md5(strip_tags($_POST['cpassword']));
			$question = $_POST['question'];
			$answer = strip_tags($_POST['secanswer']);
			
			//Insert into Database
			require "connect.php";
			
			$checkquery1="SELECT * FROM kjscomp_stock.assistant_login WHERE user_id='$assistant_id'";
			$checkresult1=mysql_query($checkquery1) or die(mysql_error());
			$count1=mysql_num_rows($checkresult1);
			if ($count1==0)
			{
				$query = "INSERT INTO kjscomp_stock.assistant_login (user_id,password,sec_que,answer,name) VALUES ('$assistant_id','$password','$question','$answer','$assistant_name')";
				$result = mysql_query($query) or die(mysql_error());
				header("location: index");
			}
			else
			{
				echo '
					<script type="text/javascript">
						//document.getElementById("nofaculty").style.display="";
						alert ("* Assistant Already Exist!");
						history.go(-1);
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
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/add_admin.css" />
		
		<script type="text/javascript">
			function validate()
			{
			 
				if( document.add_assistant.password.value.length < 8 )
				{
					//alert("Please Select Security Question!");
					document.getElementById("passworderror").style.display="";
					document.add_assistant.password.focus() ;
					return false;
				}
				else
					document.getElementById("passworderror").style.display="none";
					
				if( document.add_assistant.password.value != document.add_assistant.cpassword.value )
				{
					//alert("Please Select Security Question!");
					document.getElementById("samepassworderror").style.display="";
					document.add_assistant.password.focus() ;
					return false;
				}
				else
					document.getElementById("samepassworderror").style.display="none";
					
				if( document.add_assistant.question.value == "default" )
				{
					//alert("Please Select Security Question!");
					document.getElementById("questionerror").style.display="";
					document.add_assistant.question.focus() ;
					return false;
				}
				else
					document.getElementById("questionerror").style.display="none";
					
				return true;
			}
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
				
				<form name="add_assistant" id="add_assistant" action="#" method="POST" onsubmit="return(validate());">
					<center>
						<table id="input_tbl">
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Display Name : </font>
								</td>
								<td id="input">
									<input type="text" name="assistant_name" id="assistant_name" maxlength="50" autofocus placeholder="Enter Assistant Name" required />
								</td>
							</tr>
							<tr id="input_tbl">
								<td id="input">
									<font id="header4"><font id="error">*</font> Assistant ID : </font>
								</td>
								<td id="input">
									<input type="text" name="assistant_id" id="assistant_id" maxlength="10" placeholder="Enter Assistant UserID" onkeypress="return isNumber(event)" required />
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
						<input type="submit" name="submit" value="Add Assistant" />
					</center>
				</form>
			
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>