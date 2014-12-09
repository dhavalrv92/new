<html>

	<head>
	
		<title>Faculty</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/faculty.css" />
		
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
					
					if (isset($_SESSION['role']))
					{
						$option=$_SESSION['role'];
						//echo $option;
					}
					
					if (isset($_SESSION['sid']))
					{
						$sid=$_SESSION['sid'];
						//echo $sid;
					}
					
					include "connect.php";
						
					$result = mysql_query("SELECT * FROM facultyinfo") or die(mysql_error());
					$count=mysql_num_rows($result);
					//echo $count;
					while($row = mysql_fetch_array($result))
					{
						$id=$row['fac_id'];  											
						$name=$row['fac_name'];
						//$details=$row['fac_details'];
						$image=$row['fac_image'];
						//echo $image;
						echo '
								<table>  													
									<tr>
										<td id="imagetd">
											<img src="' . $image . '" alt="Image not Available" />
										</td>
										<td id="nametd">
											<font id="nameheader"><a href="faculty_details?facid=' . $id . '">' . $name . '</a></font>
											<!--font id="nameheader">' . $name . '</font-->
										</td>
									</tr>
								</table>
							';
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