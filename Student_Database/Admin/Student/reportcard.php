<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #1198FF;
    color: white;
}
</style>

<?php
	session_start();
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$sql = "SELECT * FROM takes t JOIN student s JOIN course c on t.s_id = s.stud_id AND t.course_id = c.course_id WHERE t.s_id = '$stud_id';";	
	$sql2 = "SELECT * FROM student WHERE stud_id = '$stud_id';";
	$result1 = mysqli_query($conn,$sql2);
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result1);
	echo "<center><h2><u>".$row['stud_name']."   ".$row['stud_id']."</u></h2><h2><u>"."</u></h2></center>";
	if($resultCheck == 0){
		echo "There are no students in the database.";
	}
	else{
		echo "<table style = 'width:100%' id='customers'>";
		echo "<tr>";
		echo "<th>Course Code</th>";
		echo "<th>Course Name</th>";
		echo "<th>Grade</th>";
		echo "<th>Semester</th>";
		echo "<th>Credits</th>";
		echo "</tr>";		
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row['course_id']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['grade']."</td>";
			echo "<td>".$row['semester']."</td>";
			echo "<td>".$row['credits']."</td>";
		}
		echo "</table>";
	}

?>