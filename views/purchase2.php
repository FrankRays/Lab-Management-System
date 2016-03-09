<!DOCTYPE html>
				<html>
				<head>
					<script type="text/javascript" charset="utf-8" src="../jquery-1.12.0.js"></script>
					
				<body>
				<div name="divv">
					<form id="pur" name="purchase2addcomponent" method= "post" >
						<p style="text-align: center; font-size:20px;">&nbsp;ITEM PURCHASE REQUEST</p>
						<hr />
						<table align="center" border="0" cellpadding="1" cellspacing="20" style="width:500px;">
							<tr>
								<td width=180px align=right>Item Name </td>
								<td> :</td>
								<td><input type="text"  maxlength="30"name="itemnamepurchase2"></td>

							</tr>
							<tr>
								<td width =180px align=right>Specification</td>
								<td> :</td>
								<td><input type="text" maxlength="30" name="specificationpurchase2"></td>
							</tr>
							<tr>
								<td width =180px align=right></td>
								<td></td>
								<td></td>
							</tr>
							
						</table>
						<p align=center>
								<input type="button"  name="addcomponentpurchase2"  onclick="cleartext();" value="  ADD COMPONENT  " align="center">
								
						</p>
						<p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</p>
						<p align=center> Press SAVE DETAILS after all components have been added</p>
						<p align=center>

								<input type="submit" name="savedetailspurchase2" value=" SAVE DETAILS" align="center">
						</p>
						
					</form>
					
					<script type="text/javascript">
					function cleartext()
					{
					//document.getElementById(pur).reset();
					alert("Item has been added.");
					}
					</script>
					
				</div>
					
				
				</body>
				</html>
