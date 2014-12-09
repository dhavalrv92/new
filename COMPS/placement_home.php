<html>

	<head>
	
		<title>Placements Home</title>
		
		<link rel="stylesheet" type="text/css" href="CSS Files/placement_home.css" />
		
		<script type = "text/javascript" src ="JavaScripts/jquery.js"></script>
		<script type = "text/javascript" src ="JavaScripts/placement_home_fadeIn.js"></script>
		
		<!--script type="text/javascript">
			$(function() {
				$('#marquee').cycle({ 
					fx: 'scrollUp', 
					//pause: 1 
				});
			});
		</script-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<!-- include Cycle plugin -->
		<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
		    $('#marquee').cycle({
				fx: 'scrollUp' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});
		});
		</script>
		
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
			
			<div id="middle">
			
				<p id="paratext">
					Training of the student prior to there placement is an part of any institute that run professional courses. 
					To provide appropriate career opportunities to the students, 
						the Training and Placement (T&P) Cell interacts continuously with different industries and Training Organizations. 
					Workshops and seminars are organized for academic and overall development of the students. 
					Industry - Institute Interaction is pried to be maintained at a high level so as to keep up with the cutting edge technology 
						and to provide industry oriented training for the faculty.
					<br /><br /><br />
					<h4><font id="heading">Our Leading Recruiters :-</font></h4>
				</p>
				<div id="marquee">
					<!--marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="scroll" direction="up" scrollamount="2" scrolldelay="10"-->
						<ul id="listdata">
							<li><p>Avaya Global Connect</p></li>
							<li><p>Satyam Computers Services Ltd.</p></li>
							<li><p>Accenture</p></li>
							<li><p>Patni Computers</p></li>
							<li><p>Godrej Infotech</p></li>
							<li><p>NSE IT</p></li>
							<li><p>VSNL Global</p></li>
							<li><p>Fortune Infotech</p></li>
							<li><p>Convonix</p></li>
							<li><p>Syntel</p></li>
							<li><p>Mastek</p></li>
							<li><p>i Flex</p></li>
							<li><p>Citos</p></li>
							<li><p>Tata Elxsi</p></li>
							<li><p>HSBC Global Technology</p></li>
							<li><p>Tech Mahindra</p></li>
							<li><p>Infosys</p></li>
							<li><p>L & T Infotech</p></li>
							<li><p>ATOS Origin</p></li>
						</ul>
					<!--/marquee-->
				</div>
				
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