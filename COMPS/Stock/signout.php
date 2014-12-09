<html>

	<head>
	
		<title>Sign Out</title>
		
	</head>
	
	<body>
	
		<?php 
			
			//include 'header.php';
			if (!isset($_SESSION))
				session_start();
			
			unset($_SESSION['assistant']);
			unset($_SESSION['id']);
			
			echo '
				<script type="text/javascript">
					window.close();
				</script>
			';
			
		?>
		
	</body>
	
</html>