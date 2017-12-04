<?php

$db = mysqli_connect("localhost:3306", "root", "root", "epiz_20610432_CSC551");

if (isset($_POST['run']) && ('process' == $_POST['run'])){
	processData($db);
}
else {
	  printForm();
}

function parseLine($text){

	$internalvar = $text;
	$strLength = strlen($internalvar);
    $increment = 0;

	if($strLength==0)
 	    return;


	for($i=1;$i<=27;$i++){
	   $delimiterfind = strpos($internalvar,',');
	   if($delimiterfind==0)
				$itemized[$increment]=NULL;
	   else
		$itemized[$increment]=substr($internalvar,0,$delimiterfind);
	   $internalvar=substr($internalvar,$delimiterfind+1);
	   $increment++;
	}
	$itemized[$increment]=substr($internalvar,0);

	return $itemized;
}

function convertBPDate ($DateString) {
	//echo "convertBPDate()<br>";

	//$DateString = "March 9 1821";

	$Date = explode(" ", $DateString);
	$Month = $Date[0];
	$Day = $Date[1];
	$Year = $Date[2];

  $Month = strtolower($Month);

  $MonthAbbrev = substr($Month, 0, 3);

  switch ($MonthAbbrev) {
    case "jan":
		case "jany":
    $Date[0] = "1";
    break;

    case "feb":
		case "feby":
    $Date[0] = "2";
    break;

    case "mar":
		case "mch":
    $Date[0] = "3";
    break;

    case "apr":
    $Date[0] = "4";
    break;

    case "may":
    $Date[0] = "5";
    break;

    case "june":
    $Date[0] = "6";
    break;

    case "july":
    $Date[0] = "7";
    break;

    case "august":
    $Date[0] = "8";
    break;

    case "september":
    $Date[0] = "9";
    break;

    case "october":
    $Date[0] = "10";
    break;

    case "november":
    $Date[0] = "11";
    break;

    case "december":
		case "dec":
    $Date[0] = "12";
    break;

    default:
    $Date[0] = "-1";
	//echo "Not formatted correctly! Fix data!<br><br>";
	return("Unknown");
    break;
  }

$mdy = $Date[0] . "/" . $Day . "/" . $Year;
return $mdy;
}



function convertBPAge ($age) {
	//echo "convertBPAge()<br>";

	//$age = "2 years 5 mo & 26 days";

	//echo "[";

	$agetoken = explode(" ",$age);
	$position = array_search('years', $agetoken);
if($position !== FALSE){$year = $agetoken[$position-1];/*echo $year;*/}else{

	$position = array_search('year', $agetoken);
if($position !== FALSE){$year = $agetoken[$position-1];/*echo $year;}else{echo "0";*/}}

	$position = array_search('months', $agetoken);
if($position !== FALSE){$month = $agetoken[$position-1];/*echo ", " .$month;*/}
	else{
	$position = array_search('mo', $agetoken);
if($position !== FALSE){$month = $agetoken[$position-1];/*echo ", " .$month;*/}else{/*echo ", 0";*/}}

	$position = array_search('days', $agetoken);
	if($position !== FALSE){$day = $agetoken[$position-1];/*echo ", " .$day;*/}
	else{
	$position = array_search('day', $agetoken);
if($position !== FALSE){$day = $agetoken[$position-1];/*echo ", " .$day;*/}else{/*echo ", 0";*/}}

	//echo "]<br><br>";
	$items = array(0,0,0);
	$items[0] = $year;
	$items[1] = $month;
	$items[2] = $day;
	return $items;
}



function convertBPTime ($deceasedTime) {
	//echo "convertBPTime()<br>";

	//$deceasedTime = "11:23 p.m.";

	$timehours = 0;
	$minutes = "00";
	$timetoken = explode(" ",$deceasedTime);

	$numerical = trim($timetoken[0]);

	if(intval($numerical)>0){$frontbacknumericaltime=explode(":",$numerical);
	$timehours=$frontbacknumericaltime[0];

	if($frontbacknumericaltime[1]!=="00" && strpos($numerical, ':') !== FALSE){

		$minutes = $frontbacknumericaltime[1];
	}

	}else{
		switch(strtolower($numerical)){
			case "one":
			$timehours = 1;
			break;

			case "two":
			$timehours = 2;
			break;

			case "three":
			$timehours = 3;
			break;

			case "four":
			$timehours = 4;
			break;

			case "five":
			$timehours = 5;
			break;

			case "six":
			$timehours = 6;
			break;

			case "seven":
			$timehours = 7;
			break;

			case "eight":
			$timehours = 8;
			break;

			case "nine":
			$timehours = 9;
			break;

			case "ten":
			$timehours = 10;
			break;

			case "eleven":
			$timehours = 11;
			break;

			case "twelve":
			case "noon":
			$timehours = 12;
			break;
		}

	}

	$twelvehour = trim($timetoken[1]);


	if ($twelvehour == "pm" || $twelvehour == "PM" || $twelvehour == "P.M." || $twelvehour == "p.m."){
		$timehours = $timehours+12;

	}
		$statement = $timehours.":".$minutes;
		return $statement;
}

function printForm(){

echo <<<END
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CSC 551 Home</title>
<style type="text/css">
	</style>
<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<Flagtext class="Flag"><titleimg style="float:left"><a href="dataparser.php"><img src="../Images/Logo.png" style='width:40px;height:auto' 1;></img></a></titleimg>
<h1><a href="" class="ResizingTitle"> </a></h1></Flagtext>
<div class="BodyTextBox"><div class="BodyTitle"><a href="">Data Fixer</a></div><div class="mainTextHeader">Options</div><div class="mainText">
<form action="$_SERVER[PHP_SELF]" method="post">
<input type="hidden" name="run" value="process">
<input type='file' name='inputFile' id='inputFile'/><br><br>

<input type="checkbox" name="convertBPDate" value="convertBPDate"> convertBPDate<br>
<input type="checkbox" name="convertBPTime" value="convertBPTime"> convertBPTime<br>
<input type="checkbox" name="convertBPAge" value="convertBPAge"> convertBPAge<br>
 <br />
<input type="submit" value="Run">

</div></div>
</body>
</html>

END;

}

function processData($db){

echo <<<END
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data is being processed.</title>
<style type="text/css">
	</style>
<link href="../HTML/styleMain.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<Flagtext class="Flag"><titleimg style="float:left"><a href="dataparser.php"><img src="../Images/Logo.png" style='width:40px;height:auto' 1;></img></a></titleimg>
<h1><a href="" class="ResizingTitle"> </a></h1></Flagtext>
<div class="BodyTextBox"><div class="BodyTitle"><a href="dataparser.php">Home</a></div><div class="mainTextHeader">Processed Data.</div><div class="mainText">

END;

	if(  !(isset($_POST['convertBPDate'])||isset($_POST['convertBPTime'])||isset($_POST['convertBPAge'])) )
	     die("Select an option.");
	$inFile = fopen("BPTestDataLotsUnique.csv", "r");



	if($inFile){
	    $buffer = fgets($inFile, 4096);

	    while (!feof($inFile)) {
	      $buffer = fgets($inFile, 4096);
	      $buffer = rtrim($buffer);

	      if($buffer=="")
				continue;

	      $fields = parseLine($buffer);
				//$fields is an array here

				echo $fields[0];

//echo $fields[0]."<br>";
if(isset($_POST['convertBPDate'])){
$outputdec = convertBPDate($fields[2]);
$outputbur = convertBPDate($fields[3]);

//Parses and fixes date decesased and date buried
$output1 = $outputdec;
$output2 = $outputbur;
//echo "Date ".$outputdec[0]."/".$outputdec[1]."/".$outputdec[2]."<br>";
}



if(isset($_POST['convertBPTime'])){
$output3 = convertBPTime($fields[4]);
//Parses and fixes time buried

//echo "Time ".$output3."<br>";
}



if(isset($_POST['convertBPAge'])){
$outputage = convertBPAge($fields[11]);
if($outputage[0] == NULL && $outputage[1] == NULL && $outputage[2] == NULL)
$output4 = "Unknown";

//echo "Age unknown<br><br>";
else
$output4 = $outputage[0]." ".$outputage[1]." ".$outputage[2];

//echo "Age ".$outputage[0]." ".$outputage[1]." ".$outputage[2]."<br><br>";
}






//Inserts data into BurialDetails
$querytype = "INSERT INTO BurialDetails VALUES";
$stringbegin = "('";
$stringend = "');";
$identifier = substr($fields[1],0,4);
$queryx = $querytype.$stringbegin.$fields[0]."','".$output2."','".$output3."','".$identifier."','".$fields[17].$stringend;

//PROBLEM AREA
echo "Query would have been ".$queryx."<br>";
$resultx = mysqli_query($db, $queryx) or die('Query failed: ' .mysqli_error($db));

//PROBLEM AREA


//Inserts data into Constituents
$querytype = "INSERT INTO Constituents VALUES";
$stringbegin = "('";
$stringend = "');";
$queryy = $querytype.$stringbegin.$fields[1]."','".$fields[5]."','".$fields[6]."','".$fields[7]."','".$fields[8]."','".$fields[9]."','".$fields[10]."','".$output4."','".$fields[13]."','".$fields[14]."','".$fields[15].$stringend;
$resulty = mysqli_query($db, $queryy) or die('Query failed: ' .mysqli_error($db));

//Inserts data into LocationInfo
$querytype = "INSERT INTO LocationInfo VALUES";
$stringbegin = "('";
$stringend = "');";
$queryz = $querytype.$stringbegin.$fields[17]."','".$fields[19].$stringend;
$resultz = mysqli_query($db, $queryz) or die('Query failed: ' .mysqli_error($db));

}}fclose($inFile);

echo <<<END
</body>
</html>
END;

}

?>
