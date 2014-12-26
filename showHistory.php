<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>
<body>
<?php
$name = $_POST['name'];
if (file_exists('configs/history/' . $name . '/confighistory.txt')) {
    $file = fopen('configs/history/' . $name . '/confighistory.txt', 'r') or die("Unable to open file!");
    echo "<h1>Detail history of " . $name . ": </h1>";
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
} else {
    echo "<h3>No History</h3>";
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
