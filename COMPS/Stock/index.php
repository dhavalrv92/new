<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/indexstyle.css" />
		
		<script type = "text/javascript" src ="../JavaScripts/jquery.js"></script>
		<script type = "text/javascript" src ="../JavaScripts/index_fadeIn.js"></script>
		
	</head>
	
	<body>
		
		<?php
			include "header.php";
		?>
		
		<br />
		
		<div>
		
			<div id="leftmargin">
			
				<?php include "leftmargin.php"; ?>
			
			</div>
			
			<div id="gap">
			</div>
			
			<div id="middle" style=" display: none; ">
			
				<p id="paratext" style="text-indent: 50px; display: none;">
					Computer engineers analyze, design, and evaluate computer systems, both hardware and software. 
					They work on system such as a flexible manufacturing system or a "smart" device or instrument. 
					Computer engineers often find themselves focusing onproblems or challenges which result in new "state of the art" products, which integrate computer capabilities. 
					They work on the design, planning, development, testing, and even the supervision of manufacturing of computer hardware -- 
					including everything from chips to device controllers.
				</p>
				
				<p id="paratext" style=" display: none;">
					Department Summary :-<br />
				</p>
				<ul id="listdata" style=" display: none;">
					<li><p>Branch started in the year : <b>2001</b></p></li>
					<li><p>Department established in the year : <b>2001</b></p></li>
					<li><p>Changes in intake since beginning till date : </p></li>
				</ul>
				
				<table id="table"style="width:100%;display: none;">
					<tr>
						<td style="width: 20%;"></td>
						<td style="width: 60%;">
							<table border="1" style="width: 100%;">
								<tr id="tblrow">
									<th>Year</th>
									<th>Intake</th>
								</tr>
								<tr id="tblrow">
									<td align="center">2001</td>
									<td align="center">45</td>
								</tr>
								<tr id="tblrow">
									<td align="center" border="1">2002 to till date</td>
									<td align="center" border="1">60</td>
								</tr>
							</table>
						</td>
						<td width="20%"></td>
					</tr>
				</table>
				
				<ul >
					<li><p>Lateral entry at S.E. (Direct admission after diploma) : <b>12</b></p></li>
					<li><p>Name of departmental student body : <b>Computer Society of India</b></p></li>
					<li><p>NBA Accreditation status : <b>In Progress</b></p></li>
				</ul>
				
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br />
		
		<br />
		
		<?php
			include "footer.html";
		?>
		
	</body>
	
</html>