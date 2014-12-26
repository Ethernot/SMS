<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Switch management Software </title>
</head>

<body>
<h1> Alter Switch Configuration</h1>

<?php
$conf = $_POST['alter'];
$name = explode(",", $conf)[0];
$brand = explode(",", $conf)[1];
$model = explode(",", $conf)[2];
$ip = explode(",", $conf)[3];
$user = explode(",", $conf)[4];
$password = explode(",", $conf)[5];
$type = explode(",", $conf)[6];

?>

<form action="alterSwitchFinal.php" method="post">
    Name of the switch: <input type="text" name="name" required="true" value=<?php echo $name; ?>><br><br>
    Brand of the switch: <input type="text" name="brand" required="true" value=<?php echo $brand; ?>><br><br>
    Model of the switch: <input type="text" name="model" required="true" value=<?php echo $model; ?>><br><br>
    IP of the switch: <input type="text" name="IP" required="true" value=<?php echo $ip; ?>><br><br>
    Accessed by:
    <?php

    if ($type == 'ssh') {
        echo '<br> <input type="radio" name="acess" value="ssh" checked="true"> SSH ';
        echo '<br> <input type="radio" name="acess" value="telnet" > Telnet <br>';
    } else {
        echo '<br> <input type="radio" name="acess" value="ssh"> SSH ';
        echo '<br> <input type="radio" name="acess" value="telnet" checked="true"> Telnet <br>';
    }
    ?>
    User credencial to acess the switch: <input type="text" name="user" required="true"
                                                value=<?php echo $user; ?>><br><br>
    Password to acess the switch: <input type="password" name="password" required="true" value=<?php echo $password; ?>><br><br>
    <input type="hidden" name="oldName" value=<?php echo $name ?>>
    <input type="submit" value="Save changes"><br><br>
</form>
<br>
<button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back()
    }
</script>
</body>
</html>
