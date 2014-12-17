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
    $switchesList = array();
    for ($i = 0; $i < count(explode("\n", $file)); $i++) {
        array_push($switchesList, explode(",", explode("\n", $file)[$i])[0]);
    }
    ?>

</div>

<form name="switches" action="InfoConf.php" method="post">
    <select multiple="true" size="10" name="selectSwitch" style="width:350px">
        <?php
        foreach ($switchesList as $a) {
            echo '<option value=' . $a . '>' . $a . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Check configuration">
</form>

<br>
<a href="NewSwitch.html">
    <button>Add new switch</button>
</a>

</body>
</html>