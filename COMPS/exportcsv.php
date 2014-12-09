<?php
	if (!isset($_SESSION))
		session_start();
	if ( isset($_SESSION['sid']) )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<?php
	// Clear any previous output
	ob_end_clean();
	
	if (!isset($_SESSION))
		session_start();
	
	if (isset($_POST['query']))
	{
		$query=$_POST['query'];
	
		include "connect.php";
		////$query="SELECT * FROM topicreport WHERE fac_name='F100' AND (date BETWEEN '2013-12-01' AND '2013-12-31')";
		$result=mysql_query($query)or die(mysql_error());
		$count=mysql_num_rows($result);
		
		// I assume you already have your $result
		$num_fields = mysql_num_fields($result);
		
		// Fetch MySQL result headers
		$headers = array();
		//$headers[] = "Sr_No.";
		for ($i = 0; $i < $num_fields; $i++)
		{
			$headers[] = strtoupper(mysql_field_name($result , $i));
		}
		
		// Filename with current date
		$current_date = date("y/m/d");
		$filename = "MyFileName" . $current_date . ".csv";
		
		// Open php output stream and write headers
		$fp = fopen('php://output', 'w');
		if ($fp && $result)
		{
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename='.$filename);
			header('Pragma: no-cache');
			header('Expires: 0');
			////echo "Title of Your CSV File\n\n";
			// Write mysql headers to csv
			fputcsv($fp, $headers);
			//$row_tally = 0;
			// Write mysql rows to csv
			while ($row = mysql_fetch_array($result, MYSQL_NUM))
			{
				//$row_tally = $row_tally + 1;
				//fputcsv($fp, array_values($row));
				//echo $row_tally.",";
				fputcsv($fp, array_values($row));
			}
			die;
		}
	}
	else
	{
		echo '
			<script type="text/javascript">
				window.location.href = "index";
			</script>
		';
	}
?>