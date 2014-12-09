<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query1 = "SELECT course FROM student_personal WHERE reg_no='$reg_no'";
		$result1 = mysql_query($query1) or die (mysql_error());
		$row1 = mysql_fetch_assoc($result1) or die (mysql_error());
		if ( empty($row1['course']) )
		{
			header("location: student_personal");
		}
	}
	else
	{
		header ("location: student_login");	
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
	$grid["caption"] = "Achievement Details";
	$grid["multiselect"] = TRUE;
	$grid["autofilter"] = FALSE;
	$grid["width"] = "1280";
	$grid["height"] = "720";
	$g->set_options($grid);
	
	$student_id = $_SESSION['id'];
	
	// set database table for CRUD operations
	$g->table = "kjscomp_student.student_achievement";
	
	// subqueries are also supported now (v1.2)
	$g->select_command = "SELECT * FROM kjscomp_student.student_achievement WHERE student_id='$student_id'";
	
	$col1 = array();
	$col1["title"] = "Time Stamp"; // caption of column
	$col1["name"] = "sr_no"; // grid column name, same as db field or alias from sql
	$col1["editable"] = FALSE;
	
	$col2 = array();
	$col2["title"] = "ID No."; // caption of column
	$col2["name"] = "student_id"; // grid column name, same as db field or alias from sql
	$col2["editable"] = FALSE;
	
	$col3 = array();
	$col3["title"] = "Activity Type"; // caption of column
	$col3["name"] = "activity_type"; // grid column name, same as db field or alias from sql
	$col3["editable"] = TRUE;

	$col4 = array();
	$col4["title"] = "Event Date"; // caption of column
	$col4["name"] = "event_date"; // grid column name, same as db field or alias from sql
	$col4["editable"] = TRUE;
	
	$col5 = array();
	$col5["title"] = "Title"; // caption of column
	$col5["name"] = "title"; // grid column name, same as db field or alias from sql
	$col5["editable"] = TRUE;
	
	$col6 = array();
	$col6["title"] = "Place"; // caption of column
	$col6["name"] = "place"; // grid column name, same as db field or alias from sql
	$col6["editable"] = TRUE;
	
	$col7 = array();
	$col7["title"] = "Achievement"; // caption of column
	$col7["name"] = "achievement"; // grid column name, same as db field or alias from sql
	$col7["editable"] = TRUE;
	
	$col8 = array();
	$col8["title"] = "Description"; // caption of column
	$col8["name"] = "description"; // grid column name, same as db field or alias from sql
	$col8["editable"] = TRUE;
	
	$col9 = array();
	$col9["title"] = "Semester"; // caption of column
	$col9["name"] = "semester"; // grid column name, same as db field or alias from sql
	$col9["editable"] = TRUE;
	
	$cols = array($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9);
	
	$grid["sortname"] = 'activity_type'; // by default sort grid by this field
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