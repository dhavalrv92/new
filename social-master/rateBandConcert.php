<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
		
		$rateRtoId=$_GET['rateRtoId'];
		$rate = strtok($rateRtoId, ":");
		$rtoId = strtok(":");
		$rbyId = $_SESSION['userId'];
		$type = $_GET['type'];
		require 'dbHelper.php';
		$dbo = new db();
		$dbo->delRateBandConcert($rtoId,$rbyId,$type);
        $dbo->rateBandConcert($rtoId,$rbyId,$type,$rate);

 ?>