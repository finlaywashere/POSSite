<?php

$json = $_GET['json'];

$socket = 'pos.sock';
set_time_limit(0);

$s = socket_create(AF_UNIX, SOCK_STREAM, 0);

socket_connect($s, $socket);
socket_set_option($s,SOL_SOCKET, SO_RCVTIMEO, array("sec"=>5, "usec"=>0));
socket_write($s, $json."\n");
$data = socket_read($s, 1000000);
socket_close($s);
die($data);
?>
