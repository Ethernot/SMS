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
    } else {
        echo "erro";
        //mandar mail
    }
}

?>
