<?php
include 'db.php';
?>

<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// die();
if(isset($_POST)=='submit'){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$sub=$_POST['subject'];
	$message=$_POST['message'];

	$sql="INSERT INTO  contact (name,email,subject,message)values('$name','$email','$sub','$message')";
	if(mysqli_query($link,$sql)){
		header("location:index.php");
	}
	else{
		"please check your form!".mysqli_error();
	}
	
}
?>