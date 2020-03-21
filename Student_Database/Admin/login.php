<?php
	include_once 'db.php';
	$sql = "SELECT * FROM student;"; 
	$result = mysqli_query($conn,$sql);
	echo $result;
?>