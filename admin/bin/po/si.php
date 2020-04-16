<?php
	require('db.php');
	session_start();
    $sql = "SELECT * FROM `users` WHERE email='".$_SESSION['uname']."'";
		$result = mysqli_query($con,$sql) or die(mysql_error());
		
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         	$msg="<br>___________________________<a href='./.bin/po/cm.php' title='close This Message'><button><b>X</b></button></a>";
			$_SESSION['msg']="
			Name:".$row['username']."<br>E-mail:".$row["email"].
			"<br>DOB:".$row["dob"]."<br>Phone:".$row["phone"].
			"<br>Country:".$row["country"]."<br>Join Date:".$row["trn_date"].$msg;
			
	}
			header("Location: ../../"); // Redirect user to index.php
            }else{
				$_SESSION['msg']="Can't Display<br><a href='./.bin/po/cm.php' title='close This Message'><button><b>X</b></button></a>";
				header("Location: ../../");
				}
    
   


 ?>


