<?php require_once 'common.php' ?>
<?php require_once 'conn.php' ?>

<?php


$isAuthorized = false;

if($isLoggedIn && isset($_REQUEST['page']) && strtolower($_REQUEST['page']) =='new'){

    if(didCurrentUserCreateTooManyNotes($userID, $mysqli)){
        $_SESSION['msgType'] = '406 Not Acceptable';
        $_SESSION['msg1'] = 'You have created too many notes.';
        $_SESSION['msg2'] = 'Please delete some notes and retry.';
        header("Location:message.php");
        die();
    }
    else{
        $sampleContent = 'This is a brand new note! \n Wow Cool!';
        //create a new record in notes table
        $stmt = $mysqli->prepare("INSERT INTO `gterm_text_lt`.`notes` (`noteContent`, `updateDate` , `userID`, `ip`,  `email`) VALUES (?, now(), ?, ?, ?)");
        $stmt->bind_param('ssss' ,$sampleContent, $_SESSION['userID'], $_SESSION['ip'], $_SESSION['email']);
        $stmt->execute();
        $insertedID = $stmt->insert_id;
        $stmt->close();

        $rawPageID = makeNotePageID($userID,$insertedID);
        $isAuthorized = true;
        header("Location:note.php?page=".$rawPageID,   true,  301 );
        exit;
     }
}
else if ($isLoggedIn && isset($_REQUEST['page'])){

    //TODO: Check is note page exists and the note page belongs to the owner with userID
    $isAuthorized = true;
    die( '$rawPageID = ' . getNotePageID($_REQUEST['page']));
}


if(!$isAuthorized){
$_SESSION['msgType'] = '401 Not Authorized';
$_SESSION['msg1'] = 'You do not have access to this page.';
$_SESSION['msg2'] = 'Your account is not authorized.';
header("Location:message.php");
die();
}


?>


<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit"/>
    <meta name="keywords" content="....."/>
    <meta name="description" content="....."/>
    <meta name="author" content="....."/>
    <title>All my notes Text.LT - Light Text</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css">

    <link href="./css/clean-blog.css" rel="stylesheet">
    <link href="./css/sticky-footer-navbar.css" rel="stylesheet">

    <link rel="stylesheet" href="lib/codemirror.css">


</head>

<body>


<!-- Begin page content -->

<div class="container container-note">
    <div class="row">
        <div class="col-lg-12 text-left">

        <textarea id="notearea">
        <!-- Create a simple CodeMirror instance -->
        <script>
          var editor = CodeMirror.fromTextArea(myTextarea, {
            lineNumbers: true
          });
        </script>
        </textarea>



        </div>
    </div>
</div>







<!--  	<footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer> -->


<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="container">
        <p>Copyright © gTerminal 2017</p>
    </div><!--/.nav-collapse -->
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script src="lib/codemirror.js"></script>
<script src="lib/text.lt.v.1.0.js"></script>
<script src="mode/javascript/javascript.js"></script>

<script>
    $(document).ready(function() {
    var table = $('#example').DataTable(
        {
        paging: false,
        bFilter: false,
        bInfo: false,
        "bJQueryUI": true, //Enable smooth theme
        "sPaginationType": "full_numbers", //Enable smooth theme
        "sDom": 'lfrtip'
        }
    );

} );

</script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("notearea"), {
      lineNumbers: true,
      lineWrapping: true,
      extraKeys: {
              "F11": function(cm) {
                cm.setOption("fullScreen", !cm.getOption("fullScreen"));
              },
              "Esc": function(cm) {
                if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
              }
            }
    });

</script>

</body>
</html>


