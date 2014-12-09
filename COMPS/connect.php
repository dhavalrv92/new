<?php

	$connect=mysql_connect("localhost","root","")or die(mysql_error());
	
	if ($connect)
	{
		mysql_select_db("kjscomp") or die(mysql_error());
	}
	else
		echo 'Connection to Database Failed';
	
?>
