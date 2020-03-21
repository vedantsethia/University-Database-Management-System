<?php
	include 'db.php';
	$club_id = $_POST['club_id'];
	$club_name = $_POST['club_name'];
	$club_head = $_POST['club_head'];
	$type = $_POST['type'];
	$sql = "INSERT INTO club VALUES('$club_id','$club_name','$club_head','$type');";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"


	
?>