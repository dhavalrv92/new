<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
		
		$userId = $_SESSION['userId'];
		$conId = $_GET['conId'];
		require 'dbHelper.php';
		$dbo = new db();
        $dbo->rsvpConcert($userId,$conId);

 ?>