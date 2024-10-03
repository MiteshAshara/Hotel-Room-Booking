<?php 
include "../db.php";
extract($_POST);
// print_r($_POST);
$price=$_POST['price'];
$sql = "UPDATE type SET price='".$price."' WHERE id='".$id."'";
if(mysqli_query($link,$sql)) {
	header('Location: ../admin/price.php');
}
?>