<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>
<?php

if (file_exists('Switch/ChangedSwitchList.txt')) {
    $file = file_get_contents('Switch/ChangedSwitchList.txt', true);
    for ($i = 0; $i < count(explode("\n", $file)); $i++) {
        if (strlen(explode("\n", $file)[$i]) > 0) {
            array_push($switchesList, explode("\n", $file)[$i]);
            array_push($switchesNameList, explode(",", explode("\n", $file)[$i])[0]);
        }
    }
}
?>

<br>
<button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back()
    }
</script>
</body>
</html>