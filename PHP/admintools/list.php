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

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

$string1 = "(";
$string2 = "SELECT * FROM `AuthorizedUsers`";
$string99 = ");";
$query = $string1.$string2.$string99;
$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));

echo "User:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPassword:<br><table style='color:white;'>";

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<form method='post' action='deleteuser.php' name='adminPanelForm'><tr><td><input name='userNumber' type='text' value='" . $row['id'] . "' style='width:30px;' readonly></input></td><td>" . $row['user'] . "</td><td>" . $row['token'] . "</td>

<td><input type='submit' name='deleteUser' value='Delete User'></input><br></form></td>


</tr>";  //$row['index'] the index here is a field name
}
echo "</table> <button onclick=\"window.location.href='../adminsession.php'\">Return to Admin Panel</button>";
?>
