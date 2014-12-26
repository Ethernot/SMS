<html>
<head>
    <title> Switch management Software </title>
</head>
<body>
<?php

$name = $_POST['selectSwitch'];
$brand = "";
$model = "";
$ip = "";
$user = "";
$password = "";
$type = "";
$final = "";
$file = file_get_contents('Switch/SwitchAcessList.txt', true);
for ($i = 0; $i < count(explode("\n", $file)); $i++) {
    //alterar cenas
    if (explode(",", explode("\n", $file)[$i])[0] == $name) {
        $final = explode("\n", $file)[$i];
        $brand = explode(",", explode("\n", $file)[$i])[1];
        $model = explode(",", explode("\n", $file)[$i])[2];
        $ip = explode(",", explode("\n", $file)[$i])[3];
        $user = explode(",", explode("\n", $file)[$i])[4];
        $password = explode(",", explode("\n", $file)[$i])[5];
        $type = explode(",", explode("\n", $file)[$i])[6];
        break;
    }
}

echo "<font size='6'>Switch Datails: </font> <br> <br> <br>";
echo "<font size='4'> NAME:  " . $name . '</font> <br> <br>';
echo "<font size='4'> BRAND: " . $brand . '</font> <br> <br>';
echo "<font size='4'> MODEL: " . $model . '</font> <br> <br>';
echo "<font size='4'> IP:" . $ip . '</font> <br> <br>';
echo "<font size='4'> USER:" . $user . '</font> <br> <br>';
echo "<font size='4'> ACCESSED BY:" . $type . '</font> <br> <br>';
?>

<form action="alterSwitch.php" method="post">
    <input type="hidden" name="alter" value=<?php echo $final; ?>>
    <input type="submit" value="Alter this switch">
</form>

<form action="showHistory.php" method="post">
    <input type="hidden" name="name" value=<?php echo $name; ?>>
    <input type="submit" value="check switch detail history">
</form>

<form action="deleteSwitch.php" method="post">
    <input type="hidden" name="name" value=<?php echo $name; ?>>
    <input type="submit" value="Delete this switch">
</form>
<br>
<br>

<h2>Configurations: </h2>

<form name="configurations" action="InfoConf.php" method="post">
    <select multiple="true" size="10" name="selectedConf" style="width:350px" required="true">
        <?php
        $i = 0;
        if ($handle = opendir('configs/' . $name)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    echo '<option value=' . $entry . '>' . $entry . '</option>';
                    $i++;
                }
            }
            closedir($handle);
        }
        ?>
    </select>
    <input type="hidden" name="swichSelected" value=<?php echo $name; ?>>
    <input type="hidden" name="noconfig" value=<?php echo $i; ?>>
    <input type="submit" value="Check Configuration">
</form>

<form action="getConfigurationNow.php" method="post">
    <input type="hidden" name="switchName" value=<?php echo $name; ?>>
    <input type="submit" value="Get actual configuration now!">
</form>

<br><br><br>

<br>
<button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back()
    }
</script>
</body>
</html>


