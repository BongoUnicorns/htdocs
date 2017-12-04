<?php

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

echo <<<END
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tables are being created.</title>
<style type="text/css">
	</style>
<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<Flagtext class="Flag"><titleimg style="float:left"><a href="../index.html"><img src="../Images/Logo.png" style='width:40px;height:auto' 1;></img></a></titleimg>
<h1><a href="" class="ResizingTitle"> </a></h1></Flagtext>
<div class="BodyTextBox"><div class="BodyTitle"><a href="../index.html">Home</a></div><div class="mainTextHeader">Creating Tables.</div><div class="mainText">
END;

TokenCacheCreate($dbc);
UsersCreate($dbc);
CommandsCreate($dbc);

function connect() {
  $db = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");
  if (mysqli_connect_errno()){
    die (mysqli_connect_error());
  }
  echo "Connected successfully.<br><br>";
}


function CommandsCreate($dbc) {
    $string1 = "CREATE TABLE CommandsRun";
		$string2 = "(";
    $string3 = "commandname    TEXT, ";
    $string4 = "timerun    TIMESTAMP, ";
    $string5 = "tokenname    VARCHAR(8) NOT NULL";
    $string99 = ");";

    $query = $string1.$string2.$string3.$string4.$string5.$string99;

    $result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));
    echo "Table CommandsRun created . . . <br>";
    //echo "Would have run query: ".$query."<br>";
  }

function UsersCreate($dbc){
  $string1 = "CREATE TABLE AuthorizedUsers";
  $string2 = "(";
	$string3 = "id    INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
  $string4 = "user    VARCHAR(30) NOT NULL, ";
  //like "SSR67898" or "NNN32454"
  $string5 = "token    VARCHAR(8) NOT NULL";
  $string99 = ");";

  $query = $string1.$string2.$string3.$string4.$string5.$string99;

  $result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));
  echo "Table AuthorizedUsers created . . . <br>";
  //echo "Would have run query: ".$query."<br>";
}

  function TokenCacheCreate($dbc) {
    $string1 = "CREATE TABLE DestroyedTokens";
	$string2 = "(";
	$string3 = "token    VARCHAR(8), ";
	$string4 = "destructiontime    TIMESTAMP";
	$string99 = ");";

	$query = $string1.$string2.$string3.$string4.$string99;

    $result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));
    echo "Table TokenCacheCreate created . . . <br>";
    //echo "Would have run query: ".$query."<br>";
  }

echo <<<END
</div>
</body>
</html>

END;

?>
