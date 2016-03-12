				<html>
				<head> </head>
				<body>
				<div>
					<p style="text-align: center; font-size:20px;">&nbsp;ADD TO STOCK</p>
					<hr>
					<form method="post">
					<table width=70% align=left cellspacing="10" cellpadding="1">
					
					<tr>
						<td>
							<!-- write code for displaying prno-->
						<?php
						$LabID= $_SESSION['labid'];
						//had used select distinct in this page to obtain distinct prnos
						//later realized the stupidity- used natural join when prnos cud b obtained from item table alone
						$sql="select ReqDate,Prno,Item,Spec,Quantity,Category from item natural join item_spec where Status=1 and q_status='y' and LabID='$LabID'and add_stock='n'";
						//$sql="select distinct Prno from (select Prno from item union select Prno from item_spec) where Status=1 and q_status=n ";
						$query_result=mysqli_query($conn,$sql);
						//$row=mysqli_fetch_assoc($query_result);

						if(mysqli_num_rows($query_result)>0)
						{
							echo'<div style="width:90%;margin-left:40px;align:center;border:2px solid #ccc; min-height:150px;max-height:150px;margin-bottom:20px;overflow-y:scroll;">';
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
							alert("Nothing to add");
						  </script>';
						?>
						
						</td>
					</tr>
					<tr>
						<td>
							<?php
						$LabID= $_SESSION['labid'];
						$prno= $_SESSION['selectedprno'];
						//had used select distinct in this page to obtain distinct prnos
						//later realized the stupidity- used natural join when prnos cud b obtained from item table alone
						$sql="select SupplierName,Address,PhoneNo,Amount 
							from item natural join quotation 
							where Prno='$prno' and q_status='y' and 
							LabID='$LabID'and Add_stock='n' and Selected='y'";
						//$sql="select distinct Prno from (select Prno from item union select Prno from item_spec) where Status=1 and q_status=n ";
						$query_result=mysqli_query($conn,$sql);
						//$row=mysqli_fetch_assoc($query_result);

						if(mysqli_num_rows($query_result)>0)
						{
							echo'<div style="width:90%;align:left;border:2px solid #ccc; min-height:80px;max-height:100px;margin-left:40px;margin-bottom:20px;">';
							echo '<table cellspacing="10" cellpadding="2">
							  <tr><th>SupplierName</th>
							  	<th>Address</th>
							  	<th>PhoneNo</th>
							  	<th>Amount</th>
							  	
							  </tr>';
							//to display the result as a table in html
							while($row = mysqli_fetch_assoc($query_result))
							{
							//echo $row["q_status"];
							echo '<tr><td>'.$row["SupplierName"].'</td>
									  <td>'.$row["Address"].'</td>
									  <td>'.$row["PhoneNo"].'</td>
									  <td>'.$row["Amount"].'</td>									  
								</tr>';							
							}
							echo '</table>';
						}
						
						?>
						</td>
					</tr>
				</table>
				&nbsp;&nbsp;&nbsp;&nbsp;	
					<p>
						<?php
						if(mysqli_num_rows($query_result)>0)
						{
								echo '<input type="submit" name="addaddtostock" value="   ADD   " />';
						}

						?>
					</p>			
					
						
		
				</form>
			</div>	
			</body>
			</html>
