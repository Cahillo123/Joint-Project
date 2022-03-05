<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

$sql = 'CREATE DATABASE IF NOT EXISTS project;';
if (!$conn->query($sql) === TRUE) {
  die('Error creating database: ' . $conn->error);
}

$sql = 'USE project;';
if (!$conn->query($sql) === TRUE) {
  die('Error using database: ' . $conn->error);
}

$sql = 'CREATE TABLE IF NOT EXISTS users (
id int NOT NULL AUTO_INCREMENT,
fullname varchar(256) NOT NULL,
email varchar(256) NOT NULL,
username varchar(256) NOT NULL,
password varchar(256) NOT NULL,
address varchar(256) NOT NULL,
dob varchar(256) NOT NULL,
phonenumber varchar(256) NOT NULL,
ccname varchar(256) NOT NULL,
ccnumber varchar(256) NOT NULL,
img_file_name varchar(256) NOT NULL,
img_contents MEDIUMTEXT NOT NULL,
iv varchar(128) NOT NULL,
PRIMARY KEY (id));';
if (!$conn->query($sql) === TRUE) {
  die('Error creating table: ' . $conn->error);
}