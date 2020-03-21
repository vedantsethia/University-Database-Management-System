<?php
	session_start();
	include "db.php";
	$stud_id = $_SESSION['stud_id'];
	echo $stud_id;
	$id = $_POST['id'];
	echo $id;
	$sql = "SELECT COUNT(*) FROM borrows WHERE book_id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	//echo $row['COUNT(*)'];
	if($row['COUNT(*)'] < 3){
		$sql2 = "INSERT INTO borrows VALUES ('$stud_id','$id')";
		$result = mysqli_query($conn,$sql2);
		echo "<a href = 'C:\xampp\htdocs\Student_Database\Admin\Student\student_dashboard.php'>Click Here to go back</a>";
	}
	else{
		echo "No copies of this book is available";
		echo "<a href = 'book.php'>Click Here to go back</a>";
	}
?>