<?php
require_once("SSH2.php");
require_once("date.php");
function sshswitch($ip, $username, $password, $switchname, $flag)
{

    $ssh = new SSH2($ip);
    $ssh->auth($username, $password);
    $ssh->exec("display current");
    $result = $ssh->output();
    if ($result != "") {
        mkdir("configs/" . $switchname, 0777, true);
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
        echo "<br>Switch com o nome" . $switchname . " obtido com sucesso via ssh<br>";
    } else {
        echo "<br>Erro no switch com o nome" . $switchname . " via ssh<br>";
    }
}

?>
