<html>
		<head>
			<title>Remote Access Tool</title>
<style type="text/css">
</style>
<link href="../../HTML/styleMain.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
  <div class="BodyTextBox">
<?php

//Simple check whether the input is a valid email address.

  $string = $_POST['email'];
  $posat = strpos($_POST['email'], '@');
  $posdot = strpos($_POST['email'], '.');
  if ($posat === false | $posdot === false){

    echo "<p>Not a valid email.</p><script>setTimeout(function(){
      window.location.href = '/PHP/usertools/permissionsrequest.html';

    }, 2000);
     </script>";
  }else{

//Sends the mail message to samplemailer@remotebash.net

/*
  mail('samplemailer@remotebash.net', 'Access Request', $_POST['email'] . "says: " . $_POST['message']);
  */

echo "<p>Email sent.  Redirecting... </p><script>setTimeout(function(){
  window.location.href = '/index.html';

}, 2000);
 </script>";
}
 ?>
</div>
</body>
</html>
