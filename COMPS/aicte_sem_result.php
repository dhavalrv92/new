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

	$i=0;
	$j=0;
	echo '$sem';				
	//$data70 = mysql_query("SELECT COUNT(percentage) AS Above70 FROM $sem WHERE percentage>70") or die(mysql_error());
	$data70 = mysql_query("SELECT COUNT(percentage) AS Above70 FROM $sem WHERE sem5_total > 595") or die(mysql_error()); 
	while($info70 = mysql_fetch_array($data70)) 
	{ 
		echo ' <td> Computer Engineering </td> '; 
		echo ' <td> '.$info70['Above70'] . ' </td>'; 
					
	}
				
	//$data60 = mysql_query("SELECT COUNT(percentage) AS Above60 FROM $sem WHERE percentage BETWEEN 60 AND 69") or die(mysql_error());
	$data60 = mysql_query("SELECT COUNT(percentage) AS Above60 FROM $sem WHERE sem5_total BETWEEN 510 AND 594") or die(mysql_error()); 
	while($info60 = mysql_fetch_array($data60)) 
	{ 
		echo ' <td> '.$info60['Above60'] . ' </td> ';
	
	}
				
	$dataApp = mysql_query("SELECT COUNT(*) AS TotalApp FROM $sem") or die(mysql_error());
	$countdataApp=mysql_num_rows($dataApp);
	while($infoApp = mysql_fetch_array($dataApp)) 
	{ 
		echo ' <td> '. $infoApp['TotalApp'] . ' </td> ';
		$per[$i][$j] = $infoApp['TotalApp'];
		$j=$j+1;
	}
					
	//$dataPass = mysql_query("SELECT COUNT(*) AS TotalPass FROM $sem WHERE percentage > 40") or die(mysql_error());
	$dataPass = mysql_query("SELECT COUNT(*) AS TotalPass FROM $sem WHERE remark != 'F'") or die(mysql_error());
	while($infoPass = mysql_fetch_array($dataPass)) 
	{ 
		echo ' <td> '. $infoPass['TotalPass'] . ' </td> ';
		$per[$i][$j] = $infoPass['TotalPass'];
		$j=0;
	}
	//$dataPassPer = mysql_query("SELECT COUNT(*) AS TotalPassPer FROM sem_vi WHERE percent > 40") or die(mysql_error()); 
					
	//while($infoPassPer = mysql_fetch_array($dataPassPer)) 
	//{ 
		echo ' <td>'. round(($per[$i][$j+1]/$per[$i][$j])*100,2) . ' % </td>';
	 //}

	$i=$i+1;
				
?>