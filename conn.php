<?php
$mysqli = new mysqli("a2plcpnl0564.prod.iad2.secureserver.net", "gterm_text_lt_ad", "fj2#zx.sS2@p", "gterm_text_lt");
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    die( "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}




function didCurrentUserCreateTooManyNotes($userID, $mysqli){
    $sqlTemp = "SELECT count(*) as ct FROM `gterm_text_lt`.`notes` where userID = '". $userID ."'";
    $result = $mysqli->query($sqlTemp);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row["ct"]>500;
        }
    } else {
       return false;
    }

    return false;
}

function isCurrentUserOwnCurerntPage($userID, $pageID, $mysqli){
    $pageID = (int)$pageID ;
    if($pageID > 0 ){
        $stmt = $mysqli->prepare("SELECT noteContent FROM `gterm_text_lt`.`notes` where userID = ? and noteID = ?; ");
        $stmt->bind_param('ss' , $userID, $pageID);
        if($stmt->execute()){
            $stmt->bind_result($noteContent);
            //Grab Single note record
            if ($stmt->fetch()) {
              return $noteContent;
            }
        }
    }
    return false;
}

function isCurrentUserHasAProfile($userID, $mysqli){
 $sqlTemp = "SELECT * FROM `gterm_text_lt`.`user` where googleUserID = '". $userID ."'";
    $result = $mysqli->query($sqlTemp);
    if ($result->num_rows > 0) {
      return true;
    }
    return false;
}

function createProfileForUser($userID, $mysqli){
    $stmt = $mysqli->prepare("INSERT INTO `gterm_text_lt`.`user` (`googleUserID`, `layout`, `emailAddr`, `ip`) VALUES (?, 0, ?, ?)");
    $stmt->bind_param('sss' , $_SESSION['userID'], $_SESSION['email'], $_SESSION['ip']);
    $stmt->execute();
    $stmt->close();
}


?>