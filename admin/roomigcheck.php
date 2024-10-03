<?php  
include "../db.php";
print_r($_POST); extract($_POST);
if(isset($_POST['update'])){
	$id= $_REQUEST['id'];
	$dirname = "../img/";
		echo $name_file = $_FILES["file"]["name"];
		echo $temp_name = $_FILES['file']['tmp_name'];
		echo $type_photo=$_FILES['file']['type'];
		/*if($type_photo=="image/jpg" || $type_photo=="image/jpeg" || $type_photo=="image/bmp" || $type_photo=="image/png")
		{*/
		move_uploaded_file($temp_name,$dirname.$name_file);
		
		echo $sql = "UPDATE type SET img='".$name_file."' WHERE id='".$id."'";
		if(mysqli_query($link,$sql)) {
				header('Location: roomimg.php');
			}
		/*}*/
		else
		{
			exit;
		}
	
}
?>