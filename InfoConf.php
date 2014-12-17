<html>
<head>
    <title> Switch management Software </title>
</head>
<body>

<?php
$fileToOpen = $_POST['selectedConf'];
$swichSelected = $_POST['swichSelected'];

$file = file_get_contents('configs/' . $swichSelected . '/' . $fileToOpen, true);
echo $file;
?>
<br><br>

<form name="compare" action="OtherConfigurations.php" method="post">
    <input type="hidden" name="fileToOpen" value=<?php echo $fileToOpen; ?>>
    <input type="hidden" name="swichSelected" value=<?php echo $swichSelected; ?>>
    <input type="submit" value="Compare">
</form>
</body>
</html>