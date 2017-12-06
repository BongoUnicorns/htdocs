<?php

?>

<?php

$dbc = mysqli_connect("localhost", "root", "root", "BashCommandsAppCache");

//GET PASSWORD FROM AUTHUSERS TABLE

$query = "SELECT * FROM `AuthorizedUsers` WHERE user = '" . $_POST['username'] . "' AND token = '" . $_POST['password'] . "';";
$result = mysqli_query($dbc, $query) or die('Query failed: ' .mysqli_error($dbc));
$row = mysqli_fetch_array($result);

if($_POST['username']=='admin' && $_POST['password']=='password'){
  session_start();
  $_SESSION['admin']='true';
  echo "Logging in...";
  echo "<script>window.location.href = 'adminsession.php';</script>";

}

elseif ($row[1] != $_POST['username']){

    echo "<script>window.location.href = '../indexsession.html';</script>";

}else{
  echo "Logging in...";
  echo "<script>window.location.href = 'usersession.php';</script>";

}

/*
if(isset($_POST['username'])){
  $_SESSION["username"]=$_POST['username'];
}

else{
  echo <<<ENO
  <h2>Login:</h2><form method="post" action=""><input type="text" name="username"><input type="text" name="password"><input type="submit"></form>

ENO;
}
*/

?>
