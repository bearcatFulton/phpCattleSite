<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//Connect to crops page on Shults Angus
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
		<title>Scott Shults Angus and Alfalfa Salem MO</title>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"shultsMain.css\" />
		<script type=\"text/javascript\" src=\"reflection/reflection.js\" ></script>
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
	echo "
			<div id=\"mainContent\">
				<br />
				<img src=\"./frontPagePhoto.png\" alt=\"Video Here\" width=\"400\" align=\"left\" id=\"mainPhoto\"/>
				<p>The goal of Shults Angus and Alfalfa is simple and both products of our ranch go hand in hand.  We strive to produce high quality Angus cattle and Alfalfa hay in the Ozark hills of Missouri.  The Angus herd was established in the early 1980&#146;s as an FFA project.  After high school and earning a degree in animal science from Missouri State University in Springfield, Missouri the herd took on a new dimension.  The technological advances of the time drove new innovative EPD&#146;s, beef index values, ultrasound data, and other facets of the industry that demanded we get more out of our resources.  This led to the introduction of the Alfalfa production on our land.  Alfalfa provides the growth pattern, nutrient and energy resources we needed to utilize the genetic potential in our Angus cows and bulls.  With rising feed and land prices, the alfalfa became a tremendous economic resource for us and demand by others that could utilize the high quality hay grew.  This has led to the ultimate creation of Shults Angus and Alfalfa that we have today.  Producing top quality Angus genetics and top quality Alfalfa hay quite simply go hand in hand.  The goal of which is to make our customers of either product more profitable.</p>
			</div>
	<div id=\"shultsFooter\">
                    <p>Email Scott at <a href=\"mailto:scott@angusandalfalfa.com\?subject=Angus and Alfalfa Information Request\">Scott@angusandalfalfa.com</a> or call 573-729-4797 for more info. </p>
		    <p>For questions about the website, please contact or webmaster, Andy Fulton at <a href=\"mailto:bearcatFulton@gmail.com?subject=Shults Angus and Alfalfa\" >bearcatFulton@gmail.com</a></p>
        </div>
	</body>
	</html>
 ";
?>


