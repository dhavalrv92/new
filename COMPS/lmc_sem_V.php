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

	$dataApp = mysql_query("SELECT COUNT(*) AS TotalApp FROM sem_v") or die(mysql_error());
	$countdataApp = mysql_fetch_assoc($dataApp);
	echo ' <td> '. $countdataApp['TotalApp'] . ' </td> ';
	
	$dataPass = mysql_query("SELECT COUNT(*) AS TotalPass FROM sem_v WHERE percentage > 40") or die(mysql_error());
	$countdataPass = mysql_fetch_assoc($dataPass);
	echo ' <td> '. $countdataPass['TotalPass'] . ' </td> ';
	
	echo ' <td>'. round(($countdataPass['TotalPass']/$countdataApp['TotalApp'])*100,2) . '</td>';

?>