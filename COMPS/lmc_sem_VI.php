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
	
	include 'connect.php';

	$dataApp = mysql_query("SELECT COUNT(*) AS TotalApp FROM sem_vi") or die(mysql_error());
	$countdataApp = mysql_fetch_assoc($dataApp);
	echo ' <td> '. $countdataApp['TotalApp'] . ' </td> ';
	
	$dataPass = mysql_query("SELECT COUNT(*) AS TotalPass FROM sem_vi WHERE percentage > 40") or die(mysql_error());
	$countdataPass = mysql_fetch_assoc($dataPass);
	echo ' <td> '. $countdataPass['TotalPass'] . ' </td> ';
	
	echo ' <td>'. round(($countdataPass['TotalPass']/$countdataApp['TotalApp'])*100,2) . '</td>';
	
	$data60 = mysql_query("SELECT COUNT(*) AS Above60 FROM sem_vi WHERE percentage BETWEEN 60 AND 69") or die(mysql_error());
	$countdata60 = mysql_fetch_assoc($data60);
	echo ' <td colspan=2> ' . $countdata60['Above60'] . '</td> ';
	
	$data70 = mysql_query("SELECT COUNT(*) AS Above70 FROM sem_vi WHERE percentage >= 70") or die(mysql_error());
	$countdata70 = mysql_fetch_assoc($data70);
	echo ' <td colspan=2> ' . $countdata70['Above70'] . '</td> ';
				
?>