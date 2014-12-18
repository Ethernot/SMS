<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>

<body>
<h1> Logs: </h1>
<br>
<?php
if (file_exists("logs")) {

    if ($handle = opendir('logs/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                echo '<h3>' . ' >> ' . $entry . '</h3>';
            }
        }
        closedir($handle);
    }
} else {
    echo "<font color=#FF0000> <h3>No logs</h3> </font> <br><br>";
}
?>
<br><br><br>
<button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back()
    }
</script>

</body>
</html>