<html>

	<head>
	
		<title>Login Validation</title>
	
		<link rel="stylesheet" type="text/css" href="CSS Files/indexstyle.css" />
	
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
			
			<div id="middle" align="center">

				<?php
					
					if (!isset($_SESSION))
						session_start();
					if (isset($_POST['userid']))
					{
					}
					else
					{
						header ("location: index");
					}
					$user_id=strip_tags($_POST['userid']);
					$password=md5(strip_tags($_POST['passwd']));
					
					$option=$_SESSION['role'];
					
					if($user_id && $password)
					{
						//echo 'UserID:	' . $user_id . '<br />Password:	' . $password . '<br />';
						
						include "connect.php";
						
						//echo '<br />Connection Established Successfully<br />';
						
						//echo '<br />Database Successfully Selected<br />';
							
						if ($option == "admin")
						{
							$result=mysql_query("SELECT * FROM adminlogin WHERE userid='" . $user_id . "' AND password='" . $password . "'")
							or die(mysql_error());
							$uname=mysql_query("SELECT name FROM adminlogin WHERE userid='" . $user_id . "'")
							or die(mysql_error());
							$temprow=mysql_fetch_assoc($uname);
							$username=$temprow['name'];
							//echo $username;
						}
						
						elseif ($option == "faculty")
						{
							$result=mysql_query("SELECT * FROM facultylogin WHERE userid='" . $user_id . "' AND password='" . $password . "'")
							or die(mysql_error());
							$uname=mysql_query("SELECT fac_name FROM facultyinfo WHERE fac_id='" . $user_id . "'")
							or die(mysql_error());
							$temprow=mysql_fetch_assoc($uname);
							$username=$temprow['fac_name'];
							//echo $username;
						}
						//echo '<br />Query Successfully Executed<br />';
						
						$count=mysql_num_rows($result);
						//echo '<br />No. of Records Extracted is:	' . $count . '<br />';
						
						if ($count==0)
						{
							echo '<script type="text/javascript">
									
								alert("UserID or Password is Invalid");
								//history.go(-1);
								//window.history.back()
								window.location.href="index";
							
							</script>';
						}
						else
						{
							$row=mysql_fetch_assoc($result);
							$userid=$row['userid'];
							$passwd=$row['password'];
							if /*($user_id==$userid && $password==$passwd)*/(strcasecmp($user_id,$userid) == 0 && strcmp($password,$passwd) == 0)
							{
								$_SESSION['sid']=$userid;
								$_SESSION['sname']=$username;
								$_SESSION['timeout']=time();
								$queryname = "SELECT fac_name FROM rfid_info WHERE id='$userid'";
								$resultname = mysql_query($queryname);
								$rowname = mysql_fetch_array($resultname);
								$_SESSION['fullname'] = $rowname['fac_name'];
								//echo '<br />Welcome ' . $username . '<br />';
								//header("Location: index");
								echo'
									<script type="text/javascript">
										window.location = "index";
									</script>
								';
							}
							else
							{
								unset($_SESSION['sid']);
								unset($_SESSION['sname']);
								unset($_SESSION['timeout']);
								unset($_SESSION['fullname']);
								echo'
									<script type="text/javascript">
										alert("UserID or Password is Invalid");
										window.location.href="index";
									</script>
								';
							}
						}
					}
					elseif (!$user_id && !$password)
					{
						echo '<script type="text/javascript">
									
							alert("Please Enter Valid UserID and Password");
							//history.go(-1);
							//history.back();
							window.location.href="index";
						
						</script>';
					}
					elseif (!$user_id)
					{
						echo '<script type="text/javascript">
									
							alert("Please Enter Valid UserID");
							//history.go(-1);
							//history.back();
							window.location.href="index";
						
						</script>';
					}
					else
					{
						echo '<script type="text/javascript">
									
							alert("Please Enter Valid Password");
							//history.go(-1);
							//history.back();
							window.location.href="index";
						
						</script>';
					}
					
				?>
			
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