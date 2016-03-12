<!DOCTYPE html>
<html>
<head>
	<title>Incharge screen</title>
	<link rel="stylesheet" type="text/css" href="../styl/styleall.css">
	<script type="text/javascript" charset="utf-8" src="../jquery-1.12.0.js"></script>
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
				<td align=right width=35%>
					<form method="post">
					<input type="submit" name="signout"value="   SIGN OUT   "/>&nbsp;
					</form>
				</td>
			</tr>
		</table>
		<!--signing out-->
		<?php 
			if(isset($_POST['signout']))
			{				
				header("Location:../login.php");
				session_destroy();//session variables must be destroyed after signout
				mysqli_close($conn);//close connection
			}
			
			
		?>
	</div>

	<hr></hr>

	<!-- left panel-->

	<div id="left">
		<p style="color:#aa0000;font-size:20px;align:center;">TASKS</p>
		<hr>
		<hr>
		<form method="post">
			
				
				<p><input class="taskbutton" type="submit" name="changepwd" value="Change Password"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="purchase" value="Item Purchase Request"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="status" value="Request Status"></p>		
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="qdetails" value="Enter Quotation Details"></p>
				<hr></hr>
				
			
		</form>
	</div>

	<!--right panel-->
	<div id="right">
		<p style="color:#aa0000;font-size:20px;">TASKS</p>
		<hr>
		<hr>
		<form method="post">

			<ul>
				<p><input class="taskbutton" type="submit" name="addtostock" value="Add to Stock"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="discard" value="Discard Item"></p>		
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="searchitem" value="Search Item"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="viewstock" value="View Stock"></p>
				<hr></hr>
				
			</ul>
		</form>
	</div>

	<!-- center panel-->
	<div class="center" id="center"> 
		
	<?php 
		
		if(isset($_POST['changepwd']))
		{
			include 'changepasswordincharge.php';
			
		}
		else if(isset($_POST['purchase']))
		{
			include 'purchase1.php';
		}
		else if(isset($_POST['status']))
		{
			include 'requeststatus.php';
		}
		else if(isset($_POST['qdetails']))
		{
			include 'quotationdetails.php';
			
			
		}
		else if(isset($_POST['addtostock']))
		{
			include 'addtostock.php';
		}
		else if(isset($_POST['discard']))
		{
			include 'discard.php';
		}
		else if(isset($_POST['searchitem']))
		{
			include 'searchitemincharge.php';
		}
		else if(isset($_POST['viewstock']))
		{
			include 'viewstockincharge.php';
		}
		
		else if(isset($_POST['signout']))
		{				
			header("Location:../login.php");
			session_destroy();//session variables must be destroyed after signout
			mysqli_close($conn);//close connection
		}

		
		if(isset($_POST['savechangepassword'])) //when save button inside change password is clicked
		{
			$current=$_POST['currentchangepassword'];
			$new=$_POST['newchangepassword'];
			$re_new=$_POST['reenterchangepassword'];
			$userid=$_SESSION['userid'];
			$sql="select * from users where pass='$current' and userid='$userid'";
			$query_result = mysqli_query($conn, $sql);	
			if($query_result !=false)
			{
				if($new == $re_new)
				{
					$query_row = mysqli_num_rows($query_result);
					if($query_row == 1)
					{
						$sql = "update users set pass='$new' where userid='$userid'";
						mysqli_query($conn, $sql);
						echo '<script>';
						echo 'alert("Password Changed successfully")';
						echo '</script>';	
					}
					else
					{
						echo '<script>';
						echo 'alert("Current password invalid")';
						echo '</script>';	

					}
				}
				else
				{
					echo '<script>';
					echo 'alert("Passwords dont match")';
					echo '</script>';	

				}
			}
			else
			{
				echo '<script>';
				echo 'alert("Current password invalid")';
				echo '</script>';
			}	
		}
		//for item purchase request forms
		if(isset($_POST['continuepurchase1']))
		{
			//write code to prevent sql injections and to notify user if important fields are left blank
			//it will be nice if date input could  be taken from system
			 $date=$_POST['datepurchase1'];
			$category=$_POST['categorypurchase1'];
			$company=$_POST['companypurchase1'];
			$quantity=$_POST['quantitypurchase1'];
			$LabID= $_SESSION['labid'];
			$sql="insert into item(ReqDate,Category,Company,Quantity,LabID) values ('$date','$category','$company','$quantity','$LabID')";
			if (mysqli_query($conn, $sql)) 
			{
			echo "New record created successfully";
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			$sql = "select max(Prno) from item" ;
			$query_result=mysqli_query($conn,$sql);
			
			$row = mysqli_fetch_array($query_result);
			
			$prno=$row[0];
			$sql="update prno set prno='$prno') where id=1";
			$query_result=mysqli_query($conn,$sql);
			
     
			header("Location:purchase2.php");
		}
		//request status
		if (isset($_POST['okrequeststatus'])) 
		{
			$date=$_POST['daterequeststatus'];
			
			$sql="select ReqDate,Prno,Item,Spec,Quantity,Category,Status from item natural join item_spec where item.ReqDate>'$date'and item.add_stock='n'";
			$query_result=mysqli_query($conn,$sql);
			include 'requeststatus.php';
			if(mysqli_num_rows($query_result)>0)
			{
				echo'<div style="width:90%;align:center;border:2px solid #ccc; min-height:150px;max-height:210px;margin-left:40px;margin-bottom:20px;overflow-y:scroll;">';
				echo '<table border-bottom="1" cellspacing="10" cellpadding="2">
					  <tr>
					  	<th>Date of Request</th>
					  	<th>Prno</th>
					  	<th>Item</th>
					  	<th>Spec</th>
					  	<th>Quantity</th>
					  	<th>Category</th>
					  	<th>Status</th>
					  </tr>';
				//to display the result as a table in html
				$prev=-1;
				while($row = mysqli_fetch_assoc($query_result))
				{
					$current=$row["Prno"];
					if($row["Status"]==2)
						$stat="Not viewed";
					else if($row["Status"]==1)
						$stat="Approved";
					else
						$stat="Rejected";
					// was written with the intention of drawing a line between different requests ie whenever there is a change in prno
					
					if($current!=$prev)
					{   
						echo '<tr><td><hr></hr></td>
								  <td><hr></hr></td>
								  <td><hr></hr></td>
								  <td><hr></hr></td>
								  <td><hr></hr></td>
								  <td><hr></hr></td>
								  <td><hr></hr></td>
							</tr>';
					}
					echo '<tr name="tablerow"><td>'.$row["ReqDate"].'</td>
							  <td>'.$row["Prno"].'</td>
							  <td>'.$row["Item"].'</td>
							  <td>'.$row["Spec"].'</td>
							  <td>'.$row["Quantity"].'</td>
							  <td>'.$row["Category"].'</td>
							  <td>'.$stat.'</td>
							  <td>
						  </tr>';

					$prev=$row["Prno"];
				}
				echo '</table>';
				echo '</div>';
			
			}
			else
			{
				echo '<script>
				alert("No entries after specified date");
				</script>';
			}
			
		}
		//quotation details
		if (isset($_POST['selectquotationdetails']))
		 {
			$_SESSION['selectedprno']=$_POST['prnoquotationdetails'];
			include 'quotationdetails3.php';
		}
		if (isset($_POST['addquotationdetails3']))
		 {
		 	$suppliername=$_POST['suppliername'];
		 	$amount=$_POST['amount'];
		 	$address=$_POST['address'];
		 	$phone=$_POST['phone'];
		    $prno= $_SESSION['selectedprno'];
		    //echo $prno;
		 	$sql="insert into quotation(Prno,SupplierName,Address,PhoneNo,Amount) values('$prno','$suppliername','$address','$phone','$amount')";
		 	mysqli_query($conn,$sql)	;
			include 'quotationdetails3.php';
		}
		if (isset($_POST['nextrequestquotationdetails3']))
		 {
			include 'quotationdetails.php';
		}
		//add to stock form
		if (isset($_POST['selectaddtostock']))
		 {
		 	$_SESSION['selectedprno']=$_POST['prnoaddtostock'];
			include 'addtostock2.php';
		}
		if (isset($_POST['addaddtostock']))
		{
			$sql="update item set add_stock='y' where Prno='$_SESSION[selectedprno]'";
			mysqli_query($conn,$sql);
			include 'addtostock.php';
		}
		//discard item form
		if (isset($_POST['discarddiscard']))
		{
			/*
			search for metioned item 
			if found decrease count
				and echo message discard successful
			else no such item
			*/
		}
	?>
	
	</div><!-- end of center panel-->


	<!--  EXPERIMENTING JQUERY
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("input[name='changepwd']").click(function()
				{
					$("#center").html("changepassword.html");
				});
			});
		});
	</script>
	=-->

		

	<!-- footer-->
	<hr id=hrfooter></hr>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
</body>
</html>