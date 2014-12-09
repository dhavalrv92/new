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
	$sem = strtolower($_POST['sem_name']);
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
				if (mysql_error() == "Table 'kjscomp.$sem' doesn't exist")
				{
					if ($sem == "sem_iii")
					{
						$create = "CREATE TABLE " . $sem . "(seat_no VARCHAR(20) PRIMARY KEY,sem_III_result VARCHAR(10),sem_IV_result VARCHAR(10),name VARCHAR(100),pp1_wr INTEGER(50),pp1_wr_info VARCHAR(10),pp1_tw INTEGER(50),pp1_tw_info VARCHAR(10),pp1_pr_or INTEGER(50),pp1_pr_or_info VARCHAR(10),pp2_wr INTEGER(50),pp2_wr_info VARCHAR(10),pp2_tw INTEGER(50),pp2_tw_info VARCHAR(10),pp2_pr_or INTEGER(50),pp2_pr_or_info VARCHAR(10),pp3_wr INTEGER(50),pp3_wr_info VARCHAR(10),pp3_tw INTEGER(50),pp3_tw_info VARCHAR(10),pp3_pr_or INTEGER(50),pp3_pr_or_info VARCHAR(10),pp4_wr INTEGER(50),pp4_wr_info VARCHAR(10),pp4_tw INTEGER(50),pp4_tw_info VARCHAR(10),pp4_pr_or INTEGER(50),pp4_pr_or_info VARCHAR(10),pp5_wr INTEGER(50),pp5_wr_info VARCHAR(10),pp5_tw INTEGER(50),pp5_tw_info VARCHAR(10),pp5_pr_or INTEGER(50),pp5_pr_or_info VARCHAR(10),pp6_tw INTEGER(50),pp6_tw_info VARCHAR(10),pp6_pr_or INTEGER(50),pp6_pr_or_info VARCHAR(10),sem6_total INTEGER(50),sem6_total_info VARCHAR(10),sem5_total INTEGER(50),sem5_total_info VARCHAR(10),total INTEGER(50),percentage VARCHAR(50),remark VARCHAR(10))";
						mysql_query($create);
					}
					if ($sem == "sem_iv")
					{
						$create = "CREATE TABLE " . $sem . "(seat_no VARCHAR(20) PRIMARY KEY,sem_III_result VARCHAR(10),sem_IV_result VARCHAR(10),name VARCHAR(100),pp1_wr INTEGER(50),pp1_wr_info VARCHAR(10),pp1_tw INTEGER(50),pp1_tw_info VARCHAR(10),pp1_pr_or INTEGER(50),pp1_pr_or_info VARCHAR(10),pp2_wr INTEGER(50),pp2_wr_info VARCHAR(10),pp2_tw INTEGER(50),pp2_tw_info VARCHAR(10),pp2_pr_or INTEGER(50),pp2_pr_or_info VARCHAR(10),pp3_wr INTEGER(50),pp3_wr_info VARCHAR(10),pp3_tw INTEGER(50),pp3_tw_info VARCHAR(10),pp3_pr_or INTEGER(50),pp3_pr_or_info VARCHAR(10),pp4_wr INTEGER(50),pp4_wr_info VARCHAR(10),pp4_tw INTEGER(50),pp4_tw_info VARCHAR(10),pp4_pr_or INTEGER(50),pp4_pr_or_info VARCHAR(10),pp5_wr INTEGER(50),pp5_wr_info VARCHAR(10),pp5_tw INTEGER(50),pp5_tw_info VARCHAR(10),pp5_pr_or INTEGER(50),pp5_pr_or_info VARCHAR(10),pp6_tw INTEGER(50),pp6_tw_info VARCHAR(10),pp6_pr_or INTEGER(50),pp6_pr_or_info VARCHAR(10),sem6_total INTEGER(50),sem6_total_info VARCHAR(10),sem5_total INTEGER(50),sem5_total_info VARCHAR(10),total INTEGER(50),percentage VARCHAR(50),remark VARCHAR(10))";
						mysql_query($create);
					}
					if ($sem == "sem_v")
					{
						$create = "CREATE TABLE " . $sem . "(seat_no varchar(20) PRIMARY KEY,sem_III_result varchar(10),sem_IV_result varchar(10),name varchar(100),pp1_wr int(50),pp1_wr_info varchar(10),pp1_tw int(50),pp1_tw_info varchar(10),pp1_pr_or int(50),pp1_pr_or_info varchar(10),pp2_wr int(50),pp2_wr_info varchar(10),pp2_tw int(50),pp2_tw_info varchar(10),pp2_pr_or int(50),pp2_pr_or_info varchar(10),pp3_wr int(50),pp3_wr_info varchar(10),pp3_tw int(50),pp3_tw_info varchar(10),pp3_pr_or int(50),pp3_pr_or_info varchar(10),pp4_wr int(50),pp4_wr_info varchar(10),pp4_tw int(50),pp4_tw_info varchar(10),pp5_wr int(50),pp5_wr_info varchar(10),pp5_tw int(50),pp5_tw_info varchar(10),pp5_pr_or int(50),pp5_pr_or_info varchar(10),pp6_tw int(50),pp6_tw_info varchar(10),sem5_total int(50),sem5_total_info varchar(10),percentage varchar(50),remark varchar(10),PRIMARY KEY (seat_no))";
						mysql_query($create);
					}
					if ($sem == "sem_vi")
					{
						$create = "CREATE TABLE " . $sem . "(seat_no VARCHAR(20) PRIMARY KEY,sem_III_result VARCHAR(10),sem_IV_result VARCHAR(10),name VARCHAR(100),pp1_wr INTEGER(50),pp1_wr_info VARCHAR(10),pp1_tw INTEGER(50),pp1_tw_info VARCHAR(10),pp1_pr_or INTEGER(50),pp1_pr_or_info VARCHAR(10),pp2_wr INTEGER(50),pp2_wr_info VARCHAR(10),pp2_tw INTEGER(50),pp2_tw_info VARCHAR(10),pp2_pr_or INTEGER(50),pp2_pr_or_info VARCHAR(10),pp3_wr INTEGER(50),pp3_wr_info VARCHAR(10),pp3_tw INTEGER(50),pp3_tw_info VARCHAR(10),pp3_pr_or INTEGER(50),pp3_pr_or_info VARCHAR(10),pp4_wr INTEGER(50),pp4_wr_info VARCHAR(10),pp4_tw INTEGER(50),pp4_tw_info VARCHAR(10),pp4_pr_or INTEGER(50),pp4_pr_or_info VARCHAR(10),pp5_wr INTEGER(50),pp5_wr_info VARCHAR(10),pp5_tw INTEGER(50),pp5_tw_info VARCHAR(10),pp5_pr_or INTEGER(50),pp5_pr_or_info VARCHAR(10),pp6_tw INTEGER(50),pp6_tw_info VARCHAR(10),pp6_pr_or INTEGER(50),pp6_pr_or_info VARCHAR(10),sem6_total INTEGER(50),sem6_total_info VARCHAR(10),sem5_total INTEGER(50),sem5_total_info VARCHAR(10),total INTEGER(50),percentage VARCHAR(50),remark VARCHAR(10))";
						mysql_query($create);
					}
					if ($sem == "sem_vii")
					{
						$create = "CREATE TABLE " . $sem . "(seat_no VARCHAR(20) PRIMARY KEY,sem_III_result VARCHAR(10),sem_IV_result VARCHAR(10),name VARCHAR(100),pp1_wr INTEGER(50),pp1_wr_info VARCHAR(10),pp1_tw INTEGER(50),pp1_tw_info VARCHAR(10),pp1_pr_or INTEGER(50),pp1_pr_or_info VARCHAR(10),pp2_wr INTEGER(50),pp2_wr_info VARCHAR(10),pp2_tw INTEGER(50),pp2_tw_info VARCHAR(10),pp2_pr_or INTEGER(50),pp2_pr_or_info VARCHAR(10),pp3_wr INTEGER(50),pp3_wr_info VARCHAR(10),pp3_tw INTEGER(50),pp3_tw_info VARCHAR(10),pp3_pr_or INTEGER(50),pp3_pr_or_info VARCHAR(10),pp4_wr INTEGER(50),pp4_wr_info VARCHAR(10),pp4_tw INTEGER(50),pp4_tw_info VARCHAR(10),pp4_pr_or INTEGER(50),pp4_pr_or_info VARCHAR(10),pp5_wr INTEGER(50),pp5_wr_info VARCHAR(10),pp5_tw INTEGER(50),pp5_tw_info VARCHAR(10),pp5_pr_or INTEGER(50),pp5_pr_or_info VARCHAR(10),pp6_tw INTEGER(50),pp6_tw_info VARCHAR(10),pp6_pr_or INTEGER(50),pp6_pr_or_info VARCHAR(10),sem6_total INTEGER(50),sem6_total_info VARCHAR(10),sem5_total INTEGER(50),sem5_total_info VARCHAR(10),total INTEGER(50),percentage VARCHAR(50),remark VARCHAR(10))";
						mysql_query($create);
					}
					if ($sem == "sem_viii")
					{
						$create = "CREATE TABLE " . $sem . "(seat_no VARCHAR(20) PRIMARY KEY,sem_III_result VARCHAR(10),sem_IV_result VARCHAR(10),name VARCHAR(100),pp1_wr INTEGER(50),pp1_wr_info VARCHAR(10),pp1_tw INTEGER(50),pp1_tw_info VARCHAR(10),pp1_pr_or INTEGER(50),pp1_pr_or_info VARCHAR(10),pp2_wr INTEGER(50),pp2_wr_info VARCHAR(10),pp2_tw INTEGER(50),pp2_tw_info VARCHAR(10),pp2_pr_or INTEGER(50),pp2_pr_or_info VARCHAR(10),pp3_wr INTEGER(50),pp3_wr_info VARCHAR(10),pp3_tw INTEGER(50),pp3_tw_info VARCHAR(10),pp3_pr_or INTEGER(50),pp3_pr_or_info VARCHAR(10),pp4_wr INTEGER(50),pp4_wr_info VARCHAR(10),pp4_tw INTEGER(50),pp4_tw_info VARCHAR(10),pp4_pr_or INTEGER(50),pp4_pr_or_info VARCHAR(10),pp5_wr INTEGER(50),pp5_wr_info VARCHAR(10),pp5_tw INTEGER(50),pp5_tw_info VARCHAR(10),pp5_pr_or INTEGER(50),pp5_pr_or_info VARCHAR(10),pp6_tw INTEGER(50),pp6_tw_info VARCHAR(10),pp6_pr_or INTEGER(50),pp6_pr_or_info VARCHAR(10),sem6_total INTEGER(50),sem6_total_info VARCHAR(10),sem5_total INTEGER(50),sem5_total_info VARCHAR(10),total INTEGER(50),percentage VARCHAR(50),remark VARCHAR(10))";
						mysql_query($create);
					}
				}
				if ( !mysql_error() )
				{
					$deleterecords = "TRUNCATE TABLE " . $sem . ""; //empty the table of its current records
					mysql_query($deleterecords);	
				}
				
				//Import uploaded file to Database
				$handle = fopen($_FILES['sem_file']['tmp_name'], "r");
				if ( $sem == "sem_vi" )
				{
					while (($data = fgetcsv($handle, 0, ",")) !== FALSE)
					{
						if ( ($data[5] != "+") && ($data[7] != "+") && ($data[9] != "+") && ($data[11] != "+") && ($data[13] != "+") && ($data[15] != "+") && ($data[17] != "+") && ($data[19] != "+") && ($data[21] != "+") && ($data[23] != "+") && ($data[25] != "+") && ($data[27] != "+") && ($data[29] != "+") && ($data[31] != "+") && ($data[33] != "+") && ($data[35] != "+") && ($data[37] != "+") && ($data[39] != "+") )
						{
							$import="INSERT INTO " . $sem . "(seat_no,sem_III_result,sem_IV_result,name,pp1_wr,pp1_wr_info,pp1_tw,pp1_tw_info,pp1_pr_or,pp1_pr_or_info,pp2_wr,pp2_wr_info,pp2_tw,pp2_tw_info,pp2_pr_or,pp2_pr_or_info,pp3_wr,pp3_wr_info,pp3_tw,pp3_tw_info,pp3_pr_or,pp3_pr_or_info,pp4_wr,pp4_wr_info,pp4_tw,pp4_tw_info,pp4_pr_or,pp4_pr_or_info,pp5_wr,pp5_wr_info,pp5_tw,pp5_tw_info,pp5_pr_or,pp5_pr_or_info,pp6_tw,pp6_tw_info,pp6_pr_or,pp6_pr_or_info,sem6_total,sem6_total_info,sem5_total,sem5_total_info,total,percentage,remark) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]','$data[24]','$data[25]','$data[26]','$data[27]','$data[28]','$data[29]','$data[30]','$data[31]','$data[32]','$data[33]','$data[34]','$data[35]','$data[36]','$data[37]','$data[38]','$data[39]','$data[40]','$data[41]','$data[42]',round((($data[42]*100)/1700),2),'$data[44]')";
							mysql_query($import) or die(mysql_error());
						}
					}
				}
				else if ( $sem == "sem_v" )
				{
					while (($data = fgetcsv($handle, 0, ",")) !== FALSE)
					{
						if ( ($data[5] != "+") && ($data[7] != "+") && ($data[9] != "+") && ($data[11] != "+") && ($data[13] != "+") && ($data[15] != "+") && ($data[17] != "+") && ($data[19] != "+") && ($data[21] != "+") && ($data[23] != "+") && ($data[25] != "+") && ($data[27] != "+") && ($data[29] != "+") && ($data[31] != "+") && ($data[33] != "+") && ($data[35] != "+") )
						{
							$import="INSERT INTO sem_v (seat_no, sem_III_result, sem_IV_result, name, pp1_wr, pp1_wr_info, pp1_tw, pp1_tw_info, pp1_pr_or, pp1_pr_or_info, pp2_wr, pp2_wr_info, pp2_tw, pp2_tw_info, pp2_pr_or, pp2_pr_or_info, pp3_wr, pp3_wr_info, pp3_tw, pp3_tw_info, pp3_pr_or, pp3_pr_or_info, pp4_wr, pp4_wr_info, pp4_tw, pp4_tw_info, pp5_wr, pp5_wr_info, pp5_tw, pp5_tw_info, pp5_pr_or, pp5_pr_or_info, pp6_wr, pp6_wr_info, pp6_tw, pp6_tw_info, sem5_total, sem5_total_info, percentage, remark) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]', '$data[24]', '$data[25]', '$data[26]', '$data[27]', '$data[28]', '$data[29]', '$data[30]', '$data[31]', '$data[32]', '$data[33]', '$data[34]', '$data[35]', '$data[36]', '$data[37]', round((($data[36]*100)/850),2), '$data[38]')";
							mysql_query($import) or die(mysql_error());
						}
					}
				}
				
				move_uploaded_file($_FILES['sem_file']['tmp_name'],"Backup/" . $sem . '_' . $year . '.csv');
				fclose($handle);
				echo '
					<script type="text/javascript">
						alert ("* Data Uploaded Successfully!");
						window.location.href = "index";
					</script>
				';
			}
		}
		else
		{
			echo '
				<script type="text/javascript">
					alert ("* Invalid File!\n* Only .csv File is Allowed!");
					window.location.href = "select_sem";
				</script>';
		}
	}
?>