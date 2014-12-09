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
		
		<link rel="stylesheet" type="text/css" href="CSS Files/report_topic_style.css" />
		
		<style type="text/css">
		
			td {
				text-align:center;
			};
		
		</style>
		
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
				/*
					$connect = mysql_connect('localhost','root','');
					if (!$connect) {
						die('Could not connect to MySQL: ' . mysql_error());
						}	
					$cid =mysql_select_db('kjscomp',$connect);

					define('CSV_PATH','C:/xampp/');


					// Name of your CSV file
					$csv_file = CSV_PATH . "2012-13.csv"; 


					if (($getfile = fopen($csv_file, "r")) !== FALSE) 
					{
						$data = fgetcsv($getfile, 1000, ",");
						
						while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) 
						{
							$num = count($data);
							
							for ($c=0; $c < $num; $c++) 
							{
								$result = $data;
								$str = implode(",", $result);
								$slice = explode(",", $str);
							
								$col1 = $slice[0];
								$col2 = $slice[1];
								$col3 = $slice[2];
								$col4 = $slice[3];
								$col5 = $slice[4];
						
								// SQL Query to insert data into DataBase
								$query = "INSERT INTO 2012-13 (id,name,sex,contact,email) VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."')";
								$s=mysql_query($query, $connect );
										
							}
						}
					}

					echo "File data successfully imported to database!!";
					mysql_close($connect);

				*/
				
					/**include "connect.php"; 
					$deleterecords = "TRUNCATE TABLE 2012-13"; //empty the table of its current records
					mysql_query($deleterecords);
					if (isset($_POST['submit'])) 
					{
						if (is_uploaded_file($_FILES['filename']['tmp_name'])) 
						{
							echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
							echo "<h2>Displaying contents:</h2>";
							readfile($_FILES['filename']['tmp_name']);
						}

						//Import uploaded file to Database
						$handle = fopen($_FILES['filename']['tmp_name'], "r");

					 

						while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
						{

							$import="INSERT into `2012-13` (id,name,sex,contact,email) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";

							mysql_query($import) or die(mysql_error());

						}
						fclose($handle);

						print "Import done";
					}
					else 
					{

						print "Upload new csv by browsing to file and clicking on Upload<br />\n";
						print "<form enctype='multipart/form-data' action='upload' method='post'>";
					 
						print "File name to import:<br />\n";

					 
						print "<input size='50' type='file' name='filename'><br />\n";
						print "<input type='submit' name='submit' value='Upload'></form>";
					}*/
					if ($_POST['filename'] == "default")
					{
						echo '
							<script type="text/javascript">
								alert("Please choose Year");
								window.location.href = "select_alumnioption";
							</script>';
					}
					else
					{
						require "connect.php";
						$year = $_POST['filename'];
						
						//File Validation
						if (isset($_FILES['alumni_file']['name']))
						{
							$allowedExts = array("csv");
							$temp = explode(".", $_FILES['alumni_file']['name']);
							/*echo $_FILES['alumni_file']['name'];
							echo $temp[0];
							echo $temp[1];*/
							$extension = end($temp);
							$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
							if ( (in_array($_FILES['alumni_file']['type'],$mimes)) && in_array($extension, $allowedExts) )
							{
								if ($_FILES['alumni_file']['error'] > 0)
								{
									echo "Error: " . $_FILES['alumni_file']['error'] . "<br>";
								}
								else
								{
									/*echo "Upload: " . $_FILES['alumni_file']['name'] . "<br>";
									echo "Type: " . $_FILES['alumni_file']['type'] . "<br>";
									echo "Size: " . ($_FILES['alumni_file']['size'] / 1024) . " KB<br>";
									echo "Stored in: " . $_FILES['alumni_file']['tmp_name'];*/
									//move_uploaded_file($_FILES['alumni_file']['tmp_name'],"Backup/" . $year . '.csv');
									//exec("mysqldump -h localhost -u root -p rootroot kjscomp > Backup/" . $year . "(" . date("Y-m-d") . ").sql");
									$query = "SELECT * FROM $year";
									$result = mysql_query($query);
									if ( !mysql_error() )
									{
										$deleterecords = "TRUNCATE TABLE " . $year . ""; //empty the table of its current records
										mysql_query($deleterecords);	
									}
									if (mysql_error() == "Table 'kjscomp.$year' doesn't exist")
									{
										$create = "CREATE TABLE " . $year . "(std_ID VARCHAR(20) PRIMARY KEY,std_Name VARCHAR(70),std_Gender VARCHAR(7),std_Ct_Num VARCHAR(15),std_EmailID VARCHAR(50))"; //empty the table of its current records
										mysql_query($create);
									}
									
									//Import uploaded file to Database
									$handle = fopen($_FILES['alumni_file']['tmp_name'], "r");
			
									while (($data = fgetcsv($handle, 0, ",")) !== FALSE)
									{
										$import="INSERT INTO " . $year . " (std_ID,std_Name,std_Gender,std_Ct_Num,std_EmailID) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
										mysql_query($import) or die(mysql_error());
									}
									fclose($handle);
									echo '
										<script type="text/javascript">
											alert ("Data Successfully Uploaded!");
											window.location.href = "select_alumnioption";
										</script>
									';
									//header("location: select_alumnioption");
								}
							}
							else
							{
								echo '
									<script type="text/javascript">
										alert ("Invalid File.\nOnly .csv File is Allowed");
										window.location.href = "select_alumnioption";
									</script>';
							}
						}
					}
				?>
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br />
		
		
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>
