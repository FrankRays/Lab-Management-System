<!DOCTYPE html>
<html>
<head>
	<title>Hod screen</title>
	<link rel="stylesheet" type="text/css" href="../styl/styleall.css">
</head>
<body>
	<?php session_start(); ?>
	<?php 

		?>
	<?php include '../dbconn.php'; ?>
	<div class=header>
		<p></p>
		<table width=100% >
			<tr style="font-size:24px">
				<td width=10%><h3 >&nbsp;Name &nbsp; :</h3></td>
				<td width=25%><label id="username"><span style="color:#aa0000"><?php echo $_SESSION['username'];?>&nbsp;</span></label></td>
				<td align=center width=30%><h3><label>Head Of Department</label></h3></td>
				<td align=right width=35%><input type="button" name="signouthod"value="   SIGN OUT   "/>&nbsp;</td>

			</tr>
		</table>
	</div>
	<hr></hr>
	<!-- left panel-->
	<div id=left>
		<p style="color:#aa0000;font-size:20px;align:center;">TASKS</p>
		<hr>
		<hr>
		<form method="post">
		<ul>
			<hr></hr>
			<p><input type="submit" name="createuserbtn" value="Create User"></p>
			<hr></hr>
			<p><input type="submit" name="changepwd" value="Change Password"></p>
			<hr></hr>
			<p><input type="submit" name="notif" value="Notifications"></p>
			<hr></hr>
			<p><input type="submit" name="qselection" value="Quotation Selection"></p>		
			<hr></hr>
			<p><input type="submit" name="searchitem" value="Search Item"></p>
			<hr></hr>
			<p><input type="submit" name="viewstock" value="View Stock"></p>
			<hr></hr>
		</ul>
		</form>

	</div>
	<!-- center panel-->
	<div class="center" id="center"> 
		
	<?php

		if(isset($_POST['changepwd'])) //when change password button is clicked
		{
			include 'changepassword.php';
				
		}
		else if(isset($_POST['createuserbtn']))
		{
			include 'createuser.php';
		}

		if(isset($_POST['createnewuser'])) //when create button inside create user is clicked
		{
			$newusername = $_POST['newusername'];
			$newlabid = $_POST['newlabid'];
			$new = $_POST['newpassword'];
			$re_new = $_POST['reenterpassword'];

			$sql = "select * from users where username=$newusername";
			$query_result = mysqli_query($conn, $sql);
			if($query_result == true)
			{
				echo '<script>';
				echo 'alert("Username already exists")';
				echo '</script>';
			}
			else
			{   
				if($new == $re_new)
				{
					$sql = "insert into users (username,pass,labid,access) values ('$newusername','$new','$newlabid',0)";
					mysqli_query($conn, $sql);
					echo '<script>';
					echo 'alert("User create successfully")';
					echo '</script>';
				}
				else 
				{
					echo '<script>';
					echo 'alert("Password dont match")';
					echo '</script>';
				}
			}


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
		</div>
	<div class=center> area for display</div>
	<div id=right>some image perhaps?</div>
	<?php mysqli_close($conn); ?>
	<hr id=hrfooter></hr>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
</body>
</html>