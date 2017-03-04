<?php
$mysqli = new mysqli("a2plcpnl0564.prod.iad2.secureserver.net", "gterm_text_lt_ad", "fj2#zx.sS2@p", "gterm_text_lt");
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    die( "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
?>