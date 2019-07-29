<html>
<body>
<?php
$db=mysqli_connect('localhost','root','','register')
or die('Error connecting to MySQL server');
mysqli_select_db($db,'register');
$sql="INSERT INTO registration (FirstName,LastName,Gender,Address,phn1,phn2,email,DOB,Marital,SpouseName,sphn,title,empid,password,retrypassword,Supervisor,Department,Location,WorkNum) VALUES('$_POST[fname]','$_POST[lname]','$_POST[Gender]','$_POST[Address]','$_POST[phn1]','$_POST[phn2]','$_POST[email]','$_POST[bday]','$_POST[Marital]','$_POST[sname]','$_POST[sphn]','$_POST[title]','$_POST[empid]','$_POST[pwd1]','$_POST[pwd2]','$_POST[Supervisor]','$_POST[Department]','$_POST[Location]','$_POST[WorkNum]')";
if(!mysqli_query($db,$sql))
{
	die('Error :'. mysqli_error($db));
}
echo "1 record added";
mysqli_close($db);
?>
<form action="login.html">
	Login to continue. <input type="submit" value="Login"/> 
</form>
</body>
</html>

