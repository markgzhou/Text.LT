<?php $curPageName = basename($_SERVER['PHP_SELF']);


$loginMenu = '';

if(isset($_SESSION['access_token']) && $_SESSION['access_token']){

    $firstName = $_SESSION['firstName'];
    $imgURL = $_SESSION['imgURL'];


$loginMenu = <<<EOT
  <li class="dropdown" >
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 0px;padding-bottom: 0px;" role="button" aria-haspopup="true" aria-expanded="false" >
         <img id="id_p" width="50px" height="50px" src="$imgURL" title="$firstName" aria-label="Profile Picture">
        $firstName
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="./settings.php">Settings</a></li>
        <li><a href="./logout.php">Logout</a></li>
      </ul>
 </li>
EOT;

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
    $loginMenu =  '<li><a href="'.$authUrl.'">Login</a></li>';
}




?>


<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li <?php if (strpos($curPageName,'index')>-1) echo 'class="active"'?>><a href="./">Home</a></li>
        <li <?php if (strpos($curPageName,'mynotes')>-1) echo 'class="active"'?>><a href="./mynotes.php">My Notes</a></li>
        <?php echo $loginMenu; ?>
    </ul>
</div>