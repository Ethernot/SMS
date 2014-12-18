<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>

<div align="left">
    <h1> Please Choose a Switch to get configurations </h1>
    <br><br><br><br><br>

    <?php
    $switchesNameList = array();
    $switchesList = array();
    if (file_exists('Switch/SwitchAcessList.txt')) {
        $file = file_get_contents('Switch/SwitchAcessList.txt', true);
        for ($i = 0; $i < count(explode("\n", $file)); $i++) {
            if (strlen(explode("\n", $file)[$i]) > 0) {
                array_push($switchesList, explode("\n", $file)[$i]);
                array_push($switchesNameList, explode(",", explode("\n", $file)[$i])[0]);
            }
        }
    }
    ?>

</div>

<?php
if (count($switchesNameList) > 0) {
    echo '<form name="switches" action="Configurations.php" method="post">';
    echo '<select multiple="true" size="10" name="selectSwitch" style="width:350px" required="true">';
    foreach ($switchesNameList as $a) {
        if (strlen($a) > 0) {
            echo '<option value=' . $a . '>' . $a . '</option>';
        }

            }
    echo '</select>';
    echo '<br>';
    echo '<input type="submit" value="Check Switch configurations">';
    echo '<br>';
    echo '</form>';
} else {
    echo "<font color=#FF0000> <h3>No switches inserted, click button Add new switch </h3> </font> <br><br>";
}
?>




<br><br>
<a href="NewSwitch.html">
    <button>Add new switch</button>
</a>

<br><br><br>
<a href="showLogs.php">
    <button>Check logs</button>
</a>

</body>
</html>