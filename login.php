
<?php
	session_start();
	
?>

<!DOCTYPE html>
<?php

include "index.php";

?>
<html>
<head>
	<title>login</title>
</head>
<body>

	<form method="post" action="#">
		<fieldset style="width: 300px">
			<legend>LOGIN</legend>
			User name:<input type="text" name="user_name">	<br><br>
			password:<input type="password" name="password"><br><br>
			<hr>
			<input type="checkbox" name="rememberMe" value="remember me">Remember Me
			<br><br>
			<input type="submit" name="submit" value="submit"><a href="forgetPassword.php"> forget password?</a>
		</fieldset>
	</form>	
	
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "samia";
	
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		   
		  
		  $sql = "SELECT * FROM user WHERE email = '".$_POST["email"]."' and password = '".$_POST["pass"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["email"]=$_POST["email"];
			  $_SESSION["login"]=true;
			  header("location: home.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>


	<a href="index.php"> back</a>
</body>


