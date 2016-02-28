<html>
<head> </head>
<body>
		<div id="password">
		<p style="text-align: center; font-size:20px;">CREATE USER</p>
		<hr />
		<p></p>
		<form action="hod.php" method="post">
		<table align="center" border="0" cellpadding="1" cellspacing="5" style="width:500px;">
		<tbody>
			<tr>
				<td width=180px align=right>User Name</td>
				<td>:</td>
				<td><input type="text" name="newusername" maxlength="30" size="25"></td>
			</tr>	
			<tr>
				<td width=180px align=right>Lab ID</td>
				<td>:</td>
				<td><input type="text" name="newlabid" maxlength="30" size="25"></td>
			</tr>
			<tr>
				<td width=180px align=right>New  Password</td>
				<td>:</td>
				<td><input type="password" name="newpassword" maxlength="30" size="25" ></td>
			</tr>
			<tr>
				<td width=180px align=right>Re-enter Password</td>
				<td>:</td>
				<td><input type="password" name="reenterpassword" maxlength="30" size="25" ></td>
			</tr>
		</tbody>
		</table>
		<p>&nbsp;</p>
		<p style="margin-left: 35%;">
		<input type="submit" name="createnewuser" value="CREATE USER" 	>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="submit" name="cancelnewuser" value="CANCEL" ></p>
		</form>
		</table>
		</div>
	</body>
</html>