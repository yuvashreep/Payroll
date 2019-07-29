<html>
<center>
<head>
  <h4> Hey There ! </h4>
</head>
<body>
<?php
$db=mysqli_connect("localhost", "root", "","register") 
or die("Couldn't select database.");
mysqli_select_db($db,"register");

$username = $_POST['EmployeeID'];
$password = $_POST['Password'];

$sql = "SELECT * FROM registration WHERE empid = '$username' AND password = '$password' ";
$result = mysqli_query($db,$sql) or die(mysqli_error($db));
$numrows = mysqli_num_rows($result);
if($numrows > 0)
  {
    echo 'Successfully logged in';
    echo '<br>';
    date_default_timezone_set('Asia/Kolkata');
    $login_date=date("Y/m/d");
    $login_time=date("H:i:s");
    echo "Login time : $login_time";
    if(!session_id()) session_start();
      $_SESSION['login_date'] = $login_date;
      $_SESSION['login_time'] = $login_time;
      $_SESSION['username'] = $username;
      echo '<form action="logout.php">';
      echo 'Session complete? <input type="submit" value="Logout"/>';
      echo '</form>';
  }
else
   {
    echo 'Retry';
    echo '<form action="login.html">';
    echo '<input type="submit" value="Login"/>';
    echo '</form>';
   }
   ?>
  <br><br>
</body>
</center>
</html>
