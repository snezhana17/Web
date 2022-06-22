<?php 
	
	
	// Create database connection 
	$con = new mysqli($dbHost, $dbUsername, $dbPassword,$myDb); 
	 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
	echo "Connected successfully";

	$sql = "CREATE TABLE `feedback_` (
		`file_name` VARCHAR(100) NOT NULL ,
		feedback VARCHAR(1000))";
		
		if ($con->query($sql) === TRUE) {
			echo "Table Files created successfully";
		} else {
			echo "Error creating table: " . $con->error;
		}
		
	$con->close();
?>