<html>

	<head>
	
		<title>Sign Out</title>
		
	</head>
	
	<body>
	
		<?php 
			
			include 'header.php';
			if (!isset($_SESSION))
				session_start();
			
			unset($_SESSION['sid']);
			unset($_SESSION['sname']);
			unset($_SESSION['role']);
			unset($_SESSION['timeout']);
			unset ($_SESSION['name']);
			unset ($_SESSION["dateFrom"]);
			unset ($_SESSION["dateTo"]);
			unset ($_SESSION['fullname']);
			
			//echo $_SESSION['sid'];
			header("Location: index");
			
			//exit;
			
		?>
		
	</body>
	
</html>