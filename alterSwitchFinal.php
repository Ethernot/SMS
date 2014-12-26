<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>
<?php


function savechange($newname, $oldconfigs)
{

    $configs = explode(",", $oldconfigs);
    $oldname = $configs[0];
    $newbrand = $configs[1];
    $newmodel = $configs[2];
    $newip = $configs[3];
    $newuser = $configs[4];
    $newpassword = $configs[5];
    $newaccess = $configs[6];

    if (!file_exists('configs/history/' . $oldname . '/confighistory.txt')) {
        mkdir('configs/history/' . $oldname, 0777, true);
    }

    $f = fopen('configs/history/' . $oldname . '/confighistory.txt', "a") or die("Unable to open file!");

    fwrite($f, "\n*******\n");
    $d = date("Y-m-d") . '_' . date("h-i-sa");
    fwrite($f, "configurations changed on: " . $d);
    //data/hora atual

    fwrite($f, "\nold configurations:\n");

    fwrite($f, "current name:" . $oldname . "\n");
    fwrite($f, "current brand:" . $newbrand . "\n");
    fwrite($f, "current model:" . $newmodel . "\n");
    fwrite($f, "current ip:" . $newip . "\n");
    fwrite($f, "current user:" . $newuser . "\n");
    fwrite($f, "current pass:" . $newpassword . "\n");
    fwrite($f, "current access:" . $newaccess . "\n");

    fclose($f);
    rename("configs/history/" . $oldname, "configs/history/" . $newname);
    rename("configs/" . $oldname, "configs/" . $newname);
}


$file = file_get_contents('Switch/SwitchAcessList.txt', true);
$switchesList = array();
for ($i = 0; $i < count(explode("\n", $file)); $i++) {
    array_push($switchesList, explode("\n", $file)[$i]);
}

$oldName = $_POST['oldName'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$ip = $_POST['IP'];
$user = $_POST['user'];
$password = $_POST['password'];
$access = $_POST['acess'];
$newSwitch = $name . "," . $brand . "," . $model . "," . $ip . "," . $user . "," . $password . "," . $access . "\n";
if (!file_exists('Switch/SwitchAcessList.txt')) {
    mkdir('Switch', 0777, true);
}

$modified = "";
$final = "";
foreach ($switchesList as $s) {
    if (explode(",", $s)[0] == $oldName) {
        $modified = $s;
    } else {
        $final .= $s . "\n";
    }
}
$final .= $newSwitch;
$myfile = fopen("Switch/SwitchAcessList.txt", "w") or die("Unable to open file!");
fwrite($myfile, $final);
fclose($myfile);

$finalAlter = $modified . " - " . $final; //a-n

savechange($name, $modified);

$myfile = fopen("Switch/ChangedSwitchList.txt", "a") or die("Unable to open file!");
fwrite($myfile, $finalAlter);
fclose($myfile);
if (!file_exists("logs")) {
    mkdir('logs', 0777, true);
}
$d = date("Y-m-d") . '_' . date("h-i-sa");
$myfile = fopen("logs/" . $d . "_altered_switch_info_" . $name . ".txt", "a") or die("Unable to open file!");
fwrite($myfile, "altered switch " . $name);
fclose($myfile);


?>
<h1>Switch altered with sucess</h1>
<a href="Home.php">return to Home</a>
</body>
</html>
