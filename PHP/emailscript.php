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
