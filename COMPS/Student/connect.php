<?php

	$connect=mysql_connect("localhost","root","rootroot")or die(mysql_error());
	
	if ($connect)
	{
		mysql_select_db("kjscomp_student") or die(mysql_error());
	}
	else
		echo 'Connection to Database Failed';
	
?>
