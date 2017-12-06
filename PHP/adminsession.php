<?php
session_start();
?>

<html>
<head>

	<title>Remote Access Tool</title>
		<style type="text/css">
		</style>
		<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<Flagtext class='Flag'><titleimg style='float:left'><a href='/index.html'><img src="../Images/Logo.png" style='width:40px;height:auto'1;></img></a></titleimg>
<h1><a href='../index.html' class='ResizingTitle'>Home</a></h1></Flagtext>
<div id="swappableText">
<div class='BodyTextBox'><div class='BodyTitle'><a href='/index.html'>Home</a></div>
<div class='mainTextHeader' id="mainTextHeader">Application</div>
<div class='mainText' id="mainText"></div>

<?php

echo "
<h2>Management</h2>
<button onclick=\"window.location.href='CreateTables.php'\">Create Tables</button><br><br>
<button onclick=\"window.location.href='admintools/list.php'\">List Users</button><br><br>
<button onclick=\"window.location.href='admintools/listexpired.php'\">List Expired</button><br><br>
<form method='post' action='admintools/add.php' name='adminPanelForm2'>
<input type='text' name='usernamesub'></input><br>
<input type='submit' name='add' value='Add User'></input>
</form>";

 ?>
</body>
</html>
