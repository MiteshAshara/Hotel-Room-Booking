<?php
	include('../db.php');
?>

<?php


$cindate=$_POST['date'];
extract($_POST);

if(!empty($cindate))
{
	$tommorow = date('Y-m-d', strtotime($cindate)+86400);
	echo "<label>Check-Out</label>";
    echo "<input name='cout' type ='date' class='form-control no-spin' onkeydown='return false' min='".$tommorow."'>";
	
}
?>
