<?php include 'common.php' ?>
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

    <script src="lib/codemirror.js"></script>
    <link rel="stylesheet" href="lib/codemirror.css">
    <script src="mode/javascript/javascript.js"></script>

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


