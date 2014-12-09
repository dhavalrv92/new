<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
		
		$aId=$_GET['aId'];
		require 'dbHelper.php';
		$dbo = new db();
        $dbo->deleteArtist($aId);

 ?>