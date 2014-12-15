<html>
<head>
    <title> Switch management Software </title>
</head>
<body>
<div align="center">
    <h1>List of configurations for the Switch sw-st3.dei.uc.pt</h1>

    <h3> Please select configuration </h3>

    <?php
    echo '<p></p>';
    ?>

    <form action="InfoConf.php">
        <input type="radio" name="sex" value="day 1" checked>Day 1
        <br>
        <input type="radio" name="sex" value="day 2">Day 2
        <br>
        <br>
        <br>
        <input type="submit" value="Check this configuration">
    </form>
    <form action="ListaConfsSwitcha.php">
        <input type="submit" value="Compare">
    </form>
    <a href="Home.html">Return to home page</a>
</div>
</body>
</html>

