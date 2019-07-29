<html>
<center>
<head>
	<h1> Salary Calculation </h1>
</head>
<body>

<?php
$db = mysqli_connect("localhost","root","")
or die("Cannot connnect to the database");
mysqli_select_db($db,"register");

session_start();
$til=$_SESSION['row1'];
$tol=$_SESSION['inhr'];
$sql="SELECT perhsal FROM salary WHERE title='$til'";
$perhr = mysqli_query($db,$sql);
echo "Total salary is : Rs  ";
while($row = $perhr->fetch_assoc())
{
	echo ceil($row['perhsal'] * $tol);
	break;
}
?>

</body>
</center>
</html>
