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
    $file = file_get_contents('Switch/SwitchAcessList.txt', true);
    $switchesNameList = array();
    $switchesList = array();
    for ($i = 0; $i < count(explode("\n", $file)); $i++) {
        array_push($switchesList, explode("\n", $file)[$i]);
        array_push($switchesNameList, explode(",", explode("\n", $file)[$i])[0]);
    }
    ?>

</div>

<form name="switches" action="Configurations.php" method="post">
    <select multiple="true" size="10" name="selectSwitch" style="width:350px" required="true">
        <?php
        foreach ($switchesNameList as $a) {
            if (strlen($a) > 0) {
                echo '<option value=' . $a . '>' . $a . '</option>';
            }

        }
        ?>
    </select>
    <br>
    <input type="submit" value="Check Switch configurations">
    <br>
</form>




<br>
<a href="NewSwitch.html">
    <button>Add new switch</button>
</a>

</body>
</html>