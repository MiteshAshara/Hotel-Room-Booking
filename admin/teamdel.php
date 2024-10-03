<?php 
include "../db.php";
	if(isset($_GET['id'])){
		// print_r($_GET);
		$id = $_GET['id'];
    
    $sql2="DELETE FROM team WHERE id='$id'";
    if(mysqli_query($link,$sql2))
    {
        header("location:team.php");
    }
    else
    {
        echo "error".mysqli_error($link);
    }
}
?>