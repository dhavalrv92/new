<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
		
		$ftoId=$_GET['ftoId'];
		$fbyId = $_SESSION['userId'];
		require 'dbHelper.php';
		$dbo = new db();
        $dbo->followBandUser($fbyId,$ftoId);

 ?>