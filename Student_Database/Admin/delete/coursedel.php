<?php
	include 'db.php';
	$id = $_POST['id'];
	$sql = "DELETE FROM course WHERE course_id = '$id';";
	mysqli_query($conn,$sql);
	echo "<h1>Row deleted</h1><br><br>";
	echo "<a href = 'Student_Database/Admin/admin_dashboard'>Click</a>";
?>