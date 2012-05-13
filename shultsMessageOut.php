<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("shultsAngus", $con);

$currentOrder = mysql_query("INSERT INTO purchase (custFirstName, custLastName, custEmail,
							custPhone, purchaseMessage, purchaseProcessed)
							VALUES(\"" . $_POST['txtFirstName'] . "\",\"" . $_POST['txtLastName'] 
							. "\",\"" . $_POST['txtEmail'] . "\",\"" . $_POST['txtPhone'] . "\",\"" . 
							$_POST['txtMessage'] . "\",\"" . FALSE . "\")");
							
echo mysql_errno($con) . ": " . mysql_error($con) . "\n";

echo "   <title>Scott Shults Angus and Alfalfa - Checkout </title>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"shultsMain.css\" />";
include('shultsPageHeader.php');
echo "<div id=\"mainContent\">";
if (mysql_errno($con) == 0) {
	echo "<h1>Thank you for your order, we will get back with you shortly.</h1>";
	}
echo "	</div>
<div id=\"shultsFooter\">
                    <p>Email Scott at <a href=\"mailto:scott@angusandalfalfa.com\?subject=Angus and Alfalfa Information Request\">Scott@angusandalfalfa.com</a> or call 573-729-4797 for more info. </p>
		    <p>For questions about the website, please contact or webmaster, Andy Fulton at <a href=\"mailto:bearcatFulton@gmail.com?subject=Shults Angus and Alfalfa\" >bearcatFulton@gmail.com</a></p>
        </div>";

?>
