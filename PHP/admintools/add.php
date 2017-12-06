<html>
<head>

	<title>Remote Access Tool</title>
		<style type="text/css">
		</style>
		<link href="../../HTML/styleMain.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<Flagtext class='Flag'><titleimg style='float:left'><a href='/index.html'><img src="../../Images/Logo.png" style='width:40px;height:auto'1;></img></a></titleimg>
<h1><a href='../index.html' class='ResizingTitle'>Home</a></h1></Flagtext>
<div id="swappableText">
<div class='BodyTextBox'><div class='BodyTitle'><a href='/index.html'>Home</a></div>
<div class='mainTextHeader' id="mainTextHeader">Application</div>
<div class='mainText' id="mainText"></div>

<?php

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

$usrstring = $_POST['usernamesub'];
$usrstring = strtolower($usrstring);
$hash = strlen($usrstring);

$chararray = array(' ','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '?', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
$firstchar=substr($usrstring,0,1);
$lastchar=substr($usrstring,$hashint-1,1);


$firstcharnum = array_search($firstchar,$chararray);
$lastcharnum = array_search($lastchar,$chararray);

$hash = pow(($hash * $firstcharnum * $lastcharnum),2);


$hash = $hash + time();
$hash = substr($hash,strlen($hash)-8,8);

//CONCLUDES HASH FUNCTION


$query = "INSERT INTO `AuthorizedUsers`(user, token) VALUES ('" . $_POST['usernamesub'] . "','" . $hash . "');";  //replace 432... with $hash
$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));


echo $_POST["usernamesub"]. " user will be added.

<button onclick=\"window.location.href='list.php'\">Return to List</button>";
?>

</body>
</html>
