<?php
ini_set('display_errors','On');

//	$con = mysqli_connect("localhost","yousef",'se1U$aemp4&AtIcHR!lx',"webmentordb");
	$con = mysqli_connect("localhost","root",'tiger',"webmentordb");

	
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  /*confirmpassword should not go in the db*/
$sql = "INSERT INTO user (firstname, lastname, dob, email, password, experience) 
VALUES ('$_POST[firstname]',
	'$_POST[lastname]',
	'$_POST[birthday]',
	'$_POST[email]',
	'$_POST[password]',
	'$_POST[experience]')";
mysqli_query($con,$sql);

$sql1= "SELECT * FROM user where email = '$_POST[email]'";
$result1 = mysqli_query($con, $sql1);
$row=mysqli_fetch_array($result1);
$id=$row['id'];
$sql2="INSERT INTO user_subjects (userid,subject) VALUES ('$id','$_POST[subject]')";
$result2 = mysqli_query($con, $sql2);

session_start(); 			
$_SESSION['email'] = $row['email']; 
			$_SESSION['password']=$row['password'];

header("Location: login.php");

	
echo "You're new login is";
//if (!mysqli_query($con,$sql2)) {
  //die('Error: ' . mysqli_error($con));
//}

?>
