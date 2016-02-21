<!DOCTYPE html>
<html>
<head>
	<title>Hod screen</title>
	<link rel="stylesheet" type="text/css" href="../styl/styleall.css">
</head>
<body>
<<<<<<< HEAD
	<?php session_start(); ?>
	<?php 
		?>
=======
	<?php include '../dbconn.php'; 
		session_start(); ?>
>>>>>>> 2bd3fd7ec543b2f1b741bc11487734fc76506f55
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
		</form>
		<ul>
<<<<<<< HEAD
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
=======
			<p><input class="taskbutton" type="submit" name="createuserbtn" value="Create User"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="changepwd" value="Change Password"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="notif" value="Notifications"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="qselection" value="Quotation Selection"></p>		
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="searchitem" value="Search Item"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="viewstock" value="View Stock"></p>
			
>>>>>>> 2bd3fd7ec543b2f1b741bc11487734fc76506f55
			<hr></hr>
		</ul>

	</div>
	<div class=center> area for display</div>
	<div id=right>some image perhaps?</div>
<<<<<<< HEAD
=======
	<?php mysqli_close($conn); ?>
>>>>>>> 2bd3fd7ec543b2f1b741bc11487734fc76506f55
	<hr id=hrfooter></hr>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
</body>
</html>