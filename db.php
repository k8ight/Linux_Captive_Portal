<?php
$db="captiveportal";
$servername = "localhost";
$username = "root";
$password = "";
$filename = 'portal.sql';
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlfs = "CREATE DATABASE $db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
if (mysqli_query($conn, $sqlfs)) {
    echo "No Database found Creating databases:-<br>";
	$conx = mysqli_connect($servername, $username, $password,$db);
	if (!$conx) { die("Connection failed: " . mysqli_connect_error());}
	$sql = "CREATE TABLE `agroup` (`ID` int(11) NOT NULL,`gname` text NOT NULL,`priv` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$sql .= "INSERT INTO `agroup` (`ID`, `gname`, `priv`) VALUES(1, 'Admin', 'yes'),(2, 'portal', 'mod');";
$sql .= "CREATE TABLE `cpauth` (  `ID` int(11) NOT NULL, `ip` text NOT NULL,  `gateway` text NOT NULL,  `MAC` text NOT NULL,  `serial` text NOT NULL,  `status` text NOT NULL,  `rdate` text NOT NULL,  `ldate` text NOT NULL,  `pack` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$sql .="CREATE TABLE `pack` (  `ID` int(11) NOT NULL,  `Name` text NOT NULL,  `uspeed` text NOT NULL,  `dspeed` text NOT NULL,  `price` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$sql .="INSERT INTO `pack` (`ID`, `Name`, `uspeed`, `dspeed`, `price`) VALUES(10, 'Starter', '4', '8', '250'),(11, 'Starter+', '5', '10', '350');";
$sql .="CREATE TABLE `padmin` (`ID` int(11) NOT NULL,  `username` text NOT NULL,  `fname` text NOT NULL,  `password` text NOT NULL,  `gname` text NOT NULL,  `phone` text NOT NULL,  `email` text NOT NULL,  `address` text NOT NULL,  `zone` text NOT NULL,  `ipblocks` text NOT NULL,  `routerip` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$sql .="CREATE TABLE `user` (`ID` int(11) NOT NULL,  `serial` text NOT NULL,  `Name` text NOT NULL,  `password` text NOT NULL,  `Address` text NOT NULL,  `Phone` text NOT NULL,  `Email` text NOT NULL,  `zone` text NOT NULL,  `regdate` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$sql .="ALTER TABLE `agroup`  ADD PRIMARY KEY (`ID`);";
$sql .="ALTER TABLE `cpauth`  ADD PRIMARY KEY (`ID`);";
$sql .="ALTER TABLE `pack`  ADD PRIMARY KEY (`ID`);";
$sql .="ALTER TABLE `padmin`  ADD PRIMARY KEY (`ID`);";
$sql .="ALTER TABLE `user`  ADD PRIMARY KEY (`ID`);";
$sql .="ALTER TABLE `agroup`  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$sql .="ALTER TABLE `cpauth`  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$sql .="ALTER TABLE `pack`  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
$sql .="ALTER TABLE `padmin`  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$sql .="ALTER TABLE `user`  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$sql .="COMMIT;";
if (mysqli_multi_query($conx, $sql)) {
    echo "Creating tables:-OK<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	echo "Creating databases:-OK<br>";
	echo "Creating databases:-Successful<br>";
	mysqli_close($conx);
} else {
   $con = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
}

mysqli_close($conn);
?> 

