<?php
require_once "PHPTelnet.php";
require_once "date.php";
function telnetswitch($ip, $username, $password, $switchname, $flag)
{
    $telnet = new PHPTelnet();
    $result = $telnet->Connect($ip, $username, $password);

    if ($result == 0) {
        $telnet->DoCommand('pro', $result);
        $telnet->DoCommand('ip', $result);
        $telnet->DoCommand('interface', $result);
        $telnet->DoCommand('summary', $result);
        $telnet->DoCommand('all', $result);
        $telnet->Disconnect();
        mkdir("configs/" . $switchname, 0777, true);
        if ($flag == 0)
            $file = getLogFileName($switchname);
        else
            $file = getLogFileNow($switchname);

        $myfile = fopen("configs/" . $file, "w") or die("Unable to open file!");
        fwrite($myfile, $result);
        fclose($myfile);
    } else {
        //mandar mail
    }
}

?> ﻿
