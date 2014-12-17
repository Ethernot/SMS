<html>
<head>
    <title> Switch management Software </title>
</head>
<body>
<div align="left">
</div>
<div style="width: 1500px;">
    <div style="width: 750px; float: left;">
        <h1>CONFIGURATION 1</h1>
        <?php
        $config1 = "teste de comparacao de configuracoes";
        $config2 = "testa da comparapau dd configuracees";
        for ($i = 0; $i < strlen($config1); $i++) {
            if ($i >= strlen($config2)) {
                echo '<font color=#ff0000>' . $config1[$i] . '</font>';
            } elseif ($config1[$i] != $config2[$i]) {
                echo '<font color=#ff000>' . $config1[$i] . '</font>';
            } else {
                echo $config1[$i];
            }
        }
        ?>
    </div>
    <div style="width: 750px; float: right;">
        <h1>CONFIGURATION 2</h1>
        <?php
        $config1 = "teste de comparacao de configuracoes";
        $config2 = "testa da comparapau dd configuracees";
        for ($i = 0; $i < strlen($config2); $i++) {
            if ($i >= strlen($config1)) {
                echo '<font color=#ff0000>' . $config2[$i] . '</font>';
            } elseif ($config1[$i] != $config2[$i]) {
                echo '<font color=#ff000>' . $config2[$i] . '</font>';
            } else {
                echo $config2[$i];
            }
        }
        ?>
    </div>
</div>
</body>
</html>