<?php
$con=mysqli_connect("localhost","bettybae","talkthings0465","bettybae");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
// $secret = mysqli_real_escape_string($_POST['secret']);

mysqli_query($con, "set names utf8");
$sql="INSERT INTO secrets VALUES (NULL, \"".$_POST['secret']."\" , CURRENT_TIMESTAMP)";

if ($result = mysqli_query($con, $sql))
{
  printf("Error: %s\n", mysqli_error($con));
}


mysqli_close($con);
header("Location: secret.php");
?>