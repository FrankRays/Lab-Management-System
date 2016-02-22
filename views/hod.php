<!DOCTYPE html>
<html>
<head>
	<title>Hod screen</title>
	<link rel="stylesheet" type="text/css" href="../styl/styleall.css">
</head>
<body>
	<?php session_start(); ?>
	<?php 
		?>
	<?php include '../dbconn.php'; ?>
	<div class=header>
		<p></p>
		<table width=100% >
			<tr style="font-size:24px">
				<td width=10%><h3 >&nbsp;Name &nbsp; :</h3></td>
				<td width=25%><label id="username"><span style="color:#aa0000"><?php echo $_SESSION['username'];?>&nbsp;</span></label></td>
				<td align=center width=30%><h3><label>Head Of Department</label></h3></td>
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
		<form method="post">
		<ul>
			<hr></hr>
			<p><input type="submit" name="createuserbtn" value="Create User"></p>
			<hr></hr>
			<p><input type="submit" name="changepwd" value="Change Password"></p>
			<hr></hr>
			<p><input type="submit" name="notif" value="Notifications"></p>
			<hr></hr>
			<p><input type="submit" name="qselection" value="Quotation Selection"></p>		
			<hr></hr>
			<p><input type="submit" name="searchitem" value="Search Item"></p>
			<hr></hr>
			<p><input type="submit" name="viewstock" value="View Stock"></p>
			<hr></hr>
		</ul>
		</form>

	</div>
	<!-- center panel-->
	<div class="center" id="center"> 
		
	<?php 
		
		if(isset($_POST['changepwd']))
		{
			echo'
				<div id="password">
				<p style="text-align: center; font-size:20px;">&nbsp;CHANGE PASSWORD</p>
				<hr />
				<p></p>
				<table align="center" border="0" cellpadding="1" cellspacing="5" style="width:500px;">
					<tbody>
						<tr>
							<td width=180px align=right>Current Password&nbsp;&nbsp;</td>
							<td>:</td>
							<td><input maxlength="30" name="currentchangepassword" size="25" type="password" /></td>
						</tr>
						<tr>
							<td width=180px align=right>New  Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>:</td>
							<td><input maxlength="30" name="newchangepassword" size="25" type="password" /></td>
						</tr>
						<tr>
							<td width=180px align=right>Re-enter Password</td>
							<td>:</td>
							<td><input maxlength="30" name="reenterchangepassword" size="25" type="password" /></td>
						</tr>
					</tbody>
				</table>

				<p>&nbsp;</p>

				<p style="margin-left: 40%;"><input name="savechangepassword" type="button" value="SAVE" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input name="cancelchangepassword" type="button" value="CANCEL" /></p>

				<hr />
				<table align="center" border="1" cellpadding="1" cellspacing="1" style="height:100px;width:500px;">
					<tbody>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>

				<p>&nbsp;</p>

						<p>&nbsp;</p>
				</div>
				';//end of echo
			
		}
	?>
		</div>
	<div class=center> area for display</div>
	<div id=right>some image perhaps?</div>
	<?php mysqli_close($conn); ?>
	<hr id=hrfooter></hr>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
</body>
</html>