				<html>
				<head></head>
				<body>
				<div>
					<p style="text-align: center; font-size:20px;">&nbsp;ITEM PURCHASE REQUEST</p>
					<hr />
					<table width=90% align=center margin-left=30px>
						<tr>
							<td align=right>Date  :</td>
							<td align=center><input type="date"></td>
							<td align=left>Category  :</td>
							<td align=left>
								<select>
									<option>Single Item</option>
									<option>System</option>
									<option>Laptop</option>
								</select>
							</td>
							<td><input type="button" name="selectcategory" value="  SELECT  "></td>
						</tr>
					</table>
					<hr>
					<table width=90% align=center margin-left=30px>
						<tr>
							<td>Item Name</td>
							<td>Capacity</td>
							<td>Unit</td>
							<td>Quantity</td>
							<td>Company</td>
						</tr>
						<tr>
							<td><input type="text" size="20" maxlength="30"></td>
							<td><input type="number" maxlength="5"></td>
							<td><input type="text" maxlength="5"></td>
							<td><input type="number" maxlength="30"></td>
							<td><input type="text" maxlength="30"></td>
						</tr>
					</table>
					<p align=center>
					<input type="button" name="addrequest" value="  ADD  "></p>
					<hr>
					<div style="width:70%;border:2px solid #ccc; min-height:80px;max-height:100px;margin-left:15%;margin-bottom:10px;;display:inline-block;overflow:scroll;">
						display requested item
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;
					<p align=center>
					<input type="button" name="saverequest" value="   SAVE   " />
					</p>
				</div>
				</body>
				</html>
