<?php
	include 'db.php';
	$id = $_POST['id'];
	$sql = "DELETE FROM faculty WHERE fac_id = '$id';";
	mysqli_query($conn,$sql);
	echo "<h1>Row deleted</h1><br><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"
?>