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
			<ul>
				
				<p><input class="taskbutton" type="submit" name="changepwd" value="Change Password"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="purchase" value="Item Purchase Request"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="status" value="Request Status"></p>		
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="qdetails" value="Enter Quotation Details"></p>
				<hr></hr>
				
			</ul>
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
			echo'
				<div id="password">
				<p style="text-align: center; font-size:20px;">&nbsp;CHANGE PASSWORD</p>
				<hr />
				<p></p>
				<table align="center" border="0" cellpadding="1" cellspacing="5" style="width:500px;">
					<tbody>
						<tr>
							<td width=180px align=right>Current Password&nbsp;&nbsp;</td>
							<td>:</td>
							<td><input maxlength="30" name="currentchangepassword" size="25" type="password" /></td>
						</tr>
						<tr>
							<td width=180px align=right>New  Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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

				<p style="margin-left: 40%;"><input name="savechangepassword" type="button" value="SAVE" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input name="cancelchangepassword" type="button" value="CANCEL" /></p>

				<hr />
				<table align="center" border="1" cellpadding="1" cellspacing="1" style="height:100px;width:500px;">
					<tbody>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>

				<p>&nbsp;</p>

						<p>&nbsp;</p>
				</div>
				';//end of echo
			
		}
		else if(isset($_POST['purchase']))
		{
			echo'
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
	
			';
		}
		else if(isset($_POST['status']))
		{
			echo'
				<div> 
					<p style="text-align: center; font-size:20px;">&nbsp;STATUS OF REQUESTS</p>
					<hr />
					<p></p>
					<div style="width:90%;align:center;border:2px solid #ccc; min-height:150px;max-height:150px;margin-left:40px;margin-bottom:20px;overflow:scroll;">
						display prno., itemname, and status i.e., approved or rejected
					</div>
				</div>
			';
		}
		else if(isset($_POST['qdetails']))
		{
			echo'
				you could write a book on how to ruin someones perfect day
			';
		}
		else if(isset($_POST['addtostock']))
		{
			echo'
				<div>
					<p style="text-align: center; font-size:20px;">&nbsp;ADD TO STOCK</p>
					<hr>
					<form method="post" name="notificationdate">
					<p align=left style="margin-left:40%;">PRNo.  :&nbsp;&nbsp;
							<select><option> </option></select>
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;<input name="select" type="button" value="SELECT" />
						
					</p>
					</form>						
					<div style="width:90%;align:center;border:2px solid #ccc; min-height:150px;max-height:150px;margin-left:40px;margin-bottom:20px;overflow:scroll;">
						display item, spec and quantity
					</div>
					<div style="width:70%;align:left;border:2px solid #ccc; min-height:80px;max-height:100px;margin-left:40px;margin-bottom:20px;;display:inline-block;float:left;">
						display selected supplier and price
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;
					<table padding=10px cellspacing=10px>
						<tr>
							<td><input type="button" name="addtostock" value="   ADD   " /></td>
							<td>&nbsp;&nbsp;<input type="button" name="clear" value="   CLEAR   " /></td>
						</tr>
						<tr>
							<td>
							<input type="button" name="next" value="  NEXT  " /></td></tr>
					</table>
					
				</div>	
			';
		}
		else if(isset($_POST['discard']))
		{
			echo'
				so hello from the other side Atleast I can say that I tried
			';
		}
		else if(isset($_POST['searchitem']))
		{
			echo'
				Im gonna swing from the chandelier			
			';
		}
		else if(isset($_POST['viewstock']))
		{
			echo'
				Go on and try to tear me down
				I will be rising from the ground
				like a skyscraper
			';
		}
		else
			echo'area for display';
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