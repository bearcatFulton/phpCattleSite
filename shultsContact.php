<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//connect to shultsAngus database
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("shultsAngus", $con);

$cattleResult = mysql_query("SELECT * FROM cattle;");
$cropsResult = mysql_query("Select * from crops;");

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
	
		<!--Script to verify Phone Number -->
		<script language = \"Javascript\">
		
		<!-- This script and many more are available free online at -->
		<!-- The JavaScript Source!! http://javascript.internet.com -->
		<!-- Original:  Roman Feldblum (web.developer@programmer.net) -->
		
		
		var n;
		var p;
		var p1;
		function ValidatePhone(){
		p=p1.value
		if(p.length==3){
			//d10=p.indexOf('(')
			pp=p;
			d4=p.indexOf('(')
			d5=p.indexOf(')')
			if(d4==-1){
				pp=\"(\"+pp;
			}
			if(d5==-1){
				pp=pp+\")\";
			}
			//pp=\"(\"+pp+\")\";
			document.frmSample.txtphone.value=\"\";
			document.frmSample.txtphone.value=pp;
		}
		
		if(p.length>3){
			d1=p.indexOf('(')
			d2=p.indexOf(')')
			if (d2==-1){
				l30=p.length;
				p30=p.substring(0,4);
				//alert(p30);
				p30=p30+\")\"
				p31=p.substring(4,l30);
				pp=p30+p31;
				//alert(p31);
				document.frmSample.txtphone.value=\"\";
				document.frmSample.txtphone.value=pp;
			}
		}
		if(p.length>5){
			p11=p.substring(d1+1,d2);
			if(p11.length>3){
			p12=p11;
			l12=p12.length;
			l15=p.length
			//l12=l12-3
			p13=p11.substring(0,3);
			p14=p11.substring(3,l12);
			p15=p.substring(d2+1,l15);
			document.frmSample.txtphone.value=\"\";
			pp=\"(\"+p13+\")\"+p14+p15;
			document.frmSample.txtphone.value=pp;
			//obj1.value=\"\";
			//obj1.value=pp;
			}
			l16=p.length;
			p16=p.substring(d2+1,l16);
			l17=p16.length;
			if(l17>3&&p16.indexOf('-')==-1){
				p17=p.substring(d2+1,d2+4);
				p18=p.substring(d2+4,l16);
				p19=p.substring(0,d2+1);
				//alert(p19);
			pp=p19+p17+\"-\"+p18;
			document.frmSample.txtphone.value=\"\";
			document.frmSample.txtphone.value=pp;
			//obj1.value=\"\";
			//obj1.value=pp;
			}
		}
		//}
		setTimeout(ValidatePhone,100)
		}
		function getIt(m){
		n=m.name;
		//p1=document.forms[0].elements[n]
		p1=m
		ValidatePhone()
		}
		
		function testphone(obj1){
		p=obj1.value
		//alert(p)
		p=p.replace(\"(\",\"\")
		p=p.replace(\")\",\"\")
		p=p.replace(\"-\",\"\")
		p=p.replace(\"-\",\"\")
		//alert(isNaN(p))
		if (isNaN(p)==true){
		alert(\"Check phone\");
		return false;
		}
		}
		</script>
		
		<!--Script to Verify Email Address-->
			<script language = \"Javascript\">
			/**
			 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
			 */
			
			function echeck(str) {
			
					var at=\"@\"
					var dot=\".\"
					var lat=str.indexOf(at)
					var lstr=str.length
					var ldot=str.indexOf(dot)
					
					/*
					if(!IsNumeric(str)) {
					//   alert(\"Please enter numbers in your phone number only\")
					//   return false
					}*/
					
					if (str.indexOf(at)==-1){
					   alert(\"Invalid E-mail ID\")
					   return false
					}
			
					if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
					   alert(\"Invalid E-mail ID\")
					   return false
					}
			
					if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
					    alert(\"Invalid E-mail ID\")
					    return false
					}
			
					 if (str.indexOf(at,(lat+1))!=-1){
					    alert(\"Invalid E-mail ID\")
					    return false
					 }
			
					 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
					    alert(\"Invalid E-mail ID\")
					    return false
					 }
			
					 if (str.indexOf(dot,(lat+2))==-1){
					    alert(\"Invalid E-mail ID\")
					    return false
					 }
					
					 if (str.indexOf(\" \")!=-1){
					    alert(\"Invalid E-mail ID\")
					    return false
					 }
			
					 return true					
				}
			
				function ValidateForm(){
					var emailID=document.frmSample.txtEmail
					if ((emailID.value==null)||(emailID.value==\"\")){
						alert(\"Please Enter your Email ID\")
						emailID.focus()
						return false
					}
					if (echeck(emailID.value)==false){
						emailID.value=\"\"
						emailID.focus()
						return false
					}
					return true
				 }
				 
				function IsNumeric(sText)
				{
				   var ValidChars = \"0123456789.\";
				   var IsNumber=true;
				   var Char;
				
				 
				   for (i = 0; i < sText.length && IsNumber == true; i++) 
				      { 
				      Char = sText.charAt(i); 
				      if (ValidChars.indexOf(Char) == -1) 
					 {
					 IsNumber = false;
					 }
				      }
				   return IsNumber;
				   
				}
				</script>
	</head>
	<body> ";
	include('shultsPageHeader.php');
	echo "	
		<div id=\"mainContent\" >
			";
					
			
			 //echo "<form name=\"frmSample\" action=\"mailto:scott@angusandalfalfa.com\" method=\"post\" enctype=\"multipart/formdata\" onSubmit=\"return ValidateForm()\">
			 echo "<form name=\"frmSample\" action=\"shultsMessageOut.php\" method=\"post\" enctype=\"multipart/formdata\" onSubmit=\"return ValidateForm()\">
				First Name: <input type=\"text\" name=\"txtFirstName\"/> <br />
				Last Name: <input type=\"text\" name=\"txtLastName\"/> <br />
				Email Address : <input type=\"text\" name=\"txtEmail\" /> <br />
				Phone Number: <input type=\"text\" name=\"txtPhone\" maxlength=\"13\" onclick=\"javascript:getIt(this)\" > <br />
				
				Items In Stocktrailer: <br />
				Cattle <br /><hr />";
				while($row = mysql_fetch_array($cattleResult)){
				echo "
					<script type=\"text/javascript\">
									var tempCow = localStorage.getItem('cattleNumber" . $row['cattleID'] . "');
									if (tempCow != null) {
										document.write(tempCow);	
									}
					</script><br />";
					
				/*while($row = mysql_fetch_array($cattleResult)){
					echo "<input type=\"checkbox\" name=\"" . $row['cattleID'] . "\" /> " . $row['name'] . "<br />";
				}
				echo "Hay <br /> <hr />";
				while($row = mysql_fetch_array($cropsResult)){
					echo "<input type=\"checkbox\" name=\"" . $row['cropType'] . "\" /> " . $row['cropType'] . "<br />";
				}
				*/
				}
				echo "<br /> Hay <br /> <hr />";
				while($row = mysql_fetch_array($cropsResult)){
					echo "
					<script type=\"text/javascript\">
									var tempCrop = localStorage.getItem('cropNumber" . $row['cropID'] . "');
									if (tempCrop != null) {
										document.write(tempCrop);	
									}
					</script><br />";
				}
				
				echo "
				
				<br /> 
				Message: <textarea rows=\"5\" cols=\"60\" name=\"txtMessage\" ></textarea> <br />
				<input type=\"submit\" name=\"Submit\" value=\"Send Purchase Request to Scott\"/>
				</p>
				
			</form> 
			 "; 
			
		
		echo "
		</div>
		<div id=\"shultsFooter\">
                    <p>Email Scott at <a href=\"mailto:scott@angusandalfalfa.com\?subject=Angus and Alfalfa Information Request\">Scott@angusandalfalfa.com</a> or call 573-729-4797 for more info. </p>
		    <p>For questions about the website, please contact or webmaster, Andy Fulton at <a href=\"mailto:bearcatFulton@gmail.com?subject=Shults Angus and Alfalfa\" >bearcatFulton@gmail.com</a>
		</div>
	</body>
	</html>
 ";
?>
