<!DOCTYPE html>
<html>
<head><title> Home | Student Database</title>

	<style>


.login-page {
  width: 360px;
  padding: 2% 0 0;
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
background-color: #4CAF50;
}
	
	</style>

	</head>
<body>

	<div class="login-page">
  <div class="form">
    
		<img src="student.png" height=50px width=70px alt="Hey ! Good Looking">
		<h2 class="h"> Student Login </h2><br/>
      <button><a href="./Student/student_login.php">login</button></a>
      
  </div>
	</div>
<div class="login-page">
  <div class="form">
    

		<img src="admin.jpg" height=50px width=70px alt="Hey ! Good Looking">
		<h2 class="h"> Admin Login </h2><br/>
	  
      <button><a href="admin_login.php">login</button></a>
   
  </div>
	</div>
</body>
</html>