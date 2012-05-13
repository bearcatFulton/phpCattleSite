<!DOCTYPE HTML>
<html>
<?php
	$cattleID = $_GET["CID"];
	$con = mysql_connect("localhost","root","");
	if (!$con)
        {
	  die('Could not connect: ' . mysql_error());
        }
	mysql_select_db("shultsAngus", $con);
	$result = mysql_query("SELECT * FROM Cattle where cattleID='$cattleID';");
	$row = mysql_fetch_array($result);
	$shoppingListLength;
	echo "
<head>
	<title>" . $row['name'] . "</title>
	
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	
	<link rel=\"stylesheet\" type=\"text/css\" href=\"shultsMain.css\" />

	<!--Script for Google Analytics-->
	<script type=\"text/javascript\">

		var _gaq = _gaq || [];
	       _gaq.push(['_setAcc    ount', 'UA-10829362-3']);
		_gaq.push(['_trackPageview']);
	
	       (function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	       })();
	</script>
	<script src=\"http://ajax.Microsoft.com/ajax/jQuery/jquery-1.7.1.min.js\" type=\"text/javascript\"> </script>
	
</head>
<body>
	";
	include('shultsPageHeader.php');
	echo "	 
		<div id=\"mainContent\">
	";
		$vidLink = "./aMovie.mp4";
		echo "<h1>" . $row['name'] . "</h1><br />
			<label>Registration Number: </lable>" . $row['RegNum'] ."<br />
			<label>Birthdate: </lable>" . $row['Birthdate'] . "<br />
			<label>Tatoo: </lable>" . $row['Tatoo'] . "<br />
			<label>Breeder: </lable>" . $row['Breeder'] . "<br />
			
		";
		
		//echo $row['vidEmbedCode'] . "<br />";
		// FOR USING VIDLINK
		 echo "
			<iframe class=\"youtube-player\" type=\"text/html\" width=\"640\" height=\"385\" src=\"" . $row['vidLink'] ."\" frameborder=\"0\">
			</iframe>

		 <br />
		";  
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\$" . $row['price'] . "<br />";
		echo "
			<table>
				<h2>Family Tree</h2>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel1'] . "<br />" . $row['rel1Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>" . $row['rel2'] . "<br />" . $row['rel2Reg'] . "</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel3'] . "<br />" . $row['rel3Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
					<td>" . $row['rel4'] . "<br />" . $row['rel4Reg'] . "</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel5'] . "<br />" . $row['rel5Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>" . $row['rel6'] . "<br />" . $row['rel6Reg'] . "</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel7'] . "<br />" . $row['rel7Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel8'] . "<br />" . $row['rel8Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>" . $row['rel9'] . "<br />" . $row['rel9Reg'] . "</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel10'] . "<br />" . $row['rel10Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
					<td>" . $row['rel11'] . "<br />" . $row['rel11Reg'] . "</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel12'] . "<br />" . $row['rel12Reg'] . "</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>" . $row['rel13'] . "<br />" . $row['rel13Reg'] . "</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>" . $row['rel14'] . " <br /> " . $row['rel14Reg'] . "</td>
					<td></td>
				</tr>
			</table>
			<h2>Production</h2>
			<table>
				<tr>
					<td>CED Acc</td>
					<td>BW Acc</td>
					<td>WW Acc</td>
					<td>YW Acc</td>
					<td>RADG Acc</td>
					<td>YH Acc</td>
					<td>SC Acc</td>
					<td>Doc Acc</td>
				</tr>
				<tr>
					<td>" . $row['CED'] . "</td>
					<td>" . $row['BW'] . "</td>
					<td>" . $row['WW'] . "</td>
					<td>" . $row['YW'] . "</td>
					<td>" . $row['RADG'] . "</td>
					<td>" . $row['YH'] . "</td>
					<td>" . $row['SC'] . "</td>
					<td>" . $row['DOC'] . "</td>
				</tr>
				<tr>
					<td>" . $row['CEDACC'] . "</td>
					<td>" . $row['BWACC'] . "</td>
					<td>" . $row['WWACC'] . "</td>
					<td>" . $row['YWACC'] . "</td>
					<td>" . $row['RADGACC'] . "</td>
					<td>" . $row['YHACC'] . "</td>
					<td>" . $row['SCACC'] . "</td>
					<td>" . $row['DOCACC'] . "</td>
				</tr>
			</table>
			<h2>Maternal</h2>
			<table>
				<tr>
					<td>CEM Acc</td>
					<td>Milk Acc</td>
					<td>MkH MkD</td>
					<td>MW Acc</td>
					<td>MH Acc</td>
					<td>EN</td>
				</tr>
				<tr>
					<td>" . $row['CEM'] . "</td>
					<td>" . $row['Milk'] . "</td>
					<td>" . $row['MkH'] . "</td>
					<td>" . $row['MW'] . "</td>
					<td>" . $row['MH'] . "</td>
					<td>" . $row['EN'] . "</td>
				</tr>
				<tr>
					<td>" . $row['CEMACC'] . "</td>
					<td>" . $row['MilkACC'] . "</td>
					<td>" . $row['MkD'] . "</td>
					<td>" . $row['MWACC'] . "</td>
					<td>" . $row['MHACC'] . "</td>
				</tr>
			</table>
			<h2>Carcass</h2>
			<table>
				<tr>
					<td>CW Acc</td>
					<td>Marb Acc</td>
					<td>RE Acc</td>
					<td>Fat Acc</td>
					<td>Carc Grp Carc Pg Acc</td>
					<td>UsndGrp UsngPg</td>
				</tr>
				<tr>
					<td>" . $row['CW'] . "</td>
					<td>" . $row['Marb'] . "</td>
					<td>" . $row['RE'] . "</td>
					<td>" . $row['Fat'] . "</td>
					<td>" . $row['Carc_Grp'] . "</td>
					<td>" . $row['Usnd_Grp'] . "</td>
				</tr>
				<tr>
					<td>" . $row['CWACC'] . "</td>
					<td>" . $row['MarbACC'] . "</td>
					<td>" . $row['REACC'] . "</td>
					<td>" . $row['FatACC'] . "</td>
				</tr>
			</table>
			<h2>\$Values</h2>
			<table>
				<tr>
					<td>\$W</td>
					<td>\$F</td>
					<td>\$G</td>
					<td>\$QG</td>
					<td>\$YG</td>
					<td>\$B</td>
				</tr>
				<tr>
					<td>" . $row['W'] . "</td>
					<td>" . $row['F'] . "</td>
					<td>" . $row['G'] . "</td>
					<td>" . $row['QG'] . "</td>
					<td>" . $row['YG'] . "</td>
					<td>" . $row['B'] . "</td>
				</tr>
			</table>
		";
		//echo "<form action=\"addToTrailer.php\" method=\"post\">";
		//echo "<input type=\"hidden\" value=\"" . $row['name'] . "\" name=\"name". $_SESSION['cattleInCart'] ."\" />";
		//echo "<input type=\"submit\" value=\"Add to Trailer\" />";
		
		echo "<button>Add ". $row['name'] ." to Stock Trailer</button>";
		echo "
		<script type=\"text/javascript\">
				//(document).ready(function () {
					$(\"button\").click(function () { 
						//localStorage[$(\"theCattleID\").attr('id')] = $(\"theCattleID\").val();
						//$('#theCattleID').val(localStorage[\"theCattleID\"]);
						localStorage.setItem('cattleNumber" . $row['cattleID'] ."','" . $row['cattleID'] . "');
					});
				//});
		
		</script>";
	echo "
		</div>
		<div id=\"shultsFooter\">
                    <p>Email Scott at <a href=\"mailto:scott@angusandalfalfa.com\?subject=Angus and Alfalfa Information Request\">Scott@angusandalfalfa.com</a> or call 573-729-4797 for more info. </p>
		    <p>For questions about the website, please contact or webmaster, Andy Fulton at <a href=\"mailto:bearcatFulton@gmail.com?subject=Shults Angus and Alfalfa\" >bearcatFulton@gmail.com</a></p>
		</div>
	";
	
	
?>
</body>
</html>
