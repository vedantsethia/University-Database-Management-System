<?php
	include 'db.php';
	$fac_id = $_POST['fac_id'];
	$name = $_POST['name'];
	$salary = $_POST['salary'];
	$department = $_POST['dept_id'];
	$sql = "INSERT INTO faculty VALUES('$fac_id','$name','$salary','$department');";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"
?>