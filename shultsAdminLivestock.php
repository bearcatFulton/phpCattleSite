<?php if (($_SERVER['PHP_AUTH_USER'] != 'Scott') ||
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
        </ul>
    </div>
	<?php 
$con = mysql_connect("localhost","root","");
			if (!$con)
			{
			die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("shultsAngus", $con);
					

	
		
 	if(isset($_GET['addLivestock'])) {
		
				
										// first let's set some variables 

					// make a note of the current working directory, relative to root. 
					$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

					// make a note of the directory that will recieve the uploaded file 
					$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'cattlePhotos/'; 

					// make a note of the location of the upload form in case we need it 
					$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'shultsAdminLivestock.php'; 

					// make a note of the location of the success page 
					//$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'shultsAdminCrops.php'; 

					// fieldname used within the file <input> of the HTML form 
					$fieldname = 'photo'; 

					// Now let's deal with the upload 

					// possible PHP upload errors 
					$errors = array(1 => 'php.ini max file size exceeded', 
									2 => 'html form max file size exceeded', 
									3 => 'file upload was only partial', 
									4 => 'no file was attached'); 

					// check the upload form was actually submitted else print the form 
					isset($_POST['submit']) 
						or error('the upload form is needed', $uploadForm); 

					// check for PHP's built-in uploading errors 
					($_FILES[$fieldname]['error'] == 0) 
						or error($errors[$_FILES[$fieldname]['error']], $uploadForm); 
						 
					// check that the file we are working on really was the subject of an HTTP upload 
					@is_uploaded_file($_FILES[$fieldname]['tmp_name']) 
						or error('not an HTTP upload', $uploadForm); 
						 
					// validation... since this is an image upload script we should run a check   
					// to make sure the uploaded file is in fact an image. Here is a simple check: 
					// getimagesize() returns false if the file tested is not an image. 
					@getimagesize($_FILES[$fieldname]['tmp_name']) 
						or error('only image uploads are allowed', $uploadForm); 
						 
					// make a unique filename for the uploaded file and check it is not already 
					// taken... if it is already taken keep trying until we find a vacant one 
					// sample filename: 1140732936-filename.jpg 
					$now = time(); 
					while(file_exists($uploadFilename = $uploadsDirectory.$now.'-'.$_FILES[$fieldname]['name'])) 
					{ 
						$now++; 
					} 

					// now let's move the file to its final location and allocate the new filename to it 
					@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename) 
						or error('receiving directory insuffiecient permission', $uploadForm); 
						 
					// If you got this far, everything has worked and the file has been successfully saved. 
					// We are now going to redirect the client to a success page. 
					//header('Location: ' . $uploadSuccess); 

					// The following function is an error handler which is used 
					// to output an HTML error page if the file upload fails 
					function error($error, $location, $seconds = 5) 
					{ 
						header("Refresh: $seconds; URL=\"$location\""); 
						echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."\n". 
						'"http://www.w3.org/TR/html4/strict.dtd">'."\n\n". 
						'<html lang="en">'."\n". 
						'    <head>'."\n". 
						'        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."\n\n". 
						'        <link rel="stylesheet" type="text/css" href="stylesheet.css">'."\n\n". 
						'    <title>Upload error</title>'."\n\n". 
						'    </head>'."\n\n". 
						'    <body>'."\n\n". 
						'    <div id="Upload">'."\n\n". 
						'        <h1>Upload failure</h1>'."\n\n". 
						'        <p>An error has occured: '."\n\n". 
						'        <span class="red">' . $error . '...</span>'."\n\n". 
						'         The upload form is reloading</p>'."\n\n". 
						'     </div>'."\n\n". 
						'</html>'; 
						exit; 
					} // end error handler 	
			//Upload Data
			$addCattleQuery = mysql_query("insert into cattle (price, description, name, 
										  CED, CEDACC, BW, BWACC, WW, WWACC, YW,YWACC, RADG, RADGACC, YH, YHACC, 
										  SC, SCACC, DOC, DOCACC, CEM, CEMACC,
										  Milk, MilkACC, MkH, MkD, MW, MWACC, MH, MHACC, EN, CW, CWACC, Marb, MarbACC, RE,
										  REACC, Fat, FatACC, Carc_Grp, Carc_Pg, Usnd_Grp, Usnd_Pg, W, F, G, QG, YG,
										  B, rel1, rel1Reg, rel2, rel2Reg, rel3, rel3Reg, rel4, rel4Reg, rel5, rel5Reg, rel6, rel6Reg, rel7, rel7Reg, 
										  rel8, rel8Reg, rel9, rel9Reg, rel10, rel10Reg, rel11, rel11Reg, rel12, rel12Reg, rel13, rel13Reg, rel14, rel14Reg, 
										  RegNum, Birthdate, Tatoo, Breeder, photoLink, vidLink)
										  values (\"" . $_POST['price'] . "\",\"" . $_POST['description'] .
										  "\",\"" . $_POST['cattleName'] . "\",\"" . $_POST['CED'].  "\",\"" . $_POST['CEDACC']  .
										  "\",\"" . $_POST['BW']. "\",\"" . $_POST['BWACC'] . 
										  "\",\"" . $_POST['WW'] ."\",\"" . $_POST['WWACC'] .
										  "\",\"" . $_POST['YW']. "\",\"" . $_POST['YWACC'] . 
										  "\",\"" . $_POST['RADG']. "\",\"" . $_POST['RADGACC'] .
										  "\",\"" . $_POST['YH']. "\",\"" . $_POST['YHACC'] . 
										  "\",\"" . $_POST['SC']. "\",\"" . $_POST['SCACC'] . 
										  "\",\"" . $_POST['DOC']. "\",\"" . $_POST['DOCACC'] . 
										  "\",\"" . $_POST['CEM']. "\",\"" . $_POST['CEMACC'] . 
										  "\",\"" . $_POST['Milk']. "\",\"" . $_POST['MilkACC'] . 
										  "\",\"" . $_POST['MkH']. "\",\"" . $_POST['MkD'] . 
										  "\",\"" . $_POST['MW']. "\",\"" . $_POST['MWACC'] .  
										  "\",\"" . $_POST['MH']. "\",\"" . $_POST['MHACC'] . 
										  "\",\"" . $_POST['EN'] . 
										  "\",\"" . $_POST['CW']. "\",\"" . $_POST['CWACC'] . 
										  "\",\"" . $_POST['Marb']. "\",\"" . $_POST['MarbACC'] . 
										  "\",\"" . $_POST['RE']. "\",\"" . $_POST['REACC'] . 
										  "\",\"" . $_POST['fat']. "\",\"" . $_POST['fatACC'] . 
										  "\",\"" . $_POST['CarcGrp']. "\",\"" . $_POST['CarcPg'] . 
										  "\",\"" . $_POST['UsndGrp']. "\",\"" . $_POST['UsndPg'] .
										  "\",\"" . $_POST['valueW']. "\",\"" . $_POST['valueF'] . 
										  "\",\"" . $_POST['valueG']. "\",\"" . $_POST['valueQG'] . 
										  "\",\"" . $_POST['valueYG']. "\",\"" . $_POST['valueB'] . 
										  "\",\"" . $_POST['r1']. "\",\"" . $_POST['rn1'] . 
										  "\",\"" . $_POST['r2']. "\",\"" . $_POST['rn2'] . 
										  "\",\"" . $_POST['r3']. "\",\"" . $_POST['rn3'] . 
										  "\",\"" . $_POST['r4']. "\",\"" . $_POST['rn4'] .   
										  "\",\"" . $_POST['r5']. "\",\"" . $_POST['rn5'] . 
										  "\",\"" . $_POST['r6']. "\",\"" . $_POST['rn6'] . 
										  "\",\"" . $_POST['r7']. "\",\"" . $_POST['rn7'] . 
										  "\",\"" . $_POST['r8']. "\",\"" . $_POST['rn8'] . 
										  "\",\"" . $_POST['r9']. "\",\"" . $_POST['rn9'] . 
										  "\",\"" . $_POST['r10']. "\",\"" . $_POST['rn10'] . 
										  "\",\"" . $_POST['r11']. "\",\"" . $_POST['rn11'] . 
										  "\",\"" . $_POST['r12']. "\",\"" . $_POST['rn12'] . 
										  "\",\"" . $_POST['r13']. "\",\"" . $_POST['rn13'] . 
										  "\",\"" . $_POST['r14']. "\",\"" . $_POST['rn14'] . 
										  "\",\"" . $_POST['regNum']. "\",\"" . $_POST['bDate'] .
										  "\",\"" . $_POST['tatoo']. "\",\"" . $_POST['breeder'] . 
										  "\",\" ./cattlePhotos/".  $now.'-'.$_FILES[$fieldname]['name'] . 
										  "\",\"" . $_POST['vidLink'] .  "\")" );
										  echo mysql_errno($con) . ": " . mysql_error($con) . "\n";
		} elseif(isset($_GET['removeCattle'])) {
		
			for($lcv2 = 1; $lcv2 <= mysql_result(mysql_query("Select max(cattleID) from cattle"),0); $lcv2++) {
				if(isset($_POST['del'.$lcv2])){
					$rmCattleQuery = mysql_query("delete from cattle where cattleID =" . $lcv2);
				}
			} 
		} 
				// first let's set some variables 

			// make a note of the current working directory relative to root. 
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

			// make a note of the location of the upload handler script 
			$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'shultsAdminLivestock.php?addLivestock'; 

			// set a max file size for the html upload form 
			$max_file_size = 45000; // size in bytes 
		
		
		
?>
<!--Create form to add cattle to ShultsAngus database -->
    <div id="columnMain">
     <h1>List Livestock</h1>
     <form action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post"  >
     <table>
     <tr><td>Name:</td><td> <input type="text" name="cattleName" /></td></tr>
     <tr><td>Registration Number:</td><td> <input type="text" name="regNum" /></td></tr>
     <tr><td>Birthdate:</td><td> <input type="text" name="bDate" /></td></tr>
     <tr><td>Tatoo:</td><td> <input type="text" name="tatoo" /></td></tr>
     <tr><td>Breeder:</td><td> <input type="text" name="breeder" /></td></tr>
     <tr><td>Photo:</td><td> <input type="file" name="photo" /> </td><br /></tr>
     <tr><td><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"></td><td><!--<img src="" alt="Upload Image" border="1px black" />--></td></tr> <br />
	 <!-- There is a know user experience issue with the following field.  Looking for a better solution. -->
	 <tr><td>Vid Link: (Please place the url of youtube embed code here).</td><td><textarea name="vidLink" rows="8" cols="20"></textarea></td></tr><br />
     <tr><td>Type: </td><td><input type="text" name="type" /></td> <br />
     <tr><td>Description </td><td><textarea name="description" rows="8" cols="20"></textarea></td><br /> 
     <tr><td>Price: </td><td><input type="text" name="price" /> </td></tr>
     </table>
     <h2>Family Tree</h2>
     <table>
        <tr><td>Relative One: </td><td><input type="text" name="r1"/> </td></tr>
        <tr><td>Relative One Reg Number: </td><td><input type="text" name="rn1" /> </td></tr>
        <tr><td>Relative Two:</td><td> <input type="text" name="r2" /> </td></tr>
        <tr><td>Relative Two Reg Number: </td><td><input type="text" name="rn2" /> </td></tr>
        <tr><td>Relative Three:</td><td> <input type="text" name="r3" /> </td></tr>
        <tr><td>Relative Three Reg Number:</td><td> <input type="text" name="rn3"/> </td></tr>
        <tr><td>Relative Four:</td><td> <input type="text" name="r4" /> </td></tr>
        <tr><td>Relative Four Reg Number:</td><td> <input type="text" name="rn4" /> </td></tr>
        <tr><td>Relative Five:</td><td> <input type="text" name="r5" /> </td></tr>
        <tr><td>Relative Five Reg Number:</td><td> <input type="text" name="rn5" /></td></tr>
        <tr><td>Relative Six:</td><td> <input type="text" name="r6" /> </td></tr>
        <tr><td>Relative Six Reg Number: </td><td><input type="text" name="rn6" /> </td></tr>
        <tr><td>Relative Seven:</td><td> <input type="text" name="r7" /> </td></tr>
        <tr><td>Relative Seven Reg Number: </td><td><input type="text" name="rn7" /> </td></tr>
        <tr><td>Relative Eight:</td><td> <input type="text" name="r8" /> </td></tr>
        <tr><td>Relative Eight Reg Number:</td><td> <input type="text" name="rn8" /> </td></tr>
        <tr><td>Relative Nine:</td><td> <input type="text" name="r9" /> </td></tr>
        <tr><td>Relative Nine Reg Number: </td><td><input type="text" name="rn9" /> </td></tr>
        <tr><td>Relative Ten:</td><td> <input type="text" name="r10" /> </td></tr>
        <tr><td>Relative Ten Reg Number:</td><td> <input type="text" name="rn10" /> </td></tr>
        <tr><td>Relative Eleven:</td><td> <input type="text" name="r11" /> </td></tr>
        <tr><td>Relative Eleven Reg Number: </td><td><input type="text" name="rn11" /> </td></tr>
        <tr><td>Relative Twelve:</td><td> <input type="text" name="r12" /> </td></tr>
        <tr><td>Relative Twelve Reg Number: </td><td><input type="text" name="rn12" /> </td></tr>
        <tr><td>Relative Thirteen: </td><td><input type="text" name="r13" /> </td></tr>
        <tr><td>Relative Thirteen Reg Number:</td><td> <input type="text" name="rn13" /> </td></tr>
        <tr><td>Relative Fourteen: </td><td><input type="text" name="r14" /> </td></tr>
        <tr><td>Relative Fourteen Reg Number:</td><td> <input type="text" name="rn14" /> </td></tr>
     </table>
     <h2>Production</h2>
     <table>
        <tr><td>CED:</td><td> <input type="text" name="CED" /> </td></tr>
        <tr><td>CED Accuracy: </td><td><input type="text" name="CEDACC" /> </td></tr>
        <tr><td>BW:</td><td> <input type="text" name="BW" /> </td></tr>
        <tr><td>BW Accuracy: </td><td><input type="text" name="BWACC" /> </td></tr>
        <tr><td>WW: </td><td><input type="text" name="WW" /> </td></tr>
        <tr><td>WW Accuracy: </td><td><input type="text" name="WWACC" /> </td></tr>
        <tr><td>YW: </td><td><input type="text" name="YW" /> </td></tr>
        <tr><td>YW Accuracy: </td><td><input type="text" name="YWACC" /> </td></tr>
        <tr><td>RADG:</td><td> <input type="text" name="RADG" /> </td></tr>
        <tr><td>RADG Accuracy:</td><td> <input type="text" name="RADGACC" /> </td></tr>
        <tr><td>YH:</td><td> <input type="text" name="YH" /> </td></tr>
        <tr><td>YH Accuracy:</td><td> <input type="text" name="YHACC" /> </td></tr>
        <tr><td>SC:</td><td> <input type="text" name="SC" /> </td></tr>
        <tr><td>SC Accuracy: </td><td><input type="text" name="SCACC" /> </td></tr>
        <tr><td>Doc:</td><td> <input type="text" name="DOC" /></td></tr>
        <tr><td>Doc Accuracy:</td><td> <input type="text" name="DOCACC" /> </td></tr>
     </table>
     <h2>Maternal</h2>
     <table>
        <tr><td>CEM:</td><td> <input type="text" name="CEM" /> </td></tr>
        <tr><td>CEM Accuracy:</td><td> <input type="text" name="CEMACC" /> </td></tr>
        <tr><td>Milk:</td><td> <input type="text" name="Milk" /> </td></tr>
        <tr><td>Milk Accuracy:</td><td> <input type="text" name="MilkACC" /></td></tr>
        <tr><td>MkH:</td><td> <input type="text" name="MkH" /> </td></tr>
        <tr><td>MkD:</td><td> <input type="text" name="MkD" /> </td></tr>
        <tr><td>MW: </td><td><input type="text" name="MW" /> </td></tr>
        <tr><td>MW Accuracy: </td><td><input type="text" name="MWACC" /> </td></tr>
        <tr><td>MH:</td><td> <input type="text" name="MH" /> </td></tr>
        <tr><td>MH Accuracy: </td><td><input type="text" name="MHACC" /> </td></tr>
        <tr><td>$EN:</td><td> <input type="text" name="EN" /> </td></tr>
     </table>
     <h2>Carcass</h2>
     <table>
     <tr><td>CW:</td><td> <input type="text" name="CW" /> </td></tr>
     <tr><td>CW Accuracy:</td><td> <input type="text" name="CWACC" /> </td></tr>
     <tr><td>Marb:</td><td> <input type="text" name="Marb" /> </td></tr>
     <tr><td>Marb Accuracy:</td><td> <input type="text" name="MarbACC" /> </td></tr>
     <tr><td>RE:</td><td> <input type="text" name="RE" /> </td></tr>
     <tr><td>RE Accuracy:</td><td> <input type="text" name="REACC"/> </td></tr>
     <tr><td>Fat:</td><td> <input type="text" name="fat" /> </td></tr>
     <tr><td>Fat Accuracy:</td><td> <input type="text" name="fatACC" /> </td></tr>
     <tr><td>Carc Grp:</td><td> <input type="text" name="CarcGrp" /></td></tr>
     <tr><td>Carc Pg: </td><td><input type="text" name="CarcPg" /> </td></tr>
     <tr><td>Usnd Grp:</td><td> <input type="text" name="UsndGrp" /> </td></tr>
     <tr><td>Usnd Pg:</td><td> <input type="text" name="UsndPg" /> </td></tr>
     </table>
     <h2>$Values</h2>
     <table>
        <tr><td>$W: </td><td><input type="text" name="valueW" /> </td></tr>
        <tr><td>$F: </td><td><input type="text" name="valueF" /> </td></tr>
        <tr><td>$G: </td><td><input type="text" name="valueG" /> </td></tr>
        <tr><td>$QG: </td><td><input type="text" name="valueQG" /> </td></tr>
        <tr><td>$YG: </td><td><input type="text" name="valueYG" /> </td></tr>
        <tr><td>$B: </td><td><input type="text" name="valueB" /> </td></tr>
     </table>
    <input type="submit" name="submit" id="submit" value="Submit"/>
     </form>
	      </form>
		  <br />
		  <hr />
		  <br />
		  
		  <h1> Cattle Entered </h1>
	  <form action="?removeCattle" method="post">
	 <table id="recordBox">
		<tr>
			<td>Name</td>
			<td>Picture</td>
			<td>Price</td>        
			<td>Remove</td>
		</tr>
	<?php
	//Create Cattle Table to delete from.
	$maxCattleID = mysql_result(mysql_query("Select max(cattleID) from cattle"),0);
	for ($lcv = 1; $lcv <= $maxCattleID; $lcv++) {
		$cattleID = mysql_query("Select cattleID from cattle where cattleID = " . $lcv);
		if (mysql_num_rows($cattleID) != 0) {
			$cattleName = mysql_query("select name from cattle where cattleID = " . $lcv);
			$cattlePrice = mysql_query("select price from cattle where cattleID = " . $lcv);
			$photoLink = mysql_query("select photoLink from cattle where cattleID = " . $lcv);   
			if ($lcv % 2 == 0) {
			echo "<tr>";
			}else{
			echo "<tr class=\"odd\">";  
			}
			echo"<td>" . mysql_result($cattleName,0) . "</td>\n" .
				"<td>" . "<img src=\"" . mysql_result($photoLink,0) . "\" alt=\"cowPic\" width=\"180\" align=\"left\" id=\"mainPhoto\"/>" . "</td> \n" .
				"<td>" . mysql_result($cattlePrice,0) . "</td>\n" .
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
<?php } 
mysql_close();