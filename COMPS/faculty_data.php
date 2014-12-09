<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "faculty") )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Faculty First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<?php
	
	if (!isset($_SESSION))
		session_start();
	
	if (isset($_POST['update']))
	{
		$submit = $_POST['update'];
		if (isset($submit))
		{
			$facid = $_SESSION['sid'];
			
			//Image Validation
			if (isset($_FILES['biography']['name']))
			{
				$allowedExts = array("txt");
				$temp = explode(".", $_FILES['biography']['name']);
				/*echo $_FILES['biography']['name'] . '<br />';
				echo $temp[0] . '<br />';
				echo $temp[1] . '<br />';*/
				$extension = end($temp);
				
				if ( ($_FILES['biography']['type'] == "text/plain")
						&& ($_FILES['biography']['size'] < 20000)
						&& in_array($extension, $allowedExts) )
				{
					if ($_FILES['biography']['error'] > 0)
					{
						echo "Error: " . $_FILES['biography']['error'] . "<br>";
					}
					else
					{
						echo "Upload: " . $_FILES['biography']['name'] . "<br>";
						echo "Type: " . $_FILES['biography']['type'] . "<br>";
						echo "Size: " . ($_FILES['biography']['size'] / 1024) . " KB<br>";
						echo "Stored in: " . $_FILES['biography']['tmp_name'];
					}
					/*if (file_exists("Faculty/Biography/" . $fac_id . '.jpg'))
					{
						echo 'File Already Exist';
					}
					else
					{
						move_uploaded_file($_FILES['biography']['tmp_name'],"Faculty/Biography/" . $fac_id . '.jpg');
						echo '\nStored in: ' . 'Faculty/Biography/' . $fac_id . '.jpg';
					}*/
					move_uploaded_file($_FILES['biography']['tmp_name'],"Faculty/Biography/" . $facid . '.txt');
					//echo '\nStored in: ' . 'Faculty/Biography/' . $facid . '.jpg';
				}
				else
				{
					if ( ($_FILES['biography']['type'] != "text/plain") )
					{
						echo '
							<script type="text/javascript">
								alert ("Invalid File.\nOnly .txt File is Allowed");
							</script>';
					}
					else if ($_FILES['biography']['size'] > 20000)
					{
						echo '
							<script type="text/javascript">
								alert ("Invalid File.\nFile Size should be Less than 20 KB");
							</script>';
					}
				}
			}
			
			require "connect.php";
			
			//$query = "UPDATE faculty_detail SET biography=LOAD_FILE('Faculty/Biography/$facid.txt') WHERE id='$facid'";
			$query = "LOAD DATA LOCAL INFILE 'Faculty/Biography/$facid.txt' INTO TABLE faculty_detail (@col2) set biography='@col2' WHERE id='$facid'";
			$result = mysql_query($query) or die(mysql_error());
			mysql_error();
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/add_faculty_style.css" />
		
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
			
				<form enctype="multipart/form-data" action="faculty_data" method="POST" name="personal_data" id="personal_data">
					<center>
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required" color="#FF0000">* </font>Biography : </font>
								</td>
								<td id="input">
									<input type="file" name="biography" onclick="select()" required/>
								</td>
							</tr>
						</table>
					</center>
					<br />	<br />
					<center>
						<input type="submit" name="update" value="Update" />
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