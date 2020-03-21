<?php
	include "db.php";
	$id = $_POST['stud_id'];
	$sql = "DELETE FROM student WHERE stud_id = '$id';";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Row deleted</h1><br><br>";
	echo "<a href = 'Student_Database/Admin/admin_dashboard'>Click</a>";
?>