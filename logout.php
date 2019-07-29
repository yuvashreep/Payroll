<html>
<head>
	<h4> Successfully Logged Out ! </h4>
</head>
<body>

<?php
$db = mysqli_connect("localhost", "root", "","register") 
or die("Couldn't select database.");
mysqli_select_db($db,"register");

date_default_timezone_set('Asia/Kolkata');
$logout_time = date("H:i:s");
echo "Logout time : $logout_time";
session_start();
$ld=$_SESSION['login_date'];
$id=$_SESSION['username'];
$lt=$_SESSION['login_time'];
$ltts=strtotime($lt);
$lgts=strtotime($logout_time);
$diff=$lgts-$ltts;
echo "<br>";
echo "You've worked for : ";
echo gmdate("H:i:s",$diff);
echo "   hours";
$sqll = "INSERT INTO login (empid,logindate,logintime,logouttime,timein) VALUES ('$id','$ld','$lt','$logout_time','$diff')";
mysqli_query($db,$sqll) or die(mysqli_error($db)); 
?> 

</body>
</html>
