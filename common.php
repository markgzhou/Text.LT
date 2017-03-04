<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = false;
$access_token = '';
$userID = -1;
$firstName = '';
$lastName = '';
$email = '';
$imgURL = '';

if(array_key_exists('userID',$_SESSION) && !empty($_SESSION['userID'])) {
  $isLoggedIn = true;
  $firstName = $_SESSION['firstName'];
  $lastName = $_SESSION['lastName'];
  $userID = $_SESSION['userID'];
  $imgURL = $_SESSION['imgURL'];
  $email = $_SESSION['email'];
  $ip = $_SESSION['ip'];
  $accessToken = $_SESSION['access_token'];
  $firstLoginTime = $_SESSION['firstLoginTime'];
}

$curPageName = basename($_SERVER['PHP_SELF']);

?>