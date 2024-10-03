<?php  
include "../db.php";
// print_r($_POST);
 // extract($_POST);
if(isset($_POST['update'])){
	$id= $_REQUEST['id'];
	$dirname = "../assets/img/gallery/";
		 $name_file = $_FILES["file1"]["name"];
		 $temp_name = $_FILES['file1']['tmp_name'];
		 $type_photo=$_FILES['file1']['type'];
		/*if($type_photo=="image/jpg" || $type_photo=="image/jpeg" || $type_photo=="image/bmp" || $type_photo=="image/png")
		{*/
		move_uploaded_file($temp_name,$dirname.$name_file);
		
		 $sql = "UPDATE gallery SET name='".$name_file."' WHERE id='".$id."'";
		if(mysqli_query($link,$sql)) {
				header('Location: gallery.php');
			}
		/*}*/
		else
		{
			//header("location:../gallery.php?msg");
			exit;
		}
	
}
?>