<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['student']))
	{
		require_once "connect.php";
		
		$reg_no = $_SESSION['id'];
		$query = "SELECT course FROM student_personal WHERE reg_no='$reg_no'";
		$result = mysql_query($query) or die (mysql_error());
		$row = mysql_fetch_assoc($result) or die (mysql_error());
		if ( empty($row['course']) )
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
	/*if (isset($_POST['update_sem_1']))
	{
		$submit = $_POST['update_sem_1'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_1'];
				$maths_I = $_POST['maths_I'];
				$physics_I = $_POST['physics_I'];
				$chemistry_I = $_POST['chemistry_I'];
				$mechanics = $_POST['mechanics'];
				$bee = $_POST['bee'];
				$cp_I = $_POST['cp_I'];
				$workshop_I = $_POST['workshop_I'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem1 = "UPDATE proctor_rev_sem_i SET maths_I='$maths_I',physics_I='$physics_I',chemistry_I='$chemistry_I',mechanics='$mechanics',bee='$bee',cp_I='$cp_I',workshop_I='$workshop_I' WHERE student_id='$reg_no'";
				$result_sem1 = mysql_query($query_sem1) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_1'];
				$maths_I = $_POST['maths_I'];
				$physics_I = $_POST['physics_I'];
				$chemistry_I = $_POST['chemistry_I'];
				$mechanics = $_POST['mechanics'];
				$bee = $_POST['bee'];
				$es = $_POST['es'];
				$workshop_I = $_POST['workshop_I'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem1 = "UPDATE proctor_new_sem_i SET maths_I='$maths_I',physics_I='$physics_I',chemistry_I='$chemistry_I',mechanics='$mechanics',bee='$bee',es='$es',workshop_I='$workshop_I' WHERE student_id='$reg_no'";
				$result_sem1 = mysql_query($query_sem1) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_2']))
	{
		$submit = $_POST['update_sem_2'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				//$faculty_name = $_POST['faculty_name_2'];
				$maths_II = $_POST['maths_II'];
				$physics_II = $_POST['physics_II'];
				$chemistry_II = $_POST['chemistry_II'];
				$comm_skills = $_POST['comm_skills'];
				$engg_drawing = $_POST['engg_drawing'];
				$cp_II = $_POST['cp_II'];
				$workshop_II = $_POST['workshop_II'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem2 = "UPDATE proctor_rev_sem_ii SET maths_II='$maths_II',physics_II='$physics_II',chemistry_II='$chemistry_II',comm_skills='$comm_skills',engg_drawing='$engg_drawing',cp_II='$cp_II',workshop_II='$workshop_II' WHERE student_id='$reg_no'";
				$result_sem2 = mysql_query($query_sem2) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_2'];
				$maths_II = $_POST['maths_II'];
				$physics_II = $_POST['physics_II'];
				$chemistry_II = $_POST['chemistry_II'];
				$engg_drawing = $_POST['engg_drawing'];
				$spa = $_POST['spa'];
				$comm_skills = $_POST['comm_skills'];
				$workshop_II = $_POST['workshop_II'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem2 = "UPDATE proctor_rev_sem_ii SET maths_II='$maths_II',physics_II='$physics_II',chemistry_II='$chemistry_II',engg_drawing='$engg_drawing',spa='$spa',comm_skills='$comm_skills',workshop_II='$workshop_II' WHERE student_id='$reg_no'";
				$result_sem2 = mysql_query($query_sem2) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else */if (isset($_POST['update_sem_3']))
	{
		$submit = $_POST['update_sem_3'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				$maths_III_th = $_POST['maths_III_th'];
				$maths_III_tw = $_POST['maths_III_tw'];
				$edlc_th = $_POST['edlc_th'];
				$edlc_tw = $_POST['edlc_tw'];
				$edlc_pr = $_POST['edlc_pr'];
				$dsgt_th = $_POST['dsgt_th'];
				$dsgt_tw = $_POST['dsgt_tw'];
				$dlda_th = $_POST['dlda_th'];
				$dlda_tw = $_POST['dlda_tw'];
				$dsf_th = $_POST['dsf_th'];
				$dsf_tw = $_POST['dsf_tw'];
				$dsf_pr = $_POST['dsf_pr'];
				$coa_th = $_POST['coa_th'];
				$coa_tw = $_POST['coa_tw'];
				$pct_tw = $_POST['pct_tw'];
				$total = $maths_III_th+$maths_III_tw+$edlc_th+$edlc_tw+$edlc_pr+$dsgt_th+$dsgt_tw+$dlda_th+$dlda_tw+$dsf_th+$dsf_tw+$dsf_pr+$coa_th+$coa_tw+$pct_tw;
				
				require_once "connect.php";
				
				$query_sem3 = "UPDATE rev_sem_iii SET maths_III_th='$maths_III_th',maths_III_tw='$maths_III_tw',edlc_th='$edlc_th',edlc_tw='$edlc_tw',edlc_pr='$edlc_pr',dsgt_th='$dsgt_th',dsgt_tw='$dsgt_tw',dlda_th='$dlda_th',dlda_tw='$dlda_tw',dsf_th='$dsf_th',dsf_tw='$dsf_tw',dsf_pr='$dsf_pr',coa_th='$coa_th',coa_tw='$coa_tw',pct_tw='$pct_tw',total='$total' WHERE student_id='$reg_no'";
				$result_sem3 = mysql_query($query_sem3) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_3'];
				$maths_III_th = $_POST['maths_III_th'];
				$oopm = $_POST['oopm'];
				$ds = $_POST['ds'];
				$dlda_th = $_POST['dlda_th'];
				$dis = $_POST['dis'];
				$eccf = $_POST['eccf'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem3 = "UPDATE proctor_new_sem_iii SET maths_III_th='$maths_III_th',oopm='$oopm',ds='$ds',dlda_th='$dlda_th',dis='$dis',eccf='$eccf' WHERE student_id='$reg_no'";
				$result_sem3 = mysql_query($query_sem3) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_4']))
	{
		$submit = $_POST['update_sem_4'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				$maths_IV_th = $_POST['maths_IV_th'];
				$maths_IV_tw = $_POST['maths_IV_tw'];
				$adc_th = $_POST['adc_th'];
				$adc_tw = $_POST['adc_tw'];
				$dbms_th = $_POST['dbms_th'];
				$dbms_tw = $_POST['dbms_tw'];
				$dbms_pr = $_POST['dbms_pr'];
				$cg_th = $_POST['cg_th'];
				$cg_tw = $_POST['cg_tw'];
				$cg_pr = $_POST['cg_pr'];
				$aoad_th = $_POST['aoad_th'];
				$aoad_tw = $_POST['aoad_tw'];
				$aoad_pr = $_POST['aoad_pr'];
				$os_th = $_POST['os_th'];
				$os_tw = $_POST['os_tw'];
				$os_pr = $_POST['os_pr'];
				$total = $maths_IV_th+$maths_IV_tw+$adc_th+$adc_tw+$dbms_th+$dbms_tw+$dbms_pr+$cg_th+$cg_tw+$cg_pr+$aoad_th+$aoad_tw+$aoad_pr+$os_th+$os_tw+$os_pr;
				
				require_once "connect.php";
				
				$query_sem4 = "UPDATE rev_sem_iv SET maths_IV_th = '$maths_IV_th',maths_IV_tw = '$maths_IV_tw',adc_th = '$adc_th',adc_tw = '$adc_tw',dbms_th = '$dbms_th',dbms_tw = '$dbms_tw',dbms_pr = '$dbms_pr',cg_th = '$cg_th',cg_tw = '$cg_tw',cg_pr = '$cg_pr',aoad_th = '$aoad_th',aoad_tw = '$aoad_tw',aoad_pr = '$aoad_pr',os_th = '$os_th',os_tw = '$os_tw',os_pr = '$os_pr',total='$total' WHERE student_id='$reg_no'";
				$result_sem4 = mysql_query($query_sem4) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				//$faculty_name = $_POST['faculty_name_4'];
				$maths_IV_th = $_POST['maths_IV_th'];
				$aoa = $_POST['aoa'];
				$coa_th = $_POST['coa_th'];
				$dbms = $_POST['dbms'];
				$tcs = $_POST['tcs'];
				$cg = $_POST['cg'];
				
				require_once "connect.php";
				mysql_select_db("kjscomp_proctor") or die (mysql_error());
				
				$query_sem4 = "UPDATE proctor_rev_sem_iv SET maths_IV_th='$maths_IV_th',aoa='$aoa',coa_th='$coa_th',dbms='$dbms',tcs='$tcs',cg='$cg' WHERE student_id='$reg_no'";
				$result_sem4 = mysql_query($query_sem4) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
		}
	}
	else if (isset($_POST['update_sem_5']))
	{
		$submit = $_POST['update_sem_5'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				$cn_th = $_POST['cn_th'];
				$cn_tw = $_POST['cn_tw'];
				$cn_pr = $_POST['cn_pr'];
				$adbms_th = $_POST['adbms_th'];
				$adbms_tw = $_POST['adbms_tw'];
				$adbms_pr = $_POST['adbms_pr'];
				$mp_th = $_POST['mp_th'];
				$mp_tw = $_POST['mp_tw'];
				$mp_pr = $_POST['mp_pr'];
				$tcs_th = $_POST['tcs_th'];
				$tcs_tw = $_POST['tcs_tw'];
				$we_th = $_POST['we_th'];
				$we_tw = $_POST['we_tw'];
				$we_pr = $_POST['we_pr'];
				$evs_th = $_POST['evs_th'];
				$evs_tw = $_POST['evs_tw'];
				$total = $cn_th+$cn_tw+$cn_pr+$adbms_th+$adbms_tw+$adbms_pr+$mp_th+$mp_tw+$mp_pr+$tcs_th+$tcs_tw+$we_th+$we_tw+$we_pr+$evs_th+$evs_tw;
				
				require_once "connect.php";
				
				$query_sem5 = "UPDATE rev_sem_v SET cn_th='$cn_th',cn_tw='$cn_tw',cn_pr='$cn_pr',adbms_th='$adbms_th',adbms_tw='$adbms_tw',adbms_pr='$adbms_pr',mp_th='$mp_th',mp_tw='$mp_tw',mp_pr='$mp_pr',tcs_th='$tcs_th',tcs_tw='$tcs_tw',we_th='$we_th',we_tw='$we_tw',we_pr='$we_pr',evs_th='$evs_th',evs_tw='$evs_tw',total='$total' WHERE student_id='$reg_no'";				
				$result_sem5 = mysql_query($query_sem5) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
	else if (isset($_POST['update_sem_6']))
	{
		$submit = $_POST['update_sem_6'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				$acn_th = $_POST['acn_th'];
				$acn_tw = $_POST['acn_tw'];
				$acn_pr = $_POST['acn_pr'];
				$spcc_th = $_POST['spcc_th'];
				$spcc_tw = $_POST['spcc_tw'];
				$spcc_pr = $_POST['spcc_pr'];
				$oose_th = $_POST['oose_th'];
				$oose_tw = $_POST['oose_tw'];
				$oose_pr = $_POST['oose_pr'];
				$amp_th = $_POST['amp_th'];
				$amp_tw = $_POST['amp_tw'];
				$amp_pr = $_POST['amp_pr'];
				$dwm_th = $_POST['dwm_th'];
				$dwm_tw = $_POST['dwm_tw'];
				$dwm_pr = $_POST['dwm_pr'];
				$seminar_tw = $_POST['seminar_tw'];
				$seminar_pr = $_POST['seminar_pr'];
				$total = $acn_th+$acn_tw+$acn_pr+$spcc_th+$spcc_tw+$spcc_pr+$oose_th+$oose_tw+$oose_pr+$amp_th+$amp_tw+$amp_pr+$dwm_th+$dwm_tw+$dwm_pr+$seminar_tw+$seminar_pr;
				
				require_once "connect.php";
				
				$query_sem6 = "UPDATE rev_sem_vi SET acn_th='$acn_th',acn_tw='$acn_tw',acn_pr='$acn_pr',spcc_th='$spcc_th',spcc_tw='$spcc_tw',spcc_pr='$spcc_pr',oose_th='$oose_th',oose_tw='$oose_tw',oose_pr='$oose_pr',amp_th='$amp_th',amp_tw='$amp_tw',amp_pr='$amp_pr',dwm_th='$dwm_th',dwm_tw='$dwm_tw',dwm_pr='$dwm_pr',seminar_tw='$seminar_tw',seminar_pr='$seminar_pr',total='$total' WHERE student_id='$reg_no'";
				$result_sem6 = mysql_query($query_sem6) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
	else if (isset($_POST['update_sem_7']))
	{
		$submit = $_POST['update_sem_7'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				$dsip_th = $_POST['dsip_th'];
				$dsip_tw = $_POST['dsip_tw'];
				$dsip_pr = $_POST['dsip_pr'];
				$rai_th = $_POST['rai_th'];
				$rai_tw = $_POST['rai_tw'];
				$rai_pr = $_POST['rai_pr'];
				$mc_th = $_POST['mc_th'];
				$mc_tw = $_POST['mc_tw'];
				$mc_pr = $_POST['mc_pr'];
				$ss_th = $_POST['ss_th'];
				$ss_tw = $_POST['ss_tw'];
				$ss_pr = $_POST['ss_pr'];
				$elective_I_th = $_POST['elective_I_th'];
				$elective_I_tw = $_POST['elective_I_tw'];
				$elective_I_pr = $_POST['elective_I_pr'];
				$project_I_tw = $_POST['project_I_tw'];
				$project_I_pr = $_POST['project_I_pr'];
				$total = $dsip_th+$dsip_tw+$dsip_pr+$rai_th+$rai_tw+$rai_pr+$mc_th+$mc_tw+$mc_pr+$ss_th+$ss_tw+$ss_pr+$elective_I_th+$elective_I_tw+$elective_I_pr+$project_I_tw+$project_I_pr;
				$elective_I = $_POST['elective_I'];
				
				require_once "connect.php";
				
				$query_sem7 = "UPDATE rev_sem_vii SET dsip_th='$dsip_th',dsip_tw='$dsip_tw',dsip_pr='$dsip_pr',rai_th='$rai_th',rai_tw='$rai_tw',rai_pr='$rai_pr',mc_th='$mc_th',mc_tw='$mc_tw',mc_pr='$mc_pr',ss_th='$ss_th',ss_tw='$ss_tw',ss_pr='$ss_pr',elective_I_th='$elective_I_th',elective_I_tw='$elective_I_tw',elective_I_pr='$elective_I_pr',project_I_tw='$project_I_tw',project_I_pr='$project_I_pr',total='$total' WHERE student_id='$reg_no'"; 
				$result_sem7 = mysql_query($query_sem7) or die (mysql_error());
				
				$query_subject = "UPDATE rev_elective SET elective_VII='$elective_I' WHERE student_id='$reg_no'";
				$result_subject = mysql_query($query_subject) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
	else if (isset($_POST['update_sem_8']))
	{
		$submit = $_POST['update_sem_8'];
		if ($submit)
		{
			$course = $row['course'];
			if ( $course == "Revised" )
			{
				$dc_th = $_POST['dc_th'];
				$dc_tw = $_POST['dc_tw'];
				$dc_pr = $_POST['dc_pr'];
				$msd_th = $_POST['msd_th'];
				$msd_tw = $_POST['msd_tw'];
				$msd_pr = $_POST['msd_pr'];
				$sa_th = $_POST['sa_th'];
				$sa_tw = $_POST['sa_tw'];
				$sa_pr = $_POST['sa_pr'];
				$elective_II_th = $_POST['elective_II_th'];
				$elective_II_tw = $_POST['elective_II_tw'];
				$elective_II_pr = $_POST['elective_II_pr'];
				$project_II_tw = $_POST['project_II_tw'];
				$project_II_pr = $_POST['project_II_pr'];
				$total = $dc_th+$dc_tw+$dc_pr+$msd_th+$msd_tw+$msd_pr+$sa_th+$sa_tw+$sa_pr+$elective_II_th+$elective_II_tw+$elective_II_pr+$project_II_tw+$project_II_pr; 
				$elective_II = $_POST['elective_II'];

				require_once "connect.php";
				
				$query_sem8 = "UPDATE rev_sem_viii SET dc_th='$dc_th',dc_tw='$dc_tw',dc_pr='$dc_pr',msd_th='$msd_th',msd_tw='$msd_tw',msd_pr='$msd_pr',sa_th='$sa_th',sa_tw='$sa_tw',sa_pr='$sa_pr',elective_II_th='$elective_II_th',elective_II_tw='$elective_II_tw',elective_II_pr='$elective_II_pr',project_II_tw='$project_II_tw',project_II_pr='$project_II_pr',total='$total' WHERE student_id='$reg_no'";
				$result_sem8 = mysql_query($query_sem8) or die (mysql_error());
				
				$query_subject = "UPDATE rev_elective SET elective_VIII='$elective_II' WHERE student_id='$reg_no'";
				$result_subject = mysql_query($query_subject) or die (mysql_error());
				if (!mysql_error())
				{
					echo '
						<script type="text/javascript">
							alert ("* Data Successfully Updated!");
							window.loation.href = "proctor_select_sem";
						</script>
					';
				}
			}
			else if ( $course == "New" )
			{
				
			}
		}
	}
?>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/basic_style.css" />
		
		<script type="text/javascript">
			function validate()
			{
				if (	document.choose_sem.semester[0].checked==false &&
						document.choose_sem.semester[1].checked==false &&
						document.choose_sem.semester[2].checked==false &&
						document.choose_sem.semester[3].checked==false &&
						document.choose_sem.semester[4].checked==false &&
						document.choose_sem.semester[5].checked==false &&
						document.choose_sem.semester[6].checked==false &&
						document.choose_sem.semester[7].checked==false
					)
				{
					document.getElementById("sem_error").style.display = "";
					return false;
				}
				else
					document.getElementById("sem_error").style.display = "none";
				
				return true;
			}
			
			/*function update_total()
			{
				var sem_III = document.sem_III;
				sem_III.total.value = sem_III.maths_III_th.value+sem_III.maths_III_tw.value+sem_III.maths_III_pr.value;
				
				return true;
			}*/
			
			/*function validate_1()
			{
				if ( document.sem_I.faculty_name_1.value == "default" )
				{
					document.getElementById("sem1_error").style.display = "";
					document.sem_I.faculty_name_1.focus();
					return false;
				}
				else
					document.getElementById("sem1_error").style.display = "none";
				
				return true;
			}
			function validate_2()
			{
				if ( document.sem_II.faculty_name_2.value == "default" )
				{
					document.getElementById("sem2_error").style.display = "";
					document.sem_II.faculty_name_2.focus();
					return false;
				}
				else
					document.getElementById("sem2_error").style.display = "none";
				
				return true;
			}
			function validate_3()
			{
				if ( document.sem_III.faculty_name_3.value == "default" )
				{
					document.getElementById("sem3_error").style.display = "";
					document.sem_III.faculty_name_3.focus();
					return false;
				}
				else
					document.getElementById("sem3_error").style.display = "none";
				
				return true;
			}
			function validate_4()
			{
				if ( document.sem_IV.faculty_name_4.value == "default" )
				{
					document.getElementById("sem4_error").style.display = "";
					document.sem_IV.faculty_name_4.focus();
					return false;
				}
				else
					document.getElementById("sem4_error").style.display = "none";
				
				return true;
			}
			function validate_5()
			{
				if ( document.sem_V.faculty_name_5.value == "default" )
				{
					document.getElementById("sem5_error").style.display = "";
					document.sem_V.faculty_name_5.focus();
					return false;
				}
				else
					document.getElementById("sem5_error").style.display = "none";
				
				return true;
			}
			function validate_6()
			{
				if ( document.sem_VI.faculty_name_6.value == "default" )
				{
					document.getElementById("sem6_error").style.display = "";
					document.sem_VI.faculty_name_6.focus();
					return false;
				}
				else
					document.getElementById("sem6_error").style.display = "none";
				
				return true;
			}
			function validate_7()
			{
				if ( document.sem_VII.faculty_name_7.value == "default" )
				{
					document.getElementById("sem7_error").style.display = "";
					document.sem_VII.faculty_name_7.focus();
					return false;
				}
				else
					document.getElementById("sem7_error").style.display = "none";
				
				return true;
			}
			function validate_8()
			{
				if ( document.sem_VIII.faculty_name_8.value == "default" )
				{
					document.getElementById("sem8_error").style.display = "";
					document.sem_VIII.faculty_name_8.focus();
					return false;
				}
				else
					document.getElementById("sem8_error").style.display = "none";
				
				return true;
			}*/
		</script>
		
		<style type="text/css">
			form input[type="number"]{
				width: 65%;
			}
			.mark_head td {
				width: 10% !important;
				min-width: 10% !important;
				max-width: 10% !important;
				text-align: center;
			}
			.mark_head th {
				width: 70%;
			}
		</style>
		
	</head>
	
	<body>
		
		<?php include "header.php"; ?>
		
		<br />
		
		<div>
		
			<div id="leftmargin">
			
				<?php include "leftmargin.php"; ?>
			
			</div>
			
			<div id="gap"></div>
			
			<div id="middle">
				<center>
					<div id="sem_error" style="color: #FF0000; display: none;">
						<h4 style="color: #FF0000;">
							* Please select the Semester! 
						</h4>
					</div>
				</center>
				<?php
					require_once "connect.php";
					$hide = "SELECT admission_date,admission_year FROM kjscomp_student.student_personal WHERE reg_no='$reg_no'";
					$hide_result = mysql_query($hide) or die (mysql_error());
					$hide_row = mysql_fetch_assoc($hide_result) or die (mysql_error());
					$year1 = explode("-", $hide_row['admission_date']);
					$date = date('Y-m');
					$year2 = explode("-", $date);
				?>
				<form onsubmit="return (validate());" name="choose_sem" action="student_academic" method="POST">
					<center>
						<table>
							<?php
								if ( $hide_row['admission_year'] != "DSE" )
								{
							?>
									<tr>
										<?php
											if ( $date >= $year1[0]."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_I" />Semester I
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+1)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_II" />Semester II
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+1)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_III" />Semester III
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+2)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_IV" />Semester IV
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+2)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_V" />Semester V
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+3)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VI" />Semester VI
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+3)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VII" />Semester VII
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+4)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VIII" />Semester VIII
												</td>
										<?php
											}
										?>
									</tr>
							<?php
								}
								else if ( $hide_row['admission_year'] == "DSE" )
								{
							?>
									<tr>
										<?php
											if ( $date >= ($year1[0])."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_III" />Semester III
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+1)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_IV" />Semester IV
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+1)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_V" />Semester V
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+2)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VI" />Semester VI
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<?php
											if ( $date >= ($year1[0]+2)."-07" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VII" />Semester VII
												</td>
										<?php
											}
										?>
										<?php
											if ( $date >= ($year1[0]+3)."-01" )
											{
										?>
												<td align="center">
													<input type="radio" name="semester" value="sem_VIII" />Semester VIII
												</td>
										<?php
											}
										?>
									</tr>
							<?php
								}
							?>
							<tr>
								<td colspan="3" align="center">
									<input type="submit" value="Proceed" name="submit_sem" />
								</td>
							</tr>
						</table>
					</center>
				</form>
				
				<?php
					if (isset($_POST['submit_sem']))
					{
						$submit = $_POST['submit_sem'];
						$course = $row['course'];
						if ($submit)
						{
							$sem = $_POST['semester'];
							if ( $course == "Revised" )
							{
								/*if ($sem == 'sem_I')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_i WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem1_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_1());" name="sem_I" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_I" min="0" max="100" value="' . $data_row['maths_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_I" min="0" max="100" value="' . $data_row['physics_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-I : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_I" min="0" max="100" value="' . $data_row['chemistry_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Mechnics : </font>
														</th>
														<td id="input">
															<input type="number" name="mechanics" min="0" max="100" value="' . $data_row['mechanics'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Electrical and Electronics Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="bee" min="0" max="100" value="' . $data_row['bee'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Programming-I : </font>
														</th>
														<td id="input">
															<input type="number" name="cp_I" min="0" max="100" value="' . $data_row['cp_I'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-I : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_I" min="0" max="100" value="' . $data_row['workshop_I'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_1" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_II')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_ii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem2_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_2());" name="sem_II" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_II" min="0" max="100" value="' . $data_row['maths_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_II" min="0" max="100" value="' . $data_row['physics_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-II : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_II" min="0" max="100" value="' . $data_row['chemistry_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Communication Skills : </font>
														</th>
														<td id="input">
															<input type="number" name="comm_skills" min="0" max="100" value="' . $data_row['comm_skills'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Drawing : </font>
														</th>
														<td id="input">
															<input type="number" name="engg_drawing" min="0" max="100" value="' . $data_row['engg_drawing'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Programming-II : </font>
														</th>
														<td id="input">
															<input type="number" name="cp_II" min="0" max="100" value="' . $data_row['cp_II'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-II : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_II" min="0" max="100" value="' . $data_row['workshop_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_2" value="Update" />
											</center>
										</form>
									';
								}
								else */if ($sem == 'sem_III')
								{
									$data = "SELECT * FROM rev_sem_iii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result);
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
										</center>
										<form onsubmit="return (validate_3());" name="sem_III" action="student_academic" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-III : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_III_th" min="0" max="100" value="' . $data_row['maths_III_th'] . '" required />/100
														</td>
														<td id="input" width="10%">
															<input type="number" name="maths_III_tw" min="0" max="25" value="' . $data_row['maths_III_tw'] . '" required /> /25
														</td>
														<td id="input" width="10%">
															<input type="number" name="maths_III_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Electronic Devices and Linear Circuits : </font>
														</th>
														<td id="input">
															<input type="number" name="edlc_th" min="0" max="100" value="' . $data_row['edlc_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="edlc_tw" min="0" max="25" value="' . $data_row['edlc_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="edlc_pr" min="0" max="25" value="' . $data_row['edlc_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Discrete Structure & Graph Theory : </font>
														</th>
														<td id="input">
															<input type="number" name="dsgt_th" min="0" max="100" value="' . $data_row['dsgt_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dsgt_tw" min="0" max="25" value="' . $data_row['dsgt_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dsgt_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Logic Design and Application : </font>
														</th>
														<td id="input">
															<input type="number" name="dlda_th" min="0" max="100" value="' . $data_row['dlda_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dlda_tw" min="0" max="25" value="' . $data_row['dlda_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dlda_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Structure and Files : </font>
														</th>
														<td id="input">
															<input type="number" name="dsf_th" min="0" max="100" value="' . $data_row['dsf_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dsf_tw" min="0" max="25" value="' . $data_row['dsf_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dsf_pr" min="0" max="25" value="' . $data_row['dsf_pr'] . '" required /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Organization & Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="coa_th" min="0" max="100" value="' . $data_row['coa_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="coa_tw" min="0" max="25" value="' . $data_row['coa_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="coa_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Presentation and Communication Techniques : </font>
														</th>
														<td id="input">
															<input type="number" name="pct_th" min="0" max="0" value="" required disabled /> ----
														</td>
														<td id="input">
															<input type="number" name="pct_tw" min="0" max="50" value="' . $data_row['pct_tw'] . '" required /> /50
														</td>
														<td id="input">
															<input type="number" name="pct_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr>
														<td colspan="4">
															<br /><br />
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4">Total : </font>
														</th>
														<td id="input" colspan="3">
															<input type="number" name="total" min="0" max="850" value="' . $data_row['total'] . '" required readonly /> / 850
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_3" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_IV')
								{
									$data = "SELECT * FROM rev_sem_iv WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem4_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_4());" name="sem_IV" action="student_academic" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-IV : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_IV_th" min="0" max="100" value="' . $data_row['maths_IV_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="maths_IV_tw" min="0" max="25" value="' . $data_row['maths_IV_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="maths_IV_pr" min="0" max="0" value="" required disabled /> ---			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Analog & Digital Communication : </font>
														</th>
														<td id="input">
															<input type="number" name="adc_th" min="0" max="100" value="' . $data_row['adc_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="adc_tw" min="0" max="25" value="' . $data_row['adc_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="adc_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Database Management System : </font>
														</th>
														<td id="input">
															<input type="number" name="dbms_th" min="0" max="100" value="' . $data_row['dbms_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dbms_tw" min="0" max="25" value="' . $data_row['dbms_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dbms_pr" min="0" max="25" value="' . $data_row['dbms_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Graphics : </font>
														</th>
														<td id="input">
															<input type="number" name="cg_th" min="0" max="100" value="' . $data_row['cg_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="cg_tw" min="0" max="25" value="' . $data_row['cg_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="cg_pr" min="0" max="25" value="' . $data_row['cg_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Analysis of Algorithm & Design : </font>
														</th>
														<td id="input">
															<input type="number" name="aoad_th" min="0" max="100" value="' . $data_row['aoad_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="aoad_tw" min="0" max="25" value="' . $data_row['aoad_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="aoad_pr" min="0" max="25" value="' . $data_row['aoad_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Operating System : </font>
														</th>
														<td id="input">
															<input type="number" name="os_th" min="0" max="100" value="' . $data_row['os_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="os_tw" min="0" max="25" value="' . $data_row['os_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="os_pr" min="0" max="25" value="' . $data_row['os_pr'] . '" required /> /25
														</td>
													</tr>
													<tr>
														<td colspan="4">
															<br /><br />
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4">Total : </font>
														</th>
														<td id="input" colspan="3">
															<input type="number" name="total" min="0" max="850" value="' . $data_row['total'] . '" required readonly /> / 850
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_4" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_V')
								{
									$data = "SELECT * FROM rev_sem_v WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem5_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_5());" name="sem_V" action="student_academic" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="cn_th" min="0" max="100" value="' . $data_row['cn_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="cn_tw" min="0" max="25" value="' . $data_row['cn_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="cn_pr" min="0" max="50" value="' . $data_row['cn_pr'] . '" required /> /50
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Database Management System : </font>
														</th>
														<td id="input">
															<input type="number" name="adbms_th" min="0" max="100" value="' . $data_row['adbms_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="adbms_tw" min="0" max="25" value="' . $data_row['adbms_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="adbms_pr" min="0" max="50" value="' . $data_row['adbms_pr'] . '" required /> /50
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="mp_th" min="0" max="100" value="' . $data_row['mp_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="mp_tw" min="0" max="25" value="' . $data_row['mp_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="mp_pr" min="0" max="25" value="' . $data_row['mp_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Theory of Computer Science : </font>
														</th>
														<td id="input">
															<input type="number" name="tcs_th" min="0" max="100" value="' . $data_row['tcs_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="tcs_tw" min="0" max="25" value="' . $data_row['tcs_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="tcs_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Web Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="we_th" min="0" max="100" value="' . $data_row['we_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="we_tw" min="0" max="25" value="' . $data_row['we_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="we_pr" min="0" max="25" value="' . $data_row['we_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Enviormental Studies : </font>
														</th>
														<td id="input">
															<input type="number" name="evs_th" min="0" max="50" value="' . $data_row['evs_th'] . '" required /> /50
														</td>
														<td id="input">
															<input type="number" name="evs_tw" min="0" max="25" value="' . $data_row['evs_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="evs_pr" min="0" max="0" value="" required disabled /> ---
														</td>
													</tr>
													<tr>
														<td colspan="4">
															<br /><br />
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4">Total : </font>
														</th>
														<td id="input" colspan="3">
															<input type="number" name="total" min="0" max="850" value="' . $data_row['total'] . '" required readonly /> / 850
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_5" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VI')
								{
									$data = "SELECT * FROM rev_sem_vi WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem6_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_6());" name="sem_VI" action="student_academic" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="acn_th" min="0" max="100" value="' . $data_row['acn_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="acn_tw" min="0" max="25" value="' . $data_row['acn_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="acn_pr" min="0" max="50" value="' . $data_row['acn_pr'] . '" required /> /50
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Programming And Compiler Construction : </font>
														</th>
														<td id="input">
															<input type="number" name="spcc_th" min="0" max="100" value="' . $data_row['spcc_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="spcc_tw" min="0" max="25" value="' . $data_row['spcc_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="spcc_pr" min="0" max="25" value="' . $data_row['spcc_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Object Oriented Software Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="oose_th" min="0" max="100" value="' . $data_row['oose_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="oose_tw" min="0" max="25" value="' . $data_row['oose_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="oose_pr" min="0" max="50" value="' . $data_row['oose_pr'] . '" required /> /50
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="amp_th" min="0" max="100" value="' . $data_row['amp_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="amp_tw" min="0" max="25" value="' . $data_row['amp_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="amp_pr" min="0" max="25" value="' . $data_row['amp_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Warehouse And Mining : </font>
														</th>
														<td id="input">
															<input type="number" name="dwm_th" min="0" max="100" value="' . $data_row['dwm_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dwm_tw" min="0" max="25" value="' . $data_row['dwm_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dwm_pr" min="0" max="25" value="' . $data_row['dwm_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Seminar : </font>
														</th>
														<td id="input">
															<input type="number" name="seminar_th" min="0" max="0" value="" required disabled /> ----
														</td>
														<td id="input">
															<input type="number" name="seminar_tw" min="0" max="25" value="' . $data_row['seminar_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="seminar_pr" min="0" max="25" value="' . $data_row['seminar_pr'] . '" required /> /25
														</td>
													</tr>
													<tr>
														<td colspan="4">
															<br /><br />
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4">Total : </font>
														</th>
														<td id="input" colspan="3">
															<input type="number" name="total" min="0" max="850" value="' . $data_row['total'] . '" required readonly /> / 850
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_6" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VII')
								{
									$data = "SELECT * FROM rev_sem_vii WHERE student_id='$reg_no'";
									$result = mysql_query($data) or die (mysql_error());
									$data_row = mysql_fetch_assoc($result);
									
									$elective = "SELECT elective_VII FROM rev_elective WHERE student_id='$reg_no'";
									$elective_result = mysql_query($elective) or die (mysql_error());
									$elective_data = mysql_fetch_assoc($elective_result);
									
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem7_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_7());" name="sem_VII" action="student_academic" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Signal & Image Processing : </font>
														</th>
														<td id="input">
															<input type="number" name="dsip_th" min="0" max="100" value="' . $data_row['dsip_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dsip_tw" min="0" max="25" value="' . $data_row['dsip_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dsip_pr" min="0" max="25" value="' . $data_row['dsip_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Robotics and AI : </font>
														</th>
														<td id="input">
															<input type="number" name="rai_th" min="0" max="100" value="' . $data_row['rai_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="rai_tw" min="0" max="25" value="' . $data_row['rai_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="rai_pr" min="0" max="25" value="' . $data_row['rai_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Mobile Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="mc_th" min="0" max="100" value="' . $data_row['mc_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="mc_tw" min="0" max="25" value="' . $data_row['mc_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="mc_pr" min="0" max="25" value="' . $data_row['mc_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Security : </font>
														</th>
														<td id="input">
															<input type="number" name="ss_th" min="0" max="100" value="' . $data_row['ss_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="ss_tw" min="0" max="25" value="' . $data_row['ss_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="ss_pr" min="0" max="25" value="' . $data_row['ss_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<!--font id="header4"--><font id="required" style="color: #FF0000;">* </font><!--ELective-I : </font-->
															<select name=elective_I required>
																<option value="' . $elective_data['elective_VII'] . '" selected>' . $elective_data['elective_VII'] . '</option>
																<option value=""></option>
																<option value="Computer Simulation and Modeling">Computer Simulation and Modeling</option>
																<option value="E-Commerce">E-Commerce</option>
																<option value="Project Management">Project Management</option>
																<option value="Soft Computing">Soft Computing</option>
															</select>
														</th>
														<td id="input">
															<input type="number" name="elective_I_th" min="0" max="100" value="' . $data_row['elective_I_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="elective_I_tw" min="0" max="25" value="' . $data_row['elective_I_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="elective_I_pr" min="0" max="25" value="' . $data_row['elective_I_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Project I : </font>
														</th>
														<td id="input">
															<input type="number" name="project_I_th" min="0" max="0" value="" required disabled /> ----
														</td>
														<td id="input">
															<input type="number" name="project_I_tw" min="0" max="25" value="' . $data_row['project_I_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="project_I_pr" min="0" max="25" value="' . $data_row['project_I_pr'] . '" required /> /25
														</td>
													</tr>
													<tr>
														<td colspan="4">
															<br /><br />
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4">Total : </font>
														</th>
														<td id="input" colspan="3">
															<input type="number" name="total" min="0" max="800" value="' . $data_row['total'] . '" required readonly /> / 800
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_7" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VIII')
								{
									$data = "SELECT * FROM rev_sem_viii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result);
									
									$elective = "SELECT elective_VIII FROM rev_elective WHERE student_id='$reg_no'";
									$elective_result = mysql_query($elective) or die (mysql_error());
									$elective_data = mysql_fetch_assoc($elective_result);
									
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem8_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_8());" name="sem_VIII" action="student_academic" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Distributed Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="dc_th" min="0" max="100" value="' . $data_row['dc_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="dc_tw" min="0" max="25" value="' . $data_row['dc_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="dc_pr" min="0" max="25" value="' . $data_row['dc_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Multimedia System Design : </font>
														</th>
														<td id="input">
															<input type="number" name="msd_th" min="0" max="100" value="' . $data_row['msd_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="msd_tw" min="0" max="25" value="' . $data_row['msd_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="msd_pr" min="0" max="25" value="' . $data_row['msd_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Software Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="sa_th" min="0" max="100" value="' . $data_row['sa_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="sa_tw" min="0" max="25" value="' . $data_row['sa_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="sa_pr" min="0" max="25" value="' . $data_row['sa_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<!--font id="header4"--><font id="required" style="color: #FF0000;">* </font><!--ELective-I : </font-->
															<select name=elective_II required>
																<option value="' . $elective_data['elective_VIII'] . '" selected>' . $elective_data['elective_VIII'] . '</option>
																<option value=""></option>
																<option value="Human Computing Interaction">Human Computing Interaction</option>
																<option value="Advanced Internet Technology">Advanced Internet Technology</option>
																<option value="Computer Vision">Computer Vision</option>
																<option value="Embeddded System">Embeddded System</option>
															</select>
														</th>
														<td id="input">
															<input type="number" name="elective_II_th" min="0" max="100" value="' . $data_row['elective_II_th'] . '" required />/100
														</td>
														<td id="input">
															<input type="number" name="elective_II_tw" min="0" max="25" value="' . $data_row['elective_II_tw'] . '" required /> /25
														</td>
														<td id="input">
															<input type="number" name="elective_II_pr" min="0" max="25" value="' . $data_row['elective_II_pr'] . '" required /> /25
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Project I : </font>
														</th>
														<td id="input">
															<input type="number" name="project_II_th" min="0" max="0" value="" required disabled /> ----
														</td>
														<td id="input">
															<input type="number" name="project_II_tw" min="0" max="50" value="' . $data_row['project_II_tw'] . '" required /> /50
														</td>
														<td id="input">
															<input type="number" name="project_II_pr" min="0" max="50" value="' . $data_row['project_II_pr'] . '" required /> /50
														</td>
													</tr>
													<tr>
														<td colspan="4">
															<br /><br />
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4">Total : </font>
														</th>
														<td id="input" colspan="3">
															<input type="number" name="total" min="0" max="700" value="' . $data_row['total'] . '" required readonly /> / 700
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_8" value="Update" />
											</center>
										</form>
									';
								}
							}
							else if ( $row['course'] == "New" )
							{
								if ($sem == 'sem_I')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_i WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem1_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_1());" name="sem_I" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_I" min="0" max="100" value="' . $data_row['maths_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-I : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_I" min="0" max="100" value="' . $data_row['physics_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-I : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_I" min="0" max="100" value="' . $data_row['chemistry_I'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Mechnics : </font>
														</th>
														<td id="input">
															<input type="number" name="mechanics" min="0" max="100" value="' . $data_row['mechanics'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Electrical and Electronics Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="bee" min="0" max="100" value="' . $data_row['bee'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Environmental studies : </font>
														</th>
														<td id="input">
															<input type="number" name="es" min="0" max="100" value="' . $data_row['es'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-I : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_I" min="0" max="100" value="' . $data_row['workshop_I'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_1" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_II')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_ii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem2_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_2());" name="sem_II" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_II" min="0" max="100" value="' . $data_row['maths_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Physics-II : </font>
														</th>
														<td id="input">
															<input type="number" name="physics_II" min="0" max="100" value="' . $data_row['physics_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Chemistry-II : </font>
														</th>
														<td id="input">
															<input type="number" name="chemistry_II" min="0" max="100" value="' . $data_row['chemistry_II'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Engineering Drawing : </font>
														</th>
														<td id="input">
															<input type="number" name="engg_drawing" min="0" max="100" value="' . $data_row['engg_drawing'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Structured Programming Approach : </font>
														</th>
														<td id="input">
															<input type="number" name="spa" min="0" max="100" value="' . $data_row['spa'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Communication Skills : </font>
														</th>
														<td id="input">
															<input type="number" name="comm_skills" min="0" max="100" value="' . $data_row['comm_skills'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Basic Workshop and Practice-II : </font>
														</th>
														<td id="input">
															<input type="number" name="workshop_II" min="0" max="100" value="' . $data_row['workshop_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_2" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_III')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_iii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem3_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_3());" name="sem_III" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-III : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_III_th" min="0" max="100" value="' . $data_row['maths_III_th'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Object Oriented Programming Methodology : </font>
														</th>
														<td id="input">
															<input type="number" name="oopm" min="0" max="100" value="' . $data_row['oopm'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Structures : </font>
														</th>
														<td id="input">
															<input type="number" name="ds" min="0" max="100" value="' . $data_row['ds'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Logic Design and Analysis : </font>
														</th>
														<td id="input">
															<input type="number" name="dlda_th" min="0" max="100" value="' . $data_row['dlda_th'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Discrete Structures : </font>
														</th>
														<td id="input">
															<input type="number" name="dis" min="0" max="100" value="' . $data_row['dis'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Electronic Circuits and Communication Fundamentals : </font>
														</th>
														<td id="input">
															<input type="number" name="eccf" min="0" max="100" value="' . $data_row['eccf'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_3" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_IV')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_new_sem_iv WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem4_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_4());" name="sem_IV" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Applied Mathematics-IV : </font>
														</th>
														<td id="input">
															<input type="number" name="maths_IV_th" min="0" max="100" value="' . $data_row['maths_IV_th'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Analysis of Algorithms : </font>
														</th>
														<td id="input">
															<input type="number" name="aoa" min="0" max="100" value="' . $data_row['aoa'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Organization and Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="coa_th" min="0" max="100" value="' . $data_row['coa_th'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Base Management systems : </font>
														</th>
														<td id="input">
															<input type="number" name="dbms" min="0" max="100" value="' . $data_row['dbms'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Theoretical Computer Science : </font>
														</th>
														<td id="input">
															<input type="number" name="tcs" min="0" max="100" value="' . $data_row['tcs'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Graphics : </font>
														</th>
														<td id="input">
															<input type="number" name="cg" min="0" max="100" value="' . $data_row['cg'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_4" value="Update" />
											</center>
										</form>
									';
								}
								/*else if ($sem == 'sem_V')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_v WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem5_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_5());" name="sem_V" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="cn" min="0" max="100" value="' . $data_row['cn'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Database Management System : </font>
														</th>
														<td id="input">
															<input type="number" name="adbms" min="0" max="100" value="' . $data_row['adbms'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="mp" min="0" max="100" value="' . $data_row['mp'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Theory of Computer Science : </font>
														</th>
														<td id="input">
															<input type="number" name="tcs" min="0" max="100" value="' . $data_row['tcs'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Web Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="we" min="0" max="100" value="' . $data_row['we'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Enviormental Studies : </font>
														</th>
														<td id="input">
															<input type="number" name="evs" min="0" max="100" value="' . $data_row['evs'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_5" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VI')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_vi WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem6_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_6());" name="sem_VI" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Computer Network : </font>
														</th>
														<td id="input">
															<input type="number" name="acn" min="0" max="100" value="' . $data_row['acn'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Programming And Compiler Construction : </font>
														</th>
														<td id="input">
															<input type="number" name="spcc" min="0" max="100" value="' . $data_row['spcc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Object Oriented Software Engineering : </font>
														</th>
														<td id="input">
															<input type="number" name="oose" min="0" max="100" value="' . $data_row['oose'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Advance Microprocessor : </font>
														</th>
														<td id="input">
															<input type="number" name="amp" min="0" max="100" value="' . $data_row['amp'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Data Warehouse And Mining : </font>
														</th>
														<td id="input">
															<input type="number" name="dwm" min="0" max="100" value="' . $data_row['dwm'] . '" required />%		
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Seminar : </font>
														</th>
														<td id="input">
															<input type="number" name="seminar" min="0" max="100" value="' . $data_row['seminar'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_6" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VII')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_vii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem7_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_7());" name="sem_VII" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Digital Signal & Image Processing : </font>
														</th>
														<td id="input">
															<input type="number" name="dsip" min="0" max="100" value="' . $data_row['dsip'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Robotics and AI : </font>
														</th>
														<td id="input">
															<input type="number" name="rai" min="0" max="100" value="' . $data_row['rai'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Mobile Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="mc" min="0" max="100" value="' . $data_row['mc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>System Security : </font>
														</th>
														<td id="input">
															<input type="number" name="ss" min="0" max="100" value="' . $data_row['ss'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>ELective-I : </font>
														</th>
														<td id="input">
															<input type="number" name="elective_I" min="0" max="100" value="' . $data_row['elective_I'] . '" required />%		
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_7" value="Update" />
											</center>
										</form>
									';
								}
								else if ($sem == 'sem_VIII')
								{
									mysql_select_db("kjscomp_proctor") or die (mysql_error());
									$data = "SELECT * FROM proctor_rev_sem_viii WHERE student_id='$reg_no'";
									$result = mysql_query($data);
									$data_row = mysql_fetch_assoc($result); 
									echo '
										<br /><br /><br /><br />
										<center>
											<div style="color: #FF0000;">
												<h4 style="color: #FF0000;">
													* All Fields are Mandetory! 
												</h4>
											</div>
											<!--div id="sem8_error" style="color: #FF0000; display: none;">
												<h4 style="color: #FF0000;">
													* Please select the Faculty Name! 
												</h4>
											</div-->
										</center>
										<form onsubmit="return (validate_8());" name="sem_VIII" action="proctor_select_sem" method="POST">
											<center>
												<table width="100%" class="mark_head">
													<tr id="input">
														<th id="input" style="border: 1px solid #000000;">Subject Name</th>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Theory</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Term Work</b></td>
														<td id="input" style="border: 1px solid #000000;" align="center"><b>Practical</b></td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Distributed Computing : </font>
														</th>
														<td id="input">
															<input type="number" name="dc" min="0" max="100" value="' . $data_row['dc'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Multimedia System Design : </font>
														</th>
														<td id="input">
															<input type="number" name="msd" min="0" max="100" value="' . $data_row['msd'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Software Architecture : </font>
														</th>
														<td id="input">
															<input type="number" name="sa" min="0" max="100" value="' . $data_row['sa'] . '" required />%			
														</td>
													</tr>
													<tr id="input">
														<th id="input">
															<font id="header4"><font id="required" style="color: #FF0000;">* </font>Elective-II : </font>
														</th>
														<td id="input">
															<input type="number" name="elective_II" min="0" max="100" value="' . $data_row['elective_II'] . '" required />%			
														</td>
													</tr>
												</table>
												<br />	<br />
												<input type="submit" name="update_sem_8" value="Update" />
											</center>
										</form>
									';
								}*/
							}
						}
					}
				?>
			
			</div>
			
			<div id="rightmargin">
			
				<?php include "rightmargin.php"; ?>
			
			</div>
		
		</div>
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		<?php
			include "footer.html";
		?>
	
	</body>
	
</html>