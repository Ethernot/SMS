<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>
<?php
$name = $_POST['name'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$ip = $_POST['IP'];
$user = $_POST['user'];
$password = $_POST['password'];
$access = $_POST['acess'];
$newSwitch = $name . "," . $brand . "," . $model . "," . $ip . "," . $user . "," . $password . "," . $access;
if (!file_exists('Switch/SwitchAcessList.txt')) {
    mkdir('Switch', 0777, true);
} else {
    $newSwitch = "\n" . $newSwitch;
}
$myfile = fopen("Switch/SwitchAcessList.txt", "a") or die("Unable to open file!");

fwrite($myfile, $newSwitch);
fclose($myfile);
if (!file_exists("logs")) {
    mkdir('logs', 0777, true);
}
$d = date("Y-m-d") . '_' . date("h-i-sa");
$myfile = fopen("logs/" . $d . "_added_swich_" . $name . ".txt", "a") or die("Unable to open file!");
fwrite($myfile, "added switch " . $name);
fclose($myfile);
?>
<h1>New Switch added with sucess</h1>
<a href="Home.php">return to Home</a>
</body>
</html>
