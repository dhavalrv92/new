<html>

	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Left Margin</title>
		
		<link rel="stylesheet" type="text/css" href="../CSS Files/rightmarginstyle.css" />
		
		<script src="../JavaScripts/jquery-1.11.0.min.js"></script>
		
		<script>
			$(document).ready(function(){
				$("#stock_show").hide();
				$("#stock_menu").click(function(){
					$("#challan_show").hide('slow');
					$("#history_show").hide('slow');
					$("#stock_show").toggle('slow');
				});
			});
			
			$(document).ready(function(){
				$("#challan_show").hide();
				$("#challan_menu").click(function(){
					$("#stock_show").hide('slow');
					$("#history_show").hide('slow');
					$("#challan_show").toggle('slow');
				});
			});
			
			$(document).ready(function(){
				$("#history_show").hide();
				$("#history_menu").click(function(){
					$("#challan_show").hide('slow');
					$("#stock_show").hide('slow');
					$("#history_show").toggle('slow');
				});
			});
		</script>
	
	</head>
	
	
	<body>
		
		<div id="firstdiv">
			<ul>
				<li>
					<font>
						<a href="javascript:void(0);" id="stock_menu">
							Stock Information Details
						</a>
					</font>
				</li>
			<ul>
		</div>
		<div id="stock_show">
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="stock_verification_new">
										Add Stock Information
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="edit_stock_information">
										Edit Stock Information
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="select_lab">
										Print Stock Information
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	
		<div id="alldiv">
			<ul>
				<li>
					<font>
						<a href="javascript:void(0);" id="challan_menu">
							Challan Details
						</a>
					</font>
				</li>
			<ul>
		</div>
		<div id="challan_show">
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="fill_challan_details">
										Add Challan Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="edit_challan_details" target="_blank">
										Edit Challan Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="select_challan_details_lab" target="_blank">
										Print Challan Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="alldiv">
			<ul>
				<li>
					<font>
						<a href="javascript:void(0);" id="history_menu">
							Equipment History Details
						</a>
					</font>
				</li>
			<ul>
		</div>
		<div id="history_show">
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="amc_new">
										Add Equipment Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="lab_equipment_history">
										Add Equipment History Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="edit_equipment_details" target="_blank">
										Edit Equipment Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="edit_equipment_history" target="_blank">
										Edit Equipment History Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="alldiv">
				<ul style="list-style: none;">
					<li>
						<ul>
							<li>
								<font>
									<a href="print_lab_select">
										Print Equipment History Details
									</a>
								</font>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		
	</body>

</html>