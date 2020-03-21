<?php
	session_start();
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$SQL = "SELECT COUNT(*) FROM takes WHERE s_id = '$stud_id';";
	$result = mysqli_query($conn,$SQL);
	$row = mysqli_fetch_assoc($result);
	if($row['COUNT(*)'] < 4){
		$id = $_POST['id'];
		$sql = "SELECT * FROM student WHERE stud_id = '$stud_id';";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$semester = $row['semester'];
		$grade = 'A';
		$sql2 = "SELECT * FROM teaches WHERE course_id = '$id';";
		$result1 = mysqli_query($conn,$sql2);
		$resultCheck = mysqli_num_rows($result1);
		if($resultCheck != 0){
			$row = mysqli_fetch_assoc($result1);
			$room_id = $row['room_id'];
			$sql3 = "INSERT INTO takes VALUES('$stud_id','$id','$room_id','$grade','$semester')";
			$result2 = mysqli_query($conn,$sql3);
			echo ".";
			echo "<br href = /Student_Database/Admin/Student/student_dashboard.php><a>Click here</a>";
		}
		
	}
	else{
			echo "Cannot enroll into more courses";
		}
?>