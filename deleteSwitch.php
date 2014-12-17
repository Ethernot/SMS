<html>
<head>
    <title> Switch management Software </title>
</head>
<body>
<?php

$file = file_get_contents('Switch/SwitchAcessList.txt', true);
$switchesList = array();
for ($i = 0; $i < count(explode("\n", $file)); $i++) {
    array_push($switchesList, explode("\n", $file)[$i]);
}


$file = fopen('Switch/SwitchAcessList.txt', "w");
$final = "";
$deleted = "";
$name = $_POST['name'];
foreach ($switchesList as $a) {

    if (explode(',', $a)[0] == $name) {
        $deleted = $a;
    } else {
        $a .= "\n";
        $final .= $a;
    }
}

//echo "<br>deleted: ".$deleted."<br><br>";
//echo "final: ".$final."<br><br>";


fwrite($file, $final);
fclose($file);
echo "<h1>Delected with success!</h1>";

$file = fopen('Switch/DeletedSwitchesList.txt', "a");
fwrite($file, $deleted);
fclose($file);

?>
<a href="Home.php">Return to homepage</a>
</body>
</html>