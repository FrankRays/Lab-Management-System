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

			
     
			header("Location:purchase2.php");
		}
		//quotation details
		if (isset($_POST['selectquotationdetails']))
		 {
			include 'quotationdetails2.php';
		}
		if (isset($_POST['okquotationdetails2']))
		 {
			include 'quotationdetails3.php';
		}
		if (isset($_POST['addquotationdetails3']))
		 {
			include 'quotationdetails3.php';
		}
		if (isset($_POST['nextrequestquotationdetails3']))
		 {
			include 'quotationdetails.php';
		}
		//add to stock form
		if (isset($_POST['selectaddtostock']))
		 {
			include 'addtostock2.php';
		}
		if (isset($_POST['addaddtostock']))
		{
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