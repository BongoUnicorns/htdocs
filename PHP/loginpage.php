<html>
<head>
	<script>
	function enterKeyListener(event) {
    if (event.which == 13 || event.keyCode == 13) {
        //code to execute here
				alert("HELLO");
        return false;
    }
    return true;
};
	</script>

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
<div class='commandRead' id="commandRead" style="display:none">FORM GOES HERE, JACK!!!!!!!!<br><br></div>
	Welcome <?php echo $_POST["username"]; ?><br>
	Your password is: <?php echo $_POST["password"]; ?><br><br>

	<?php if($_POST["username"]=="jackische" && $_POST["password"]=="1234"){
		echo "<!--CONGRATULATION YOU HAVE BEEN SELECTED FOR YEAAAH BOIIIIIIIIIIIIIIIIIIIIe-->

		<!--MAIGNI GAHRIAGHGU the GIANIGN COMMMMMMMM-->

		<!--STR8 ANKH DAVEEEEE.-->
";

	echo '<h1 id="testRenderBlock"></h1>';
	echo '
	<script>
	function outputStuff(){
	document.getElementById("EnterButton").style.visibility = "hidden";
	document.getElementById("mainTextHeader").innerHTML = "Console";
	document.getElementById("mainText").innerHTML = "<br>Enter Text Here<br><br>";
	document.getElementById("fields").innerHTML = "<input type=\'text\' id=commandToBeRun onkeypress=\'return enterKeyListener(event)\'>";
	enterKeyListener;

	document.getElementById("commandRead").style.display = "block";}
	</script>
	';
	echo '<div id="fields"><button type="button" id="EnterButton" onclick="outputStuff();">Enter Application</button></div>';
	}
?>
</div>
</body>
</html>
