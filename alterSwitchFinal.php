<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>
<?php

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
        $final .= $s;
    }
}
$final .= $newSwitch;
$myfile = fopen("Switch/SwitchAcessList.txt", "w") or die("Unable to open file!");
fwrite($myfile, $final);
fclose($myfile);

$myfile = fopen("Switch/ChangedSwitchList.txt", "a") or die("Unable to open file!");
fwrite($myfile, $modified);
fclose($myfile);
?>
<h1>Switch altered with sucess</h1>
<a href="Home.php">return to Home</a>
</body>
</html>