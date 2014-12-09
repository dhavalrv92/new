<?php

	$connect=mysql_connect("localhost","root","rootroot")or die(mysql_error());
	
	if ($connect)
	{
		//echo '<br />Connection Established Successfully<br />';

		mysql_select_db("kjscomp_stock") or die(mysql_error());
		
		mysql_select_db("kjscomp_student") or die(mysql_error());
		
		mysql_select_db("kjscomp_proctor") or die(mysql_error());
	}
	else
		echo 'Connection to Database Failed';
	
?>
