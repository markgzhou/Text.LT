<?php $curPageName = basename($_SERVER['PHP_SELF']); ?>
<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li <?php if (strpos($curPageName,'index')>-1) echo 'class="active"'?>><a href="./">Home</a></li>
        <li <?php if (strpos($curPageName,'mynotes')>-1) echo 'class="active"'?>><a href="./mynotes.php">My Notes</a></li>
        <li <?php if (strpos($curPageName,'settings')>-1) echo 'class="active"'?>><a href="./settings.php">Settings</a></li>
        <li><a href="../navbar-fixed-top/">Login</a></li>
    </ul>
</div>