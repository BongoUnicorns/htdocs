<html>
<head>
	<title>Remote Access Tool</title>
		<style type="text/css">
		</style>
		<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<Flagtext class='Flag'><titleimg style='float:left'><a href='index.html'><img src="../Images/Logo.png" style='width:40px;height:auto'1;></img></a></titleimg>
<h1><a href='../index.html' class='ResizingTitle'>Home</a></h1></Flagtext>
<div id="swappableText">
<div class='BodyTextBox'><div class='BodyTitle'></div><div class='mainTextHeader' id="mainTextHeader">This is a PHP script to handle inputs from the index.</div><div class='mainText' id="mainText">
	Welcome <?php echo $_POST["username"]; ?><br><br>
	Your password is: <?php echo $_POST["password"]; ?><br><br>

	<?php if($_POST["username"]=="jackische" && $_POST["password"]=="1234"){
		echo "<!--CONGRATULATION YOU HAVE BEEN SELECTED FOR YEAAAH BOIIIIIIIIIIIIIIIIIIIIe--><br><br>

		<!--MAIGNI GAHRIAGHGU the GIANIGN COMMMMMMMM-->
";

	echo '<h1 id="testRenderBlock"></h1>';
	echo '
	<script>
	function outputStuff(){
	document.getElementById("mainTextHeader").innerHTML = "Console";
	document.getElementById("mainText").innerHTML = "<br><br><br>This is where the form will be!";}
	</script>

	';
	echo '<button type="button" onclick="outputStuff();">Enter Application</button>';

	}
?>
</div>
</body>
</html>
