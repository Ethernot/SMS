<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>
<?php
$brand = $_POST['brand'];
$model = $_POST['model'];
$ip = $_POST['IP'];
$user = $_POST['user'];
$password = $_POST['password'];
$newSwitch = $brand . "," . $model . "," . $ip . "," . $user . "," . $password . "\n";
if (!file_exists('Switch/SwitchAcessList.txt')) {
    mkdir('Switch', 0777, true);
}
$myfile = fopen("Switch/SwitchAcessList.txt", "a") or die("Unable to open file!");
fwrite($myfile, $newSwitch);
fclose($myfile);
?>
<h1>New Switch added with sucess</h1>
<a href="Home.html">return to Home</a>
</body>
</html>