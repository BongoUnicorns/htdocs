<?php session_start(); ?>

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
<h1><a href='../../index.html' class='ResizingTitle'>Home</a></h1></Flagtext>
<div id="swappableText">
<div class='BodyTextBox'><div class='BodyTitle'><a href='/index.html'>Home</a></div>
<div class='mainTextHeader' id="mainTextHeader">Application</div>
<div class='mainText' id="mainText"></div>

<?php

session_start();

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

$tokenname = $_SESSION['token'];
	$input = $_POST["commandToBeRun"];
	$input = '"' . $input . '"';
	chdir('../../Shell');
	$output = shell_exec('sh screenInterface.sh X' . $tokenname . 'X ' . $input);
	$output = $input . ' ::   ' . $output;

	$query = "INSERT INTO `CommandsRun`(commandname, timerun, tokenname) VALUES ('" . $output . "','" . time() . "','" . $tokenname . "');";
	$result = mysqli_query($dbc, $query) or die('Credentials not recognized: ' .mysqli_error($dbc));

	//echo '<script language="javascript">alert(\'SUBMITTING THE STUFF\')</script>';
	echo '<h1 id="testRenderBlock"></h1>';

	echo '<div id="resultBox" name="resultBox" style="word-wrap: break-word;height:70%;overflow:auto;">';

	$query1 = "SELECT * FROM `CommandsRun` WHERE tokenname = " . $tokenname . ";";
	$result = mysqli_query($dbc, $query1) or die('No records found: ' .mysqli_error($dbc));

while($row = mysqli_fetch_array($result)){

	echo $row[0] . "<br><br>";

}
	//. $output .


	echo '</div><br>

	<form method=\'post\' action=' . $_SERVER['PHP_SELF'] . ' name=\'commandForm\'><input type="hidden" name="tokenX" value="' . $_SESSION['token'] . '"><input type=\'text\' name=\'commandToBeRun\' id=\'commandToBeRun\' style=\'width:100%;\' onkeypress=\'return enterKeyListener(event)\' autofocus>
	</form><script>document.getElementById("resultBox").scrollTop = 9999999;</script>';
?>

</body>
</html>
