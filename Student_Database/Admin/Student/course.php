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
  background: #11bbff;
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
<br><br>
<?php
	session_start();
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$sql = "SELECT * FROM takes t JOIN course c JOIN department d on t.course_id = c.course_id and d.dept_id = c.dept_id where t.s_id = '$stud_id' ;";	
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
		echo "<div class='form'><form class='login-form'>";
	echo "<center><h2><u>Courses Taken</u></h2></center>";
	if($resultCheck == 0){
		echo "<p>Students takes no courses.</p>";
	}
	else{
		echo "<table style = 'width:100%' id='customers'>";
		echo "<tr>";
		echo "<th>Course Id</th>";
		echo "<th>Course Name</th>";
		echo "<th>Department Name</th>";
		echo "</tr>";		
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row['course_id']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['dept_name']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br><br>";
		
	}
	echo "<button><a href = 'forms/course.php'>Enroll into Courses (Max 4)</button></a>";

?>
