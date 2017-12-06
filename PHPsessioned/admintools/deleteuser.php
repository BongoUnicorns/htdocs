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

$query = 'DELETE FROM `AuthorizedUsers` WHERE id = ' . $_POST["userNumber"] . ';';
$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));
echo "User number " . $_POST["userNumber"] . " will be deleted.<br><br>


<button onclick=\"window.location.href='list.php'\">Return to List</button>";
?>
