<html>

	<head>
	
		<title>Sign Out</title>
		
	</head>
	
	<body>
	
		<?php 
			
			if (!isset($_SESSION))
				session_start();
			
			unset($_SESSION['student']);
			unset($_SESSION['id']);
			
			echo '
				<script type="text/javascript">
					window.close();
				</script>
			';
			
		?>
		
	</body>
	
</html>