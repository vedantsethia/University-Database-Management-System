<?php
	session_start();
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$fac_id = $_POST['id'];
	$sql = "SELECT * FROM faculty f JOIN student s on f.dept_id = s.dept_id WHERE fac_id = '$fac_id' AND stud_id = '$stud_id';";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo "You need to select an advisor from the same department";
		echo "<br>";
		echo "<a href = 'teacher.php'>Click here to select advisor again</a>";
	}
	else{
		$sql1 = "INSERT INTO advisor VALUES('$stud_id','$fac_id');";
		$result = mysqli_query($conn,$sql1);
		echo "Inserted successfully";
		echo "<br>";
		echo "<a href = '/Student/student_dashboard.php'>Click here to go back</a>";
	}

?>
