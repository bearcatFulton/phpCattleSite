<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
 echo "
	<html xmlns=\"http://www.w3.org/1999/xhtml\">
	<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<title>Scott Shults Family Farm Salem MO</title>
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
	</head>
	<body> ";
	//connect to Cattle Page on Shults Angus
	$con = mysql_connect("localhost","root","");
	if (!$con)
        {
	  die('Could not connect: ' . mysql_error());
        }
	  mysql_select_db("shultsAngus", $con);

	 $result = mysql_query("SELECT * FROM Cattle");
	 	
  
  include('shultsPageHeader.php');
  echo "	
                <div id=\"mainContent\">
  ";
		while($row = mysql_fetch_array($result)) 
			{
				 echo "<h1>" . $row['name'] . "</h1> <br />";
				 echo "<img src=\"" . $row['photoLink'] . "\" alt=\"Cattle Photo\" width=\"350\"/> <br />";
				 echo "<br />" . $row['description'] . "<br />";
				 echo "<a href=\"./shultsEPD.php?CID=" . $row['cattleID'] . "\" >more info</a>";
				 echo "<hr />";
			}
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

