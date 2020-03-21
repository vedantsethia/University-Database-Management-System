<?php
	session_start();
	include "db.php";
	$stud_id = $_SESSION['stud_id'];
	$id = $_POST['id'];
	$role = 'Member';
	$sql = "INSERT INTO participates VALUES('$stud_id','$id','$role')";
	$result = mysqli_query($conn,$sql);
	echo "Inserted Successfully";
	header("Location:club.php");

?>