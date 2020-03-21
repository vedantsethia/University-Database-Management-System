<?php
	include 'db.php';
	$dept_id = $_POST['dept_id'];
	$name = $_POST['name'];
	$budget = $_POST['budget'];
	$dept_block = $_POST['dept_block'];
	$sql = "INSERT INTO department VALUES('$dept_id','$name','$budget','$dept_block');";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"
?>