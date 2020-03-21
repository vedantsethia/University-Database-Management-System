<?php
	include 'db.php';
	$proj_id = $_POST['proj_id'];
	$dept_id = $_POST['dept_id'];
	$project_title = $_POST['title'];
	$faculty_head = $_POST['fac_id'];
	$budget = $_POST['budget'];
	$course_id = $_POST['course_id'];
	$sql = "INSERT INTO projects VALUES('$proj_id','$dept_id','$project_title','$faculty_head','$budget');";
	$sql1 = "INSERT INTO projpreqs VALUES('$proj_id','$course_id');";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"


	
?>