<?php
	
	if (isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
		if ($submit)
		{
			$facid = strip_tags($_POST['fac_id']);
			$facname = strip_tags($_POST['fac_name']);
			$password = md5(strip_tags($_POST['password']));
			$confirmpassword = md5(strip_tags($_POST['cpassword']));
			$backupemail = $_POST['backupemail'];
			$question = $_POST['question'];
			$answer = strip_tags($_POST['secanswer']);
			
			//Image Validation
			if (!empty($_FILES['fac_image']['name']))
			{
				$allowedExts = array("jpeg", "jpg");
				$temp = explode(".", $_FILES['fac_image']['name']);
				/*echo $_FILES['fac_image']['name'];
				echo $temp[0];
				echo $temp[1];*/
				$extension = end($temp);
							
				if ( ( ($_FILES['fac_image']['type'] == "image/jpeg") || ($_FILES['fac_image']['type'] == "image/jpg") )
							&& ($_FILES['fac_image']['size'] < 20000)
							&& in_array($extension, $allowedExts) )
				{
					if ($_FILES['fac_image']['error'] > 0)
					{
						echo "Error: " . $_FILES['fac_image']['error'] . "<br>";
					}
					else
					{
						/*echo "Upload: " . $_FILES['fac_image']['name'] . "<br>";
						echo "Type: " . $_FILES['fac_image']['type'] . "<br>";
						echo "Size: " . ($_FILES['fac_image']['size'] / 1024) . " KB<br>";
						echo "Stored in: " . $_FILES['fac_image']['tmp_name'];*/
					}
					/*if (file_exists("Images/" . $fac_id . '.jpg'))
					{
						echo 'File Already Exist';
					}
					else
					{
						move_uploaded_file($_FILES['fac_image']['tmp_name'],"Images/" . $fac_id . '.jpg');
						echo '\nStored in: ' . 'Images/' . $fac_id . '.jpg';
					}*/
					//move_uploaded_file($_FILES['fac_image']['tmp_name'],"Images/" . $facid . '.jpg');
					//echo '\nStored in: ' . 'Images/' . $facid . '.jpg';
				}
				else
				{
					if (($_FILES['fac_image']['type'] != "image/jpeg") || ($_FILES['fac_image']['type'] != "image/jpg") )
					{
						echo '
							<script type="text/javascript">
								alert ("Invalid File.\nOnly .jpeg or .jpg File are Allowed");
							</script>';
					}
					else if ($_FILES['fac_image']['size'] > 20000)
					{
						echo '
							<script type="text/javascript">
								alert ("Invalid File.\nFile Size should be Less than 20 KB");
							</script>';
					}
				}
			}
			
			//Insert into Database
			require "connect.php";
			
			$checkquery1="SELECT * FROM facultyinfo WHERE fac_id='$facid'";
			$checkresult1=mysql_query($checkquery1) or die(mysql_error());
			$count1=mysql_num_rows($checkresult1);
			if ($count1==0)
			{
				echo '
					<script type="text/javascript">
						//document.getElementById("nofaculty").style.display="";
						alert ("* No such Faculty ID Exist!");
						history.go(-1);
					</script>
				';
			}
			else
			{
				$row=mysql_fetch_array($checkresult1);
				
				if (empty($row['fac_name']))
				{
					move_uploaded_file($_FILES['fac_image']['tmp_name'],"Images/" . $facid . '.jpg');
					
					$query1="UPDATE facultyinfo SET fac_name='$facname' , fac_image='Images/$facid.jpg' WHERE fac_id='$facid'";
					$query2="UPDATE facultylogin SET password='$password' ,sec_que='$question' , answer='$answer' , email='$backupemail' WHERE userid='$facid'";
					
					$result1=mysql_query($query1) or die(mysql_error());
					$result2=mysql_query($query2) or die(mysql_error());
					
					echo '
						<script type="text/javascript">
							alert ("* Successfully Signed Up!");
							window.location.href = "index";
						</script>
					';
					//header("location: index");
				}
				else
				{
					echo '
						<script type="text/javascript">
							//document.getElementById("noupdate").style.display="";
							alert ("* Data Already Present!");
							history.go(-1);
						</script>
					';
				}
			}
		}	
	}
						
?>

<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/add_faculty_style.css" />
		
		<script>
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
			
			function validate()
			{
			 
				if( document.facsignup.password.value.length < 8 )
				{
					//alert("Please Select Security Question!");
					document.getElementById("passworderror").style.display="";
					document.facsignup.password.focus() ;
					return false;
				}
				else
					document.getElementById("passworderror").style.display="none";
				if( document.facsignup.password.value != document.facsignup.cpassword.value )
				{
					//alert("Please Select Security Question!");
					document.getElementById("samepassworderror").style.display="";
					document.facsignup.password.focus() ;
					return false;
				}
				else
					document.getElementById("samepassworderror").style.display="none";
				if( document.facsignup.question.value == "default" )
				{
					//alert("Please Select Security Question!");
					document.getElementById("questionerror").style.display="";
					document.facsignup.question.focus() ;
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
				<div id="nofaculty" style="color: #FF0000; display: none">
					* No such Faculty ID Exist!
				</div>
				<div id="noupdate" style="color: #FF0000; display: none">
					* Data Already Present!
				</div>
			
				<form enctype="multipart/form-data" name="facsignup" action="signup" method="POST" onsubmit="return(validate());">
				
					<center>
						
						<table id="input_tbl">
				
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> ID:</font>
								
								</td>
							
								<td id="input">
						
									<input type="text" name="fac_id" id="fac_id" maxlength="10" autofocus placeholder="Enter Your ID Number" onkeypress="return isNumber(event)" required />
									
								</td>
								
							</tr>
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> Display Name:</font>
								
								</td>
							
								<td id="input">
						
									<input type="text" name="fac_name" id="fac_name" placeholder="Enter Your Name" required />
									
								</td>
								
							</tr>
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> Password:</font>
								
								</td>
							
								<td id="input">
						
									<input type="password" name="password" id="password" placeholder="Enter the Password with Minimum Length of 8" required />
									
								</td>
								
							</tr>
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> Confirm your Password:</font>
								
								</td>
							
								<td id="input">
						
									<input type="password" name="cpassword" id="cpassword" placeholder="Enter the Password same as Above" required />
									
								</td>
								
							</tr>
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> E-Mail Address:</font>
								
								</td>
							
								<td id="input">
						
									<input type="email" name="backupemail" id="backupemail" placeholder="Enter the Email Address" required />
									
								</td>
								
							</tr>
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> Choose Security Question:</font>
								
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
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4"><font id="error" color="#FF0000">*</font> Your Answer:</font>
								
								</td>
							
								<td id="input">
									
									<input type="text" name="secanswer" id="secanswer" placeholder="Enter the Answer of Question you selected Above" required />
									
								</td>
								
							</tr>
							
							<tr id="input">
							
								<td id="input">
								
									<font id="header4">Image:</font>
								
								</td>
							
								<td id="input" width="100%">
						
									<input type="file" name="fac_image" />
									
								</td>
								
							</tr>
							
						</table>
						
						<br />	<br />
						
						<input type="submit" name="submit" value="Sign Up" />
						
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