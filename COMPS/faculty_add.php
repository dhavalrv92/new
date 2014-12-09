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
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/master.css" />
		
	</head>
	
	<body>
		
		<?php include "header.php"; ?>
		
		<br />
		
		<div>
		
			<div id="leftmargin">
			
				<?php 
					
					include "leftmargin.php"; 
				
				?>
			
			</div>
			
			<div id="gap">
			</div>
			
			<div id="middle">
			
				<?php
					
					if (!isset($_SESSION))
						session_start();
						
					$fac_id=$_POST['fac_id'];
					$fac_name=$_POST['fac_name'];
					$password=$_POST['password'];
					
					/*echo $fac_id . '<br />';
					echo $fac_name . '<br />';
					echo $password . '<br />';
					echo strlen($password) . '<br />';*/
					
					if ( !$fac_id || !$fac_name || !$password || empty($_FILES['fac_image']['name']) )
					{
						if (!$fac_id)
						{
							if (!$fac_name)
							{
								if (!$password)
								{
									if (empty($_FILES['fac_image']['name']))
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Password \n + Upload Image");
													history.go(-1);
												</script>';
									}
									else
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Password");
													history.go(-1);
												</script>';
									}
								}
								elseif (strlen($password)<8)
								{
									if (empty($_FILES['fac_image']['name']))
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Password LengthMinimum Password Length should be 8  \n + Upload Image");
													history.go(-1);
												</script>';
									}
									else
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Password LengthMinimum Password Length should be 8");
													history.go(-1);
												</script>';
									}
								}
								else
								{
									if (empty($_FILES['fac_image']['name']))
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Upload Image");
													history.go(-1);
												</script>';
									}
									else
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name");
													history.go(-1);
												</script>';
									}
								}
							}
							else
							{
								if (!$password)
								{
									if (empty($_FILES['fac_image']['name']))
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Password \n + Upload Image");
													history.go(-1);
												</script>';
									}
									else
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Password");
													history.go(-1);
												</script>';
									}
								}
								elseif (strlen($password)<8)
								{
									if (empty($_FILES['fac_image']['name']))
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Password LengthMinimum Password Length should be 8  \n + Upload Image");
													history.go(-1);
												</script>';
									}
									else
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Password LengthMinimum Password Length should be 8");
													history.go(-1);
												</script>';
									}
								}
								else
								{
									if (empty($_FILES['fac_image']['name']))
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Upload Image");
													history.go(-1);
												</script>';
									}
									else
									{
										echo '
												<script type="text/javascript">
													alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name");
													history.go(-1);
												</script>';
									}
								}
							}
						}
						elseif (!$fac_name)
						{
							if (!$password)
							{
								if (empty($_FILES['fac_image']['name']))
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty Name \n + Password \n + Upload Image");
												history.go(-1);
											</script>';
								}
								else
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty Name \n + Password");
												history.go(-1);
											</script>';
								}
							}
							elseif (strlen($password)<8)
							{
								if (empty($_FILES['fac_image']['name']))
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Minimum Password Length should be 8  \n + Upload Image");
												history.go(-1);
											</script>';
								}
								else
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Minimum Password Length should be 8");
												history.go(-1);
											</script>';
								}
							}
							else
							{
								if (empty($_FILES['fac_image']['name']))
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name \n + Upload Image");
												history.go(-1);
											</script>';
								}
								else
								{
									echo '
											<script type="text/javascript">
												alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Faculty ID \n + Faculty Name");
												history.go(-1);
											</script>';
								}
							}
						}
						elseif (!$password)
						{
							if (empty($_FILES['fac_image']['name']))
							{
								echo '
										<script type="text/javascript">
											alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Password \n + Upload Image");
											history.go(-1);
										</script>';
							}
							else
							{
								echo '
										<script type="text/javascript">
											alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Password");
											history.go(-1);
										</script>';
							}
						}
						elseif (strlen($password)<8)
						{
							if (empty($_FILES['fac_image']['name']))
							{
								echo '
										<script type="text/javascript">
											alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n + Minimum Password Length should be 8 \n + Upload Image");
											history.go(-1);
										</script>';
							}
							else
							{
								echo '
									<script type="text/javascript">
										alert ("Minimum Password Length should be 8");
										history.go(-1);
									</script>';	
							}
						}
						elseif (empty($_FILES['fac_image']['name']))
						{
							echo '
									<script type="text/javascript">
										alert ("All Fields are Mmandatory. \nPlease Enter the following Information:\n +  Upload Image");
										history.go(-1);
									</script>';
						}
					}
					else
					{
						$allowedExts = array("jpeg", "jpg");
						$temp = explode(".", $_FILES['fac_image']['name']);
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
							move_uploaded_file($_FILES['fac_image']['tmp_name'],"Images/" . $fac_id . '.jpg');
							echo '\nStored in: ' . 'Images/' . $fac_id . '.jpg';
						}
						else
						{
							if (($_FILES['fac_image']['type'] != "image/jpeg") || ($_FILES['fac_image']['type'] != "image/jpg") )
							{
								echo '
									<script type="text/javascript">
										alert ("Invalid File.\nOnly .jpeg or .jpg File are Allowed");
										history.go(-1);
									</script>';
							}
							else if ($_FILES['fac_image']['size'] < 20000)
							{
								echo '
									<script type="text/javascript">
										alert ("Invalid File.\nFile Size should be Less than 20 KB");
										history.go(-1);
									</script>';
							}
						}
						
						require "connect.php";

						$query1="INSERT INTO facultyinfo (fac_id,fac_name,fac_image) VALUES ('$fac_id','$fac_name','Images/$fac_id.jpg');";
						$query2="INSERT INTO facultylogin (userid,password) VALUES ('$fac_id','$password');";

						$result1=mysql_query($query1)or die(mysql_error());
						$result2=mysql_query($query2)or die(mysql_error());
							
						/*$query3="UPDATE facultyinfo SET fac_details=LOAD_FILE($filepath) WHERE fac_id=$fac_id";
							
						$result3=mysql_query($query3)or die(mysql_error());*/

						header('location:index');
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
