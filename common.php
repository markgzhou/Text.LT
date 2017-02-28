<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = false;
$access_token = '';
$userID = -1;
$firstName = '';
$lastName = '';
$imgURL = '';

if(array_key_exists('userID',$_SESSION) && !empty($_SESSION['userID'])) {
  $isLoggedIn = true;
  $firstName = $_SESSION['firstName'];
  $lastName = $_SESSION['lastName'];
  $userID = $_SESSION['userID'];
  $imgURL = $_SESSION['$imgURL'];
  $_SESSION['access_token'];
}

$curPageName = basename($_SERVER['PHP_SELF']);

?>