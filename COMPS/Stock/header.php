<?php
	function getBrowser() 
	{ 
	    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";
	
	    //First get the platform?
	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
	        $platform = 'windows';
	    }
	    
	    // Next get the name of the useragent yes seperately and for good reason
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
	    { 
	        $bname = 'Internet Explorer'; 
	        $ub = "MSIE"; 
	    } 
	    elseif(preg_match('/Firefox/i',$u_agent)) 
	    { 
	        $bname = 'Mozilla Firefox'; 
	        $ub = "Firefox"; 
	    } 
	    elseif(preg_match('/Chrome/i',$u_agent)) 
	    { 
	        $bname = 'Google Chrome'; 
	        $ub = "Chrome"; 
	    } 
	    elseif(preg_match('/Safari/i',$u_agent)) 
	    { 
	        $bname = 'Apple Safari'; 
	        $ub = "Safari"; 
	    } 
	    elseif(preg_match('/Opera/i',$u_agent)) 
	    { 
	        $bname = 'Opera'; 
	        $ub = "Opera"; 
	    } 
	    elseif(preg_match('/Netscape/i',$u_agent)) 
	    { 
	        $bname = 'Netscape'; 
	        $ub = "Netscape"; 
	    } 
	    
	    // finally get the correct version number
	    $known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
	        // we have no matching number just continue
	    }
	    
	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        //we will have two since we are not using 'other' argument yet
	        //see if version is before or after the name
	        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }
	    
	    // check if we have a number
	    if ($version==null || $version=="") {$version="?";}
	    
	    return array(
	        'userAgent' => $u_agent,
	        'name'      => $bname,
	        'version'   => $version,
	        'platform'  => $platform,
	        'pattern'    => $pattern
	    );
	}

	// now try it
	$ua=getBrowser();
	$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
	//echo $yourbrowser;
	if ( $ua['name'] == "Mozilla Firefox" || $ua['name'] == "Internet Explorer" )
	{
		header ("location: Error");
	}
?>
<html>

	<head>
	
		<title>Header Page</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/headerstyle.css" />
		
		<script type = "text/javascript" src ="../JavaScripts/headerAnimate.js"></script>
		
	</head>
	
	<body>
		
		<?php
		
			ob_start();
			
			if (!isset($_SESSION))
				session_start();
			
			$inactive = 300;
			
			if (isset($_SESSION['timeout']))
			{
				$session_life = time() - $_SESSION['timeout']; 
				if($session_life > $inactive)
				{
					session_destroy();
					
					unset($_SESSION['assistant']);
					unset($_SESSION['id']);
					
					//header("Location: index");
					
					echo '
						<script type="text/javascript">
							alert("For Security Reasons you have been Logged-out;\nPlease Log-in Again;");
							window.location = "assistant_login";
						</script>
					';	
				}	
			}
			
		?>
	
		<div id="trustinfo">
		
			<div id="vidyaviharlogo">
			
				<a href="http://www.somaiya.edu/vidyavihar/" title="Somaiya Vidyavihar">
					<img id="vidyaviharlogo" src="../Images/Somaiya_Logo.jpg" />
				</a>
				
			</div>
			
			<div id="trustlogo">
			
				<img id="trustlogo" src="../Images/Trust_Logo.jpeg" />
				
			</div>
			
			<div id="vidyaviharname">
			
				<h1>
					<a href="http://www.somaiya.edu/vidyavihar/" title="Somaiya Vidyavihar">
						Somaiya Vidyavihar
					</a>
				</h1>
				
			</div>
		
		</div>
		
		<div id="collegename">
		
			<h2>
				<a href="http://www.somaiya.edu/vidyavihar/kjsieit" title="K. J. Somaiya Institute of Engineering and information Technology">
					K. J. Somaiya Institute of Engineering and Information Technology
				</a>
			</h2>
		
		</div>
		
		<div id="deptlogin">
		
			<div id="deptname">
			
				<h3>
					<a href="http://www.somaiya.edu/VidyaVihar/kjsieit/academic/department/21/computer_engineering" title="Department of Computer Engineering">
						Department of Computer Engineering
					</a>
				</h3>
				
			</div>
			
			<div id="login">
			
				<?php

					if (isset($_SESSION['assistant']))
					{
						echo '<center>';
							echo '<h3 id="welcome">Welcome, ' . $_SESSION['assistant'] . '</h3>';
						
							echo '<h3 id="signout"><a href="signout" title="Sign out">Sign out</a></h3>';
						echo '</center>';
					}
					else
					{
						echo '<center>&nbsp;</center>';
						echo '<center>&nbsp;</center>';
						echo '<center>&nbsp;</center>';
						echo '<center>&nbsp;</center>';
					}
					
				?>
				<br />
				
			</div>
		
		</div>
		
		<div id="menuinfo">
		
			<table style="width: 100%" bgcolor= "#A80000">
				<tr>
					
					<td align="center" id="menu">
						<font>
							Updates : 
						</font>
					</td>
					<td align="center" width="80%">
						<marquee onmouseover="this.stop();" onmouseout="this.start();">
							<!--font>
								<a href="student" id="menuhover">
									Student
								</a>
							</font-->
						</marquee>
					</td>
				</tr>
			</table>
			
		</div>
	
	</body>

</html>