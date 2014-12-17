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

<form name="switches" action="InfoConf.php" method="post">
    <select multiple="true" size="10" name="selectSwitch" style="width:350px" required="true">
        <?php
        foreach ($switchesNameList as $a) {
            echo '<option value=' . $a . '>' . $a . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Check configuration">
    <br>
</form>


<?php
function deleteSwitch($name)
{
    if (tryRemove($name)) {
        echo "Switch deleted succefly";
    } else {
        echo "Error Deleting switch";
    }
}

function tryRemove($name)
{
    global $switchesList;
    $file = fopen('Switch/SwitchAcessList.txt', "w");
    $final = "";
    $deleted = "";
    foreach ($switchesList as $a) {
        echo $a;
        if (explode(',', $a)[0] == $name) {
            $deleted = $a;
        } else {
            $final += $a;
        }
    }

    fwrite($file, $final);
    fclose($file);

    $file = fopen('Switch/DeletedSwitchesList.txt', "a");
    fwrite($file, $deleted);
    fclose($file);
}


?>

<script>
    function deleteSwitch() {
        var aux = document.switches.selectSwitch.value;
        alert(aux);
        alert("<?php deleteSwitch(aux); ?>");
        window.location.reload();
    }
</script>


<br>
<a href="NewSwitch.html">
    <button>Add new switch</button>
</a>

</body>
</html>