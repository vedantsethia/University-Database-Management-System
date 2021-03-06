<!DOCTYPE html>
<html>
<head>
	<title>book</title>
	<style>


.login-page {
  width: 360px;
  padding: 1% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #000000;  
  max-width: 360px;
  margin: 0 auto 100px;
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
  padding: 12px;
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
	background-image: url('univerty.jpg');
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
	
	</style>

	</head>
<body>
	<div class="login-page">
  <div class="form">
    
    <form class="login-form" method = "POST" action = "borrow.php">
		<img src="student.png" height=50px width=70px alt="Hey ! Good Looking">
		<h2 class="h"> Book  </h2><br/>
      <input type="text" placeholder="Book ID" name = 'id'/>

	  
      <button type = 'submit'><a>Borrow</button>
         </form>
  </div>
	</div>
<?php
	include 'db.php';	
	$sql = "SELECT * FROM book;";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	echo "<center><p><u>Only 3 copies of the same book are available</u></p></center>";
	if($resultCheck == 0){
		echo "Student did not borrow any books.";
	}
	else{
		echo "<table style = 'width:100%' id='customers'>";
		echo "<tr>";
		echo "<th>Book Id</th>";
		echo "<th>Book Name</th>";
		echo "<th>Author</th>";
		echo "</tr>";		
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row['book_id']."</td>";
			echo "<td>".$row['book_name']."</td>";
			echo "<td>".$row['author']."</td>";
			echo "</tr>";
		}
		echo "</table><br>";
	}

?>

</body>
</html>