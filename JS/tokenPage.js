var d = new Date();
//document.getElementById("date").innerHTML = d.getTime();
//document.getElementById("tokenGenerator").innerHTML = username("isAString");
function datefunc(){
  var dMilli = d.getTime();
  return dMilli;
}
function username(isAString) {
var tokenVar = isAString;
var tokenLength = isAString.length;
var firstLetter = isAString.charAt(0);
var lastLetter = isAString.charAt(tokenLength-1);
var letters = [" ", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n","o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"] ;
var firstLetNum = letters.indexOf(firstLetter);
var lastLetNum = letters.indexOf(lastLetter);
var goodStuff = tokenLength * firstLetNum * lastLetNum + datefunc();
var goodStuffStr = String(goodStuff);
var lastEight = goodStuffStr.substr(goodStuffStr.length - 8);
return lastEight;
}
//done
