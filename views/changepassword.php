<html>
<head> </head>
<body>
		<div id="password">
		<p style="text-align: center; font-size:20px;">CHANGE PASSWORD</p>
		<hr />
		<p></p>
		<form action="hod.php" method="post">
		<table align="center" border="0" cellpadding="1" cellspacing="20" style="width:500px;">
		<tbody>
			<tr>
				<td width=180px align=right>Current Password</td>
				<td>:</td>
				<td><input maxlength="30" name="currentchangepassword" size="25" type="password" /></td>
			</tr>
			<tr>
				<td width=180px align=right>New  Password</td>
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
		<p style="margin-left: 40%;">
		<input type="submit" name="savechangepassword" value="SAVE" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="submit" name="cancelchangepassword" value="CANCEL" /></p>
		</form>
		
		</div>
	</body>
</html>