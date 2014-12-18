<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>

<?php
require_once("ssh.php");
require_once("telnet.php");
$switchName = $_POST['switchName'];

$ip = "";
$user = "";
$password = "";
$type = "";

$file = file_get_contents('Switch/SwitchAcessList.txt', true);
$switchesList = array();
for ($i = 0; $i < count(explode("\n", $file)); $i++) {
    array_push($switchesList, explode("\n", $file)[$i]);
}

foreach ($switchesList as $s) {
    if (explode(",", $s)[0] == $switchName) {
        $ip = explode(",", $s)[3];
        $user = explode(",", $s)[4];
        $password = explode(",", $s)[5];
        $type = explode(",", $s)[6];
        break;
    }
}

if ($type == 'ssh') {
    sshswitch($ip, $user, $password, $switchName, 1);
} else {
    telnetswitch($ip, $user, $password, $switchName, 1);
}

?>

</body>
</html>

