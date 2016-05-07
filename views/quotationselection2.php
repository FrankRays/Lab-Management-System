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
				<form method="post">
				<td align=right width=35%>
					<input type="submit" name="signout" value="   SIGN OUT   "/>&nbsp;
				</td>
				</form>

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
			
			<p><input class="taskbutton" type="submit" name="notif" value="Notifications"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="qselection" value="Quotation Selection"></p>		
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="searchitem" value="Search Item"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="viewstock" value="View Stock"></p>
			<hr></hr>
			<p><input class="taskbutton" type="submit" name="quotationlog" value="Quotation Log"></p>
			<hr></hr>
		</ul>
		</form>

	</div>
	<!-- center panel-->
	<div class="center" id="center"> 

		
	<?php

		
		if(isset($_POST['signout']))
		{				
			header("Location:../login.php");
			session_destroy();//session variables must be destroyed after signout
			mysqli_close($conn);//close connection
		}
			$prno = $_SESSION['prno'];

		    $sql = "select SerialNo, SupplierName, Address, PhoneNo, Amount from quotation where Prno='$prno'";

			$query_result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($query_result) > 0)
			{
				echo '<div style="overflow:scroll;margin-left:200px;margin-right:315px;margin-top:50px;height:200px;width: 500px">';
				echo '<table>
					  <tr><th>SerialNo</th><th>SupplierName</th><th>Address</th><th>PhoneNo</th><th>Amount</th></tr>';
				//to display the result as a table in html

				while($row = mysqli_fetch_assoc($query_result))
				{
					echo '<tr><td>'.$row["SerialNo"].'</td><td>'.$row["SupplierName"].'</td><td>'.$row["Address"].'</td><td>'.$row["PhoneNo"].					'</td><td>'.$row["Amount"].'</td></tr>';		}
				echo '</table>';
				echo '</div>';
			}
			else
			{
				echo '0 results!!';
			}
	?>
	<form method="post">
		<p><input type="text" name="quotationselection2text" placeholder="Enter SerialNo" style="margin-left:200px;"> &nbsp; &nbsp; &nbsp; 
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		   <input type="submit" name="quotationselection2button" value="Select">
		</p>
	</form>
	<?php
	if(isset($_POST['quotationselection2button']))
	{
		$serial = $_POST['quotationselection2text'];
		$sql = "update quotation set Selected='y' where Prno='$prno' and SerialNo='$serial'";
		mysqli_query($conn, $sql);
		//write code to check if the update operation has been successfully conducted and then only proceed
		$sql = "update item set q_status='y' where Prno='$prno'";
		mysqli_query($conn, $sql);
		header("Location:hod.php");
	}

	?>

		</div>
	<div id=right>
		<p style="color:#aa0000;font-size:20px;">TASKS</p>
		<hr>
		<hr>
		<form method="post">
			<ul>
				<p><input class="taskbutton" type="submit" name="createuserbtn" value="Create User"></p>
				<hr></hr>
				<p><input class="taskbutton" type="submit" name="changepwd" value="Change Password"></p>
				<hr></hr>
			</ul>
		</form>
	</div>
	<?php mysqli_close($conn); ?>
	<hr id=hrfooter></hr>
	<div class=footer><p><em>College Of Engineering, Chengannur</em></p></div>
</body>
</html>