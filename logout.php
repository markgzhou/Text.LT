<?php
session_start();
session_unset();

$_SESSION['msgType'] = 'Logged out';
$_SESSION['msg1'] = 'You have successfully logged out.';
$_SESSION['msg2'] = 'Click Login button to log back in.';
header("Location:message.php")

?>