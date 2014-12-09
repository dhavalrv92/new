<?php
	if ( !isset($_SESSION) )
		session_start();
	
	if ( isset($_SESSION['assistant']) )
	{
		require_once "connect.php";
		mysql_select_db('kjscomp_stock') or die (mysql_error());
		
		$query = "SELECT * FROM stock_part1";
		$result = mysql_query($query) or die (mysql_error());
		$row = mysql_fetch_assoc($result) or die (mysql_error());
	}
	else
	{
		header ("location: assistant_login");
	}
?>
<?php
	if ( isset($_POST['submit']) )
	{
		$submit = $_POST['submit'];
		if ( isset($submit) )
		{
			$lab_no = $_POST['lab_no'];
			$name = $_POST['name'];
			$GI_No = $_POST['GI_No'];
			$invoice_no = $_POST['invoice_no'];
			$challan_no = $_POST['challan_no'];
			$date_receipt = $_POST['date_receipt'];
			$supplier_manufacturer = $_POST['supplier_manufacturer'];
			$description = $_POST['description'];
			$equipment_no = $_POST['equipment_no'];
			$unit = $_POST['unit'];
			$unit_cost = $_POST['unit_cost'];
			$quantity = $_POST['quantity'];
			$amount = $_POST['amount'];
			$remarks = $_POST['remarks'];
			
			require_once "connect.php";
			mysql_select_db('kjscomp_stock') or die (mysql_error());
			
			$query = "INSERT INTO challan_details (lab_no,name,GI_No,invoice_no,challan_no,date_receipt,supplier_manufacturer,description,equipment_no,unit,unit_cost,quantity,amount,remarks) VALUES ('$lab_no','$name','$GI_No','$invoice_no','$challan_no','$date_receipt','$supplier_manufacturer','$description','$equipment_no','$unit','$unit_cost','$quantity','$amount','$remarks');";
			$result = mysql_query($query) or die (mysql_error());
			
			echo '
				<script type="text/javascript">
					alert ("Data Added Successfully");
					window.location.href = "fill_challan_details";
				</script>
			';
			
		}
	} 
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Welcome to KJSIEIT Computer Engineering Department</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/report_topic_style.css" />
		
		<style type="text/css">
			
		</style>
		
		<script type="text/javascript" language="JavaScript">
			function validate()
			{
				if ( document.challan.lab_no.value == "default" )
				{
					document.getElementById('lab_error').style.display = "";
					document.challan.lab_no.focus();
					return false;
				}
				else
					document.getElementById('lab_error').style.display = "none";
				
				return true;
			}
		</script>
		
	</head>
	
	<body>
		
		<?php include "header.php"; ?>
		
		<br />
		<div>
			<div id="leftmargin">
				<?php include "leftmargin.php"; ?>
			</div>
			
			<div id="gap">
			</div>
			
			<div id="middle">
				<center>
					<div id="lab_error" style="color: #FF0000; display: none">
						* Please Choose Lab Number!
					</div>
					<form name="challan" action="fill_challan_details" onsubmit="return (validate());" method="POST">
						<table id="input_tbl">
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Lab Number : </font>
								</td>
								<td id="input">
									<select name="lab_no" onchange="" required>
										<option value="default">Select Lab No.</option>
										<option value="301A">301A</option>
										<option value="301B">301B</option>
										<option value="302A">302A</option>
										<option value="302B">302B</option>
										<option value="602">602</option>
										<option value="603">603</option>
									</select>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Name of Lab : </font>
								</td>
								<td id="input">
									<input type="text" name="name" placeholder="Enter Name of the Lab" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>GI. No. : </font>
								</td>
								<td id="input">
									<input type="text" name="GI_No" placeholder="Enter GI No." required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Invoice No. : </font>
								</td>
								<td id="input">
									<input type="text" name="invoice_no" placeholder="Enter Invoice No." required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Challan No. : </font>
								</td>
								<td id="input">
									<input type="text" name="challan_no" placeholder="Enter Challan No." required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Date of Receipt : </font>
								</td>
								<td id="input">
									<input type="text" name="date_receipt" placeholder="Enter Date of Receipt" onfocus="(this.type='date')" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Supplier/Manufacturer Name : </font>
								</td>
								<td id="input">
									<input type="text" name="supplier_manufacturer" placeholder="Enter Name of Supplier or Manufacturer" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Description : </font>
								</td>
								<td id="input">
									<textarea name="description" style="resize: none;" rows="20" placeholder="Enter Description" required></textarea>
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Equipment No. : </font>
								</td>
								<td id="input">
									<input type="text" name="equipment_no" placeholder="Enter Equipment No. or write NA" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Unit : </font>
								</td>
								<td id="input">
									<input type="text" name="unit" placeholder="Enter No. of Units" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Unit Cost : </font>
								</td>
								<td id="input">
									<input type="text" name="unit_cost" placeholder="Enter Unit Cost" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Quantity : </font>
								</td>
								<td id="input">
									<input type="text" name="quantity" placeholder="Enter Quantity" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Amount : </font>
								</td>
								<td id="input">
									<input type="text" name="amount" placeholder="Enter Total Amount" required />
								</td>
							</tr>
							<tr id="input">
								<td id="input">
									<font id="header4"><font id="required">* </font>Remarks : </font>
								</td>
								<td id="input">
									<textarea name="remarks" style="resize: none;" rows="20" placeholder="Enter Remarks if any or write NA" required></textarea>
								</td>
							</tr>
						</table>
						<br /><br />
						<center>
							<input type="submit" name="submit" value="Save" />
						</center>
					</form>
				</center>
			
			</div>
		
			<div id="rightmargin">
				<?php include "rightmargin.php"; ?>
			</div>
			
		</div>
		
		<br /><br />
		
		<?php
			include "footer.html";
		?>
		
	</body>
	
</html>