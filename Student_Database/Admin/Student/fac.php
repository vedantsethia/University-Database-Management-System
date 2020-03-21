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

.form {
  position: relative;
  z-index: 1;
  background: #fff;  
  max-width: 80%;
  margin: 0 auto 0px;
  padding: 0px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 98%;
  border: 0;
  margin: 0 0 15px;
  padding: 10px;
  box-sizing: border-box;
  font-size: 20px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #55eeff;
  width: 30%;
  border: 0;
  padding: 5px;
  color: #000000;
  font-size: 20px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #1198ff;
}

a {
	padding:0px;
	color:black;
    display: block;
    width: 100%;
    line-height: 2em;
    text-align: center;
    text-decoration: none;
   
}
a:hover {
	
    color: black;
}



</style>


<?php
	session_start();
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$sql1 = "SELECT * FROM student s JOIN advisor a JOIN faculty f on s.stud_id = a.s_id AND a.f_id = f.fac_id WHERE s.stud_id = '$stud_id' ;";	
	$sql2 = "SELECT * FROM takes t JOIN teaches tc JOIN faculty f JOIN course c on t.course_id = tc.course_id and tc.course_id = c.course_id and tc.fac_id = f.fac_id WHERE t.s_id = '$stud_id';";
	$result1 = mysqli_query($conn,$sql1);// for advisor table
	$resultCheck1 = mysqli_num_rows($result1);
	$result2 = mysqli_query($conn,$sql2);
	$resultCheck2 = mysqli_num_rows($result2);
	echo "<div class='form'><form class='login-form'>";
	echo "<center><h2><u>Advisors and Teaching Faculty</u></h2></center>";

	if($resultCheck1 == 0){
		echo "<p>Student has no advisors.</p>";
		echo "<button type = 'submit'><a href = './forms/teacher.php'>Approach Advisor</button>";
	}
	else{
		//ADVISOR table
			echo "<h2>Advisors</h2>";
			echo "<table style = 'width:100%' id='customers'>";
		echo "<tr>";
		echo "<th>Advisor Id</th>";
		echo "<th>Advisor name</th>";
		echo "</tr>";		
		while($row1 = mysqli_fetch_assoc($result1)){
			echo "<tr>";
			echo "<td>".$row1['fac_id']."</td>";
			echo "<td>".$row1['fac_name']."</td>;";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		//Teaching Faculty table
		
	}
	if($resultCheck2 == 0){
		echo "<p>The student has not taken any courses</p>";
	}
	else{
		//Teaching Faculty Table
		echo "<br><br><h2>Teachers</h2>";
		echo "<table style = 'width:100%' id='customers'>";
		echo "<tr>";
		echo "<th>Faculty Id</th>";
		echo "<th>Faculty Name</th>";
		echo "<th>Course taught</th>";
		echo "<th>Room</th>";
		echo "</tr>";
		while($row2 = mysqli_fetch_assoc($result2)){
			echo "<tr>";
			echo "<td>".$row2['fac_id']."</td>";
			echo "<td>".$row2['fac_name']."</td>";
			echo "<td>".$row2['title']."</td>";
			echo "<td>".$row2['room_id']."</td>";
			echo "</tr>";
		}
	}

?>

