<html>
<head>
    <title> Switch management Software </title>
</head>
<body>
<div align="left">
</div>
<div style="width: 1500px;">
    <div style="width: 750px; float: left;">
        <?php
        //        $switchName = $_POST['name'];
        //        $filename1 = $_POST['filename1'];
        //        $filename2 = $_POST['filename2'];

        $switchName = "teste";
        $filename1 = "17-12-2014";
        $filename2 = "18-12-2014";

        echo '<h1>CONFIGURATION of switch ' . $switchName . ' on day' . $filename1 . '</h1>';
        $config1 = file_get_contents("configs/" . $switchName . "/" . $filename1 . ".txt", true);
        $config2 = file_get_contents("configs/" . $switchName . "/" . $filename2 . ".txt", true);;
        for ($i = 0; $i < strlen($config1); $i++) {
            if ($i >= strlen($config2)) {
                echo '<font color=#ff0000 size="4">' . $config1[$i] . '</font>';
            } elseif ($config1[$i] != $config2[$i]) {
                echo '<font color=#ff000 size="4">' . $config1[$i] . '</font>';
            } else {
                echo '<font size="4">' . $config1[$i] . '</font>';
            }
        }
        ?>
    </div>
    <div style="width: 750px; float: right;">
        <?php
        echo '<h1>CONFIGURATION of switch ' . $switchName . ' on day' . $filename2 . '</h1>';
        for ($i = 0; $i < strlen($config2); $i++) {
            if ($i >= strlen($config1)) {
                echo '<font color=#ff0000 size="4">' . $config2[$i] . '</font>';
            } elseif ($config1[$i] != $config2[$i]) {
                echo '<font color=#ff000 size="4">' . $config2[$i] . '</font>';
            } else {
                echo '<font size="4">' . $config2[$i] . '</font>';
            }
        }
        ?>
    </div>
</div>
</body>
</html>