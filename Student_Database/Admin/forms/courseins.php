<?php
	include 'db.php';
	$course_id = $_POST['course_id'];
	$course_title = $_POST['course_title'];
	$dept_id = $_POST['dept_id'];
	$credits = $_POST['credits'];
	$text_id = $_POST['text_id'];
	$fac_id = $_POST['fac_id'];
	$room = $_POST['room_no'];
	$sql1 = "INSERT INTO course VALUES('$course_id','$course_title','$dept_id','$credits','$text_id');";
	$sql2 = "INSERT INTO teaches VALUES('$fac_id','$course_id','$room');";
	$result = mysqli_query($conn,$sql1);
	$result = mysqli_query($conn,$sql2);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"
?>