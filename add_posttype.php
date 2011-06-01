<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("YourTakeOn", $con);
 // add rating row to posts table
$sql = "ALTER TABLE `posts` ADD `type` VARCHAR(5 is) NOT NULL";

// Execute query
if (mysql_query($sql,$con))
  {
  echo "Tables posts updated";
  }
else
  {
  echo "Error updating table: " . mysql_error();
  }