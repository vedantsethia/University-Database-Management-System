<?php
	session_start();
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$id = $_POST['id'];
	$duration = '1';
	$sql = "SELECT * FROM projpreqs pr JOIN takes t ON pr.course_id = t.course_id WHERE pr.project_id = '$id' AND t.s_id = '$stud_id'";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo "You do not have the required background to take up this project";
	}
	else{
		$sql = "INSERT INTO works VALUES ('$id','$stud_id','$duration')";
		mysqli_query($conn,$sql);
		echo "You have enrolled into the project";
	}


?>