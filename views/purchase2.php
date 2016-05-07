<!DOCTYPE html>
	<html>
	<head>
		<script type="text/javascript" charset="utf-8" src="../jquery-1.12.0.js"></script>
		<link rel="stylesheet" type="text/css" href="../styl/styleall.css">
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
	<!--center panel-->
	<div class="center" id="center"> 
		<div name>
			<form id="pur" name="purchase2addcomponent" method= "post" >
				<p style="text-align: center; font-size:20px;">&nbsp;ITEM PURCHASE REQUEST</p>
				<hr />
				<table align="center" border="0" cellpadding="1" cellspacing="20" style="width:500px;">
					<tr>
						<td width=180px align=right>Item Name </td>
						<td> :</td>
						<td><input type="text"  id="itemnamepurchase2" maxlength="30"name="itemnamepurchase2"></td>

					</tr>
					<tr>
						<td width =180px align=right>Specification</td>
						<td> :</td>
						<td><input type="text" maxlength="30" id="specificationpurchase2" name="specificationpurchase2"></td>
					</tr>
					<tr>
						<td width =180px align=right></td>
						<td></td>
						<td></td>
					</tr>
					
				</table>
				<p align=center>
						<input type="submit"  name="addcomponentpurchase2" value="  ADD COMPONENT  " align="center">
						
				</p>
				<p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				</p>
				<p align=center> Press SAVE DETAILS after all components have been added</p>
				<p align=center>

						<input type="submit" name="savedetailspurchase2" value=" SAVE DETAILS" align="center">
				</p>
				
			</form>
			
			
			
		</div>
		<?php
		 if(isset($_POST['addcomponentpurchase2']))
		 {
		 	//write code to make itemname compulsory 
		 	//and to disable the add component button after one click, if single item is selected
		 	$itemname=$_POST['itemnamepurchase2'];
		 	$spec=$_POST['specificationpurchase2'];
		 	$itemname = trim($itemname);
		 	$spec = trim($spec);
		 	$spec = preg_replace('/\s+/', '', $spec);
		 	$itemname = strtolower($itemname);
		 	$spec = strtolower($spec);
		 	$sql = "select max(Prno) from item" ;
			$query_result=mysqli_query($conn,$sql);
			
			$row = mysqli_fetch_array($query_result);
			
			$prno=$row[0];
			if(empty($itemname))
				echo '<script> alert("Itemname is mandatory"); </script>';
		 	$sql="insert into item_spec values('$prno','$itemname','$spec')";
			$query_result=mysqli_query($conn,$sql);
		    
		 }
		 
		 if (isset($_POST['savedetailspurchase2'])) 
		 {
		 	mysqli_free_result($query_result);
		 	header("Location:incharge.php");
		 }
		?>
	</div>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
			
	</body>
</html>
