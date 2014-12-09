<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
		
		$conId=$_GET['conId'];
		$vote = $_GET['vote'];
		$apprBy = $_SESSION['userId'];
		require 'dbHelper.php';
		$dbo = new db();
        $dbo->concertAppr($conId,$apprBy,$vote);

 ?>