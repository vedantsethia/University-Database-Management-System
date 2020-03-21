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
	include 'db.php';
	$sql = "SELECT * FROM faculty";	
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	echo "<center><h2><u>TEACHERS</u></h2></center>";
	if($resultCheck == 0){
		echo "There are no faculty in the database.";
	}
	else{
		echo "<table style = 'width:100%' id='customers'>";
		echo "<tr>";
		echo "<th>Faculty Id</th>";
		echo "<th>Faculty Name</th>";
		echo "<th>Faculty Salary</th>";
		echo "<th>Faculty Deparment Id</th>";
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row['fac_id']."</td>";
			echo "<td>".$row['fac_name']."</td>";
			echo "<td>".$row['salary']."</td>";
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

?>


<style>
.form {
  position: relative;
  z-index: 1;
  background: #ddd;  
  max-width: 200px;
  margin: 0 auto 10px;
  padding: 5px;
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
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #1198ff;
  width: 90%;
  border: 0;
  padding: 0px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #eeeeee;
}

a {
	padding:0px;
	color:black;
    display: block;
    width: 100%;
    line-height: 2.5em;
    text-align: center;
    text-decoration: none;
   
}
a:hover {
	
    color: black;
}



</style>


<br/>
<div class="form">
    
    <form class="login-form">
	  <br/>
      <button><a href="forms/teacher.php"><b>Insert</button></a><br/><br/>
	  <button><a href="delete/teacher.php"><b>Delete</button></a><br/><br/>
      

	  </form>
  </div>