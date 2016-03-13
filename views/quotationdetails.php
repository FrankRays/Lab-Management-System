<!DOCTYPE html>
<html>
<head>
</head>
<body>
	
	<div> 
		<form method="post">
				<p style="text-align: center; font-size:20px;">&nbsp;QUOTATION DETAILS</p>
				<hr />
				<p></p>
				<p style="margin-left=50px;"></p>
				
				<table width=70% align=center cellspacing="10" cellpadding="1">
					
					<tr>
						<td align=center>Select PRNo. from following list</td>
					</tr>
					<tr>
						<td align=center>
							<!-- write code for displaying prno -->
						<?php
						$LabID= $_SESSION['labid'];
						//had used select distinct in this page to obtain distinct prnos
						//later realized the stupidity- used natural join when prnos cud b obtained from item table alone
						$sql="select ReqDate,Prno,Item,Spec,Quantity,Category from item natural join item_spec where Status=1 and q_status='n' and LabID='$LabID'and add_stock='n'";
						//$sql="select distinct Prno from (select Prno from item union select Prno from item_spec) where Status=1 and q_status=n ";
						$query_result=mysqli_query($conn,$sql);
						//$row=mysqli_fetch_assoc($query_result);

						if(mysqli_num_rows($query_result)>0)
						{
							echo'<div style="width:90%;align:center;border:2px solid #ccc; min-height:150px;max-height:200px;margin-bottom:20px;overflow-y:scroll;">';
							echo '<table cellspacing="10" cellpadding="2">
							  <tr>
							  	<th>Date of Request</th>
							  	<th>Prno</th>
							  	<th>Item</th>
							  	<th>Spec</th>
							  	<th>Quantity</th>
							  	<th>Category</th>
							  </tr>';
							//to display the result as a table in html
							while($row = mysqli_fetch_assoc($query_result))
							{
							//echo $row["Prno"];
							echo '<tr><td>'.$row["ReqDate"].'</td>
									  <td>'.$row["Prno"].'</td>
									  <td>'.$row["Item"].'</td>
									  <td>'.$row["Spec"].'</td>
									  <td>'.$row["Quantity"].'</td>
									  <td>'.$row["Category"].'</td>
								</tr>';							
							}
							echo '</table>';
						}
						else
							echo '<script>
							alert("All requests have been closed");
						  </script>';
						?>
						
						</td>
					</tr>
				</table>
				<?php
				if(mysqli_num_rows($query_result)>0)
				echo '
				</table>		
						<table align=center cellspacing="10" cellpadding="1" style="clear:both">

						<tr>
							<td>PRNo. :</td>
							<td align=left><input type="text" name="prnoquotationdetails"/></td>
							<td><input type="submit" name="selectquotationdetails" value=" SELECT "></td>
						</tr>
				</table>';
				?>
				
		</form>
	</div>
	<!--right panel-->
	
</body>
</html>