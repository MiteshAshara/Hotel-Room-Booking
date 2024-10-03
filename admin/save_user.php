<?php
	
	include "../db.php";
	if(isset($_POST['in']) && $_POST['in']=='Add'){
		$q = "insert into login(usname,pass) values('{$_POST['newus']}','{$_POST['newps']}')";
		if(mysqli_query($link,$q)){
			header('Location:usersetting.php');
		}
	}
	else if(isset($_POST['up']) && $_POST['up']=='Update'){
		// print_r($_POST);
		$q = "update login set usname='{$_POST['usname']}',pass='{$_POST['pasd']}' where id='{$_POST['id']}'";
		if(mysqli_query($link,$q)){
			header('Location:usersetting.php');
		}else{
			echo "No";
		}
	}
	else if(isset($_GET['did'])){
		$id =$_GET['did'];		
		$newsql ="DELETE FROM `login` WHERE id ='$id' ";
		if(mysqli_query($link,$newsql))
		{				
			header("Location: usersetting.php");
		}
			
	}
?>