<?php
	session_start();
	include 'db.php';
	$admin_name = $_POST['username'];
	$admin_name = preg_replace('/\s+/', '', $admin_name);
	$admin_pass = $_POST['password'];
	$admin_pass = preg_replace('/\s+/', '', $admin_pass);
 	$sql = "SELECT * FROM admin WHERE admin_id = '$admin_name' AND admin_pass = '$admin_pass';";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo "<p> The admin username or password is wrong.</p><br>";
		echo '<a href = "admin_login.php"> Try again</a>';
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['admin_name'] = $row['admin_name'];
		
		}
		header('LOCATION:admin_dashboard.php');
	}		
?>