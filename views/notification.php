<html>
<head></head>
<body>
<?php 
		if(isset($_POST['notifacceptbtn']))
			{

			}
		if(isset($_POST['notifrejectbtn']))
		{

		}
?>
	<form action="hod.php" method="post" >
		<p style="margin-left:240px;">
			<input type="text" name="notifprno">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input type="submit" name="notifacceptbtn" value="ACCEPT">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input type="submit" name="notifrejectbtn" value="REJECT">
		</p>
	</form>
</body>

</html>