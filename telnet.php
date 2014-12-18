<?php
require_once "PHPTelnet.php";
require_once "date.php";
function telnetswitch($ip, $username, $password, $switchname, $flag)
{
    $telnet = new PHPTelnet();
    $result = $telnet->Connect($ip, $username, $password);

    mkdir("configs/" . $switchname, 0777, true);
    if ($result == 0) {
        $telnet->DoCommand('pro', $result);
        $telnet->DoCommand('ip', $result);
        $telnet->DoCommand('interface', $result);
        $telnet->DoCommand('summary', $result);
        $telnet->DoCommand('all', $result);
        $telnet->Disconnect();
        if ($flag == 0)
            $file = getLogFileName($switchname);
        else
            $file = getLogFileNow($switchname);

        $myfile = fopen("configs/" . $file, "w") or die("Unable to open file!");
        fwrite($myfile, $result);
        fclose($myfile);

        if (!file_exists("logs")) {
            mkdir('logs', 0777, true);
        }
        $d = date("Y-m-d") . '_' . date("h-i-sa");
        $myfile = fopen("logs/" . $d . "backup_switch_" . $switchname . ".txt", "a") or die("Unable to open file!");
        fwrite($myfile, "backup switch " . $switchname);
        fclose($myfile);
        echo "<br>Switch com o nome" . $switchname . " obtido com sucesso via telnet<br>";
    } else {
        echo "<br>Erro no switch com o nome" . $switchname . " via telnet<br>";
    }
}

?> ﻿
