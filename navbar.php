<?php $curPageName = basename($_SERVER['PHP_SELF']);

$logActionName = 'Login';
$logActionURL = './login.php';

if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
    $logActionName = 'Logout';
    $logActionURL = './logout.php';
}
else{
    require_once ('libraries/Google/autoload.php');

    //Insert your cient ID and secret
    //You can get it from : https://console.developers.google.com/
    require 'googleOAuthCommon.php';
    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    $authUrl = $client->createAuthUrl();
    $logActionURL = $authUrl;
}

?>


<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li <?php if (strpos($curPageName,'index')>-1) echo 'class="active"'?>><a href="./">Home</a></li>
        <li <?php if (strpos($curPageName,'mynotes')>-1) echo 'class="active"'?>><a href="./mynotes.php">My Notes</a></li>
        <li <?php if (strpos($curPageName,'settings')>-1) echo 'class="active"'?>><a href="./settings.php">Settings</a></li>
        <li><a href="<?php echo $logActionURL ?>"><?php echo $logActionName ?></a></li>
    </ul>
</div>