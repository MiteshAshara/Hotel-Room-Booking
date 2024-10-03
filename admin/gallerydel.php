<?php 
include "../db.php";
	if(isset($_GET['id'])){
		// print_r($_GET);
		$id = $_GET['id'];
    
    $sql2="DELETE FROM gallery WHERE id='$id'";
    if(mysqli_query($link,$sql2))
    {
        header("location:gallery.php");
    }
    else
    {
        echo "error".mysqli_error($link);
    }
}
?>