//version December 5th 2017 Matt Mordeson and Jack Ische
//This is the main PHP page for our project Remote Access Tool

<html>
<head>

	<title>Remote Access Tool</title>
		<style type="text/css">
		</style>
		<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
<Flagtext class='Flag'><titleimg style='float:left'><a href='/index.html'><img src="../Images/Logo.png" style='width:40px;height:auto'1;></img></a></titleimg>
<h1><a href='../index.html' class='ResizingTitle'>Home</a></h1></Flagtext>
<div id="swappableText">
<div class='BodyTextBox'><div class='BodyTitle'><a href='/index.html'>Home</a></div>
<div class='mainTextHeader' id="mainTextHeader">Application</div>
<div class='mainText' id="mainText"></div>

//connects to SQL table

	<?php

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

if($_POST["username"]=="admin"){
	if($_POST["password"]=="password"){
		echo "
		<h2>Management</h2>
		<button onclick=\"window.location.href='CreateTables.php'\">Create Tables</button><br><br>
		<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='adminPanelForm'>
		<input type='submit' name='list' value='List Users'></input><br>
		<input type='submit' name='listexpired' value='List Expired'></input></form><br>
		<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='adminPanelForm2'>
		<input type='text' name='usernamesub'></input><br>
		<input type='submit' name='add' value='Add User'></input>
</form>";

	//echo "<script>window.location.replace(\"../index.html\");</script>";

}else{
	echo 'Access denied.  Credentials not recognized.  Contact your systems administrator.';
}
}

//ACCOUNT MANAGEMENT PORTION!!!!

//UserList
elseif(isset($_POST["listexpired"])){
	$string1 = "(";
	$string2 = "SELECT * FROM `DestroyedTokens`";
	$string99 = ");";
	$query = $string1.$string2.$string99;
	$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));

	echo "User:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspToken:<br><table style='color:white;'>";

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['user'] . "</td><td>" . $row['token'] . "</td><td>" . $row['destructiontime'] . "</td></tr>";
}
echo "</table>";

}

elseif(isset($_POST["list"])){
	$string1 = "(";
	$string2 = "SELECT * FROM `AuthorizedUsers`";
	$string99 = ");";
	$query = $string1.$string2.$string99;
	$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));

	echo "User:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPassword:<br><table style='color:white;'>";

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='adminPanelForm'><tr><td><input name='userNumber' type='text' value='" . $row['id'] . "' style='width:30px;' readonly></input></td><td>" . $row['user'] . "</td><td>" . $row['token'] . "</td>

<td><input type='submit' name='deleteUser' value='Delete User'></input><br></form></td>


</tr>";  //$row['index'] the index here is a field name
}
echo "</table>";

}
//Delete Users

elseif(isset($_POST["userNumber"]) && isset($_POST["deleteUser"])){

	$query = 'DELETE FROM `AuthorizedUsers` WHERE id = ' . $_POST["userNumber"] . ';';
	$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));
	echo "User number " . $_POST["userNumber"] . " will be deleted.<br><br>


	<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='UserListReturn'><input type='submit' name='list' value='List Users'></input></form>";}

	//End Delete Users


elseif(isset($_POST["add"]) && $_POST["usernamesub"] != ""){


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

	<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='UserListReturn2'><input type='submit' name='list' value='List Users'></input></form>";

}
elseif(isset($_POST["add"]) && $_POST["usernamesub"] == ""){echo "No user selected. Please return to the previous page.";}


//END ACCOUNT MANAGEMENT PORTION

elseif(isset($_POST["commandToBeRun"])){
	$tokenname = $_POST['tokenX'];
		$input = $_POST["commandToBeRun"];
		$input = '"' . $input . '"';
		chdir('../Shell');
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

		<form method=\'post\' action=' . $_SERVER['PHP_SELF'] . ' name=\'commandForm\'><input type="hidden" name="tokenX" value="' . $_POST['tokenX'] . '"><input type=\'text\' name=\'commandToBeRun\' id=\'commandToBeRun\' style=\'width:100%;\' onkeypress=\'return enterKeyListener(event)\' autofocus>
		</form><script>document.getElementById("resultBox").scrollTop = 9999999;</script>';


//ACTUAL USER AUTHENTICATION PORTION***

}elseif(isset($_POST["username"])){

	$string1 = "SELECT * FROM `AuthorizedUsers` WHERE user = '";
	$string2 = $_POST['username'];
	$string3 = "' AND token = '";
	$string4 = $_POST['password'];
	$string99 = "';";
	$query = $string1.$string2.$string3.$string4.$string99;
	$result = mysqli_query($dbc, $query) or die('Credentials not recognized: ' .mysqli_error($dbc));

$authenticated=false;
	echo "<table>";
	while($row = mysqli_fetch_array($result)){
		if($_POST['username'] == $row[1] && $_POST['password'] == $row[2]){
			$authenticated=true;
			echo 'Enter command here:';
			echo '<h1 id="testRenderBlock"></h1>';
			echo '<div id="resultBox" name="resultBox"><br></div>


			<form method=\'post\' action=' . $_SERVER['PHP_SELF'] . ' name=\'commandForm\'><input type="hidden" name="tokenX" value="' . $_POST['password'] . '"><input type=\'text\' name=\'commandToBeRun\' id=\'commandToBeRun\' onkeypress=\'return enterKeyListener(event)\' style=\'width:100%;\'>

			</form>';

			$queryX = "INSERT INTO `DestroyedTokens`(user, token, destructiontime) VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "','" . time() . "');";
			$result = mysqli_query($dbc, $queryX) or die(mysqli_error($dbc));

			$queryY = "DELETE FROM `AuthorizedUsers` WHERE token = " . $_POST["password"] . ";";
			$result = mysqli_query($dbc, $queryY) or die(mysqli_error($dbc));

			//ADD USER TOKEN TO DestroyedTokens to prevent second login

		}
	}
	echo "</table>";

	if($authenticated==false){

		echo 'Access denied.  Credentials not recognized.  Contact your systems administrator.';

	}
}

	//ACCOUNT MANAGEMENT PORTION!!!!

	elseif(isset($_POST["list"])){
		echo "List users.";}


	elseif(isset($_POST["delete"]) && $_POST["username"] != ""){
		echo $_POST["username"]. " user will be deleted.";}
	elseif(isset($_POST["delete"]) && $_POST["username"] == ""){echo "No user selected. Please return to the previous page.";}


	elseif(isset($_POST["add"]) && $_POST["username"] != ""){
		echo $_POST["username"]. " user will be added.";}
	elseif(isset($_POST["add"]) && $_POST["username"] == ""){echo "No user selected. Please return to the previous page.";}


	//END ACCOUNT MANAGEMENT PORTION


else{echo 'Access denied.  Credentials not recognized.  Contact your systems administrator.';}


?>

</div>
</body>
</html>
