<?php session_start(); ?>

<html>
<head>

	<title>Remote Access Tool</title>
		<style type="text/css">
		</style>
		<link href="../../HTML/styleMain.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
<Flagtext class='Flag'><titleimg style='float:left'><a href='/index.html'><img src="../../Images/Logo.png" style='width:40px;height:auto'1;></img></a></titleimg>
<h1><a href='../../index.html' class='ResizingTitle'>Home</a></h1></Flagtext>
<div id="swappableText">
<div class='BodyTextBox'><div class='BodyTitle'><a href='/index.html'>Home</a></div>
<div class='mainTextHeader' id="mainTextHeader">Application</div>
<div class='mainText' id="mainText"></div>

<?php

session_start();

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

echo 'Enter command here:';
echo '<h1 id="testRenderBlock"></h1>';
echo '<div id="resultBox" name="resultBox"><br></div>


<form method=\'post\' action=\'commandspage.php\' name=\'commandForm\'><input type=\'text\' autocorrect=\'off\' autocapitalize=\'none\' name=\'commandToBeRun\' id=\'commandToBeRun\' onkeypress=\'return enterKeyListener(event)\' style=\'width:100%;\'>

</form>';

$queryX = "INSERT INTO `DestroyedTokens`(user, token, destructiontime) VALUES ('" . $_SESSION["username"] . "','" . $_SESSION["token"] . "','" . time() . "');";
$result = mysqli_query($dbc, $queryX) or die(mysqli_error($dbc));

$queryY = "DELETE FROM `AuthorizedUsers` WHERE token = '" . $_SESSION['token'] . "';";
$result = mysqli_query($dbc, $queryY) or die(mysqli_error($dbc));

?>

</body>
</html>
