<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    
		
		$email = urldecode($_REQUEST["apiuser"]); // removes backslashes
		$email = mysqli_real_escape_string($con,$email);//escapes special characters in a string
		$password = urldecode($_REQUEST["apipwd"]);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
       $sql = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($con,$sql) or die(mysql_error());
		
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         			
			$_SESSION['usern']=$row['username'];
			$_SESSION['uname'] = $row["email"];
	}
			header("Location: ../"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>E-mail/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
     ?>

