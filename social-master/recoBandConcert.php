<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
		
		$recoToId=$_GET['recoToId'];
		$recoById = $_SESSION['userId'];
		$type = $_GET['type'];
		require 'dbHelper.php';
		$dbo = new db();
        $dbo->recoBandConcert($recoToId,$recoById,$type);

 ?>