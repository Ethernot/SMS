<html>
<head>
    <title> Switch management Software </title>
</head>
<body>

<?php
$fileToOpen = $_POST['selectedConf'];
$file = file_get_contents("Switch/" . $fileToOpen, true);
echo $file;
?>
<br><br>
<button>Click here to compare</button>

</body>
</html>