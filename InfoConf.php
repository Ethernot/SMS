<html>
<head>
    <title> Switch management Software </title>
</head>
<body>

<?php
$fileToOpen = $_POST['selectedConf'];
$swichSelected = $_POST['swichSelected'];
$count = $_POST['noconfig'];

$file = file_get_contents('configs/' . $swichSelected . '/' . $fileToOpen, true);
echo $file;
?>
<br><br>
<?php

if ($count > 1) {
    echo '<form name="compare" action="OtherConfigurations.php" method="post">';
    echo '<input type="hidden" name="fileToOpen" value=' . $fileToOpen . '>';
    echo '<input type="hidden" name="swichSelected" value=' . $swichSelected . '>';
    echo '<input type="submit" value="Compare">';
    echo '</form>';
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
