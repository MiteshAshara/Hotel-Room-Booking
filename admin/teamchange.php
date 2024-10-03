<?php  
include "../db.php";
if(isset($_POST['update'])){
	$id=$_POST['id'];
	if(!empty($id)){
		$img=$_POST['img'];
		if(!empty($_FILES)){
			$dirname = "assets/img/team/";
			$img_file = $_FILES["file1"]["name"];
			$temp_name = $_FILES['file1']['tmp_name'];
			$type_photo=$_FILES['file1']['type'];
			if(move_uploaded_file($temp_name,$dirname.$img_file)){
				$img = $img_file;
			}
		}
		$sql= "update team set name='".$_POST['name']."',post='".$_POST['post']."',img='".$img."' where id='".$id."'" ;
		if(mysqli_query($link,$sql)) {
			header('Location: team.php');
		}
	}
	else{
		$dirname = "assets/img/team/";
			$img_file = $_FILES["file1"]["name"];
			$temp_name = $_FILES['file1']['tmp_name'];
			$type_photo=$_FILES['file1']['type'];
			if(move_uploaded_file($temp_name,$dirname.$img_file)){
				$img = $img_file;
			}
		$sql= "insert into team(name,post,img) values('".$_POST['name']."','".$_POST['post']."','".$img."')";
		if(mysqli_query($link,$sql)) {
			header('Location: team.php');
		}
	}
}
?>