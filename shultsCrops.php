<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

//Connect to crops table on database
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("shultsAngus", $con);
 
$result = mysql_query("SELECT * FROM crops");
 mysql_close($con);

 echo "
	<html xmlns=\"http://www.w3.org/1999/xhtml\">
	<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<title>Scott Shults Family Farm Salem MO</title>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"shultsMain.css\" />
		<!--Script for Google Analytics-->
		<script type=\"text/javascript\">

			 var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-10829362-3']);
			 _gaq.push(['_trackPageview']);

			(function() {
			   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<script src=\"http://ajax.Microsoft.com/ajax/jQuery/jquery-1.7.1.min.js\" type=\"text/javascript\"> </script>
	</head>
	<body>";
	include('shultsPageHeader.php');	
        echo "        <div id\"mainContent\">
                   
                
  ";
			$skipStart = 1;
			while($row = mysql_fetch_array($result))
			{
				if($skipStart != 1){
					echo "<hr width=\"100%\">";
				}
				 $skipStart = $skipStart + 1;
				 echo "<h2>" . $row['cropType'] . "</h2>";
				 echo "Price: \$" . $row['price'] . " per bale" . "<br />";
				 echo "Quantity Availble: " . $row['Qty'] . " bales <br />";
				 echo "Minimum Quantity that can be purchased: " . $row['minQty'] . " bales <br />";
				 echo "" . $row['description'] . "<br />";
				 echo "<button>Add to Stock Trailer</button>";
				 echo "
					<script type=\"text/javascript\">
								$(\"button\").click(function () { 
									localStorage.setItem('cropNumber" . $row['cropID'] ."','" . $row['cropID'] . "');
								});
							
					</script>";
			}
  echo "
			</div>
                	<div id=\"shultsFooter\">
				<p>Email Scott at <a href=\"mailto:scott@angusandalfalfa.com\?subject=Angus and Alfalfa Information Request\">Scott@angusandalfalfa.com</a> or call 573-729-4797 for more info. </p>
				<p>For questions about the website please contact Andy Fulton at <a href=\"mailto:bearcatFulton@gmail.com?subject=Shults Angus and Alfalfa\" >bearcatFulton@gmail.com</a>
			</div>
	</body>
	</html>
  ";
  
?>

