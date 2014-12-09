<?php
	if (!isset($_SESSION))
		session_start();
	
	if ( isset($_SESSION['sid']) )
		$fid = $_SESSION['sid'];
	
	if ( isset($_POST['update']) )
	{
		$submit = $_POST['update'];
		if ( isset($submit) )
		{
			$biography = $_POST['biography'];
			$publication = $_POST['publication'];
			$blogs = $_POST['blogs'];
			
			require_once "connect.php";
			$query = "UPDATE faculty_detail SET biography='$biography',publication='$publication',blogs='$blogs' WHERE id='$fid'";
			$query_result = mysql_query($query) or die (mysql_error());
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/faculty_details.css" />
		<link rel="stylesheet" type="text/css" href="CSS Files/faculty_accordion.css" />
		
		<script type = "text/javascript" src ="JavaScripts/faculty_accordion.js"></script>
		
		<?php
				
			if (!isset($_SESSION))
				session_start();

			if ( isset($_GET['facid']) )
				$facid=$_GET['facid'];
			//echo $facid;
					
		?>
		
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
			
				<?php
				
					include "connect.php";
						
					$result1 = mysql_query("SELECT fac_name,fac_image FROM facultyinfo WHERE fac_id=" . $facid ."") or die(mysql_error());
					$result2 = mysql_query("SELECT biography,publication,blogs FROM faculty_detail WHERE id=" . $facid ."") or die(mysql_error());
					
					while($row1 = mysql_fetch_array($result1))
					{
						$facname=$row1['fac_name'];
						$facimage=$row1['fac_image'];
					}
					while($row2 = mysql_fetch_array($result2))
					{
						$biography=$row2['biography'];
						$publication=$row2['publication'];
						$blogs=$row2['blogs'];
					}
					
					echo '
						<table>  													
							<tr>
								<td id="imagetd">
									<img src="' . $facimage . '" alt="Image not Available" />
								</td>
								<td id="nametd">
									<font id="nameheader">' . $facname . '</font>
								</td>
							</tr>
						</table>
					';
				?>
				
				<center>
					<form name="faculty_details" action="faculty_details?facid=<?php echo $facid; ?>" method="POST">
						<div id="wrap">
							<ul id="accordion">
								<li>
									<h2>Biography</h2>
									<div class="content">
										<?php
											
											if ( (isset($_SESSION['sid'])) && ($facid == $_SESSION['sid']) )
											{
										?>
												<textarea name="biography" rows="50" style="resize:none"><?php echo $biography; ?></textarea>
										<?php
											}
											else
											{
										?>
												<textarea name="biography" rows="50" readonly style="resize:none"><?php echo $biography; ?></textarea>
										<?php
											}
										?>
									</div>
								</li>
								<li>
									<h2>Publications</h2>
									<div class="content">
										<?php
											
											if ( (isset($_SESSION['sid'])) && ($facid == $_SESSION['sid']) )
											{
										?>
												<textarea name="publication" rows="50" style="resize:none"><?php echo $publication; ?></textarea>
										<?php
											}
											else
											{
										?>
												<textarea name="publication" rows="50" readonly style="resize:none"><?php echo $publication; ?></textarea>
										<?php
											}
										?>
									</div>
								</li>
								<li>
									<h2>Blogs</h2>
									<div class="content">
										<?php
											
											if ( (isset($_SESSION['sid'])) && ($facid == $_SESSION['sid']) )
											{
										?>
												<textarea name="blogs" rows="50" style="resize:none"><?php echo $blogs; ?></textarea>
										<?php
											}
											else
											{
										?>
												<textarea name="blogs" rows="50" readonly style="resize:none"><?php echo $blogs; ?></textarea>
										<?php
											}
										?>
									</div>
								</li>
							</ul>
						</div>
						<?php
							if ( (isset($_SESSION['sid'])) && ($facid == $_SESSION['sid']) )
							{
						?>
								<input type="submit" name="update" value="Update" />
						<?php
							}
						?>
					</form>
				</center>
			
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