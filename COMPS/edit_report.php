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
	$grid["caption"] = "Topic-wise Report";
	$grid["multiselect"] = TRUE;
	$grid["autofilter"] = FALSE;
	$grid["width"] = "1200";
	$grid["height"] = "500";
	$g->set_options($grid);
	
	if( (!empty($_POST["dateFrom"])) && (!empty($_POST["dateTo"])) ) 
	{
		$_SESSION["dateFrom"]=$_POST["dateFrom"];
		$_SESSION["dateTo"]=$_POST["dateTo"];
	}
	
	$name = $_SESSION['fullname'];
	$dateFrom = $_SESSION["dateFrom"];
	$dateTo = $_SESSION["dateTo"];
	
	// set database table for CRUD operations
	//$g->table = "topicreport";
	
	// subqueries are also supported now (v1.2)
	$g->select_command = "SELECT * FROM topicreport WHERE fac_name='$name' AND (date BETWEEN '$dateFrom' AND '$dateTo')";
	
	$col1 = array();
	$col1["title"] = "Sr No."; // caption of column
	$col1["name"] = "sr_no"; // grid column name, same as db field or alias from sql
	$col1["width"] = "10"; // width on grid
	$col1["editable"] = FALSE;
	//$cols1[] = $col1;
	
	$col2 = array();
	$col2["title"] = "Faculty Name"; // caption of column
	$col2["name"] = "fac_name"; // grid column name, same as db field or alias from sql
	$col2["width"] = "15"; // width on grid
	$col2["editable"] = TRUE;
	$col2["edittype"] = "textarea"; 
	$col2["editoptions"] = array("rows"=>4, "cols"=>10);
	
	$col3 = array();
	$col3["title"] = "Date"; // caption of column
	$col3["name"] = "date"; // grid column name, same as db field or alias from sql
	$col3["width"] = "13"; // width on grid
	$col3["editable"] = TRUE;
	$col3["edittype"] = "textarea"; 
	$col3["editoptions"] = array("rows"=>2, "cols"=>8);
	
	$col4 = array();
	$col4["title"] = "Day"; // caption of column
	$col4["name"] = "day"; // grid column name, same as db field or alias from sql
	$col4["width"] = "13"; // width on grid
	$col4["editable"] = TRUE;
	$col4["edittype"] = "textarea"; 
	$col4["editoptions"] = array("rows"=>2, "cols"=>8);
	
	$col5 = array();
	$col5["title"] = "Theory Subject"; // caption of column
	$col5["name"] = "sub_th"; // grid column name, same as db field or alias from sql
	$col5["width"] = "17"; // width on grid
	$col5["editable"] = TRUE;
	$col5["edittype"] = "textarea"; 
	$col5["editoptions"] = array("rows"=>4, "cols"=>10);
	
	$col6 = array();
	$col6["title"] = "Theory Topics"; // caption of column
	$col6["name"] = "topic_th"; // grid column name, same as db field or alias from sql
	$col6["width"] = "25"; // width on grid
	$col6["editable"] = TRUE;
	$col6["edittype"] = "textarea"; 
	$col6["editoptions"] = array("rows"=>5, "cols"=>18);
	
	$col7 = array();
	$col7["title"] = "Lecture Time"; // caption of column
	$col7["name"] = "lec_time"; // grid column name, same as db field or alias from sql
	$col7["width"] = "15"; // width on grid
	$col7["editable"] = TRUE;
	$col7["edittype"] = "textarea"; 
	$col7["editoptions"] = array("rows"=>4, "cols"=>10);
	
	$col8 = array();
	$col8["title"] = "Practicle Subject"; // caption of column
	$col8["name"] = "sub_pr"; // grid column name, same as db field or alias from sql
	$col8["width"] = "17"; // width on grid
	$col8["editable"] = TRUE;
	$col8["edittype"] = "textarea"; 
	$col8["editoptions"] = array("rows"=>4, "cols"=>10);
	
	$col9 = array();
	$col9["title"] = "Practical Topics"; // caption of column
	$col9["name"] = "topic_pr"; // grid column name, same as db field or alias from sql
	$col9["width"] = "25"; // width on grid
	$col9["editable"] = TRUE;
	$col9["edittype"] = "textarea"; 
	$col9["editoptions"] = array("rows"=>5, "cols"=>18);
	
	$col10 = array();
	$col10["title"] = "Batch"; // caption of column
	$col10["name"] = "batch"; // grid column name, same as db field or alias from sql
	$col10["width"] = "6"; // width on grid
	$col10["editable"] = TRUE;
	/*$col10["edittype"] = "textarea"; 
	$col10["editoptions"] = array("rows"=>4, "cols"=>4);*/
	
	$col11 = array();
	$col11["title"] = "Practical Time"; // caption of column
	$col11["name"] = "pr_time"; // grid column name, same as db field or alias from sql
	$col11["width"] = "14"; // width on grid
	$col11["editable"] = TRUE;
	$col11["edittype"] = "textarea"; 
	$col11["editoptions"] = array("rows"=>4, "cols"=>7);
	
	$col12 = array();
	$col12["title"] = "Remark"; // caption of column
	$col12["name"] = "remark"; // grid column name, same as db field or alias from sql
	$col12["width"] = "10"; // width on grid
	$col12["editable"] = TRUE;
	$col12["edittype"] = "textarea"; 
	$col12["editoptions"] = array("rows"=>5, "cols"=>5);
	
	$col13 = array();
	$col13["title"] = "Action";
	$col13["name"] = "act";
	$col13["width"] = "15";
	
	$cols = array($col1 , $col2 , $col3 , $col4 , $col5 , $col6, $col7 , $col8 , $col9 , $col10 , $col11 , $col12 , $col13);
	
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