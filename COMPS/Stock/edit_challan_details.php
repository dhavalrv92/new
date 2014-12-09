<?php
	if (!isset($_SESSION))
		session_start();
	
	if ( isset($_SESSION['assistant']) )
	{
		require_once "connect.php";
		mysql_select_db('kjscomp_stock') or die (mysql_error());
	}
	else
	{
		header ("location: assistant_login");
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
	//mysql_select_db('kjscomp_stock') or die (mysql_error());

	// set your db encoding -- for ascent chars (if required)
	mysql_query("SET NAMES 'utf8'");

	// include and create object
	include("../phpgrid/inc/jqgrid_dist.php");
	$g = new jqgrid();

	// set few params
	$grid["caption"] = "Challan Details";
	$grid["multiselect"] = TRUE;
	$grid["autofilter"] = FALSE;
	$grid["width"] = "1280";
	$grid["height"] = "720";
	$g->set_options($grid);
	
	// set database table for CRUD operations
	$g->table = "kjscomp_stock.challan_details";
	
	// subqueries are also supported now (v1.2)
	$g->select_command = "SELECT * FROM kjscomp_stock.challan_details";
	
	// render grid
	$out = $g->render("list1");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<!--link rel="stylesheet" type="text/css" href="CSS Files/basic_style.css" /-->
		
		<link rel="stylesheet" type="text/css" media="screen" href="../phpgrid/js/themes/redmond/jquery-ui.custom.css"></link>	
		<link rel="stylesheet" type="text/css" media="screen" href="../phpgrid/js/jqgrid/css/ui.jqgrid.css"></link>	
	
		<script src="../phpgrid/js/jquery.min.js" type="text/javascript"></script>
		<script src="../phpgrid/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
		<script src="../phpgrid/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
		<script src="../phpgrid/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
		
		<script type = "text/javascript">						

			/*$("button").click(function ()
			{
				var str="";
				$("tr").each(function()
				{
					$(this).find("td").each(function()
					{
						str=str+$(this).html()+"\t";
					});
					str=str+"\n";
				});
				alert(str);
				window.open("data:application/vnd.ms-excel," + encodeURIComponent(str));
			});*/
		function gotoback() 
		{
    			window.location.href = "select_report_topic";
		}
		
	</script>
	
	<style>
		.ui-jqgrid tr.jqgrow td 
		{
		    vertical-align: top;
		    white-space: normal !important;
		    padding:2px 5px;
		}
		
		/*#middle {
			display: inline-block;
			width: 56%;
		}*/
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
						
						/*echo '
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
						';*/
								
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