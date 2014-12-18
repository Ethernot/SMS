<?php
$secondsWait = 86400;

header("Refresh:$secondsWait");
require_once "ssh.php";
require_once "telnet.php";
sshswitch("10.17.0.6", "monitor", "monitor", "switchssh", 1);
telnetswitch("10.17.0.7", "monitor", "monitor", "telnetswitch", 1);
echo date('Y-m-d H:i:s');
?>
