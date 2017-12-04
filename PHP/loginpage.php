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
if($_POST["username"]=="admin"){
	if($_POST["password"]=="password"){
		echo "
		<h2>Management</h2>
		<button onclick=\"window.location.href='CreateTables.php'\">Create Tables</button><br><br>
		<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='adminPanelForm'>
		<input type='submit' name='list' value='List Users'></input><br><br><br>
		<input type='text' name='username'></input><br><br>
    <input type='submit' name='delete' value='Delete User'></input><br>
		<input type='submit' name='add' value='Add User'></input>
</form>";

	//echo "<script>window.location.replace(\"../index.html\");</script>";

}else{
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

elseif(isset($_POST["commandToBeRun"])){
		$input = $_POST["commandToBeRun"];
		$input = '"' . $input . '"';
		chdir('../Shell');
		$output = shell_exec('sh screenInterface.sh ' . 'jackische ' . $input);
		$output = $input . ' ::   ' . $output;
		//echo '<script language="javascript">alert(\'SUBMITTING THE STUFF\')</script>';
		echo '<h1 id="testRenderBlock"></h1>';
		echo '
		<!--<div id="resultBox" name="resultBox">' . $_POST["commandToBeRun"] . '<br><br></div>-->
		<div id="resultBox" name="resultBox" style="word-wrap: break-word;">' . $output . '<br><br></div>
		<form method=\'post\' action=' . $_SERVER['PHP_SELF'] . ' name=\'commandForm\'><input type=\'text\' name=\'commandToBeRun\' id=\'commandToBeRun\' onkeypress=\'return enterKeyListener(event)\' autofocus></form>';



	}elseif($_POST["username"]=="jackische" && $_POST["password"]=="1234"){
		echo 'Welcome ' . $_POST["username"] . '<br>';
		echo ' <br>';
		echo "

		<!--CONGRATULATION YOU HAVE BEEN SELECTED FOR YEAAAH BOIIIIIIIIIIIIIIIIIIIIe-->

		<!--MAIGNI GAHRIAGHGU the GIANIGN COMMMMMMMM-->

		<!--STR8 ANKH DAVEEEEE.-->

";

	echo 'Enter command here:';
	echo '<h1 id="testRenderBlock"></h1>';
	echo '
	<div id="resultBox" name="resultBox"><br></div>
	<form method=\'post\' action=' . $_SERVER['PHP_SELF'] . ' name=\'commandForm\'><input type=\'text\' name=\'commandToBeRun\' id=\'commandToBeRun\' onkeypress=\'return enterKeyListener(event)\'></form>';

}

elseif($_POST["username"]=="admin"){
		if($_POST["password"]=="password"){
			echo "
			<h2>Management</h2>
			<button onclick=\"window.location.href='CreateTables.php'\">Create Tables</button><br><br>
			<form method='post' action=" . $_SERVER['PHP_SELF'] . " name='adminPanelForm'>
			<input type='submit' name='list' value='List Users'></input><br><br><br>
			<input type='text' name='username'></input><br><br>
	    <input type='submit' name='delete' value='Delete User'></input><br>
			<input type='submit' name='add' value='Add User'></input>
	</form>";

		//echo "<script>window.location.replace(\"../index.html\");</script>";

	}else{
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
