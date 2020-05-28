<?php
	include "db-connection.php";
	// Create database
	$sql = "CREATE DATABASE test01";
	if ($conn->query($sql) === FALSE) {
	    echo "Error creating database: " . $conn->error;
	}
	$sql = "CREATE TABLE tutor_users (
	usernametest VARCHAR(20) NOT NULL,
	_Driving_License CHAR ,
	_Phone INT(11) NOT NULL,
	_ddress VARCHAR(100),
	_Email VARCHAR(50) NOT NULL,
	_DOB INT(10)
	)";
	$sql = "INSERT INTO tutor_users (usernametest, _Driving_License, _Phone,_Address,_Email,_DOB) VALUES ('sayed', 'A', '01147880178','helwan-cairo-egypt','sayed@gmail.com','140399')";
	$conn->close();
?>