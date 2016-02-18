<!DOCTYPE html>
<html>
<head>
	<title>Login!</title>
	<link rel="stylesheet" type="text/css" href="styl/style.css"/>
	<link rel="stylesheet" type="text/css" href="styl/normalize.css"/>
<!--	<link rel="stylesheet" type="text/css" href="styl/styleall.css"> -->
</head>
<body>
	<?php include 'dbconn.php'; 
		session_start(); ?>
	<?php
		if(isset($_POST['loginbtn']))	
		{
			$userid=$_POST['userid'];
			$pass=$_POST['password'];

			//for prevention agains SQLinjection attacks
			$userid = stripslashes($userid);
			$pass = stripslashes($pass);

			//escapes special characters for security reasons
			$userid = mysql_real_escape_string($userid);
			$pass = mysql_real_escape_string($pass);

			$sql = "select * from users where pass='$pass' AND userid='$userid'";
			$query_result = mysqli_query($conn, $sql);

			if($query_result !=false)
			{
				$query_row = mysqli_num_rows($query_result);

				if($query_row == 1)
				{
					//set the session variable and redirect to the page
					$sql = "select access,labid,username from users where userid='$userid'";
					$query_result = mysqli_query($conn, $sql);
					//the query_result is a mysqli object
					//inorder to get the value as integer, we need to get rows as assoc array

					$row = mysqli_fetch_assoc($query_result);

					if($row["access"] == 1)	
					{
					
						//session variables
						$_SESSION['loginid']='hod';
						$_SESSION['username']=$row["username"];
						header("Location: http://localhost/miniproject/views/hod.php");
						/*echo '<script type="text/javascript">';
						echo 'alert("welcome hod")';
						echo '</script>';*/
					}
					else
					{
						$labid = $row["labid"];
					
						$_SESSION['loginid']=$labid;
						$_SESSION['username']=$row["username"];
						//echo $_SESSION['loginid'];
						echo '<script type="text/javascript">';
						echo 'alert("welcome lab in charge")';
						echo '</script>';
						header("Location:views/incharge.php");
					}
					//to free the result set
					mysqli_free_result($query_result);
				}		
				else
			    {   

					//js code to display an alert box
					echo '<script type="text/javascript">';
					echo 'alert("Invalid userid or password")';
					echo '</script>';
			    }
		
			}
			else
			{   
					//js code to display an alert box
					echo '<script type="text/javascript">';
					echo 'alert("Invalid userid or password")';
					echo '</script>';
			}

		}
		mysqli_close($conn);

	?> 
	<div class="container">
		<div class="login">
			<h1> Login </h1>
			<form method="post" action="">
				<p><input type="text" name="userid" placeholder="Userid"></p>
				<p><input type="password" name="password" placeholder="Password"></p>
				<p class="loginbtn"><input type="submit" name="loginbtn" value="Login"></p>
		</div>
	</div>
	
	<!--
	<p align=center style="color:red"> Incorrect Password/UserID </p>
-->
</body>
</html>