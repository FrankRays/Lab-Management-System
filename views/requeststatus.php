<!DOCTYPE html>
<html>
<head>
</head>
<body>
	
	<div> 
		<form method="post">
				<p style="text-align: center; font-size:20px;">&nbsp;STATUS OF REQUESTS</p>
				<hr />
				<p></p>
				<table align=center cellspacing="20" cellpadding="1">
					<tr>
						<td>From Date :</td>
						<td><input type="date" name="daterequeststatus"/></td>
						<td><input type="submit" name="okrequeststatus" value=" OK "></td>
						<!--type is submit so page will disappear if u click OK-->
					</tr>
				</table>
				<div style="width:90%;align:center;border:2px solid #ccc; min-height:150px;max-height:150px;margin-left:40px;margin-bottom:20px;overflow:scroll;">
					display prno., itemname,spec  and status i.e., approved or rejected
					<!--display records from item table-->
				</div>
		</form>
	</div>
	<!--right panel-->
	
</body>
</html>