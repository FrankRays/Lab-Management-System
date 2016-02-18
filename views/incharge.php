<!DOCTYPE html>
<html>
<head>
	<title>Incharge screen</title>
	<link rel="stylesheet" type="text/css" href="../styl/styleall.css">
</head>
<body>
	<?php include '../dbconn.php'; 
		session_start(); ?>
	<div class=header>
		<p></p>
		<table width=100% >
			<tr style="font-size:24px">
				<td width=10%><h3 >&nbsp;Name &nbsp; :</h3></td>
				<td width=25%><label id=username><span style="color:#aa0000"><?php echo $_SESSION['username'];?>&nbsp;</span></label></td>
				<td align=center width=30%><h3><label>Lab Incharge</label></h3></td>
				<td align=right width=35%><input type="button" name="signouthod"value="   SIGN OUT   "/>&nbsp;</td>

			</tr>
		</table>
	</div>
	<hr></hr>
	<!-- left panel-->
	<div id=left>
		<p style="color:#aa0000;font-size:20px;align:center;">TASKS</p>
		<hr>
		<hr>
		<ul>
			<p><a href="changepassword.html"><em>Change Password</em></a></p>
			<hr></hr>
			<p><a href="purchaserequest.html"><em>Item Purchase Request</em></a></p>
			<hr></hr>
			<p><a href="requeststatus.html"><em>Request Status</em></a></p>
			<hr></hr>
			<p><a href="quotationdetails.html"><em>Enter Quotation Details</em></a></p>
			<hr></hr>
			
		</ul>
	</div>
	<div class=center> area for display</div>
	<!--right panel-->
	<div id=right>
		<p style="color:#aa0000;font-size:20px;">TASKS</p>
		<hr>
		<hr>
		<ul>
			<p><a href="add to stock.html"><em>Add to stock</em></a></p>
			<hr></hr>
			<p><a href="index.html"><em>Discard item</em></a></p>
			<hr></hr>
			<p><a href="index.html"><em>Search for item</em></a></p>
			<hr></hr>
			<p><a href="index.html"><em>View stock</em></a></p>
			<hr></hr>
		</ul>
	</div>
	<?php mysqli_close($conn);?>
	<hr id=hrfooter></hr>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
</body>
</html>