<?php 
if (($_SERVER['PHP_AUTH_USER'] != 'Scott') ||
   ($_SERVER['PHP_AUTH_PW'] != '')) {
      header('WWW-Authenticate: Basic Realm="Secret Stash"');
      header('HTTP/1.0 401 Unauthorized');
      print('You must provide the proper credentials!');
      exit;
} else {
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Shults Farm Manager</title>
    <link rel="stylesheet" type="text/css" href="adminStylesheet.css" />
</head>
<body>
    <div id="header">
        <h1>Shults Farm Manager</h1>
    </div>
    <div id="navsite">
        <p> Site Navigation: </p>
        <ul>
            <li><a href="./shultsAdminLivestock.php">List Livestock</a> </li> <br />
            <li><a href="./shultsAdminCrops.php">List Crop</a> </li> <br />
            <!--<li><a href="./shultsAdminMessageCenter.php">Message Center</a> </li> <br /> -->
        </ul>
    </div>
<?php 
//Connect to shultsAngus
$con = mysql_connect("localhost","root","");
			if (!$con)
			{
			die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("shultsAngus", $con);
	//Add or remove from database		
 	if(isset($_GET['addCrop'])) {	
			$addCropQuery = mysql_query("insert into crops (cropType, description, price, Qty, minQty)
							   values (\"" . $_POST['cropType'] . "\",\"" . $_POST['cropDescription'] 
							   . "\",\"" . $_POST['cropPrice'] . "\",\"" . $_POST['cropQty'] . "\",\""  . 
							   $_POST['cropMQTP'] . "\")");
	} elseif(isset($_GET['removeCrop'])) {
		
		for($lcv2 = 1; $lcv2 <= mysql_result(mysql_query("Select max(cropID) from crops"),0); $lcv2++) {
		    if(isset($_POST['del'.$lcv2])){
				$rmCropQuery = mysql_query("delete from crops where cropID =" . $lcv2);
			}
		} 
	}
?>
    <div id="columnMain">
     <h1>List Crop</h1>
     <form action="?addCrop" method="post">
     Crop Type: <input type="text" name="cropType"/> <br />
     Description: <textarea cols="60" rows="5" name="cropDescription" ></textarea> <br />
     Quantity: <input type="text" name="cropQty" /> <br />
     Minimum Quantity to Purchase: <input type="text" name="cropMQTP" /> <br />
     Price: <input type="text" name="cropPrice" /> <br />
    <input type="submit" value="Add Crop"/>
     </form>
	 <form action="?removeCrop" method="post">
	 <table id="recordBox">
		<tr>
			<td>Crop Type</td>
			<td>Description</td>
			<td>Price</td>        
			<td>Quantity</td>
			<td>Minimum Quantity to Purchase</td>
			<td>Remove</td>
		</tr>
	<?php
	//Generate Contents of Crops Table from shultsAngus database
	$maxCropID = mysql_result(mysql_query("Select max(cropID) from crops"),0);
	for ($lcv = 1; $lcv <= $maxCropID; $lcv++) {
		$cropID = mysql_query("Select cropID from crops where cropID = " . $lcv);
		if (mysql_num_rows($cropID) != 0) {
			$cropType = mysql_query("select cropType from crops where cropID = " . $lcv);
			$cropDescription = mysql_query("Select description from crops where cropID = " . $lcv);
			$cropPrice = mysql_query("Select price from crops where cropID = " . $lcv);
			$cropQty = mysql_query("Select Qty from crops where cropID = " . $lcv);
			$cropMinQty = mysql_query("Select minQty from crops where cropID = " . $lcv);
			
			//echo mysql_result($cropID[$lcv],0);
			if ($lcv % 2 == 0) {
			echo "<tr>";
			}else{
			echo "<tr class=\"odd\">";
			}
			//$toRemove[$lcv] = mysql_result($cropID[$lcv],0);
			echo	"<td>" . mysql_result($cropType,0) . "</td>\n" .
				"<td>" . mysql_result($cropDescription,0) . "</td>\n" .
				"<td>" . mysql_result($cropPrice,0) . "</td>\n" .
				"<td>" . mysql_result($cropQty,0) . "</td>\n" .
				"<td>" . mysql_result($cropMinQty,0) . "</td>\n" .
				"<td> <input type=\"submit\" name=\"del$lcv\" value=\"X\"  > </td>\n" .
			 "</tr>\n";
		}
	}
	
	?>
	 </table>
	 </form>
    </div>
</body>
</html>
<?php } ?>