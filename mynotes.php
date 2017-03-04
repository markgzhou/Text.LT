<?php require_once 'common.php' ?>
<?php require_once 'conn.php' ?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit"/>
    <meta name="keywords" content="<?=$keywords?>" />
    <meta name="description" content="<?=$description?>" />
    <meta name="author" content="<?=$author?>" />
    <title>All my notes Text.LT - Light Text</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css">

    <link href="./css/clean-blog.css" rel="stylesheet">
    <link href="./css/sticky-footer-navbar.css" rel="stylesheet">

</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <?php require 'navbar.php' ?>
        <!--/.nav-collapse -->
    </div>
</nav>


<!-- Begin page content -->

<div class="container-first">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>My Notes</h2>
            </div>
			<div class="col-lg-6" align="right">
                <h2>
					<a type="button" class="btn btn-success" href="note.php?page=new"  target="_Note">Create a new note</a>
				</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-left">
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Content</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$sql = "SELECT * FROM `gterm_text_lt`.`notes` where userID = '". $_SESSION['userID'] . "';";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo '<tr>';
						echo '<td>' . date("Y-m-d G:i", strtotime($row["updateDate"])) . '</td>';
						//mb_substr handles utf-8 encoding
						echo '<td><a href="note.php?page='. makeNotePageID($userID,$row["noteID"] ).'"  target="_Note">'. mb_substr($row["noteContent"],0,100,'utf-8').'...</a></td>';
						echo '</tr>';
					}
				}
					
				?>
				
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Analysis</h2>
			<p>Account: <?=$email?></p>
            <p>Current login IP: <?=$ip?>.</p>
            <p>Member of Text.LT since <?=date("F j, Y",$firstLoginTime)?>. Thank you for your support, <?=$firstName?> <?=$lastName?>!</p>
        </div>
    </div>
</div>


<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Location</h3>
                    <p>University of Missouri
                        <br>N52 Memorial Union
                        <br>Columbia, MO 65211 USA</p>
                </div>
                <div class="col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x text-primary"></i>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x text-primary"></i>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-wordpress fa-stack-1x text-primary"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>About Service</h3>
                    <p>Hosting by GoDaddy
                        <br>CDN provided by CloudFlare
                        <br>Other services by Google
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


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

</body>
</html>


