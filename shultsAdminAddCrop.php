<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("shultsAngus", $con);
  $addCropQuery = mysql_query("insert into crops (cropType, description, price, Qty, minQty)
							   values (\"" . $_POST['cropType'] . "\",\"" . $_POST['cropDescription'] 
							   . "\",\"" . $_POST['cropPrice'] . "\",\"" . $_POST['cropQty'] . "\",\""  . 
							   $_POST['cropMQTP'] . "\")");
							   
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Shults Farm Manager</title>
    <link rel="stylesheet" type="text/css" href="adminStylesheet.css" />
</head>
<body><h1>Test</h1>
<?php
	echo "<p>" . mysql_errno($con) . ": " . mysql_error($con) . "</p>";	
	mysql_close($con);
  ?>
  </body>
  </html>