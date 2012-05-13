<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Shults Farm Manager</title>
		<style>
			body{
				text-align:center;
			}
		</style>
	</head>
	<body>
<?php
if (($_SERVER['PHP_AUTH_USER'] != 'Scott') ||
   ($_SERVER['PHP_AUTH_PW'] != 'h1ddenW1sdom')) {
      header('WWW-Authenticate: Basic Realm="Secret Stash"');
      header('HTTP/1.0 401 Unauthorized');
      print('You must provide the proper credentials!');
      exit;
}
//		<form action="shultsAdminMessageCenter.php" method="post">
//			<h1>Scott Shults Farm</h1>
//		<h2>Farm Manager </h2>
//		Login <br /> <br />
//		Username: <input type="text" name="username" /> <br /> <br />
//		Password: <input type="password" name="password"/> <br /> <br// />
//		<input type="submit" value="Log In" /> <!-- Start Session Here -->
?>			
	</body>
</html>