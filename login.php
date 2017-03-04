<?php
session_start(); //session start

require_once ('libraries/Google/autoload.php');

include 'googleOAuthCommon.php';


/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/

$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
************************************************/

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


if (isset($authUrl)){
	echo '<div align="center">';
	echo '<h3>Login with Google -- Please Allow all the access!</h3>';
	echo '<div>Please click login button to connect to Google.</div>';
	echo '<a class="login" href="' . $authUrl . '"><img src="img/google-login-button.png" /></a>';
	echo '</div>';

} else {

	$user = $service->userinfo->get(); //get user info

    $_SESSION['firstName'] = $user->givenName;
    $_SESSION['lastName'] = $user->familyName;
    $_SESSION['userID'] = $user->id;
    $_SESSION['imgURL'] = $user->picture;
    $_SESSION['email'] = $user->email;



    if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
        $_SESSION['ip'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }else{
        $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
    }

    require_once 'conn.php';
	
	//Check if logged in with 5 minutes using same IP.
	$sql = "SELECT * FROM `gterm_text_lt`.`logs` where userID = '". $_SESSION['userID'] . "' and ip = '".$_SESSION['ip']."' and loginDate > (NOW() - INTERVAL 5 MINUTE) limit 1;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		//DoNothing
	} else {
		//Add login log
		$stmt = $mysqli->prepare("INSERT INTO `gterm_text_lt`.`logs` (`loginDate`, `userID`, `emailAddr`, `ip`) VALUES (now(), ?, ?, ?)");
		$mySQLtimeNow = date("Y-m-d H:i:s");
		$stmt->bind_param('sss' , $_SESSION['userID'], $_SESSION['email'], $_SESSION['ip']);
		$stmt->execute();
		$stmt->close();
	}
	
	//Get very first login history.
	$sql = "SELECT * FROM `gterm_text_lt`.`logs` where userID = '". $_SESSION['userID'] . "' order by loginDate limit 1;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$_SESSION['firstLoginTime'] = strtotime($row["loginDate"]);
		}
	} else {
		$_SESSION['firstLoginTime'] = time();
	}
	

//    $prepareQuery = "INSERT INTO `gterm_text_lt`.`logs` (`loginDate`, `userID`, `emailAddr`, `ip`) VALUES (NOW(), '".."' ,'".$_SESSION['email']."' ,'".$_SESSION['ip']."' );";
//    echo $prepareQuery;  //For debug
//    $mysqli->query($prepareQuery);

    //For debug
	//print user details
	//echo '<pre>';
	//print_r($user);
	//echo '</pre>';

	echo '<script>window.location = "'.$landing_page_url.'";</script>';
}



?>

