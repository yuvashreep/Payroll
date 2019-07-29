<html>
<center>
<head>
	<h3> Working Hour Details of Employee </h3>
</head>
<body>

<?php
$db = mysqli_connect("localhost","root","")
or die("Cannot connnect to the database");
mysqli_select_db($db,"register");

$id = $_POST['empid'];
$total = 0;
$sql = "SELECT * FROM login WHERE empid='$id'";
$name = "SELECT FirstName FROM registration WHERE empid='$id'";
$name1 = "SELECT LastName FROM registration WHERE empid='$id'";
$sql1 = "SELECT title FROM registration WHERE empid='$id'";
$result = mysqli_query($db,$sql);
$result2 = mysqli_query($db,$sql1);
$ffname = mysqli_query($db,$name);
$llname = mysqli_query($db,$name1);
echo "EmpID : ".$id;
echo "<br>";
while($row1 = $result2->fetch_assoc())
{
	echo "Employee Position : ".$row1['title'];
	if(!session_id()) session_start();
	$_SESSION['row1'] = $row1['title'];
	break;
}
echo "<br>";
while($row = $result->fetch_assoc())
{
	//echo "Date : ".$row["logindate"]." "."Login : ".$row["logintime"]." "."Logout : ".$row["logouttime"]." "."Time Worked : ".$row["timein"];
	$total=$total+$row["timein"];
	//echo "<br>";
}
echo '<br>';
while ($roww = $ffname->fetch_assoc())
{
	echo "Name : ".$roww['FirstName'];
}
while ($row2 = $llname->fetch_assoc())
{
	echo "  ".$row2['LastName'];
}
echo "<br><br>";
$timetotal=gmdate("H:i:s",$total);
$inhr=$total/3600;
if(!session_id()) session_start();
$_SESSION['inhr'] = $inhr;
echo "Total time worked :".$timetotal;
?>
<style>
div.transbox {
  margin: 50px;
  height: 100px;
  width : 400px;
   background: rgba(240,240,240,0.9);
  border: 3px ;
  border-style: outset;
}
.button1 {
  background-color: MediumSeaGreen; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 3px 1px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; 
  transition-duration: 0.4s;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
	</style>
<div class="transbox">
	<form action = "salary.php">
	Calculate Salary ? <input type = "submit" value = "Salary" class="button1 button2"/>
</form> 
</div>
</body>
</center>
</html>