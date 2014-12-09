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
	require "connect.php";
	if (isset($_POST['sem_name']))
	{
		/*$sem = strtolower($_POST['sem_name']);
		$year = $_POST['year'];*/
	}
	else
	{
		header ("location: index");
	}
	$sem = "roll_no_" . strtolower($_POST['sem_name']);
	$year = $_POST['year'];
	//echo '\n'.$sem.'_'.$year;
							
	//File Validation
	if (isset($_FILES['sem_file']['name']))
	{
		$allowedExts = array("csv");
		$temp = explode(".", $_FILES['sem_file']['name']);
		/*echo $_FILES['sem_file']['name'];
		echo $temp[0];
		echo $temp[1];*/
		$extension = end($temp);
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
		if ( (in_array($_FILES['sem_file']['type'],$mimes)) && in_array($extension, $allowedExts) )
		{
			if ($_FILES['sem_file']['error'] > 0)
			{
				echo "Error: " . $_FILES['sem_file']['error'] . "<br>";
			}
			else
			{
				/*echo "Upload: " . $_FILES['sem_file']['name'] . "<br>";
				echo "Type: " . $_FILES['sem_file']['type'] . "<br>";
				echo "Size: " . ($_FILES['sem_file']['size'] / 1024) . " KB<br>";
				echo "Stored in: " . $_FILES['sem_file']['tmp_name'];*/
				//move_uploaded_file($_FILES['sem_file']['tmp_name'],"Backup/" . $sem . '_' . $year . '.csv');
				//exec("mysqldump -h localhost -u root -p rootroot kjscomp > Backup/" . $year . "(" . date("Y-m-d") . ").sql");
				$query = "SELECT * FROM $sem";
				$result = mysql_query($query);
				if ( mysql_error() == "Table 'kjscomp.$sem' doesn't exist" )
				{
					$create = "CREATE TABLE " . $sem . "(roll_no INTEGER(20) PRIMARY KEY,student_name VARCHAR(100),year VARCHAR(50))";
					mysql_query($create);
				}
				if ( !mysql_error() )
				{
					$deleterecords = "TRUNCATE TABLE " . $sem . ""; //empty the table of its current records
					mysql_query($deleterecords);	
				}
				
				//Import uploaded file to Database
				$handle = fopen($_FILES['sem_file']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 0, ",")) !== FALSE)
				{
					$import="INSERT INTO " . $sem . " (roll_no,student_name,year) VALUES ($data[0],'$data[1]','$year')";
					mysql_query($import) or die(mysql_error());
				}
				
				move_uploaded_file($_FILES['sem_file']['tmp_name'],"Backup/" . $sem . '_' . $year . '.csv');
				fclose($handle);
				echo '
					<script type="text/javascript">
						alert ("* Data Uploaded Successfully!");
						window.location.href = "student_roll_list";
					</script>
				';
			}
		}
		else
		{
			echo '
				<script type="text/javascript">
					alert ("* Invalid File!\n* Only .csv File is Allowed!");
					window.location.href = "student_roll_list";
				</script>';
		}
	}
?>