<?php
	include 'db.php';
	$book_id = $_POST['book_id'];
	$book_name = $_POST['book_name'];
	$author = $_POST['author'];
	$lib_id = $_POST['lib_id'];
	$sql = "INSERT INTO book VALUES('$book_id','$book_name','$author','$lib_id');";
	$result = mysqli_query($conn,$sql);
	echo "<h1>Values Inserted</h1><br>";
	echo "<br><a href = '/Student_Database/Admin/admin_dashboard.php'>Click</a>"


	
?>