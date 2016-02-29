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
			include 'changepasswordincharge.php';
			
		}
		else if(isset($_POST['purchase']))
		{
			include 'purchase.php';
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
			include 'addtostock.php';
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