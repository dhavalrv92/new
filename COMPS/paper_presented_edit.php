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
	$grid["caption"] = "Paper Presented";
	$grid["multiselect"] = TRUE;
	$grid["autofilter"] = FALSE;
	$grid["width"] = "1200";
	$grid["height"] = "500";
	$g->set_options($grid);
	
	if (isset($_SESSION['sid']))
		$id = $_SESSION['sid'];
	
	// set database table for CRUD operations
	$g->table = "papers_presented";
	
	// subqueries are also supported now (v1.2)
	$g->select_command = "SELECT * FROM papers_presented WHERE id='$id'";
	
	$col1 = array();
	$col1["title"] = "ID No."; // caption of column
	$col1["name"] = "id"; // grid column name, same as db field or alias from sql
	$col1["editable"] = FALSE;
	
	$col2 = array();
	$col2["title"] = "Date"; // caption of column
	$col2["name"] = "date"; // grid column name, same as db field or alias from sql
	$col2["editable"] = TRUE;
	
	$col3 = array();
	$col3["title"] = "Title of Paper"; // caption of column
	$col3["name"] = "title"; // grid column name, same as db field or alias from sql
	$col3["editable"] = TRUE;
	
	$col4 = array();
	$col4["title"] = "Place"; // caption of column
	$col4["name"] = "place"; // grid column name, same as db field or alias from sql
	$col4["editable"] = TRUE;
	
	/*$col5 = array();
	$col5["title"] = "Action";
	$col5["name"] = "act";
	$col5["width"] = "15";*/
	
	$cols = array($col1,$col2,$col3,$col4/*,$col5*/);
	
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
	    		window.location.href = "papers_presented";
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