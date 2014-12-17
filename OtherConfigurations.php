<html>
<head>
    <title> Switch management Software </title>
</head>
<body>
<?php

$fileToOpen = $_POST['fileToOpen'];
$name = $_POST['swichSelected'];

$brand = "";
$model = "";
$ip = "";
$user = "";
$password = "";
$file = file_get_contents('Switch/SwitchAcessList.txt', true);
for ($i = 0; $i < count(explode("\n", $file)); $i++) {
    //alterar cenas
    if (explode(",", explode("\n", $file)[$i])[0] == $name) {
        $brand = explode(",", explode("\n", $file)[$i])[1];
        $model = explode(",", explode("\n", $file)[$i])[2];
        $ip = explode(",", explode("\n", $file)[$i])[3];
        $user = explode(",", explode("\n", $file)[$i])[4];
        $password = explode(",", explode("\n", $file)[$i])[5];
        break;
    }
}

echo "<font size='5'> NAME: " . $name . '</font> <br> <br>';
echo "<font size='5'> BRAND:" . $brand . '</font> <br> <br>';
echo "<font size='5'> MODEL:" . $model . '</font> <br> <br>';
echo "<font size='5'> IP:" . $ip . '</font> <br> <br>';
echo "<font size='5'> USER:" . $user . '</font> <br> <br>';
?>

<form action="deleteSwitch.php" method="post">
    <input type="hidden" name="name" value=<?php echo $name; ?>>
    <input type="submit" value="Delete this switch">
</form>
<br>
<br>

<h2>Configurations: </h2>

<form name="configurations" action="Comparador.php" method="post">
    <select multiple="true" size="10" name="conf2" style="width:350px" required="true">
        <?php
        if ($handle = opendir('configs/' . $name)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if ($entry != $fileToOpen) {
                        echo '<option value=' . $entry . '>' . $entry . '</option>';
                    }
                }
            }
            closedir($handle);
        }
        ?>
    </select>
    <input type="hidden" name="swichSelected" value=<?php echo $name; ?>>
    <input type="hidden" name="conf1" value=<?php echo $fileToOpen; ?>>

    <input type="submit" value="Compare">
</form>


</body>
</html>


