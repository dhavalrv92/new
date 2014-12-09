<?php
	if (!isset($_SESSION))
		session_start();
	if ( (isset($_SESSION['sid'])) && ($_SESSION['role'] == "faculty") )
	{
	}
	else
	{
		echo '
			<script type="text/javascript">
				alert ("* Please Login as Faculty First!");
				window.location.href = "index";
			</script>
		';
	}
?>
<?php
	/**
 	 * PHP Grid Component
	 *
	 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
	 * @version 1.4.6
	 * @license: see license.txt included in package
	 */
 	if (!isset($_SESSION))
		session_start();
	
	require_once "connect.php";

	// set your db encoding -- for ascent chars (if required)
	mysql_query("SET NAMES 'utf8'");

	// include and create object
	include("phpgrid/inc/jqgrid_dist.php");
	$g = new jqgrid();

	// set few params
	$grid["caption"] = "Guest Lecture Details";
	$grid["multiselect"] = TRUE;
	$grid["autofilter"] = FALSE;
	$grid["width"] = "1200";
	$grid["height"] = "500";
	$g->set_options($grid);
	
	if (isset($_SESSION['fullname']))
		$faculty_name = $_SESSION['fullname'];
	
	// set database table for CRUD operations
	$g->table = "guest_lecture";
	
	// subqueries are also supported now (v1.2)
	$g->select_command = "SELECT * FROM guest_lecture WHERE faculty_name='$faculty_name'";
	
	$col1 = array();
	$col1["title"] = "Time Stamp"; // caption of column
	$col1["name"] = "sr_no"; // grid column name, same as db field or alias from sql
	$col1["editable"] = FALSE;
	
	$col2 = array();
	$col2["title"] = "Name of Speaker"; // caption of column
	$col2["name"] = "speaker_name"; // grid column name, same as db field or alias from sql
	$col2["editable"] = TRUE;

	$col3 = array();
	$col3["title"] = "Date"; // caption of column
	$col3["name"] = "date"; // grid column name, same as db field or alias from sql
	$col3["editable"] = TRUE;
	
	$col4 = array();
	$col4["title"] = "Topic/s Covered"; // caption of column
	$col4["name"] = "topic_name"; // grid column name, same as db field or alias from sql
	$col4["editable"] = TRUE;
	
	$cols = array($col1,$col2,$col3,$col4);
	
	$grid["sortname"] = 'date'; // by default sort grid by this field
	$grid["sortorder"] = "ASC"; // ASC or DESC
	$g->set_options($grid);

	// pass the cooked columns to grid
	$g->set_columns($cols);
	
	// render grid
	$out = $g->render("list1");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<!--link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" /-->
		
		<link rel="stylesheet" type="text/css" media="screen" href="phpgrid/js/themes/redmond/jquery-ui.custom.css"></link>	
		<link rel="stylesheet" type="text/css" media="screen" href="phpgrid/js/jqgrid/css/ui.jqgrid.css"></link>	
	
		<script src="phpgrid/js/jquery.min.js" type="text/javascript"></script>
		<script src="phpgrid/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
		<script src="phpgrid/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
		<script src="phpgrid/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
		
		<script type = "text/javascript">						
			function gotoback() 
			{
	    		window.location.href = "retrieve_guest_lecture";
			}
		</script>
	
	<style>
		.ui-jqgrid tr.jqgrow td 
		{
		    vertical-align: top;
		    white-space: normal !important;
		    padding:2px 5px;
		}
	</style>
		
	</head>
	
	<body>
		
		<?php include "header.php"; ?>
		
		<br />
		
		<div>
		
			<div id="middle">
			
				<div align="center" width="20%" style="margin:10px">
				
					<?php
						
						echo '
							<center>' . $out . '</center>
						';
						
						echo '
							<br />
							<br />
							<div>
								<center>	
									<table width="100%">
										<tr width="100%">
											<td align="center" width="100%">
												<input type="button" name="backbtn" id="backbtn" value="<< Back" onClick="gotoback();" />
											</td>
										</tr>
									</table>
								</center>
							</div>
						';
								
					?>
				</div>	
			
			</div>
		
		</div>
		
		<br />
		
		<br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>