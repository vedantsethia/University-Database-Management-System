<?php
	include 'db.php';
	$stud_id = $_POST['stud_id'];
	$stud_name = $_POST['name'];
	$stud_login = $_POST['login_id'];
	$password = $_POST['password'];
	$DOB = $_POST['DOB'];
	$semester = $_POST['semester'];
	$department = $_POST['department'];
	$sql = "INSERT INTO student VALUES('$stud_id','$stud_name','$stud_login','$password','$DOB','$semester','$department');";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"
?>