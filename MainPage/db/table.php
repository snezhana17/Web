<?php 
	include "config.php";
	
	// Create database connection 
	$con = new mysqli($dbHost, $dbUsername, $dbPassword,$myDb); 
	 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
	echo "Connected successfully";

	$sql = "CREATE TABLE `files` (
		`file_name` varchar(100) NOT NULL,
		`created` datetime NOT NULL)
		ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		
		if ($con->query($sql) === TRUE) {
			echo "Table Files created successfully";
		} else {
			echo "Error creating table: " . $con->error;
		}

	$con->close();


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

	// Create database connection 
	$con = new mysqli($dbHost, $dbUsername, $dbPassword,$myDb); 
	 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
	echo "Connected successfully";

	$sql = "CREATE TABLE `grade` (
		`file_name` VARCHAR(100) NOT NULL,
		question INT  NOT NULL , 
        grade INT)";
		
		if ($con->query($sql) === TRUE) {
			echo "Table Files created successfully";
		} else {
			echo "Error creating table: " . $con->error;
		}

	$con->close();
?>