<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
// Create database
if (mysql_query("CREATE DATABASE YourTakeOn",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
echo "<br />";

// Create table
mysql_select_db("YourTakeOn", $con);
$sql = "CREATE TABLE `YourTakeOn`.`users` (
`userID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`email` VARCHAR( 255 ) NOT NULL UNIQUE ,
`password` VARCHAR( 255 ) NOT NULL ,
`firstname` VARCHAR( 30 ) NOT NULL ,
`lastname` VARCHAR( 30 ) NOT NULL ,
`lastlogin` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

// Execute query
if (mysql_query($sql,$con))
  {
  echo "Tables users created";
  }
else
  {
  echo "Error creating table: " . mysql_error();
  }
 echo "<br />";
// Create table
$sql = "CREATE TABLE `YourTakeOn`.`posts` (
`postID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`userID` INT NOT NULL ,
`posttitle` VARCHAR( 60 ) NOT NULL ,
`postblurb` VARCHAR( 255 ) NOT NULL ,
`rating` FLOAT NOT NULL ,
`totalvotes` FLOAT NOT NULL ,
`vid_url` VARCHAR( 255 ) NOT NULL ,
`last_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

// Execute query
if (mysql_query($sql,$con))
  {
  echo "Tables posts created";
  }
else
  {
  echo "Error creating table: " . mysql_error();
  }
  
  echo "<br />";
 // Create table
$sql = "CREATE TABLE `YourTakeOn`.`votes` (
`voteID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`postID` INT NOT NULL ,
`userID` INT NOT NULL ,
`rating` INT NOT NULL ,
`date_voted` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

// Execute query
if (mysql_query($sql,$con))
  {
  echo "Tables posts created";
  }
else
  {
  echo "Error creating table: " . mysql_error();
  }
  
mysql_close($con);
?> 