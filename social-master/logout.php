<?php
    session_start();
	require 'dbHelper.php';
    $dbo = new db();
	$dbo->updateLastLoginTime($_SESSION['userId']);
    unset($_SESSION['userType']);
    unset($_SESSION['username']);
	unset($_SESSION['userId']);    
	unset($_SESSION['isActive']);
    session_unset();
    session_destroy();
    if (isset($_GET['return']))
        $page = $_GET['return'];
    else
        $page = 'index';
    header('Location: ./' . $page . '?success=Thanks+for+stopping+by');
?>
