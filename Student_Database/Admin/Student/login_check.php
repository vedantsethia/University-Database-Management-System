<?php
	session_start();
	include 'db.php';
	$student_name = $_POST['username'];
	$student_name = preg_replace('/\s+/', '', $student_name);
	$student_pass = $_POST['password'];
	$student_pass = preg_replace('/\s+/', '', $student_pass);
 	$sql = "SELECT * FROM student WHERE stud_login = '$student_name' AND stud_pass = '$student_pass';";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo "<p> The student username or password is wrong.</p><br>";
		echo '<a href = "student_login.php"> Try again</a>';
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['student_name'] = $row['stud_name'];
			$_SESSION['stud_id'] = $row['stud_id']; 
		}
		header('LOCATION:student_dashboard.php');
	}		
?>