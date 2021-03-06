<?php
	session_start();
?>

<style>

.login-page {
  width: 460px;
  padding: 1% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #000000;  
  max-width: 600px;
  margin: 0 auto 10px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 0px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #4C9F50;
}
/*
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none
}
.form .register-form {
  display: none;
}*/
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
	/*
  background: f2f2f2; /* fallback for old browsers 
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;     */
     background-repeat:no-repeat;

   background-size:cover;
	background-image: url('university.jpg');
}
.h {color:white;font-family:'verdana'}	
	a {
	padding:0px;
	color:black;
    display: block;
    width: 100%;
    line-height: 4em;
    text-align: center;
    text-decoration: none;
   
}
a:hover {
	
    color: black;
}
	
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width:100%; border:20px;
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
  background: #ddd;  
  max-width: 600px;
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
  width: 100%;
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
	</head>
<body>
	<div class="login-page">
  <div class="form">
    
    <form class="login-form">
<?php
	include 'db.php';
	$stud_id = $_SESSION['stud_id'];
	$sql = "SELECT * FROM student where stud_id = '$stud_id'";	
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	echo "<center><h2><u>Student Info</u></h2></center>";
	if($resultCheck == 0){
		echo "There are no students in the database.";
	}
	else{
		
		echo "<center><table style = 'width:40%' id='customers'>";
		while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<th>Student Id</th>";
		
			echo "<td>".$row['stud_id']."</td>";
		echo "<tr>";
		echo "<th>Student Name</th>";
		
			echo "<td>".$row['stud_name']."</td>";
		
		echo "<tr>";
		echo "<th>Student Login</th>";
		
			echo "<td>".$row['stud_login']."</td>";
		
		echo "<tr>";
		echo "<th>Student Password</th>";
		
			echo "<td>".$row['stud_pass']."</td>";
		
		
		echo "<tr>";
		echo "<th>Student Date Of Birth</th>";
		
			echo "<td>".$row['dob']."</td>";
		
		echo "<tr>";
		echo "<th>Semester</th>";
			echo "<td>".$row['semester']."</td>";
		
		
		echo "<tr>";
		echo "<th>Department Name</th>";
				
		
		
			$dept_id = $row['dept_id'];
			$sql1 = "SELECT * FROM department WHERE dept_id = '$dept_id'";
			$result1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_assoc($result1)){
				echo "<td>".$row1['dept_name']."</td>";	
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	echo "<br><br>";
	echo "<div class='form'><form class='login-form'>";
	echo "<button><a href = 'reportcard.php'>Report Card</button></a>";

?>


