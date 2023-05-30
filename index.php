<?php
$msg=isset($msg)? $msg:"";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $msg
    ?>
<form action="Kontroler.php" method="post">
    ID: <br>
    <input type="text" name="id"> <br>
    Ime: <br>
    <input type="text" name="ime"> <br>
    Prezime: <br>
    <input type="text" name="prezime"> <br>
    Broj indexa: <br>
    <input type="text" name="brIndexa"> <br>
    <input type="submit" name="action" value="Update">
</form>
</body>
</html>