
<?php
require_once 'inc/db.inc.php';
require_once 'inc/http_functions.inc.php';
$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Unable to connect. Check your connection parameters.');

mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

$division = $_POST['division'];
$def = $_POST['f_deflistno'];
$sem = $_POST['sem'];
$branch = $_POST['branch'];
$prdef = 'pr'.$def;
$thlimit = $_POST['thlimit'];
$dt = $_POST['dt'];
$includepract=$_POST['includepract'];
$year = $_POST['year'];						$thtotpercent = 101;
						$prtotpercent = 101;
$print = 'no';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Letters To Parents</title>
<style>
@page { size 8.5in 11in; magin: 2cm }
div.page { page-break-after: always }

</style>
</head>

<body>
    
	<?php 
			$sql = 'Select subjectcode from semsubjects where sem = "'.$sem.'" and branch = "'.$branch.'" and thpra = "TH"';	
			$result = mysql_query($sql,$db) or die(mysql_error($db)); 
			while ($row = mysql_fetch_assoc($result))
			{
				foreach ($row as $value)
				{
					$thsubjectcode[] = $row['subjectcode'];
				}
			}
			  $thnumsubjects = count($thsubjectcode);
	  	$ctr = 0;
		for($ctr = 0; $ctr < $thnumsubjects; $ctr++)
		{
			$sql = 'Select max(`'.$def.$thsubjectcode[$ctr].'`) from '.$branch.$sem.'students where division = "'.$division.'"';	
			$result = mysql_query($sql,$db) or die(mysql_error($db)); 
			$row = mysql_fetch_assoc($result);
			$maxthsubjectcode[] = $row ['max(`'.$def.$thsubjectcode[$ctr].'`)'];
		}
// To get practical subject code

			$sql = 'Select subjectcode from semsubjects where sem = "'.$sem.'" and branch = "'.$branch.'" and thpra = "PR"';	
			$result = mysql_query($sql,$db) or die(mysql_error($db)); 
			while ($row = mysql_fetch_assoc($result))
			{
				foreach ($row as $value)
				{
					$prsubjectcode[] = $row['subjectcode'];
				}
			}
			  $prnumsubjects = count($prsubjectcode);
	  	$ctr = 0;
		for($ctr = 0; $ctr < $prnumsubjects; $ctr++)
		{
			$sql = 'Select max(`pr'.$def.$prsubjectcode[$ctr].'`) from '.$branch.$sem.'students where division = "'.$division.'"';
			$result = mysql_query($sql,$db) or die(mysql_error($db)); 
			$row = mysql_fetch_assoc($result);
			$maxprsubjectcode[] = $row ['max(`pr'.$def.$prsubjectcode[$ctr].'`)'];
		}
?>

<?php 
		//to fetch the attendance record:

		$sql = 'Select * from '.$branch.$sem.'students where division = "' .$division .'" ';	
		
		$result = mysql_query($sql,$db) or die(mysql_error($db)); 
while($row = mysql_fetch_assoc($result))
{
				$yeardivroll = $row['yeardiv_roll'];
				$name = ''.$row['surname'].'  '.$row['firstname'].'  '.$row['midname'].'';
				$mobile = $row['mobile'];
				$phone = $row['phone'];
				$parname = ''.$row['par_surname'].'  '.$row['par_firstname'].'  '.$row['par_midname'].'';
				$par_mobile = $row['par_mobile'];
				$add1 = $row['add1'];
				$add2 = $row['add2'];
				$add3 = $row['add3'];
				$city = $row['city'];
				$pincode = $row['pincode'];
				$batch = $row['batch'];

				$print = 'no';

				$thtotsub = 0;
				$thtotsubmax = 0;
				$prtotsub = 0;
				$prtotsubmax = 0;
				$thtotpercent = 0;
				$prtotpercent = 0;

	   			$ctr = 0;
				for($ctr = 0; $ctr < $thnumsubjects; $ctr++)
				{
					$thsub[$ctr] = $row[$def.$thsubjectcode[$ctr]];
					$thsubmax[$ctr] = $row[$def.$thsubjectcode[$ctr].'max'];
				}
				
				$ctr = 0;
				$prdef = 'pr'.$def;
				for($ctr = 0; $ctr < $prnumsubjects; $ctr++)
				{
					$prsub[$ctr] = $row[$prdef.$prsubjectcode[$ctr]];
					$prsubmax[$ctr] = $row[$prdef.$prsubjectcode[$ctr].'max'];
				}
				
						$ctr = 0;
						$thmaxcheck = 1;
						/*for($ctr = 0; $ctr < $thnumsubjects; $ctr++)
						{
							if($thsubmax[$ctr]==00) $thmaxcheck = 0;
						}*/
							
						
					if($thmaxcheck!=00) 
		 			{
				
						$ctr = 0;
						$thtotpercent = 0;
						for($ctr = 0; $ctr < $thnumsubjects; $ctr++)
						{

							$thtotsub = $thtotsub + $thsub[$ctr];
							$thtotsubmax = $thtotsubmax + $thsubmax[$ctr];
								//$thtotpercent = $thtotpercent + round((100*$thsub[$ctr])/$thsubmax[$ctr]);
						}
					//	$thtotpercent = round(($thtotpercent/$thnumsubjects),2); 
						$thtotpercent = round((($thtotsub *100)/$thtotsubmax),2);
						$print = 'yes';
					}
					
					
					

	$ctr = 0;
						$prmaxcheck = 1;
						/*for($ctr = 0; $ctr < $prnumsubjects; $ctr++)
						{
							if($prsubmax[$ctr]==00) $prmaxcheck = 0;
						}*/
							
						
					if($prmaxcheck!=00) 
		 			{
				
						$ctr = 0;
						$prtotpercent = 0;
						for($ctr = 0; $ctr < $prnumsubjects; $ctr++)
						{
							$prtotsub = $prtotsub + $prsub[$ctr];
							$prtotsubmax = $prtotsubmax + $prsubmax[$ctr];		
							//$prtotpercent = $prtotpercent + round((100*$prsub[$ctr])/$prsubmax[$ctr]);
						}
						//$prtotpercent = round(($prtotpercent/$prnumsubjects),2); 
						$prtotpercent = round((($prtotsub *100)/$prtotsubmax),2);
						$print = 'yes';
					}
						$averagepercent = ($prtotpercent + $thtotpercent) / 2;


if(($thtotpercent < $thlimit || $prtotpercent < $thlimit) && $print =='yes')
{

?>
<hr color="#FFFFFF"  />
<div class="page" id="page1">
		<table width="100%" border="0" cellspacing="0.1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
		  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
		  <td colspan ="10">
		  <h3 align="center"><?php echo $college;?> <span class="style2"><HR /></span></h3>		  </td>
		  </tr>
		  
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <td colspan ="10">&nbsp;</td>
		</tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><td colspan ="10"><div align="right"><?php echo $dt;?></div></td></tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><td colspan ="10">&nbsp;</td>
		</tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><td colspan ="10">

		<?php
		echo 'To,<br/>';
		echo $parname.'<br/>';
		echo $add1.',<br/>';
		echo $add2.',<br/>';
		echo $add3.',<br/>';
		echo $city.' - '.$pincode.'.<br/>';
		?>
		</td>
		</tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
		  <td colspan ="10">&nbsp;</td>
		  </tr>
		
		<tr><td bordercolor="#FFFFFF" bgcolor="#FFFFFF"></td>
		<td colspan ="9"><?php echo 'Subject : Attendance of Your Ward. <br/>';?></td></tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
		  <td colspan ="10">&nbsp;</td>
		  </tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><td colspan ="10">Sir/ Madam , </td>
		</tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
		  <td colspan ="10">&nbsp;</td>
		  </tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><td colspan ="10">Your ward <?php echo $name.'  Roll No: '.$yeardivroll ;?> is the student of  <?php echo $year.' Semester '.$sem.'.';?></td></tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
		  <td colspan ="10">&nbsp;</td>
		  </tr>
		<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><td colspan ="10">His attendance for the <?php echo ' Semester '.$sem.'  ';?> upto 
				<?php
					/*	$sql_dt = 'Select * from defdates where defno = "'.$def.'" and branch = "'.$branch.'"';
						$result_dt = mysql_query($sql_dt,$db) or die(mysql_error($db)); 
						$row_dt = mysql_fetch_assoc($result_dt); 
						$date = date_create($row_dt['dateoffilling']); */
						echo '  '; 
						echo $dt;
						echo ' given below - <p>';?>	</td>

		</tr>
		
        <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <td colspan ="10">&nbsp;</td>
          </tr>
		</table>
		<table width="100%" border="1" cellspacing="0.1" bgcolor="#FFFFFF">
		
        <tr>
        <td colspan ="2" bordercolor="#000000"><div align="center">Name Of Theory Subject:</div></td>
<?php 
			$ctr = 0;
			for($ctr = 0; $ctr < $thnumsubjects; $ctr++)
			{
        		echo '<td bordercolor="#000000"><div align="center">'.$thsubjectcode[$ctr].'</div></td>';
			}
?>				
		<td bordercolor="#000000"><div align="center">Total</div></td>

    </tr>
	<tr>
      <td colspan ="2" bordercolor="#000000"><div align="center"><?php echo 'Attendance in Percentage:'; ?></div></td>
<?php 
			$ctr = 0;
			for($ctr = 0; $ctr < $thnumsubjects; $ctr++)
			{
				echo '<td bordercolor="#000000"><div align="center">';
        		if ($thsubmax[$ctr]!=0) 
					echo number_format(round((100*$thsub[$ctr])/$thsubmax[$ctr],2),2); 
				else 
					echo 'N.F.';
				echo '</div></td>';
			}
?>

		<td bordercolor="#000000"><div align="center">
		             
	<!-- to calculate Theory total percentage -->
<?php 												
					if($thmaxcheck!=00) 
					{
						echo number_format($thtotpercent,2) ;
					}
					else echo 'N.F.';
?>

					</div></td></tr>


<?php if($includepract == 'yes'){?>	
        <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <td colspan ="10">&nbsp;</td>
          </tr>
        		
        <tr>
        <td colspan ="2" bordercolor="#000000"><div align="center">Name Of Practical Subject:</div></td>
<?php 
			$ctr = 0;
			for($ctr = 0; $ctr < $prnumsubjects; $ctr++)
			{
        		echo '<td bordercolor="#000000"><div align="center">'.$prsubjectcode[$ctr].'</div></td>';
			}
?>				
		<td bordercolor="#000000"><div align="center">Total</div></td>
    </tr>
	<tr>
      <td colspan ="2" bordercolor="#000000"><div align="center"><?php echo 'Attendance in Percentage:'; ?></div></td>
<?php 
			$ctr = 0;
			for($ctr = 0; $ctr < $prnumsubjects; $ctr++)
			{
				echo '<td bordercolor="#000000"><div align="center">';
        		if ($prsubmax[$ctr]!=0) 
					echo number_format(round((100*$prsub[$ctr])/$prsubmax[$ctr],2),2); 
				else 
					echo 'N.F.';
				echo '</div></td>';
			}
?>

		<td bordercolor="#000000"><div align="center">
		             
	<!-- to calculate Practical total percentage -->
<?php 				
					if($prmaxcheck!=00) 
		 			{
						echo number_format($prtotpercent,2) ;
					}
					else echo 'N.F.';
?>

					</div></td></tr>
	</table>
	<p>
	<?php }?>
	<table width="100%" border="0" cellspacing="0.1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">

	<tr>
		  <td colspan ="10">&nbsp;</td>
	  </tr>
		
		<tr>
		  <td colspan ="10">Please note that if the attendance is less than 75 % , strict action will be taken as per university rule. </td>
	  </tr>
		<tr>
		  <td colspan ="10">&nbsp;</td>
	  </tr>
		<tr>
		  <td colspan ="10">Thanking you, </td>
	  </tr>
		<tr>
		  <td colspan ="10">&nbsp;</td>
	  </tr>
		<tr>
		<td colspan ="7"></td>

		<td width="33%" colspan ="3"><div align="center"> <br/>
		Head, <br/>Department of <?php if($branch =="ALL") echo 'Basic Sciences and Humanities'; else echo $branch;?></div></td></tr>
</table>
<p></div>
<hr color="#FFFFFF" />

<?php 
}
}
?>
</body>
</html>

